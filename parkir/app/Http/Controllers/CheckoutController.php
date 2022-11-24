<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Yajra\DataTables\DataTables;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkout   =   Checkout::where('tglKeluar', null)->get();

        return DataTables::of($checkout)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated  =   $request->validate([
            'noPolisi'  => 'required',
            'jenisKendaraan'    => 'required'
        ]);

        $cek    =   Checkout::where('noPolisi', $validated['noPolisi'])->first();

        if ($cek) {
            # code...
            if ($cek->tglKeluar == null) {
                # code...
                return redirect('/')->with('gagal', 'Kendaraan Sudah Checkin dan Belum Checkout !!!');
            }
        }
        Checkout::create($validated);

        return redirect('/')->with('sukses', 'Sukses Checkin!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
