<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\store;
use App\Http\Resources\API\Admin\Users\UserDetailesApiResource;
use App\Http\Resources\API\Admin\Users\UsersListApiResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5|max:50|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        if ($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ],422);
        }

        $inputs = $validator->validated();
        $inputs['password'] = Hash::make($inputs['password']);
        $user = User::create($inputs);
        return response()->json([
            'user' => $user
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserDetailesApiResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'min:5|max:50|unique:users',
            'email' => 'email|unique:users',
            'password' => 'min:6'
        ]);
        if ($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ],422);
        }

        $inputs = $validator->validated();
        if (isset($inputs['password'])){
            $inputs['password'] = Hash::make($inputs['password']);
        }
        $user->update($inputs);
        return response()->json([
            'message' => 'user updated successfully'
        ],200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'user deleted successfully'
        ]);
    }
}
