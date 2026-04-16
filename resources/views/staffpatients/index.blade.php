@extends('layouts.app') {{-- Agar aapne layout use kiya ho to --}}

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Staff Patient List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Filter by Status --}}
    <form method="GET" action="{{ route('staffpatients.index') }}" class="mb-4 d-flex align-items-center gap-3">
        <label for="status" class="form-label mb-0">Filter by Status:</label>
        <select name="status" id="status" class="form-select w-auto" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="Admitted" {{ request('status') == 'Admitted' ? 'selected' : '' }}>Admitted</option>
            <option value="Discharged" {{ request('status') == 'Discharged' ? 'selected' : '' }}>Discharged</option>
        </select>
    </form>

    {{-- Search Form --}}
    <form id="searchForm" action="{{ url('search_data') }}" method="GET" class="d-flex mb-4">
        <input class="form-control me-2" name="filter" id="filter_id" type="search" placeholder="Search patients" aria-label="Search">
        <button class="btn btn-outline-danger" type="submit">Search</button>
    </form>

    <div class="mb-3">
        <a href="{{ route('staffpatients.create') }}" class="btn btn-primary">➕ Admit New Patient</a>

        <form action="{{ route('logout') }}" method="POST" class="d-inline ms-3">
            @csrf
            <button type="submit" class="btn btn-secondary" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
        </form>
    </div>

    {{-- Patients Table --}}
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
                @foreach($patients as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->patient_name }}</td>
                    <td>{{ $p->department->name }}</td>
                    <td>{{ $p->doctor->name }}</td>
                    <td>{{ $p->room->room_no }}</td>
                    <td>{{ $p->bed->bed_no }}</td>
                    <td>
                        @if($p->status == 'Admitted')
                            <span class="badge bg-success">Admitted</span>
                        @else
                            <span class="badge bg-secondary">Discharged</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('staffpatients.edit', $p->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                        <a href="{{ route('staffpatients.destroy', $p->id) }}" class="btn btn-sm btn-danger me-1" onclick="return confirm('Delete this record?')">Delete</a>
                        @if($p->status == 'Admitted')
                            <a href="{{ route('staffpatients.discharge', $p->id) }}" class="btn btn-sm btn-info">Discharge</a>
                        @else
                            <span class="text-success fw-bold">✅ Discharged</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="{{ route('staffpatients.discharged') }}" class="btn btn-outline-primary">🛏️ Discharged Patients</a>
     
    </div>
</div>
   <div>
        {{ $patients->links() }}
    </div>
@endsection
