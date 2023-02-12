<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\RolePermission;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('checkAdmin')->except('index');
    }
    public function index()
    {
        $roles = Role::all();
        return view('role-list',compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::all();
        return view('role-create',compact('permissions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'permissions' => 'required'
        ]);
        $role = Role::create([
            'name' => $request->role
        ]);
        $input = $request->permissions;
        $role->permissions()->sync($input);

        return redirect()->route('role-list')->with('message','Role Created Success');
    }
    public function view($id)
    {
        $role = Role::findOrFail($id);
        return view('role-view',compact('role'));
    }
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('role-edit',compact('role','permissions'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'role' => 'required',
            'permissions' => 'required'
        ]);
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->role
        ]);
        $input = $request->permissions;
        $role->permissions()->sync($input);

        return redirect()->route('role-list')->with('message','Role Updated Success');
    }
    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        return back()->with('message','Role Deleted Success');
    }
}
