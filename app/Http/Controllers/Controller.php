<?php

//NOT SOLID PRINCIPLE TO BE CONVERTED TO SOLID

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Response;



// class UserController extends Controller
// {
//     public function register(Request $request)
//     {
//         // Validation
//         $request->validate([
//             'name' => 'required',
//             'email' => 'required|email|unique:users',
//             'password' => 'required|min:6',
//         ]);

//         // Create user
//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => bcrypt($request->password),
//         ]);

//         return response()->json(['status' => 201, 'message' => 'User registered successfully', 'data' => $user], 201);
//     }

//     public function login(Request $request)
//     {
//         // Validation
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);

//         // Attempt to login
//         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
//             $user = Auth::user();
//             $token = $user->createToken('authToken')->accessToken;

//             return response()->json(['status' => 200, 'message' => 'Login successful', 'data' => ['jwt-token' => $token, 'user' => ['name' => $user->name]]], 200);
//         }

//         return response()->json(['status' => 401, 'message' => 'Unauthorized'], 401);
//     }
// }
