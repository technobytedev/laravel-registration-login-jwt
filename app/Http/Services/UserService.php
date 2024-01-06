<?php

//UserService as main logic for UserController

namespace App\Http\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class UserService
{
    public function registerUser(Request $request)
    {   

        try {

            // Validation
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            // Create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return response()->json(['status' => 201, 'message' => 'User registered successfully', 'data' => $user], 201);        

        }catch (ValidationException $e) {

            $errors = $e->validator->errors()->toArray();
            return response()->json(['status' => 401, 'message' => $errors], 401);

         }


    }//end registerUser method

    public function loginUser(Request $request)
    {   

        try {

            // Validation
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Attempt to login
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                
                $user = Auth::user();
                $token = $user->createToken('authToken')->accessToken;

                return response()->json(['status' => 200, 'message' => 'Login successful', 'data' => ['jwt-token' => $token, 'user' => ['name' => $user->name]]], 200);
            }

            return response()->json(['status' => 401, 'message' => 'Login failed'], 401);

        }catch (ValidationException $e) {


            $errors = $e->validator->errors()->toArray();
            return response()->json(['status' => 401, 'message' => $errors], 401);
        }

    }//end login user method
}
