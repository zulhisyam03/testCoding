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
        <form action="/candidate" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-2">
                <div class="col-sm-5">
                    Full Name
                </div>
                <div class="col-sm">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Education
                </div>
                <div class="col-sm">
                    <input type="text" name="education"
                        class="form-control @error('education') is-invalid @enderror">
                    @error('education')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Last Position
                </div>
                <div class="col-sm">
                    <input type="text" name="lastPosition"
                        class="form-control @error('lastPosition') is-invalid @enderror">
                    @error('lastPosition')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Birthday
                </div>
                <div class="col-sm">
                    <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror">
                    @error('birthday')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Applied Position
                </div>
                <div class="col-sm">
                    <input type="text" name="appliedPosition"
                        class="form-control @error('appliedPosition') is-invalid @enderror">
                    @error('appliedPosition')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Experience
                </div>
                <div class="col-sm">
                    <input type="text" name="experience"
                        class="form-control @error('experience') is-invalid @enderror">
                    @error('experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Top 5 Skills
                </div>
                <div class="col-sm">
                    <input type="text" name="top5" class="form-control @error('top5') is-invalid @enderror">
                    @error('top5')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Email
                </div>
                <div class="col-sm">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Phone Number
                </div>
                <div class="col-sm">
                    <input type="text" name="phone" class="form-control  @error('phone') is-invalid @enderror">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-5">
                    Resume
                </div>
                <div class="col-sm">
                    <input type="file" name="resume" class="form-control @error('resume') is-invalide @enderror">
                    @error('resume')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-success float-end">Save</button>
        </form>
        </p>
    </div>
</body>

</html>
