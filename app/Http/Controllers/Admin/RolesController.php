<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Gate;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;
        if (!empty($keyword)) {
            $roles = Role::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $roles = Role::paginate($perPage);
        }
       if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }

        return view('admin.roles.index', compact('roles'));
    }
    public function create()
    {
               if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        return view('admin.roles.create');
    }
    public function store(Request $request)
    {
               if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        $this->validate($request, ['name' => 'required']);
        $role = Role::create($request->all());
        return redirect('admin/roles')->with('flash_message', 'Role added!');
    }
    public function show($id)
    {

               if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        $role = Role::findOrFail($id);
        $roles = Role::select('id', 'name', 'description')->get();
        $roles = $roles->pluck('description', 'name');


        return view('admin.roles.show', compact('role','roles'));
    }
    public function edit($id)
    {
               if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }


        $role = Role::findOrFail($id);
        $roles = Role::select('id', 'name', 'description')->get();
        $roles = $roles->pluck('description', 'name');

        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role','roles'));
    }
    public function update(Request $request, $id)
    {
               if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        $this->validate($request, ['name' => 'required']);
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return redirect('admin/roles')->with('flash_message', 'Role updated!');
    }
    public function destroy($id)
    {
               if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        Role::destroy($id);
        return redirect('admin/roles')->with('flash_message', 'Role deleted!');
    }
}