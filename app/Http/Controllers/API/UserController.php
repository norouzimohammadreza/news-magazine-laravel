<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\User\StoreRequest;
use App\Http\Requests\Api\Admin\User\UpdateRequest;
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
        return Response::withData($result)->withStatus(200)->build()->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function isAdmin(User $user)
    {
        $result = $this->userService->isAdmin($user);
        return Response::withData($result->data)->withStatus(200)->build()->response();

    }

    public function store(StoreRequest $request)
    {
        $this->userService->createUser($request->all());
        return Response::withMessage('User created')->withStatus(200)->build()->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $result = $this->userService->showUser($user);
        return Response::withData($result->data)->withStatus(200)->build()->response();


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $this->userService->updateUser($request->all(), $user);
        return Response::withMessage('User updated')->withStatus(200)->build()->response();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return Response::withMessage('User deleted')->withStatus(200)->build()->response();
    }
}
