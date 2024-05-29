<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request->validated();

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type'  => '0',
        ];

        $user = User::create($data);
        $token = $user->createToken('')->plainTextToken;

        return response()->json([
            'message' => 'success',
            'data' => $data,
            'token' => $token
        ],201);
    }


    public function loginApi(LoginRequest $request) {
        $request->validated();
    
        $data = User::where('email', $request->email)->first();
        if(!$data || !Hash::check($request->password, $data->password)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 422);
        }
    
        $token = $data->createToken('loginToken')->plainTextToken;
    
        return response()->json([
            'message'   =>  'success',
            'data'      =>  $data,
            'token'     =>  $token
        ], 200);
    }

    public function logoutApi(Request $request)
    {
        // Ensure the request is authenticated
        if ($request->user()) {
            // Revoke all tokens for the authenticated user
            $request->user()->tokens()->delete();
            
            return response()->json([
                'message' => 'Logged out successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not authenticated'
            ], 401);
        }
    }
}
