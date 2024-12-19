<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResources;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $user = auth('api')->user();
        return $this->successResponse(AddressResources::collection($user->address()->get()), 'data return successfully');
    }

    public function create(Request $request)
    {
        $user = auth('api')->user();
        $validator = Validator::make($request->all(), [
            'address' => 'sometimes|max:255',
            'region' => 'sometimes|max:255',
            'city' => 'sometimes|max:255',
            'floor' => 'sometimes|max:255',
            'street' => 'sometimes|max:255',
            'landmark' => 'sometimes|max:255',
            'type' => 'required|in:essential,sub',

        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }
        if ($request->type == "essential") {
            $user->address()->update([
                'type' => 'sub'
            ]);
        }
        $data = $user->address()->create([
            'address' => $request->address,
            'region' => $request->region,
            'city' => $request->city,
            'floor' => $request->floor,
            'street' => $request->street,
            'landmark' => $request->landmark,
            'type' => $request->type,
        ]);
        return $this->successResponse(new AddressResources($data), 'data return successfully');

    }
}
