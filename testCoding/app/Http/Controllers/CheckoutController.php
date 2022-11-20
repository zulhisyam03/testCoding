<?php

namespace App\Http\Controllers;
use \App\Models\Checkout;
use DateTime;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function store(Request $request){
        // dd($request);
        $validated  =   $request->validate([
            'noPolisi'  => 'required',
            'jenisKendaraan'    => 'required'
        ]);
        Checkout::create($validated);

        return redirect('/')->with('berhasil','Sukses Checkin!!!');
    }

    // public function find(Request $request){
    //     $noPolisi = $request->noPolisi;
    //     $cekData    =   Checkout::where('noPolisi',$noPolisi)->get();

    //     return view('/formCheckout',[
    //         'data'  => $cekData,
    //         'show'  => 'show',
    //         'show'  => 'show',
    //         'noPolisi'  => $request->session()->put('noPolisi',$noPolisi),
    //         'find'  => $request->session()->put('find','Available')
    //     ]);
    // }
}
