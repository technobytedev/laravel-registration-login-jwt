<?php

//UserService as main logic for UserController

namespace App\Http\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

//using the requests
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;


class UserService
{
    public function registerUser(RegistrationRequest $request)
    {   

        try {

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

    public function loginUser(LoginRequest $request)
    {   

        try {

            // Attempt to login
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                
                $user = Auth::user();
                $token = auth('api')->login($user);

                return response()->json(['status' => 200, 'message' => 'Login successful', 'data' => ['jwt-token' => $token, 'user' => ['name' => $user->name]]], 200);
            }

            return response()->json(['status' => 401, 'message' => 'Login failed'], 401);

        }catch (ValidationException $e) {

            $errors = $e->validator->errors()->toArray();
            return response()->json(['status' => 401, 'message' => $errors], 401);
        }

    }//end login user method


    
}
