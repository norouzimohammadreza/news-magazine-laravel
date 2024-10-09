<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\store;
use App\Http\Requests\Admin\User\update;
use App\Http\Requests\Admin\User\updateUser;
use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private UserService $userService)
    {
    }

    public function index()
    {
        $result = $this->userService->getList();
        return view('admin.user.index',[
            'users' => $result->data->all()
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
    public function store(store $store)
    {
        $this->userService->createUser($store->all());
        return redirect('admin/user');
    }
    public function edit(User $user)
    {
        return view('admin.user.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(update $update, User $user)
    {
        $this->userService->updateUser($update->all(),$user);
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return redirect('admin/user');
    }
}
