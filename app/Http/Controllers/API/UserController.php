<?php

namespace App\Http\Controllers\API;

use App\Enums\ResponseStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\User\UserStoreRequest;
use App\Http\Requests\Api\Admin\User\UserUpdateRequest;
use App\Models\User;
use App\RestfulApi\Facade\Response;
use App\Services\Admin\UserService;


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
        $result = $this->userService->getList();;
        return Response::withData($result)->withStatus(ResponseStatusEnum::OK->value)->build()->response();
    }

    public function isAdmin(User $user)
    {
        $result = $this->userService->isAdmin($user);
        return Response::withData($result->data)->withStatus(ResponseStatusEnum::OK->value)->build()->response();
    }

    public function store(UserStoreRequest $request)
    {
        $this->userService->createUser($request);
        return Response::withMessage('User created')->withStatus(ResponseStatusEnum::OK->value)->build()->response();
    }

    public function show(User $user)
    {
        $result = $this->userService->showUser($user);
        return Response::withData($result->data)->withStatus(ResponseStatusEnum::OK->value)->build()->response();
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $this->userService->updateUser($request, $user);
        return Response::withMessage('User updated')->withStatus(ResponseStatusEnum::OK->value)->build()->response();
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return Response::withMessage('User deleted')->withStatus(ResponseStatusEnum::OK->value)->build()->response();
    }
}
