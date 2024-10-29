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
        return Response::withMessage(__('auth_page.register_msg'))->build()->response();
    }

    public function login(LoginRequest $loginRequest)
    {
        $result = $this->authService->login($loginRequest->validated());
        if (isset($result->data['passwordCheck']) && !$result->data['passwordCheck']) {
                return Response::withMessage(__('auth_page.wrong_password'))->build()->response();
        }
        if (isset($result->data['userActive']) && !$result->data['userActive']) {
                return Response::withMessage(__('auth_page.account_not_verified'))->build()->response();
        }
        return Response::withData($result->data)->withMessage(__('auth_page.login_msg'))->build()->response();
    }

    public function verifyAccount($token)
    {
        $this->authService->verifyAccount($token);
        return Response::withMessage(__('auth_page.account_verified'))->build()->response();
    }

    public function logout()
    {
        $this->authService->logout();
        return Response::withMessage(__('auth_page.logout_msg'))->build()->response();
    }

    public function forgotPassword(ForgotPasswordRequest $forgotPasswordRequest)
    {
        $result = $this->authService->forgetPassword($forgotPasswordRequest->validated());
        if (isset($result->data['userActive']) && !$result->data['userActive']) {
                return Response::withMessage(__('auth_page.account_not_verified'))->build()->response();
        }
        if (isset($result->data['tokenExpired']) && $result->data['tokenExpired']) {
                return Response::withMessage(__('auth_page.token_expired'))->build()->response();
        }
        return Response::withMessage(__('auth_page.new_password'))->build()->response();
    }

    public function confirmPassword(PasswordConfirmationRequest $passwordConfirmationRequest, $token)
    {
        $result = $this->authService->confirmPassword($passwordConfirmationRequest->validated(), $token);
        if (isset($result->data['tokenExpired']) && $result->data['tokenExpired']) {
                return Response::withMessage(__('auth_page.token_expired'))->build()->response();
        }
        return Response::withMessage(__('auth_page.change_password'))->build()->response();
    }


}
