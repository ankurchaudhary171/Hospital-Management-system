{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Doctor Profile</title>
</head>
<body>
<h2>Edit Doctor Profile</h2>

<form action="{{ route('doctor_profiles.update', $doctor->id) }}" method="POST">
    @csrf
    <label>Name:</label><input type="text" name="name" value="{{ $doctor->name }}" required><br>
    <label>Qualification:</label><input type="text" name="qualification" value="{{ $doctor->qualification }}" required><br>
    <label>Specialist:</label><input type="text" name="specialist" value="{{ $doctor->specialist }}" required><br>
    <label>Phone:</label><input type="text" name="phone" value="{{ $doctor->phone }}" required><br>
    <label>Email:</label><input type="email" name="email" value="{{ $doctor->email }}" required><br>
    <label>Address:</label><input type="text" name="address" value="{{ $doctor->address }}"><br>
    <label>Experience:</label><input type="number" name="experience" value="{{ $doctor->experience }}"><br>
    <label>Duty Timing:</label><input type="text" name="duty_timing" value="{{ $doctor->duty_timing }}"><br>
    <label>Availability:</label>
    <select name="availability">
        <option value="Available" {{ $doctor->availability == 'Available' ? 'selected' : '' }}>Available</option>
        <option value="Not Available" {{ $doctor->availability == 'Not Available' ? 'selected' : '' }}>Not Available</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<a href="{{ route('doctor_profiles.index') }}">Back to Doctor List</a>
</body>
</html> --}}


















{{-- -========================================= --}}