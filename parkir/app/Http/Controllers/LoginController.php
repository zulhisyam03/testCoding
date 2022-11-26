<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('/login',[
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request){
        $validated = $request->validate([
            'email'  => 'required|min:6|email:dns',
            'password'  => 'required|min:6'
        ]);

        if (Auth::attempt($validated)) {
            # code...
            $request->session()->regenerate();

            return redirect()->intended('/checkin');
        }
        return back()->with('gagal','Gagal login !!!');
    }

    public function logout(){
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect('/');
    }
}
