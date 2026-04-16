

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>doctordash</title>
</head>
<body>
    <h1>doctor dash page</h1>
    <form action="">
  <a href="{{route('doctor.dashboard')}}">doctor dash</a>

    </form>
</body>
</html>
 --}}

 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Doctor Dash</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container my-5 text-center">
  <h1 class="mb-4">Doctor Dash Page</h1>

  <a href="{{ route('doctor.dashboard') }}" class="btn btn-primary btn-lg">
    Go to Doctor Dashboard
  </a>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 