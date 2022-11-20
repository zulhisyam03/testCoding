<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body {
            background: rgb(36, 30, 75);
            color: white;
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
</head>

<body>

    <div class="blok border border-warning">
        <center>
            <h2>Form Chekin Parkir</h2>
        </center>
        <hr class="border border-light">
        <form action="/checkin" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col-sm-4 col-form-label">No. Polisi</div>
                <div class="col-sm"><input type="text" name="noPolisi" class="form-control text-uppercase"></div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4 col-form-label">Jenis Kendaraan</div>
                <div class="col-sm"><input type="text" name="jenisKendaraan" class="form-control text-capitalize"></div>
            </div>
            <button class="btn btn-success" style="float:right;">Checkin</button>
        </form>
        <a href="/formCheckout">
            <button class="btn btn-primary">Form Checkout</button>
        </a>
    </div>

</body>

</html>
