@extends('layouts.app') {{-- ya jo bhi layout ho --}}

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Staff Patients List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter Buttons -->
    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('patients.index') }}" class="btn btn-outline-dark {{ $status == null ? 'active' : '' }}">
            🔍 All Patients
        </a>
        <a href="{{ route('patients.index', ['status' => 'Admitted']) }}" class="btn btn-outline-success {{ $status == 'Admitted' ? 'active' : '' }}">
            🏥 Admitted
        </a>
        <a href="{{ route('patients.index', ['status' => 'Discharged']) }}" class="btn btn-outline-primary {{ $status == 'Discharged' ? 'active' : '' }}">
            🛏️ Discharged
        </a>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Department</th>
                    <th>Doctor</th>
                    <th>Room</th>
                    <th>Bed</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($patients as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->patient_name }}</td>
                        <td>{{ $p->department->name ?? '-' }}</td>
                        <td>{{ $p->doctor->name ?? '-' }}</td>
                        <td>{{ $p->room->room_no ?? '-' }}</td>
                        <td>{{ $p->bed->bed_no ?? '-' }}</td>
                        <td>
                            @if($p->status == 'Admitted')
                                <span class="badge bg-success">Admitted</span>
                            @else
                                <span class="badge bg-secondary">Discharged</span>
                            @endif
                        </td>
                        <td>
                            @if($p->status == 'Admitted')
                                <a href="{{ route('patients.discharge', $p->id) }}" class="btn btn-sm btn-warning">
                                    Discharge
                                </a>
                            @else
                                <span class="text-success fw-bold">✅ Discharged</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No patients found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $patients->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
