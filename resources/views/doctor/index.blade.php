{{-- <!DOCTYPE html>
<html>
<head>
    <title>{{ isset($doctor) ? 'Edit Doctor' : 'Add Doctor' }}</title>
</head>
<body>

<h2>{{ isset($doctor) ? 'Edit Doctor' : 'Add Doctor' }}</h2>

<form action="{{ isset($doctor) ? url('doctor/update/'.$doctor->id) : url('doctor/store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Name: <input type="text" name="name" value="{{ $doctor->name ?? '' }}"><br><br>
    Email: <input type="email" name="email" value="{{ $doctor->email ?? '' }}"><br><br>
    Phone: <input type="text" name="phone" value="{{ $doctor->phone ?? '' }}"><br><br>

    Specialist: 
    <select name="specilist" required>
        <option value="">--Select Specialist--</option>
        @foreach($departments as $department)
            <option value="{{ $department->name }}" 
                {{ (isset($doctor) && $doctor->specilist == $department->name) ? 'selected' : '' }}>
                {{ $department->name }}
            </option>
        @endforeach
    </select>
    <br><br>

    Experience: <input type="text" name="experience" value="{{ $doctor->experience ?? '' }}"><br><br>
    Qualification: <input type="text" name="qualification" value="{{ $doctor->qualification ?? '' }}"><br><br>

    Department ID: <input type="text" name="department_id" value="{{ $doctor->department_id ?? '' }}"><br><br>

    Photo: <input type="file" name="photo"><br><br>

    @if(isset($doctor->photo))
        <img src="{{ asset('uploads/doctors/'.$doctor->photo) }}" width="100"><br><br>
    @endif

    <button type="submit">{{ isset($doctor) ? 'Update' : 'Submit' }}</button>
</form>

<br>
<a href="{{ url('doctor/list') }}">View of All Doctors</a>

</body>
</html> --}}




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($doctor) ? 'Edit Doctor' : 'Add Doctor' }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h2 class="mb-4">{{ isset($doctor) ? 'Edit Doctor' : 'Add Doctor' }}</h2>

    <form action="{{ isset($doctor) ? url('doctor/update/'.$doctor->id) : url('doctor/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $doctor->name ?? '') }}" 
                    required>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    value="{{ old('email', $doctor->email ?? '') }}" 
                    required>
            </div>

            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="phone" 
                    name="phone" 
                    value="{{ old('phone', $doctor->phone ?? '') }}" 
                    required>
            </div>

            <div class="col-md-6">
                <label for="specilist" class="form-label">Specialist</label>
                <select class="form-select" id="specilist" name="specilist" required>
                    <option value="">-- Select Specialist --</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->name }}" 
                            {{ (old('specilist', $doctor->specilist ?? '') == $department->name) ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="experience" class="form-label">Experience</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="experience" 
                    name="experience" 
                    value="{{ old('experience', $doctor->experience ?? '') }}" 
                    required>
            </div>

            <div class="col-md-6">
                <label for="qualification" class="form-label">Qualification</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="qualification" 
                    name="qualification" 
                    value="{{ old('qualification', $doctor->qualification ?? '') }}" 
                    required>
            </div>

            <div class="col-md-6">
                <label for="department_id" class="form-label">Department ID</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="department_id" 
                    name="department_id" 
                    value="{{ old('department_id', $doctor->department_id ?? '') }}" 
                    required>
            </div>

            <div class="col-md-6">
                <label for="photo" class="form-label">Photo</label>
                <input 
                    class="form-control" 
                    type="file" 
                    id="photo" 
                    name="photo" 
                    {{ isset($doctor) ? '' : 'required' }}>
            </div>

            @if(isset($doctor->photo))
                <div class="col-12">
                    <img src="{{ asset('uploads/doctors/'.$doctor->photo) }}" class="img-thumbnail" alt="Doctor Photo" width="150">
                </div>
            @endif
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                {{ isset($doctor) ? 'Update' : 'Submit' }}
            </button>
            <a href="{{ url('doctor/list') }}" class="btn btn-secondary ms-2">View All Doctors</a>
        </div>
    </form>
</div>

<!-- Bootstrap 5 JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

