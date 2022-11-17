<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <style>
        body{
            background: rgb(48, 42, 91);
            color:white;
        }
        .blok{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
        }
    </style>
</head>
<body>
    <div class="blok border border-white">
        <div class="row">
            <div class="col-sm-2">
                <label for="">Username</label>
            </div>
            <div class="col-sm">
                <input type="text" name="name" id="">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <label for="">Password</label>
            </div>
            <div class="col-sm">
                <input type="text" name="password" id="">
            </div>
        </div>
    </div>
</body>
</html>