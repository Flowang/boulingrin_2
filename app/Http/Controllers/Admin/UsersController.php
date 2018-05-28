<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;
        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $users = User::paginate($perPage);
        }
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::select('id', 'name', 'description')->get();
        $roles = $roles->pluck('description', 'name');
        return view('admin.users.create', compact('roles'));
    }

   public function store(Request $request)
    {
        //required role comment faire ? SEB
        $this->validate($request, ['name' => 'required', 'email' => 'required', 'password' => 'required']);
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        // foreach ($request->roles as $role) {
        //     $user->assignRole($role);
        // }
        return redirect('admin/users')->with('flash_message', 'Utilisateurs ajouté!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::select('id', 'name', 'description')->get();
        $roles = $roles->pluck('description', 'name');
        $user->select('id', 'name', 'email','roles_id')->findOrFail($id);
        // $user_roles = [];
        // foreach ($user->roles as $role) {
        //     $user_roles[] = $role->name;
        // }
        return view('admin.users.show', compact('user', 'roles','role'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::select('id', 'name', 'description')->get();
        $roles = $roles->pluck('description', 'name');
        $user->select('id', 'name', 'email','roles_id')->findOrFail($id);
        // $user_roles = [];
        // foreach ($user->roles as $role) {
        //     $user_roles[] = $role->name;
        // }
        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {
        //roles required
        $this->validate($request, ['name' => 'required', 'email' => 'required']);
        $data = $request->except('password');
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $user = User::findOrFail($id);
        $user->update($data);
        // $user->roles()->detach();
        // foreach ($request->roles as $role) {
        //     $user->assignRole($role);
        // }
        return redirect('admin/users')->with('flash_message', 'Utilisateur mis à jour!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('admin/users')->with('flash_message', 'Utilisateur supprimé!');
    }
}