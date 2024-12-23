<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResources;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'type' => 'required|in:email,phone',
            'email' => 'required_if:type,email|email|exists:users,email|max:255',
            'phone' => 'required_if:type,phone|numeric|exists:users,phone',
            'password' => 'required|string|min:6|max:255',
        ]);
        if ($validator->fails()) {

            return $this->errorResponse($validator->errors()->toArray(), 422);
        }
        if ($request->type == "email") {
            $credentials = request(['email', 'password']);
        } else {
            $credentials = request(['phone', 'password']);
        }
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|string|min:6|max:255',
            'gender' => 'required|in:man,female',

        ]);
        if ($validator->fails()) {

            return $this->errorResponse($validator->errors()->toArray(), 422);
        }

        try {
            $new = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'password' => bcrypt($request->password),
                'type' => 'customer',
                'role' => 'customer',
            ]);
            return $this->successResponse(new UserResources($new), 'data created Successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 422);
        }
    }

    public function profile()
    {
        return $this->successResponse(new UserResources(auth('api')->user()), 'Return Data Successfully');
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
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'users' => new UserResources(auth('api')->user())
        ]);
    }


    public function edit_profile(Request $request)
    {
        $user = auth('api')->user();


        $validator = Validator::make($request->all(), [
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'gender' => 'sometimes|in:man,female',
            'address' => 'sometimes|string|max:500',
            'profile_picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        if ($validator->fails()) {

            return $this->errorResponse($validator->errors()->toArray(), 422);
        }

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $filePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $filePath;
        }
        $user->update([
            'first_name' => $request->first_name ?? $user->first_name,
            'last_name' => $request->last_name ?? $user->last_name,
            'gender' => $request->gender ?? $user->gender,
            'address' => $request->address ?? $user->address,
            'type' => 'customer',
            'role' => 'customer',
        ]);
        if (isset($filePath)) {
            $user->profile_picture = $filePath;
            $user->save();
        }

        return $this->successResponse(new UserResources($user), 'Data Updated Successfully');
    }


}
