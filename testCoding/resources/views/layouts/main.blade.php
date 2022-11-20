<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/62c979b04d.js" crossorigin="anonymous"></script>

    <style>
        body {
            background: whitesmoke;
            color: black;
        }

        .blok {
            width: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
        }
    </style>
    <script type="text/javascript">
        window.onload = function(){
            $("#noPolisi").change(function () {
                var takeTglMasuk        = $("#nopol-"+this.value).data('tglMasuk');
                var takeJamMasuk        = $("#nopol-"+this.value).data('jamMasuk');
                var takeJenisKendaraan  = $("#nopol-"+this.value).data('jenisKendaraan');
                $("#tglMasuk").val(takeTglMasuk);
                $("#jamMasuk").val(takeJamMasuk);
                $("#jenisKendaraan").val(takeJenisKendaraan);
            });
        }
    </script>
</head>    
<body>
    @yield('content')

    
</body>
</html>    