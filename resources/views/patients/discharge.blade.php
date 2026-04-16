{{-- <!DOCTYPE html>
<html>
<head><title>Discharged Patients</title></head>
<body>
    <h1>Discharged Patients</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('patient.list') }}">Back to Patient List</a>

    <table border="1" cellpadding="8" style="margin-top:10px;">
        <tr>
            <th>ID</th><th>Patient</th><th>Email</th><th>Phone</th><th>Discharge Date</th><th>Reason</th>
        </tr>
        @foreach($discharges as $d)
        <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->patient->name }}</td>
            <td>{{ $d->patient->email }}</td>
            <td>{{ $d->patient->phone }}</td>
            <td>{{ $d->discharge_date }}</td>
            <td>{{ $d->reason }}</td>

           {{-- <a href="{{ route('staffpatients.discharged') }}">🛏️ Discharged Patients</a> | --}}

        {{-- </tr>
        @endforeach
    </table>
</body>
</html> --}} 
