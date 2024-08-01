<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\update;
use App\Http\Requests\Admin\User\updateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('admin.user.index',[
            'users' => $users
        ]);
    }
    public function isAdmin(User $user)
    {
        if ($user->is_admin){
            $user->is_admin = 0;
        }else{
            $user->is_admin = 1;
        }
        User::where('id','=',$user->id)->update([
            'is_admin'=>$user->is_admin
        ]);
        return redirect()->back();
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
        User::where('id','=',$user->id)->update([
            'name'=>$update->name,
            'is_admin'=>$update->is_admin
        ]);
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::find($user->id)->delete();
        return redirect('admin/user');
    }
}
