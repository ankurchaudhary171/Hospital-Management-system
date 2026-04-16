{{-- <!DOCTYPE html>
<html>
<head>
    <title>Edit Patient</title>
</head>
<body>

<h2>Edit Patient</h2>

<form action="{{ url('patient/update/'.$patient->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    Name: <input type="text" name="name" value="{{ old('name', $patient->name) }}"><br><br>
    Email: <input type="email" name="email" value="{{ old('email', $patient->email) }}"><br><br>
    Phone: <input type="text" name="phone" value="{{ old('phone', $patient->phone) }}"><br><br>
    Address: <input type="text" name="address" value="{{ old('address', $patient->address) }}"><br><br>
    Gender:
    <select name="gender">
        <option value="Male" {{ $patient->gender=='Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ $patient->gender=='Female' ? 'selected' : '' }}>Female</option>
    </select>
    <br><br>
    Date of Birth: <input type="date" name="dob" value="{{ old('dob', $patient->dob) }}"><br><br>
    Photo: <input type="file" name="photo"><br><br>

    @if($patient->photo)
        <img src="{{ asset('uploads/patients/'.$patient->photo) }}" width="100"><br><br>
    @endif

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ url('patient/list') }}">View All Patients</a>

</body>
</html> --}}


{{-- <!DOCTYPE html>
<html>
<head><title>Edit Patient</title></head>
<body>
    <h1>Edit Patient</h1>

    <form action="{{ route('patient.update', $patient->id) }}" method="POST">
        @csrf
        Name: <input type="text" name="name" value="{{ old('name', $patient->name) }}"><br><br>
        Email: <input type="email" name="email" value="{{ old('email', $patient->email) }}"><br><br>
        Phone: <input type="text" name="phone" value="{{ old('phone', $patient->phone) }}"><br><br>
        Disease: <input type="text" name="disease" value="{{ old('disease', $patient->disease) }}"><br><br>
        Admit Date: <input type="date" name="admit_date" value="{{ old('admit_date', $patient->admit_date) }}"><br><br>
        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('patient.list') }}">Back to List</a>
</body>
</html>
 --}}
