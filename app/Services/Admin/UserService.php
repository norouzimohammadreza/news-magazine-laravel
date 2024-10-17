<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Http\Resources\API\Admin\Users\UserDetailesApiResource;
use App\Http\Resources\API\Admin\Users\UsersListApiResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getList(): ServiceResult
    {
        $users = User::all();
        return new ServiceResult(true, UsersListApiResource::collection($users));
    }

    public function isAdmin(User $user): ServiceResult
    {
        if ($user->is_admin) {
            $user->is_admin = 0;
        } else {
            $user->is_admin = 1;
        }
        User::where('id', '=', $user->id)->update([
            'is_admin' => $user->is_admin
        ]);
        return new ServiceResult(true);

    }

    public function createUser(array $request): ServiceResult
    {
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request);
        return new ServiceResult(true, $request);
    }

    public function deleteUser(User $user): ServiceResult
    {
        $user->delete();
        return new ServiceResult(true);
    }

    public function updateUser(array $request, User $user): ServiceResult
    {
        if (isset($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        }
        $user->find($user->id)->update($request);
        return new ServiceResult(true, $user);
    }

    public function showUser(User $user): ServiceResult
    {
        return new ServiceResult(true, new UserDetailesApiResource($user));
    }


}

