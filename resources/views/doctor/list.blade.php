<!DOCTYPE html>
<html>
<head>
    <title>Doctor List</title>
</head>
<body>

<h2>All Doctors</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Specialist</th>
        <th>Experience</th>
        <th>Qualification</th>
        <th>Department ID</th>
        <th>Photo</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($doctors as $doc)
    <tr>
        <td>{{ $doc->id }}</td>
        <td>{{ $doc->name }}</td>
        <td>{{ $doc->email }}</td>
        <td>{{ $doc->phone }}</td>
        <td>{{ $doc->specilist }}</td>
        <td>{{ $doc->experience }}</td>
        <td>{{ $doc->qualification }}</td>
        <td>{{ $doc->department_id }}</td>
        <td>
            @if($doc->photo)
                <img src="{{ asset('uploads/doctors/'.$doc->photo) }}" width="80">
            @else
                N/A
            @endif
        </td>
        <td>
            @if($doc->status == 1)
                <a href="{{ url('doctor/status/'.$doc->id) }}" style="color:green;">Active</a>
            @else
                <a href="{{ url('doctor/status/'.$doc->id) }}" style="color:red;">Inactive</a>
            @endif
        </td>
        <td>
            <a href="{{ url('doctor/edit/'.$doc->id) }}">Edit</a> |
            <a href="{{ url('doctor/delete/'.$doc->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<br>
<a href="{{ url('doctor/add') }}">Add New Doctor</a>

</body>
</html>
