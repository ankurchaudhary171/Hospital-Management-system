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
</html> --}}







<h2>Edit Patient</h2>

<form action="{{ route('staffpatients.update', $patient->id) }}" method="POST">
    @csrf

    <label>Patient Name:</label>
    <input type="text" name="patient_name" value="{{ $patient->patient_name }}" required><br>

    <label>Mobile:</label>
    <input type="text" name="mobile" value="{{ $patient->mobile }}" required><br>

    <label>Department:</label>
    <select name="department_id" required>
        @foreach($departments as $dept)
            <option value="{{ $dept->id }}" {{ $patient->department_id == $dept->id ? 'selected' : '' }}>
                {{ $dept->name }}
            </option>
        @endforeach
    </select><br>

    <label>Doctor:</label>
    <select name="doctor_id" required>
        @foreach($doctors as $doc)
            <option value="{{ $doc->id }}" {{ $patient->doctor_id == $doc->id ? 'selected' : '' }}>
                {{ $doc->name }}
            </option>
        @endforeach
    </select><br>

    <label>Room:</label>
    <select name="room_id" required>
        @foreach($rooms as $room)
            <option value="{{ $room->id }}" {{ $patient->room_id == $room->id ? 'selected' : '' }}>
                {{ $room->room_no }}
            </option>
        @endforeach
    </select><br>

    <label>Bed:</label>
    <select name="bed_id" required>
        @foreach($beds as $bed)
            <option value="{{ $bed->id }}" {{ $patient->bed_id == $bed->id ? 'selected' : '' }}>
                {{ $bed->bed_no }}
            </option>
        @endforeach
    </select><br>

    <button type="submit">Update</button>
</form>



