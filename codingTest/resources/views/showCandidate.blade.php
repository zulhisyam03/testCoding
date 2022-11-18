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
        .blok{
            position: absolute;
            left: 50%;
            transform: translate(-50%,0)
        }
        th{
            width:200px;
        }
    </style>
</head>

<body>
    <div class="blok border border-warning mt-3 p-3">
        <span class="float-start"><a href="/home"><button class="btn btn-warning btn-sm"><< HOME</button></a></span>
        <h3 class="text-center text-uppercase">Data Candidate &nbsp;&nbsp;</h3>
        <p>
            @foreach ($candidate as $item)
                <table style="font-size: 20px;width:600px;">
                    <tr>
                        <th>
                            Full Name
                        </th>
                        <td>{{ $item->name }}</td>
                    </tr>
                    <tr>
                        <th>
                            Education
                        </th>
                        <td>{{ $item->education }}</td>
                    </tr>
                    <tr>
                        <th>
                            Birthday
                        </th>
                        <td>{{ $item->birthday }}</td>
                    </tr>
                    <tr>
                        <th>
                            Experience
                        </th>
                        <td>{{ $item->experience }}</td>
                    </tr>
                    <tr>
                        <th>
                            Last Position
                        </th>
                        <td>{{ $item->lastPosition }}</td>
                    </tr>
                    <tr>
                        <th>
                            Applied Position
                        </th>
                        <td>{{ $item->appliedPosition }}</td>
                    </tr>
                    <tr>
                        <th>
                            Top 5 Skills
                        </th>
                        <td>{{ $item->top5 }}</td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>{{ $item->email }}</td>
                    </tr>
                    <tr>
                        <th>
                            Phone Number
                        </th>
                        <td>{{ $item->phone }}</td>
                    </tr>
                    <tr>
                        <th>
                            Resume
                        </th>
                        <td><a href="/storage/{{ $item->resume }}">Resume.pdf</a></td>
                    </tr>
                </table>
            @endforeach
        </p>
    </div>
</body>

</html>
