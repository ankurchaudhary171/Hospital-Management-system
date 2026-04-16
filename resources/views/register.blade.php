{{-- 
<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
</head>
<body>
    <h1>Register Form</h1>

  <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
    @csrf 
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Password: <input type="password" name="password"><br><br>
    Mobile: <input type="text" name="mobile"><br><br>
    Image: <input type="file" name="image"><br><br>
    <button type="submit">Register</button>
</form>


    
</body>
</html> --}}


<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4 w-100" style="max-width: 500px;">
        <h3 class="text-center mb-4">Register</h3>

        <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Mobile -->
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" required>
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Register</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
