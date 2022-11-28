@extends('layouts.main')
@section('content')
    <div class="blok">
        <div class="container-fluid">
            <div class="card">
                @include('layouts.nav')
                <div class="card-title mt-2" align="center">
                    <h2>Profil Pegawai</h2>
                    <hr class="mb-0">
                </div>
                <div class="card-body">
                    <form action="profile/{{ auth()->user()->idPegawai }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row mb-2">
                            <div class="col-sm-4 col-form-label"><strong>ID Pegawai</strong></div>
                            <div class="col-sm"><input type="text" name="id"
                                    class="form-control text-capitalize @error('id') is-invalid @enderror"
                                    value="{{ auth()->user()->idPegawai }}" required>
                                @error('id')
                                    <div class="feedback-invalid">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 col-form-label"><strong>Nama Lengkap</strong></div>
                            <div class="col-sm"><input type="text" name="nama"
                                    class="form-control text-capitalize @error('nama') is-invalid @enderror"
                                    value="{{ $data->nama }}" required>
                                @error('nama')
                                    <div class="feedback-invalid">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 col-form-label"><strong>Jabatan</strong></div>
                            <div class="col-sm"><input type="text" name="jabatan"
                                    class="form-control text-capitalize @error('jabatan') is-invalid @enderror"
                                    value="{{ $data->jabatan }}" required>
                                @error('jabatan')
                                    <div class="feedback-invalid">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4 col-form-label"><strong>Tgl.Lahir</strong></div>
                            <div class="col-sm"><input type="date" name="tglLahir"
                                    class="form-control text-capitalize @error('tglLahir') is-invalid @enderror"
                                    value="{{ $data->tglLahir }}" required>
                                @error('tglLahir')
                                    <div class="feedback-invalid">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-success" style="float:right;"
                            onclick="return confirm('Anda Yakin Ubah Data?');">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
