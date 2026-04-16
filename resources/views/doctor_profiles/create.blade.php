{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Doctor Profile</title>
</head>
<body>
<h2>Add Doctor Profile</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form action="{{ route('doctor_profiles.store') }}" method="POST">
    @csrf
    <label>Name:</label><input type="text" name="name" required><br>
    <label>Qualification:</label><input type="text" name="qualification" required><br>
    <label>Specialist:</label><input type="text" name="specialist" required><br>
    <label>Phone:</label><input type="text" name="phone" required><br>
    <label>Email:</label><input type="email" name="email" required><br>
    <label>Address:</label><input type="text" name="address"><br>
    <label>Experience (years):</label><input type="number" name="experience"><br>
    <label>Duty Timing:</label><input type="text" name="duty_timing" placeholder="9 AM - 5 PM"><br>
    <label>Availability:</label>
    <select name="availability">
        <option value="Available">Available</option>
        <option value="Not Available">Not Available</option>
    </select><br><br>

    <button type="submit">Save</button>
</form>

<a href="{{ route('doctor_profiles.index') }}">Back to Doctor List</a>
</body>
</html> --}}











{{-- -------------------------------------------------------------- --}}