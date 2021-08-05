<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //Validate data

        $data = $request->only('name', 'email', 'password');

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid

        if ($validator->fails()) {

            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //User created, return success response

        return response()->json([
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //valid credential

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid

        if ($validator->fails()) {

            return response()->json([
                'error' => $validator->messages()
            ], 200);
        }

        try {
            if (! $token = JWTAuth::attempt($credentials)) {

                return response()->json([
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } 

        catch (JWTException $e) {

            return response()->json([
                    'message' => 'Could not create token.',
                ], 500);
        }
    
        //token created and returned

        return response()->json([
            'access_token' => $token
        ],200);
    }
 
    public function logout(Request $request)
    {
        //valid credential

        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //Send failed response if request is not valid

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated, do logout      


        try {
            
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'message' => 'User has been logged out'
            ]);

        } catch (JWTException $exception) {

            return response()->json([
                'message' => 'Sorry, user cannot be logged out'
            ], 500);
        }
    }
}