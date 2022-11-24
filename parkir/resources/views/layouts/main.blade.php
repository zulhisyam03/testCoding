<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Home - Parkir</title>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/62c979b04d.js" crossorigin="anonymous"></script>

    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <style>

        /* Background 2 */
        @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            font-family: 'Exo', sans-serif;
        }


        .context {
            width: 100%;
            position: absolute;
            top: 50vh;

        }

        .context h1 {
            text-align: center;
            color: #fff;
            font-size: 50px;
        }


        .area {
            background: #4e54c8;
            background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
            width: 100%;
            height: 100vh;


        }

        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;

        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }


        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }



        @keyframes animate {

            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }

        }

        .col-form-label {
            font-weight: bolder;
        }

        .blok {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            width: 500px;
        }

        @media screen and (max-width:420px) {
            .blok {
                width: 100%;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    {{-- Background 2 --}}
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    {{-- Alert --}}
    @if ($message = session()->has('gagal'))
        <div class="alert alert-danger text-center alert-dismissible fade show" role="alert"
            style="position:fixed;top:0;width:100%;">
            <strong>Maaf !</strong> {{ session()->get('gagal') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = session()->has('sukses'))
        <div class="alert alert-success text-center alert-dismissible fade show" role="alert"
            style="position:fixed;top:0;width:100%;">
            <strong>Selamat !</strong> {{ session()->get('sukses') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- END ALERT --}}

    @yield('content')

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    
    {{-- Datatables --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>        

    <script>

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function (){
            $("body").on('change','#noPolisi', function(){
                $.ajax({
                    url : 'checkin',
                    type: 'GET',
                    data:{
                        noPolisi : $('#noPolisi').val(),
                        ket  : 'kendaraan'
                    },                    
                    success: function(response){
                        let jenisKendaraan = response[0]['jenisKendaraan'];
                        let tglMasuk = response[0]['tglMasuk'];
                        
                        document.getElementById('biaya').value = '';
                        document.getElementById('tglKeluar').value = '';
                        document.getElementById('jenisKendaraan').value = jenisKendaraan;
                        document.getElementById('tglMasuk').value = tglMasuk;

                        console.log(response);
                    },
                    error: function (response) {
                        console.log('ERROR:: ');
                    }
                });

                $("body").on('change','#tglKeluar', function(){
                    $.ajax({
                        url : 'checkin',
                        type: 'GET',
                        data:{
                            tglMasuk    : $('#tglMasuk').val(),
                            tglKeluar   : $('#tglKeluar').val(),
                            ket         : 'biaya'
                        },
                        success:function(response){
                            let biaya = response[0];

                            document.getElementById('biaya').value = biaya;
                            console.log('Biaya : '+biaya);
                        },
                        error: function (response) {
                            console.log('Error Biaya');
                        }

                    });
                });
            });
        });

    </script>

</body>

</html>
