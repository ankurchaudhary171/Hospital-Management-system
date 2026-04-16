@extends('layouts.app') {{-- If you have a layout, otherwise remove --}}

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Welcome</h2>
    <form action="{{ url('staff/store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
            <div class="invalid-feedback">Please enter the name.</div>
        </div>

        {{-- <div class="mb-3">
            <label for="staff_id" class="form-label">Staff ID</label>
            <input type="text" name="staff_id" id="staff_id" class="form-control">
        </div> --}}

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" id="email" class="form-control" required>
            <div class="invalid-feedback">Please enter a valid email.</div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" id="password" class="form-control" required>
            <div class="invalid-feedback">Please enter a password.</div>
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" name="mobile" id="mobile" class="form-control">
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" name="department" id="department" class="form-control">
        </div>

        <div class="mb-3">
            <label for="post" class="form-label">Post</label>
            <input type="text" name="post" id="post" class="form-control">
        </div>

        <div class="mb-3">
            <label for="qualification" class="form-label">Qualification</label>
            <input type="text" name="qualification" id="qualification" class="form-control">
        </div>

        {{-- <div class="mb-3">
            <label for="cabin_location" class="form-label">Cabin Location</label>
            <input type="text" name="cabin_location" id="cabin_location" class="form-control">
        </div> --}}

        <div class="mb-3">
            <label for="experience" class="form-label">Experience</label>
            <input type="text" name="experience" id="experience" class="form-control">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

{{-- Optional Bootstrap validation script --}}
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
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
    })()
</script>
@endsection







