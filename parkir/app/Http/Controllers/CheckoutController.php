<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\NotIn;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formCheckout');
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
        $validasi   = $request->validate([
            'noPolisi'  => 'required',
            'tglMasuk'  => 'required|date',
            'tglKeluar' => 'required|date',
            'biaya'     => 'required'
        ]);

        $kendaraan  =   Checkout::find($id)->update($validasi);

        return redirect('checkout')->with('sukses', "Sukses !!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->level == 'admin') {
            # code...
            $hapus = User::Where('idPegawai', $id)->delete();
            return redirect('reportadmin')->with('sukses', 'Data Dihapus !!!');
        } else {
            $data = Checkout::find($id)->delete();
            return redirect('report')->with('sukses', 'Data Dihapus !!!');
        }

    }

    public function dataAjax(Request $request)
    {
        if ($request->ket == 'kendaraan') {
            # code...
            $data = Checkout::where([['noPolisi', $request->noPolisi], ['tglKeluar', null]])->get();
            return response()->json($data);
        } else
        if ($request->ket == 'biaya') {
            # code...
            $tglMasuk = \Carbon\Carbon::parse($request->tglMasuk);
            $tglKeluar = \Carbon\Carbon::parse($request->tglKeluar);

            $lamaParkir = $tglKeluar->diffInHours($tglMasuk);

            if ($lamaParkir >= 24) {
                $biaya = 50000;
            } else {
                if ($lamaParkir <= 1) {
                    # code...
                    $biaya = 5000;
                } elseif ($lamaParkir > 1) {
                    # code...
                    $biaya = 5000 + (4000 * $lamaParkir);
                    if ($biaya > 50000) {
                        # code...
                        $biaya = 50000;
                    }
                }
            }
            $biaya = $biaya;
            return response()->json([$biaya]);
        }
    }

    public function report()
    {
        return view('report', [
            'data'  => Checkout::where([['idPegawai', auth()->user()->idPegawai], ['tglKeluar', 'like', '%-%']])->simplePaginate(15)
        ]);
    }
    public function reportpegawai($id)
    {
        return view('report', [
            'data'  => Checkout::where([['idPegawai', $id], ['tglKeluar', 'like', '%-%']])->simplePaginate(15),
            'namaPegawai' => DB::table('pegawais')->select('nama')->first()
        ]);
    }
}
