<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Auth\CustomerResources;
use App\Models\Customer;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerAuthController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'login_phone']]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {

            return $this->errorResponse($validator->errors(), 422);
        }

        $credentials = request(['email', 'password']);
        $this->checkActiveUser($credentials['email']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function login_phone(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required|exists:customers,phone',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {

            return $this->errorResponse($validator->errors(), 422);
        }

        $credentials = request(['phone', 'password']);
        $this->checkActiveUser($credentials['email']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric|unique:customers,phone',
        ]);
        if ($validator->fails()) {

            return $this->errorResponse($validator->errors(), 422);
        }

        try {
            $new = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
            ]);
            return $this->successResponse(new CustomerResources($new), 'data created Successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 422);
        }
    }

    public function me()
    {
        return $this->successResponse(new CustomerResources(auth('api')->user()), 'Return Data Successfully');
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 260000,
            'customer' => new CustomerResources(auth('api')->user())
        ]);
    }

    public function editProfile(Request $request)
    {
        try {

            $data = Customer::findorfail(auth('api')->id());
            if ($request->file('image')) {
                $imagePath = $request->file('image')->store('uploads/images/'.$data->phone, 'public');
                $data->image = $imagePath;
            }
            $data->name = $request->name;
            $data->save();
            return $this->successResponse(new CustomerResources(auth('api')->user()), 'Data updated Successfully');

        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 422);

        }
    }

    public function checkActiveUser($email)
    {
        $checkData = Customer::where('email',$email)->first();
        if ($checkData){
            if ($checkData->status == "noActive"){
                return $this->errorResponse('the user not active Please contact the administrator ', 422);
            }
        }
    }
}
