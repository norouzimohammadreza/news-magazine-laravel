<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\store;
use App\Http\Resources\API\Admin\Users\UsersListApiResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return UsersListApiResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(store $store)
    {
        $store['password'] = Hash::make($store['password']);
        Post::create($store);
        return response()->json([
            'message' => 'User created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $User = User::find($user->id);
        return response()->json([
            'data'=> $User
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
