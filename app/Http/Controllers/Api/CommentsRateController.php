<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RateCommentResource;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Product;
use App\Models\RateComment;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentsRateController extends Controller
{
    use ApiResponseTrait;
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comments' => 'required|string|max:350',
            'id_type' => 'required|integer',
            'type' => 'required|in:product,blog',
            'value' => 'required|integer|min:1|max:5',
        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 400);
        }


        $commentsUsers = RateComment::where('customer_id', auth()->id())->where('commentable_type', "App\Models\\" .
            ucfirst($request->type))->where('commentable_id', $request->id_type)->first();


        $input = [
            'comments' => $request->comments,
            'commentable_type' => "App\Models\\" . ucfirst($request->type),
            'commentable_id' => $request->id_type,
            'customer_id' => auth('api')->id(),
            'status' => "noActive",
            'value' => $request->value,
        ];


        if ($commentsUsers) {
            $commentsUsers->update($input);
            $data = $commentsUsers;
            $product = $input['commentable_type']::findorFail($input['commentable_id']);
            if ($product) {
                $all_product_rates = 0;
                foreach ($product->commentable as $rate) {
                    $all_product_rates += $rate->value;
                }
                $product->rate = $all_product_rates / count($product->commentable);
                $product->save();
            }
        } else {
            $data = RateComment::create($input);
            $product = $input['commentable_type']::findorFail($data->commentable_id);
            if ($product) {
                $all_product_rates = 0;
                foreach ($product->commentable as $rate) {
                    $all_product_rates += $rate->value;
                }
                $product->rate = $all_product_rates / count($product->commentable);
                $product->save();
            }
        }


        if ($data) {
            return $this->successResponse(new RateCommentResource($data), 'Return Data Successfully');
        } else {
            return $this->errorResponse('error data', 400);
        }
    }

}
