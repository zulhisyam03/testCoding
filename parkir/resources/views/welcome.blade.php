@extends('layouts.main')
@section('content')
    <div class="blok">
        <div class="card">
            <div class="card-title mt-3" align="center">
                <h2>Form Checkin Parkir</h2>
                <hr>
            </div>
            <div class="card-body">                                
                <form action="/checkin" method="POST">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-sm-4 col-form-label"><strong>No. Polisi</strong></div>
                        <div class="col-sm"><input type="text" name="noPolisi" class="form-control text-uppercase"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-form-label"><strong>Jenis Kendaraan</strong></div>
                        <div class="col-sm"><input type="text" name="jenisKendaraan" class="form-control text-capitalize">
                        </div>
                    </div>
                    <button class="btn btn-success" style="float:right;">Checkin</button>
                </form>
                <a href="/formCheckout">
                    <button class="btn btn-primary">Form Checkout</button>
                </a>
            </div>
        </div>
    </div>
@endsection
