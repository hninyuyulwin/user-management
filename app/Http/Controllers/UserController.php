<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserValidateRequest;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('checkAdmin')->only('create','delete');
    }
    public function index(Request $request)
    {
        $users = User::get();
        return view('user-list',compact('users'));
    }
    public function search(Request $request)
    {
        if($request->isMethod('GET'))
        {
            $search = $request->search;
            $users = User::where('name','LIKE','%'.$search.'%')
                    ->orWhere('email','LIKE','%'.$search.'%')
                    ->orWhere('phone','LIKE','%'.$search.'%')
                    ->orWhere('gender','LIKE','%'.$search.'%')
                    ->get();
        }
        return view('user-list',compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('user-create',compact('roles'));
    }
    public function view($id)
    {
        $user = User::findOrFail($id);
        return view('user-view',compact('user'));
    }

    public function store(UserValidateRequest $request){
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return redirect()->route('user-list')->with('message','User Created Success!');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        return view('user-edit',compact('user','roles'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'role_id' => 'required',
            'gender' => 'required'
        ]);
        $user = User::findOrFail($id);
        $input = $request->all();
        $isAdmin = Session::get('user');
        if($isAdmin->id != 1){
            if ($input['role_id'] == 1) {
                unset($input['role_id']);
            }
        }
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        }else{
            unset($input['password']);
        }
        $user->update($input);
        return redirect()->route('user-list')->with('message','User Updated Success!');
    }
    public function delete($id)
    {
        $isAdmin = Session::get('user');
        if ($isAdmin->id == 1) {
            User::findOrFail($id)->delete();
            return redirect()->back()->with('message','User Deleted Success');
        }else{
            return redirect()->back()->with("delete-warning","!! You don't have permission to delete !!");
        }
    }
}
