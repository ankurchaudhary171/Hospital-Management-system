{{-- <h2>Discharged Patients</h2>

<a href="{{ route('staffpatients.index') }}">← Back to All Patients</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Patient</th>
        <th>Department</th>
        <th>Doctor</th>
        <th>Room</th>
        <th>Bed</th>
        <th>Status</th>
    </tr>

    @foreach($patients as $p)
    <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->patient_name }}</td>
        <td>{{ $p->department->name }}</td>
        <td>{{ $p->doctor->name }}</td>
        <td>{{ $p->room->room_no }}</td>
        <td>{{ $p->bed->bed_no }}</td>
        <td>{{ $p->status }}</td>

    </tr>
    @endforeach
</table>

{{ $patients->links() }} --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Discharged Patients</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h2 class="mb-4">Discharged Patients</h2>

    <a href="{{ route('staffpatients.index') }}" class="btn btn-secondary mb-3">
        ← Back to All Patients
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Department</th>
                    <th>Doctor</th>
                    <th>Room</th>
                    <th>Bed</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->patient_name }}</td>
                    <td>{{ $p->department->name }}</td>
                    <td>{{ $p->doctor->name }}</td>
                    <td>{{ $p->room->room_no }}</td>
                    <td>{{ $p->bed->bed_no }}</td>
                    <td>
                      <span class="badge 
                        @if(strtolower($p->status) === 'discharged') bg-success 
                        @elseif(strtolower($p->status) === 'pending') bg-warning 
                        @else bg-secondary 
                        @endif">
                        {{ ucfirst($p->status) }}
                      </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div>
        {{ $patients->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
