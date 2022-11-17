<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
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
        <h3 class="float-start">Welcome, {{ auth()->user()->name }}</h3>
        <span class="float-end"><button class="btn btn-primary">+ Add</button></span>
        <table class="table table-striped table-success">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Education</th>
                    <th>Birthday</th>
                    <th>Experience</th>
                    <th>Last Position</th>
                    <th>Applied Position</th>
                    <th>Top 5 Skills</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Resume</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataCalon as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->education }}</td>
                        <td>{{ $item->birthday }}</td>
                        <td>{{ $item->experience }}</td>
                        <td>{{ $item->lastPosition }}</td>
                        <td>{{ $item->appliedPosition }}</td>
                        <td>{{ $item->top5 }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            <a href="{{ $item->resume }}" target="_blank">CV {{ $item->name }}</a>                            
                        </td>
                        <td>
                            <i class="fa-solid fa-trash text-danger"></i>&nbsp;
                            <i class="fa-solid fa-pencil text-primary"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
