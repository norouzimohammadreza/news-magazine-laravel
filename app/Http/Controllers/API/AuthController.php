<?php

namespace App\Http\Controllers\API;


use App\Http\ApiRequests\Api\Auth\ForgotPassword;
use App\Http\ApiRequests\Api\Auth\Login;
use App\Http\ApiRequests\Api\Auth\Register;
use App\Http\Controllers\Controller;
use App\Http\ApiRequests\Api\Auth\PasswordConfirmation;
use App\RestfulApi\Facade\Response;
use App\Services\AuthService;


class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function Register(Register $register)
    {
       $result = $this->authService->Register($register->all());
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
        return Response::withMessage('Your account is verified successfully.')->build()->response();
    }
    public function logout(){
        $this->authService->logout();
        return Response::withMessage('User logout successfully.')->build()->response();
    }
    public function forgotPassword(ForgotPassword $forgotPassword)
    {
        $result = $this->authService->forgetPassword($forgotPassword->all());
        if (isset($result->data['userActive'])){
            if (!$result->data['userActive']){
                return Response::withMessage('This account is not verified yet')->build()->response();
            }}
        if (isset($result->data['tokenExpired'])){
            if ($result->data['tokenExpired']){
                return Response::withMessage('This token is expired yet')->build()->response();
            }}
        return Response::withMessage('Please check your email to receive new password.')->build()->response();

    }
    public function confirmPassword(PasswordConfirmation $confirmation,$token)
    {
       $result= $this->authService->confirmPassword($confirmation->all(),$token);
        if (isset($result->data['tokenExpired'])){
            if ($result->data['tokenExpired']){
                return Response::withMessage('This token is expired yet')->build()->response();
            }}
        return Response::withMessage('User password is changed successfully.')->build()->response();
    }


}
