{{-- <h1>staff</h1>

<a href="{{route('staffpatients.create')}}">Staff Add Patient</a>

 --}}



 <!DOCTYPE html>
<html>
<head>
    <title>Staff</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand fs-3 fw-bold" href="#">Staff</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStaff" aria-controls="navbarStaff" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarStaff">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('staffpatients.create') }}" class="btn btn-primary">
            Staff Add Patient
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
