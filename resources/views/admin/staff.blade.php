<!DOCTYPE html>
<html>
<head>
    <title>Staff Form</title>
</head>
<body>

<h2>{{ isset($staff) ? 'Edit Staff' : 'Add Staff' }}</h2>

<form action="{{ isset($staff) ? url('staff/update/'.$staff->id) : url('staff/store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    Name: <input type="text" name="name" value="{{ $staff->name ?? '' }}"><br><br>
    {{-- Staff ID: <input type="text" name="staff_id" value="{{ $staff->staff_id ?? '' }}"><br><br> --}}
    Email: <input type="email" name="email" value="{{ $staff->email ?? '' }}"><br><br>
    Password: <input type="text" name="password" value="{{ $staff->password ?? '' }}"><br><br>
    Mobile: <input type="text" name="mobile" value="{{ $staff->mobile ?? '' }}"><br><br>
    Department: <input type="text" name="department" value="{{ $staff->department ?? '' }}"><br><br>
    Post: <input type="text" name="post" value="{{ $staff->post ?? '' }}"><br><br>
    Qualification: <input type="text" name="qualification" value="{{ $staff->qualification ?? '' }}"><br><br>
    {{-- Cabin Location: <input type="text" name="cabin_location" value="{{ $staff->cabin_location ?? '' }}"><br><br> --}}
    Experience: <input type="text" name="experience" value="{{ $staff->experience ?? '' }}"><br><br>
    Image: <input type="file" name="image"><br><br>

    @if(isset($staff->image))
        <img src="{{ asset('uploads/staffs/'.$staff->image) }}" width="100"><br><br>
    @endif

    <button type="submit">{{ isset($staff) ? 'Update' : 'Submit' }}</button>
</form>

<br>
<a href="{{ url('staff/list') }}">View All Staff</a>

</body>
</html>
