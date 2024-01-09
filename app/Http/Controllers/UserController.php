<?php

namespace App\Http\Controllers;
use App\Http\Services\UserService;
use Illuminate\Routing\Controller;

//using the requests
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;



class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegistrationRequest $request)
    {
        return $this->userService->registerUser($request);
    }

    public function login(LoginRequest $request)
    {
        return $this->userService->loginUser($request);
    }
}