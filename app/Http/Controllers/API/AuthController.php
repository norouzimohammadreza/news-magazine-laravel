<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\PasswordConfirmationRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\RestfulApi\Facade\Response;
use App\Services\AuthService;


class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function Register(RegisterRequest $registerRequest)
    {
        $this->authService->Register($registerRequest->validated());
        return Response::withMessage('User created successfully')->build()->response();
    }

    public function login(LoginRequest $loginRequest)
    {
        $result = $this->authService->login($loginRequest->validated());
        if (isset($result->data['passwordCheck']) && !$result->data['passwordCheck']) {
                return Response::withMessage('Password is wrong.')->build()->response();
        }
        if (isset($result->data['userActive']) && !$result->data['userActive']) {
                return Response::withMessage('This account is not verified yet')->build()->response();
        }
        return Response::withData($result->data)->withMessage('LoginRequest successful')->build()->response();
    }

    public function verifyAccount($token)
    {
        $this->authService->verifyAccount($token);
        return Response::withMessage('Your account is verified successfully.')->build()->response();
    }

    public function logout()
    {
        $this->authService->logout();
        return Response::withMessage('User logout successfully.')->build()->response();
    }

    public function forgotPassword(ForgotPasswordRequest $forgotPasswordRequest)
    {
        $result = $this->authService->forgetPassword($forgotPasswordRequest->validated());
        if (isset($result->data['userActive']) && !$result->data['userActive']) {
                return Response::withMessage('This account is not verified yet')->build()->response();
        }
        if (isset($result->data['tokenExpired']) && $result->data['tokenExpired']) {
                return Response::withMessage('This token is expired yet')->build()->response();
        }
        return Response::withMessage('Please check your email to receive new password.')->build()->response();
    }

    public function confirmPassword(PasswordConfirmationRequest $passwordConfirmationRequest, $token)
    {
        $result = $this->authService->confirmPassword($passwordConfirmationRequest->validated(), $token);
        if (isset($result->data['tokenExpired']) && $result->data['tokenExpired']) {
                return Response::withMessage('This token is expired yet')->build()->response();
        }
        return Response::withMessage('User password is changed successfully.')->build()->response();
    }


}
