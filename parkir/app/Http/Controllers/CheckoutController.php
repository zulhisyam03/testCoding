<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Carbon\Carbon;
use DateTime;
use Yajra\DataTables\DataTables;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        if ($request->ket == 'kendaraan') {
            # code...
            $data = Checkout::where([['noPolisi',$request->noPolisi],['tglKeluar',null]])->get();
            return response()->json($data);
        }else
        if ($request->ket == 'biaya') {
            # code...
            $tglMasuk= \Carbon\Carbon::parse($request->tglMasuk);
            $tglKeluar= \Carbon\Carbon::parse($request->tglKeluar);

            $lamaParkir = $tglKeluar->diffInHours($tglMasuk);

            if ($lamaParkir >= 24) {
                $biaya = 50000;
            }else {
                if ($lamaParkir <= 1) {
                    # code...
                    $biaya = 5000;
                }
                elseif ($lamaParkir > 1) {
                    # code...
                    $biaya = 5000 + (4000 * $lamaParkir);
                    if ($biaya >50000) {
                        # code...
                        $biaya = 50000;
                    }
                }
            }
            $biaya = $biaya;
            return response()->json([$biaya]);
        }        
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
    public function show(Request $request)
    {

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
