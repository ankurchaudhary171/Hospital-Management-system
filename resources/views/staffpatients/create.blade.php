{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admit Patient</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Admit Patient</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form action="{{ route('staffpatients.store') }}" method="POST">
    @csrf

    <label>Patient Name:</label>
    <input type="text" name="patient_name" required><br>

    <label>Mobile:</label>
    <input type="text" name="mobile" required><br>

    <label>Department:</label>
    <select name="department_id" id="department" required>
        <option value="">Select Department</option>
        @foreach($departments as $dept)
            <option value="{{ $dept->id }}">{{ $dept->name }}</option>
        @endforeach
    </select><br>

    <label>Doctor:</label>
    <select name="doctor_id" id="doctor" required>
        <option value="">Select Doctor</option>
    </select><br>

    <label>Room:</label>
    <select name="room_id" id="room" required>
        <option value="">Select Room</option>
        @foreach($rooms as $room)
            <option value="{{ $room->id }}">{{ $room->room_no }}</option>
        @endforeach
    </select><br>

    <label>Bed:</label>
    <select name="bed_id" id="bed" required>
        <option value="">Select Bed</option>
    </select><br>

    <button type="submit">Admit</button>
</form>

<script>
$(document).ready(function() {
    // 🔹 Get doctors dynamically
    $('#department').on('change', function() {
        let deptID = $(this).val();
    //    console.log($(this).val());

        if (deptID) {
            $.ajax({
                url: "{{ url('/get-doctors') }}/" + deptID,
                type: "GET",
                success: function(data) {
                    $('#doctor').empty().append('<option value="">Select Doctor</option>');
                    $.each(data, function(key, value) {
                        $('#doctor').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        } else {
            $('#doctor').html('<option value="">Select Doctor</option>');
        }
    });

    // 🔹 Get beds dynamically
    $('#room').on('change', function() {
        let roomID = $(this).val();
        if (roomID) {
            $.ajax({
                url: "{{ url('/get-beds') }}/" + roomID,
                type: "GET",
                success: function(data) {
                    $('#bed').empty().append('<option value="">Select Bed</option>');
                    $.each(data, function(key, value) {
                        $('#bed').append('<option value="'+ value.id +'">'+ value.bed_no +'</option>');
                    });
                }
            });
        } else {
            $('#bed').html('<option value="">Select Bed</option>');
        }
    });
});
</script>

</body>
</html> 
 --}}



 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admit Patient</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<!-- Navbar -->
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

<!-- Main Content -->
<div class="container my-5" style="max-width: 700px;">
    <h2 class="mb-4">Admit Patient</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('staffpatients.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="mb-3">
            <label for="patient_name" class="form-label">Patient Name:</label>
            <input type="text" class="form-control" id="patient_name" name="patient_name" required>
            <div class="invalid-feedback">Please enter the patient's name.</div>
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile:</label>
            <input type="text" class="form-control" id="mobile" name="mobile" required>
            <div class="invalid-feedback">Please enter mobile number.</div>
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Department:</label>
            <select class="form-select" id="department" name="department_id" required>
                <option value="">Select Department</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please select a department.</div>
        </div>

        <div class="mb-3">
            <label for="doctor" class="form-label">Doctor:</label>
            <select class="form-select" id="doctor" name="doctor_id" required>
                <option value="">Select Doctor</option>
            </select>
            <div class="invalid-feedback">Please select a doctor.</div>
        </div>

        <div class="mb-3">
            <label for="room" class="form-label">Room:</label>
            <select class="form-select" id="room" name="room_id" required>
                <option value="">Select Room</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->room_no }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please select a room.</div>
        </div>

        <div class="mb-3">
            <label for="bed" class="form-label">Bed:</label>
            <select class="form-select" id="bed" name="bed_id" required>
                <option value="">Select Bed</option>
            </select>
            <div class="invalid-feedback">Please select a bed.</div>
        </div>

        <button type="submit" class="btn btn-success">Admit</button>
    </form>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    // Fetch doctors dynamically based on selected department
    $('#department').on('change', function() {
        let deptID = $(this).val();

        if (deptID) {
            $.ajax({
                url: "{{ url('/get-doctors') }}/" + deptID,
                type: "GET",
                success: function(data) {
                    $('#doctor').empty().append('<option value="">Select Doctor</option>');
                    $.each(data, function(key, value) {
                        $('#doctor').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        } else {
            $('#doctor').html('<option value="">Select Doctor</option>');
        }
    });

    // Fetch beds dynamically based on selected room
    $('#room').on('change', function() {
        let roomID = $(this).val();
        if (roomID) {
            $.ajax({
                url: "{{ url('/get-beds') }}/" + roomID,
                type: "GET",
                success: function(data) {
                    $('#bed').empty().append('<option value="">Select Bed</option>');
                    $.each(data, function(key, value) {
                        $('#bed').append('<option value="'+ value.id +'">'+ value.bed_no +'</option>');
                    });
                }
            });
        } else {
            $('#bed').html('<option value="">Select Bed</option>');
        }
    });

    // Bootstrap form validation
    (() => {
      'use strict'
      const forms = document.querySelectorAll('.needs-validation')

      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })();
});
</script>

</body>
</html>
