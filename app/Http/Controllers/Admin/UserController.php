<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\User\UserStoreRequest;
use App\Http\Requests\Api\Admin\User\UserUpdateRequest;
use App\Models\User;
use App\Services\Admin\UserService;


class UserController extends Controller
{

    public function __construct(private UserService $userService)
    {
    }

    public function index()
    {
        $result = $this->userService->getList();
        $users = $result->data;
        return view('admin.user.index', [
            'users' => $users,
        ]);
    }

    public function isAdmin(User $user)
    {
        $this->userService->isAdmin($user);
        return redirect()->back();
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserStoreRequest $userStoreRequest)
    {
        $this->userService->createUser($userStoreRequest->validated());
        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(UserUpdateRequest $userUpdateRequest, User $user)
    {
        $this->userService->updateUser($userUpdateRequest->validated(), $user);
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return redirect()->route('user.index');
    }
}
