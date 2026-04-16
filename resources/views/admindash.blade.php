{{-- 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<form action="">

<h1>admin sahab</h1>


<a href="{{url('admin/index')}}">Add Staff</a><br><br>
<a href="{{url('doctor/add')}}">Add Doctor</a><br><br>
<a href="{{url('patient/add')}}">Add Patient</a><br><br>
<a href="{{url('room/add')}}">Add Room</a><br><br>

</form>

</body>
</html>
 --}}




 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="adminNavbar">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/index') }}">Add Staff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('doctor/add') }}">Add Doctor</a>
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link" href="{{ url('patient/add') }}">Add Patient</a> --}}
          <a href="{{ route('patients.index') }}" class="nav-link">Patient list</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('room/add') }}">Add Room</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('departments.index') }}">Add Department</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Page Content -->
<div class="container text-center mt-5">
    <h1 class="mb-4">Welcome, Admin Sahab 👑</h1>
    <p class="lead">Use the navigation bar to manage staff, doctors, patients, and rooms.</p>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
