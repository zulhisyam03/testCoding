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
            place-items: center;
        }

        .blok {
            position: absolute;
            left: 50%;
            transform: translate(-50%, 0);
            min-width: 500px;
        }
    </style>
</head>

<body>
    <div class="blok border border-warning mt-3 p-3">
        <span class="float-start"><a href="/home"><button class="btn btn-warning btn-sm">
                    << HOME</button></a></span>
        <h3 class="text-center text-uppercase">Tambah Candidate &nbsp;&nbsp;</h3>
        <p>
        <form action="/candidate" method="post">
            @csrf
            <div class="row mb-2">
                <div class="col-sm-5">
                    Full Name
                </div>
                <div class="col-sm">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Education
                </div>
                <div class="col-sm">
                    <input type="text" name="education" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Last Position
                </div>
                <div class="col-sm">
                    <input type="text" name="lastPosition" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Birthday
                </div>
                <div class="col-sm">
                    <input type="date" name="birthday" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Applied Position
                </div>
                <div class="col-sm">
                    <input type="text" name="applliedPosition" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Experience
                </div>
                <div class="col-sm">
                    <input type="text" name="experience" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Top 5 Skills
                </div>
                <div class="col-sm">
                    <input type="text" name="top5" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Email
                </div>
                <div class="col-sm">
                    <input type="text" name="email" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Phone Number
                </div>
                <div class="col-sm">
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Resume
                </div>
                <div class="col-sm">
                    <input type="file" name="resume" class="form-control">
                </div>
            </div>
            <button class="btn btn-success float-end">Save</button>
        </form>
        </p>
    </div>
</body>

</html>
