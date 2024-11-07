<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\User\UserStoreRequest;
use App\Http\Requests\Api\Admin\User\UserUpdateRequest;
use App\Models\User;
use App\Services\Admin\UserService;
use RealRashid\SweetAlert\Facades\Alert;


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

    public function store(UserStoreRequest $request)
    {
        $this->userService->createUser($request);
        Alert::success(__('alert.alerts.create', ['name' => __('alert.name.user')])
            , __('alert.alerts.create_msg', ['name' => __('alert.name.user')]));
        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $this->userService->updateUser($request, $user);
        Alert::success(__('alert.alerts.update', ['name' => __('alert.name.user')])
            , __('alert.alerts.update_msg', ['name' => __('alert.name.user')]));
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        Alert::success(__('alert.alerts.delete', ['name' => __('alert.name.user')])
            , __('alert.alerts.delete_msg', ['name' => __('alert.name.user')]));
        return redirect()->route('user.index');
    }
}
