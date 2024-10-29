<?php

namespace App\Http\Controllers;


use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\PasswordConfirmationRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(RegisterRequest $request)
    {
        $this->authService->Register($request);
        return redirect()->route('login')
            ->with('verifyMessage', __('auth_page.verify_message'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(LoginRequest $request)
    {
        $result = $this->authService->login($request);
        if (isset($result->data['passwordCheck']) && !$result->data['passwordCheck']) {
            return redirect()->back()->with('error', __('auth_page.wrong_password'));
        }
        if (isset($result->data['userActive']) && !$result->data['userActive']) {
            return redirect()->back()->with('error', __('auth_page.account_not_verified'));
        }

        Auth::login($result->data['user']);
        return redirect()->route('home');
    }

    public function verifyAccount($token)
    {
        $this->authService->verifyAccount($token);
        return redirect()->route('login')->with('verifyMessage', __('auth_page.account_verified'));
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('home');
    }

    public function resetPassword()
    {
        return view('auth.reset-password');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $result = $this->authService->forgetPassword($request);
        if (isset($result->data['userActive']) && !$result->data['userActive']) {
            return redirect()->back()->with('error', __('auth_page.account_not_verified'));
        }
        if (isset($result->data['tokenExpired']) && !$result->data['tokenExpired']) {
            return redirect()->back()->with('error', __('auth_page.token_not_expired'));
        }
        return redirect()->route('resetPassword')
            ->with('verifyMessage', __('auth_page.new_password'));
    }

    public function newPassword($token)
    {
        $result = $this->authService->newPassword($token);
        if (isset($result->data['tokenExpired']) && !$result->data['tokenExpired']) {
            return redirect()->route('resetPassword')
                ->with('error', __('auth_page.token_expired'));
        }
        return view('auth.new-password', compact('token'));
    }

    public function confirmPassword(PasswordConfirmationRequest $request, $token)
    {
        $result = $this->authService->confirmPassword($request, $token);
        if (isset($result->data['tokenExpired']) && $result->data['tokenExpired']) {
            return redirect()->back()->with('error', __('auth_page.token_expired'));
        }
        return redirect()->route('login')
            ->with('verifyMessage', __('auth_page.change_password'));
    }

}

