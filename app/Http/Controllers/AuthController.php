<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        //1. set up validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        //2. cek validation
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        //3. create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        //4. cek keberhasilan 
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User registered successfully',
                'data' => $user
            ], 201);
        }
        //5. cek gagal
        return response()->json([
            'success' => false,
            'message' => 'User registration failed',
        ], 409);
    }

    public function login(Request $request)
    {
        //1. set up validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        //2. cek validation
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        //3. get kredensial
        $credentials = $request->only('email', 'password');
        
        //4. cek isFailed
       if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed: Invalid email or password',
            ], 401);
        }

        //5. cek issukses
        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'user'  => auth()->guard('api')->user(),
            'token' => $token,
        ], 200);
    }

    public function Logout(Request $request){
        //try catch
        //1. Invalidate token
        //2. cek sukses

        //catch
        //1. cek gagal
        try{
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'success' => true,
                'message' => 'Logout successful',
            ], 200);
        } catch (JWTException $e){
            return response()->json([
                'success' => false,
                'message' => 'Token is invalid or exrired'], 500);  
        }
    }

}
