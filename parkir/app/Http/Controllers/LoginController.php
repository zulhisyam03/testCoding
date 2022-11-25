<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login',[
            'title' => 'LOGIN'
        ]);
    }

    public function authenticate(Request $request){
        $validated = $request->validate([
            'username'  => 'required|min:6',
            'password'  => 'required|min:6'
        ]);

        if (Auth::attempt($validated)) {
            # code...
            $request->session()->regenerate();

            return redirect()->intended('checkin');
        }
        return back()->with('gagal','Gagal login !!!');
    }
}
