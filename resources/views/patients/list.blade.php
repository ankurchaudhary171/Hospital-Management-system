{{-- <!DOCTYPE html>
<html>
<head>
    <title>Patient List</title>
</head>
<body>

<h2>Patient List</h2>

<a href="{{ url('patient/add') }}">Add Patient</a><br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
        <tr>
            <td>{{ $patient->id }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->email }}</td>
            <td>{{ $patient->phone }}</td>
            <td>{{ $patient->gender }}</td>
            <td>{{ $patient->dob }}</td>
            <td>
                @if($patient->photo)
                    <img src="{{ asset('uploads/patients/'.$patient->photo) }}" width="50">
                @endif
            </td>
            <td>
                <a href="{{ url('patient/edit/'.$patient->id) }}">Edit</a> |
                <a href="{{ url('patient/delete/'.$patient->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html> --}}



{{-- ------------------============================================ --}}

{{-- 
<!DOCTYPE html>
<html>
<head><title>Patient List</title></head>
<body>
    <h1>Patient List</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('patient.add') }}">Add Patient</a> |
    <a href="{{ route('patient.discharge.list') }}">View Discharge List</a>

    <table border="1" cellpadding="8" style="margin-top:10px;">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Disease</th><th>Admit</th><th>Status</th><th>Action</th>
        </tr>
        @foreach($patients as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->phone }}</td>
            <td>{{ $p->disease }}</td>
            <td>{{ $p->admit_date }}</td>
            <td>{{ $p->is_discharged ? 'Discharged' : 'Admitted' }}</td>
            <td>
                <a href="{{ route('patient.edit', $p->id) }}">Edit</a> |
                <a href="{{ route('patient.delete', $p->id) }}" onclick="return confirm('Delete?')">Delete</a> |
                @if(!$p->is_discharged)
                    <a href="{{ route('patient.discharge', $p->id) }}" onclick="return confirm('Discharge this patient?')">Discharge</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>



 --}}
