{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Profiles List</title>
</head>
<body>
<h2>Doctor Profiles</h2>

<a href="{{ route('doctor_profiles.create') }}">+ Add New Doctor</a><br><br>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="6">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Qualification</th>
        <th>Specialist</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Experience</th>
        <th>Duty Timing</th>
        <th>Availability</th>
        <th>Action</th>
    </tr>

    @foreach($doctors as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->name }}</td>
        <td>{{ $d->qualification }}</td>
        <td>{{ $d->specialist }}</td>
        <td>{{ $d->phone }}</td>
        <td>{{ $d->email }}</td>
        <td>{{ $d->experience }} yrs</td>
        <td>{{ $d->duty_timing }}</td>
        <td>{{ $d->availability }}</td>
        <td>
            <a href="{{ route('doctor_profiles.edit', $d->id) }}">Edit</a> |
            <a href="{{ route('doctor_profiles.destroy', $d->id) }}" 
               onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html> --}}




{{-- ============================================================ --}}