<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

//using UserService as main logic
use App\Http\Services\UserService;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request)
    {
        return $this->userService->registerUser($request);
    }

    public function login(Request $request)
    {
        return $this->userService->loginUser($request);
    }
}