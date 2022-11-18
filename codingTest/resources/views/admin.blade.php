<span class="float-start">
    <a href="/candidate/create">
        <button class="btn btn-primary">+ Add</button>
    </a>
</span>
<table class="table table-striped table-success">
    <thead>
        <tr>
            <th>Name</th>
            <th>Education</th>
            {{-- <th>Birthday</th> --}}
            <th>Experience</th>
            {{-- <th>Last Position</th> --}}
            <th>Applied Position</th>
            {{-- <th>Top 5 Skills</th> --}}
            <th>Email</th>
            <th>Phone</th>
            <th>Resume</th>
            <th style="width: 90px;">#</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataCalon as $item)
            <tr>
                <td><a href="/candidate/{{ $item->id }}">{{ $item->name }}</a></td>
                <td>{{ $item->education }}</td>
                {{-- <td>{{ $item->birthday }}</td> --}}
                <td>{{ $item->experience }}</td>
                {{-- <td>{{ $item->lastPosition }}</td> --}}
                <td>{{ $item->appliedPosition }}</td>
                {{-- <td>{{ $item->top5 }}</td> --}}
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>
                    <a href="/storage/{{ $item->resume }}" target="_blank">CV {{ $item->name }}</a>
                </td>
                <td>
                    <form action="/candidate/{{ $item->id }}" method="post" class="">
                        @method('delete')
                        @csrf
                        <button class="btn bg-none" style="padding-bottom:10px;" onclick="return confirm('Yakin Hapus Data?')"><i class="fa-solid fa-trash text-danger"></i></button>&nbsp;
                        <a href="/candidate/{{ $item->id }}/edit">
                            <i class="fa-solid fa-pencil text-primary"></i>
                        </a>
                    </form>                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
