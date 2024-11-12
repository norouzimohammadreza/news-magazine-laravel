<?php

namespace App\Services\Admin;

use App\Base\ServiceResult;
use App\Enums\UserPermissionEnum;
use App\Http\Requests\Api\Admin\User\UserStoreRequest;
use App\Http\Requests\Api\Admin\User\UserUpdateRequest;
use App\Http\Resources\API\Admin\Users\UserDetailesApiResource;
use App\Http\Resources\API\Admin\Users\UsersListApiResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getList(): ServiceResult
    {
        $users = User::paginate(10);
        return new ServiceResult(true, UsersListApiResource::collection($users));
    }

    public function isAdmin(User $user): ServiceResult
    {
        if ($user->id == auth()->user()->id) {
            return new ServiceResult(true);
        }
        if ($user->is_admin == UserPermissionEnum::admin->value) {
            $user->is_admin = UserPermissionEnum::user->value;
        } else {
            $user->is_admin = UserPermissionEnum::admin->value;
        }
        $user->save();
        return new ServiceResult(true);

    }

    public function createUser(UserStoreRequest $request): ServiceResult
    {
        $validatedRequest = $request->validated();
        $validatedRequest['password'] = Hash::make($validatedRequest['password']);
        User::create($validatedRequest);
        return new ServiceResult(true);
    }

    public function deleteUser(User $user): ServiceResult
    {
        $user->delete();
        return new ServiceResult(true);
    }

    public function updateUser(UserUpdateRequest $request, User $user): ServiceResult
    {
        $validatedRequest = $request->validated();
        if ($user->id == auth()->user()->id) {
            return new ServiceResult(true);
        }

        $user->name = $validatedRequest['name'];
        $user->is_admin = $validatedRequest['is_admin'];
        $user->save();
        return new ServiceResult(true, $user);
    }

    public function showUser(User $user): ServiceResult
    {
        return new ServiceResult(true, new UserDetailesApiResource($user));
    }
}

