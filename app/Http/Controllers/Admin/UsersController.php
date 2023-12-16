<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Role;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  dd(User::first()->roles);
        return view('admin.users.users')->with('users', User::all());
    }

    public function edit($id)
    {

        return view('admin.users.userEdit', [
            'user' =>  User::find($id),
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request, $user)
    {
        //
        $data = User::find($user);
        $data->roles()->sync($request->roles);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('user.index')->with('status', ' تم تحديث المستخدم '  . $data->name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        //
        $user = User::find($user);
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('user.index')->with('status', 'تم حذف المستخدم');
    }
}
