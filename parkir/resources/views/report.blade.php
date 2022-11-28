@extends('layouts.main')
@section('content')
    {{-- <div class="blok"> --}}
    <div class="container-fluid position-absolute top-0">
        <div class="card">
            @include('layouts.nav')
            <div class="card-title mt-2" align="center">
                <h2>Laporan Parkir</h2>
                <hr>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table wrap fs-7">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>No Polisi</th>
                                <th>Jenis Kendaraan</th>
                                <th>Tgl. Masuk</th>
                                <th>Tgl. Keluar</th>
                                <th>Biaya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->noPolisi }}</td>
                                    <td>{{ $item->jenisKendaraan }}</td>
                                    <td>{{ $item->tglMasuk }}</td>
                                    <td>{{ $item->tglKeluar }}</td>
                                    <td>{{ $item->biaya }}</td>
                                    <td>
                                        <form action="checkout/{{ $item->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                    @php
                                        $no++;
                                    @endphp
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
