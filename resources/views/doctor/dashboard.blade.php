<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
    </style>
</head>
<body>

<div class="container my-4">
    <h1 class="mb-3">Doctor Dashboard</h1>
    <h2 class="mb-3">Active Doctors</h2>

    <div class="row g-3">
        @foreach($activeDoctors as $doc)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                @if($doc->photo)
                <img src="{{ asset('uploads/doctors/'.$doc->photo) }}" class="card-img-top" alt="{{ $doc->name }}">
                @else
                <img src="https://via.placeholder.com/400x100?text=No+Image" class="card-img-top" alt="No Image">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $doc->name }}</h5>
                    <p class="card-text">
                        <strong>ID:</strong> {{ $doc->id }} <br>
                        <strong>Email:</strong> {{ $doc->email }} <br>
                        <strong>Phone:</strong> {{ $doc->phone }} <br>
                        <strong>Specialist:</strong> {{ $doc->specilist }} <br>
                        <strong>Experience:</strong> {{ $doc->experience }} years<br>
                        <strong>Qualification:</strong> {{ $doc->qualification }} <br>
                        <strong>Department ID:</strong> {{ $doc->department_id }}
                    </p>
                </div>
                <div class="card-footer text-success fw-bold">
                    Active
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap 5 JS Bundle CDN (optional if you need JS features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

{{-- 
<h2>Inactive Doctors</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Specialist</th><th>Experience</th>
        <th>Qualification</th><th>Department ID</th><th>Photo</th><th>Status</th><th>Action</th>
    </tr>
    @foreach($inactiveDoctors as $doc)
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
            @else N/A @endif
        </td>
        <td style="color:red;">Inactive</td>
        <td>
            <a href="{{ url('doctor/edit/'.$doc->id) }}">Edit</a> |
            <a href="{{ url('doctor/delete/'.$doc->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<br> --}}
{{-- <a href="{{ url('doctor/list') }}">View All Doctors</a> | 
<a href="{{ url('doctor/active') }}">View Active Doctors</a> | 
<a href="{{ url('doctor/inactive') }}">View Inactive Doctors</a> --}}

</body>
</html>

