@extends('layouts.main')
@section('content')    
    <div class="blok">
        <div class="container-fluid">                        
            <div class="card">
                @include('layouts.nav')
                <div class="card-title mt-2" align="center">
                    <h2>Form Checkin Parkir</h2>
                    <hr class="mb-0">
                </div>
                <div class="card-body">
                    <form action="/checkin" method="POST">                        
                        @csrf
                        <div class="row mb-2">
                            <div class="col-sm-4 col-form-label"><strong>No. Polisi</strong></div>
                            <div class="col-sm">
                                <input type="text" name="noPolisi"
                                    class="form-control text-uppercase @error('noPolisi') is-invalid @enderror"
                                    value="{{ old('noPolisi') }}" required autofocus>
                                @error('noPolisi')
                                    <div class="feedback-invalid">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 col-form-label"><strong>Jenis Kendaraan</strong></div>
                            <div class="col-sm"><input type="text" name="jenisKendaraan"
                                    class="form-control text-capitalize @error('jenisKendaraan') is-invalid @enderror"
                                    value="{{ old('jenisKendaraan') }}" required>
                                @error('jenisKendaraan')
                                    <div class="feedback-invalid">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="tglMasuk" value="">
                        <button class="btn btn-success" style="float:right;">Checkin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
