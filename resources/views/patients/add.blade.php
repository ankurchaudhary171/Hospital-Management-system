{{-- <!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
</head>
<body>

<h2>Add Patient</h2>

<form action="{{ url('patient/store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Name: <input type="text" name="name" value="{{ old('name') }}"><br><br>
    Email: <input type="email" name="email" value="{{ old('email') }}"><br><br>
    Phone: <input type="text" name="phone" value="{{ old('phone') }}"><br><br>
    Address: <input type="text" name="address" value="{{ old('address') }}"><br><br>
    Gender:
    <select name="gender">
        <option value="">--Select Gender--</option>
        <option value="Male" {{ old('gender')=='Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('gender')=='Female' ? 'selected' : '' }}>Female</option>
    </select>
    <br><br>
    Date of Birth: <input type="date" name="dob" value="{{ old('dob') }}"><br><br>
    Photo: <input type="file" name="photo"><br><br>

    <button type="submit">Submit</button>
</form>

<br>
<a href="{{ url('patient/list') }}">View All Patients</a>

</body>
</html> --}}








{{-- ----------------------------------------------------------------------- --}}



{{-- 

<!DOCTYPE html>
<html>
<head><title>Add Patient</title></head>
<body>
    <h1>Add Patient</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patient.store') }}" method="POST">
        @csrf
        Name: <input type="text" name="name" value="{{ old('name') }}"><br><br>
        Email: <input type="email" name="email" value="{{ old('email') }}"><br><br>
        Phone: <input type="text" name="phone" value="{{ old('phone') }}"><br><br>
        Disease: <input type="text" name="disease" value="{{ old('disease') }}"><br><br>
        Admit Date: <input type="date" name="admit_date" value="{{ old('admit_date') }}"><br><br>
        <button type="submit">Add Patient</button>
    </form>

    <br>
    <a href="{{ route('patient.list') }}">Back to Patient List</a>
</body>
</html> --}}

  {{-- <a href="{{ route('staffpatients.discharged') }}">🛏️ Discharged Patients</a> |  --}}


  {{-- ======================================================== --}}



  



  
