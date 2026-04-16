<!DOCTYPE html>
<html>
<head>
    <title>Active Doctors</title>
</head>
<body>

<h2>Active Doctors</h2>

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
        <td style="color:green;">Active</td>
        <td>
            <a href="{{ url('doctor/edit/'.$doc->id) }}">Edit</a> |
            <a href="{{ url('doctor/delete/'.$doc->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<br>
<a href="{{ url('doctor/list') }}">View All Doctors</a> | 
<a href="{{ url('doctor/inactive') }}">View Inactive Doctors</a>

</body>
</html>
