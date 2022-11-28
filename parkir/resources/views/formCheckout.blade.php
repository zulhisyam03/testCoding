@extends('layouts.main')

@section('content')
    <div class="blok">
        <div class="card">
            @include('layouts.nav')
            <div class="card-title mt-2" align="center">
                <h2>Form Checkout Parkir</h2>
                <hr class="mb-0">
            </div>
            <div class="card-body mt-0" id="data-kendaraan">
                <form action="#" method="post" id="form">                    
                    @csrf
                    @method('PATCH')
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">No. Polisi</div>
                        <div class="col-sm mb-0">
                            <input type="text" name="noPolisi" class="form-control" placeholder="DNxxxxMB" id="noPolisi" autofocus required>
                        </div>
                    </div>                                       
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">Tanggal & Jam Masuk</div>
                        <div class="col-sm mb-0">
                            <input type="text" name="tglMasuk" class="form-control text-capitalize"
                                id="tglMasuk" readonly>
                        </div>
                    </div>                    
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">Jenis Kendaraan</div>
                        <div class="col-sm"><input type="text" name="jenisKendaraan" class="form-control text-capitalize" readonly
                                id="jenisKendaraan" >
                        </div>
                    </div>  
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">Tanggal & Jam Keluar</div>
                        <div class="col-sm mb-0">
                            <input type="datetime-local" name="tglKeluar" class="form-control text-capitalize" id="tglKeluar" required>
                        </div>
                    </div>                  
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">Biaya</div>
                        <div class="col-sm"><input type="text" name="biaya" class="form-control text-capitalize" id="biaya"
                                readonly>
                        </div>
                    </div>
                    <button class="btn btn-success" style="float:right;">Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
