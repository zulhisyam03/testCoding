@extends('layouts.main')
@section('content')
    {{-- <div class="blok"> --}}
    <div class="container-fluid position-absolute" style="top:50px;">
        <div class="card">
            {{-- @include('layouts.nav') --}}
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
                                <th>Nama Pegawai</th>
                                <th>Tgl. Lahir</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                @php
                                    $mysqli = new mysqli('localhost', 'root', '', 'parkir');
                                    $query = mysqli_query($mysqli,"SELECT id FROM pegawais WHERE nama='$item->nama' && tglLahir='$item->tglLahir'");
                                    $result= mysqli_fetch_array($query);
                                @endphp
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>
                                        <a href="reportPegawai/<?= $result['id']; ?>">{{ $item->nama }}</a>
                                    </td>
                                    <td>{{ $item->tglLahir }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>
                                        <form action="checkout/<?= $result['id']; ?>" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin Hapus Data?');">Delete</button>
                                        </form>
                                    </td>
                                    @php
                                        $no++;
                                    @endphp
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
