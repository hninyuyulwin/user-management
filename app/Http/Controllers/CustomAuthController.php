<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email',$request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put([
                    'user' => $user,
                    'loginId' => $user->id
                ]);
                return redirect()->route('home');
            }else{
                return redirect()->back()->with('fail','Invalid Password!');
            }
        }else{
            return redirect()->back()->with('fail','E-mail not Found!');
        }
    }

    public function logout()
    {
        if(session()->has('loginId')){
            session()->pull('loginId');
            return redirect()->route('login');
        }
    }
}
