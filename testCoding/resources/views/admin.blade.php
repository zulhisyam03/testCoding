<span class="float-start"><button class="btn btn-primary">+ Add</button></span>
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
