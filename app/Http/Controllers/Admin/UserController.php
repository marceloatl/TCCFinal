<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required'
        ]);

        $role = Role::where('id',$request->role_id)->first();

        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('12345678');
        $user->save();

        $user->assignRole($role->name);

        return redirect()->route('users.index')->with(
            'success','Usuario criado com sucesso'
        );
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
