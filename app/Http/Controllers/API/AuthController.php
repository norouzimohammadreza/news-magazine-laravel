<?php

namespace App\Http\Controllers\API;

use App\Http\ApiRequests\Api\Auth\Login;
use App\Http\ApiRequests\Api\Auth\Register;
use App\Http\Controllers\Controller;
use App\Services\AuthService;


class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function Register(Register $register)
    {
       $result = $this->authService->Register($register->all());
       return response()->json($result->data);
    }
    public function login(Login $login)
    {
        $result = $this->authService->login($login->all());
        return response()->json($result->data);
        if (isset($result->data['passwordCheck'])){
            if(!$result->data['passwordCheck']){
                return response()->json('Password is wrong.');
            }
        }
        if (isset($result->data['userActive'])){
            if (!$result->data['userActive']){
                return response()->json('This account is not verified yet');
            }}

    }
}
