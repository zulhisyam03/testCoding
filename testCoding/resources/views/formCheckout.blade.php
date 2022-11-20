@extends('layouts.main')

@section('content')
    <div class="blok">
        <div class="card">
            <div class="card-body">
                <center>
                    <h2>Form Checkout Parkir</h2>
                </center>
                <hr class="border border-light">
                <form action="/find" method="post">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">No. Polisi</div>
                        <div class="col-sm mb-0">
                            <select name="noPolisi" id="noPolisi" class="form-control">
                                @foreach ($data as $item)
                                    <option value="{{ $item->noPolisi }}" id="nopol-{{ $item->noPolisi }}"
                                        data-jenisKendaraan="{{ $item->jenisKendaraan }}"
                                        data-tglMasuk="{{ date('d/m/Y', strtotime($item->tglMasuk)) }}"
                                        data-jamMasuk="{{ date('h.i', strtotime($item->tglMasuk)) }}">
                                        {{ $item->noPolisi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="noPolisi" value="">
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">Tanggal Masuk</div>
                        <div class="col-sm mb-0">
                            <input type="text" name="tglMasuk" class="form-control text-capitalize" value="" id="tglMasuk"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">Jam Masuk</div>
                        <div class="col-sm mb-0">
                            <input type="text" name="jamMasuk" class="form-control text-capitalize" value="" id="jamMasuk"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">Jenis Kendaraan</div>
                        <div class="col-sm"><input type="text" name="jenisKendaraan" class="form-control text-capitalize" id="jenisKendaraan"
                                value="" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">Tanggal Keluar</div>
                        <div class="col-sm mb-0">
                            <input type="date" name="tglKeluar" class="form-control text-capitalize">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">Jam Keluar</div>
                        <div class="col-sm mb-0">
                            <input type="time" name="jamKeluar" class="form-control text-capitalize">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-5 col-form-label">Biaya</div>
                        <div class="col-sm"><input type="text" name="jenisKendaraan" class="form-control text-capitalize"
                                value="">
                        </div>
                    </div>
                    <button class="btn btn-success" style="float:right;">Checkout</button>
                </form>

                <a href="/">
                    <button class="btn btn-primary">Form Checkin</button>
                </a>
            </div>
        </div>
    </div>
@endsection
