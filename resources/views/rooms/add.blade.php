{{-- <!DOCTYPE html>
<html>
<head><title>Add Room</title></head>
<body>
    <h1>Add Room</h1>

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('room.store') }}" method="POST">
        @csrf
        Room No: <input type="text" name="room_no"><br><br>
        Total Beds: <input type="number" name="total_beds" min="1"><br><br>
        <button type="submit">Save Room</button>
    </form>

    <br>
    <a href="{{ route('room.list') }}">Back to Room List</a>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Room</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">Add Room</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('room.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="mb-3">
            <label for="room_no" class="form-label">Room No</label>
            <input type="text" 
                   class="form-control @error('room_no') is-invalid @enderror" 
                   id="room_no" 
                   name="room_no" 
                   value="{{ old('room_no') }}" 
                   required>
            @error('room_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_beds" class="form-label">Total Beds</label>
            <input type="number" 
                   class="form-control @error('total_beds') is-invalid @enderror" 
                   id="total_beds" 
                   name="total_beds" 
                   min="1" 
                   value="{{ old('total_beds') }}" 
                   required>
            @error('total_beds')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Room</button>
        <a href="{{ route('room.list') }}" class="btn btn-secondary ms-2">Back to Room List</a>
    </form>
</div>

<!-- Bootstrap 5 JS Bundle (optional for validation) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
</body>
</html>
