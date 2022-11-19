<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <style>
        body {
            background: rgb(48, 42, 91);
            color: white;
        }

        .blok {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            padding: 15px;
        }
    </style>
</head>

<body>
    @if ($message = session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf</strong> {{ session()->get('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="blok border border-light">
        <center>
            <h2>Login</h2>
            <hr>
        </center>
        <form id="formAuthentication" action="/login" method="post">
            @csrf
            <div class="row mb-2">
                <div class="col-sm-3">
                    <label for="">Username</label>
                </div>
                <div class="col-sm">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-3">
                    <label for="">Password</label>
                </div>
                <div class="col-sm">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm text-end">
                    <button class="btn btn-success">Login</button>
                </div>
            </div>            
        </form>
    </div>
    <div style="position: fixed;top:0;right:0;">
        <table class="table table-info"  style="width: 300px;">
            <tr>
                <th>User</th>
                <th>Password</th>
                <th>Position</th>
            </tr>
            <tr>
                <td>Mr.John</td>
                <td>password</td>
                <td>Senior HRD</td>
            </tr>
            <tr>
                <td>Mrs.Lee</td>
                <td>password</td>
                <td>HRD</td>
            </tr>
        </table>
    </div>
</body>

</html>
