<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
// use Dotenv\Util\Str;
use Illuminate\Support\Str;
use GuzzleHttp\Psr7\Message;
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
            'password'  => 'required|min:5'
        ]);

        if (Auth::attempt($validated)) {
            # code...
            $request->session()->regenerate();

            if (auth()->user()->level == 'admin') {
                # code...
                // return redirect()->intended('/reportadmin');
                return('ADMIN');
            }
            else{
                return redirect()->intended('/checkin');
            }
        }
        return back()->with('gagal','Gagal login !!!');
    }

    public function register(Request $request){
        $validasi   =   $request->validate([
            'registerName'      =>  'required',
            'registerId'        =>  'required|min:5',
            'registerEmail'     =>  'required|email:dns',
            'registerPassword'  =>  'required|min:6'
        ]);
        $token  =   Str::random(10);

        $inputUser   = User::create([            
            'idPegawai' =>  $request->registerId,
            'level'     =>  'user',
            'remember_token'=> $token,
            'email'     =>  $request->registerEmail,
            'password'  =>  bcrypt($request->registerPassword)
        ]);

        $inputPegawai   = Pegawai::create([
            'id'        =>  $request->registerId,
            'nama'      =>  $request->registerName,
            'jabatan'   =>  'Penjaga Parkir'
        ]);

        return redirect('login')->with('sukses','Register Berhasil!!!');
    }

    public function logout(){
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect('/');
    }
}
