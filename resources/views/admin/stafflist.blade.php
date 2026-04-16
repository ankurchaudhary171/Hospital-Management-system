<!DOCTYPE html>
<html>
<head>
    <title>Staff List</title>
</head>
<body>

<h2>All Staff</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        {{-- <th>Staff ID</th> --}}
        <th>Email</th>
        <th>Mobile</th>
        <th>Department</th>
        <th>Post</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

    @foreach($staffs as $st)
    <tr>
        <td>{{ $st->id }}</td>
        <td>{{ $st->name }}</td>
        {{-- <td>{{ $st->staff_id }}</td> --}}
        <td>{{ $st->email }}</td>
        <td>{{ $st->mobile }}</td>
        <td>{{ $st->department }}</td>
        <td>{{ $st->post }}</td>
         {{-- <td><img src="{{ asset('uploads/staffs/'.$st->image) }}" width="80"></td>  --}}
      {{-- <td><img src="{{ asset('storage/uploads/staffs/'.$st->image) }}" width="80"></td>   --}} 
         <td>{{ $st->image }}</td>
         {{-- <td> --}}
    {{-- <td><img src="{{ asset('uploads/staffs/' . $st->image) }}" width="80" height="80" alt="Staff Image"></td> --}}
</td>


        <td>
            <a href="{{ url('staff/edit/'.$st->id) }}">Edit</a> |
            <a href="{{ url('staff/delete/'.$st->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<br>
<a href="{{ url('staff/add') }}">Add New Staff</a>

</body>
</html>
