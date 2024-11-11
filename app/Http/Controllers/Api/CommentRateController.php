<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CommentResource;
use App\Http\Resources\Api\RateResource;
use App\Models\Comment;
use App\Models\Rate;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentRateController extends Controller
{
    use ApiResponseTrait;

    public   function rate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required|integer|min:1|max:5',
            'id_type' => 'required',
            'type' => 'required|in:product,blog',
            'message' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 400);
        }

        $RateUsers = Rate::where('customer_id', auth('api')->id())->where('rateable_type', "App\Models\\" .
            ucfirst($request->type))->where('rateable_id', $request->id_type)->first();

        $input = [
            'value' => $request->value,
            'customer_id' => auth('api')->id(),
            'rateable_id' => $request->id_type,
            'message' => $request->message,
            'rateable_type' => "App\Models\\" . ucfirst($request->type),
        ];


        if ($RateUsers) {
            $RateUsers->update($input);
            $data = $RateUsers;
        } else {
            $data = Rate::create($input);
            $product = $input['rateable_type']::findorFail($data->rateable_id);
            if ($product) {
                $all_product_rates = 0;
                foreach ($product->rateable as $rate) {
                    $all_product_rates += $rate->value;
                }
                $product->rate = $all_product_rates / count($product->rateable);
                $product->save();
            }
        }

        if ($data) {
            return $this->successResponse(new RateResource($data), 'Return Data Successfully');
        } else {
            return $this->errorResponse('error data', 400);
        }
    }






    public function comment(Request $request)
    {
        return $this->errorResponse("Not fond", 400);
        $validator = Validator::make($request->all(), [
            'note' => 'required|string',
            'id_type' => 'required',
            'type' => 'required|in:product,blog',
        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 400);
        }


        $commentsUsers = Comment::where('customer_id', auth()->id())->where('commentable_type', "App\Models\\" .
            ucfirst($request->type))->where('commentable_id', $request->id_type)->first();


        $input = [
            'note' => $request->note,
            'commentable_type' => "App\Models\\" . ucfirst($request->type),
            'commentable_id' => $request->id_type,
            'customer_id' => auth()->id(),
            'status' => false,
        ];


        if ($commentsUsers) {
            $commentsUsers->update($input);
            $data = $commentsUsers;
        } else {
            $data = Comment::create($input);
        }


        if ($data) {
            return $this->successResponse(new CommentResource($data), 'Return Data Successfully');
        } else {
            return $this->errorResponse('error data', 400);
        }
    }
}
