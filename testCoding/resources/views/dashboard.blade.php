<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/62c979b04d.js" crossorigin="anonymous"></script>

    <style>
        body {
            background: rgb(48, 42, 91);
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-4">
        <h3 class="float-start">Welcome, {{ auth()->user()->name }} &nbsp;&nbsp;</h3>
        <form action="/logout" method="post">
            @csrf
            <span class="float-end">
                <button class=" btn border border-none"><i
                        class="fa-solid fa-right-from-bracket text-light"></i></button>
            </span>
        </form>
        @if ($level == 'admin')
            @include('admin')
        @else
            @include('user')
        @endif
    </div>
</body>

</html>
