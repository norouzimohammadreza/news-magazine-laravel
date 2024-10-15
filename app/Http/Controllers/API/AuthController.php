<?php

namespace App\Http\Controllers\API;

use App\Http\ApiRequests\Api\Auth\Login;
use App\Http\ApiRequests\Api\Auth\Register;
use App\Http\Controllers\Controller;
use App\RestfulApi\Facade\Response;
use App\Services\AuthService;


class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function Register(Register $register)
    {
       $this->authService->Register($register->all());
       return Response::withMessage('User created successfully')->build()->response();
    }
    public function login(Login $login)
    {
        $result = $this->authService->login($login->all());

        if (isset($result->data['passwordCheck'])){
            if(!$result->data['passwordCheck']){
                return Response::withMessage('Password is wrong.')->build()->response();
            }
        }
        if (isset($result->data['userActive'])){
            if (!$result->data['userActive']){
                return Response::withMessage('This account is not verified yet')->build()->response();
            }}
        return Response::withData($result->data)->withMessage('Login successful')->build()->response();

    }
    public function verifyAccount($token){
        $this->authService->verifyAccount($token);
        return Response::withMessage('This account is verified successfully.')->build()->response();
    }
}
