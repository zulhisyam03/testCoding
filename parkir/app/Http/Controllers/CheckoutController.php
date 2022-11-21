<?php

namespace App\Http\Controllers;
use \App\Models\Checkout;
use DateTime;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index(){
        $checkout   =   Checkout::all('noPolisi');

        return view('formCheckout',[
            'noPolisi'  => $checkout
        ]);
    }

    public function store(Request $request){
        // dd($request);
        $validated  =   $request->validate([
            'noPolisi'  => 'required',
            'jenisKendaraan'    => 'required'
        ]);
        Checkout::create($validated);

        return redirect('/')->with('berhasil','Sukses Checkin!!!');
    }
}
