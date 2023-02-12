<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }
    public function index()
    {
        $permissions = Permission::paginate(8);
        return view('permission',compact('permissions'));
    }
    public function search(Request $request)
    {
        if($request->isMethod('GET'))
        {
            $search = $request->search;
            $permissions = Permission::where('name','LIKE','%'.$search.'%')->paginate(8);
        }
        return view('permission',compact('permissions'));
    }
    public function create()
    {
        $features = Feature::get();
        return view('permission-create',compact('features'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'permission' => 'required',
            'feature_id' => 'required'
        ]);
        Permission::create([
            'name' => Str::slug($request->permission),
            'feature_id' => $request->feature_id
        ]);
        return redirect()->route('permission-list')->with('message','Permission Created Success');
    }
    public function edit($id)
    {
        $permission = Permission::find($id);
        $features = Feature::get();
        return view('permission-edit',compact('permission','features'));
    }
    public function update(Request $request,$id)
    {
        $permission = Permission::find($id);
        $request->validate([
            'permission' => 'required',
            'feature_id' => 'required'
        ]);
        $permission->update([
            'name' => Str::slug($request->permission),
            'feature_id' => $request->feature_id
        ]);
        return redirect()->route('permission-list')->with('message','Permission Updated Success');
    }
    public function delete($id)
    {
        Permission::findOrFail($id)->delete();
        return redirect()->back()->with('message','Permission Deleted Success');
    }
}
