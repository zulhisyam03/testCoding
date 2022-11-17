<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('welcome',[
            'title' => 'Login'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        //
        $validated  = $request->validate([
            'name'  => 'required',
            'password'  => 'required|min:6'
        ]);

        if (Auth::attempt($validated)) {
            # code...
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->with('gagal','Gagal Login!!!');
    }

    public function logout(){
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect('/');
    }
}
