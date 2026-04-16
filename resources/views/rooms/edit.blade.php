<!DOCTYPE html>
<html>
<head><title>Edit Room</title></head>
<body>
    <h1>Edit Room</h1>

    <form action="{{ route('room.update', $room->id) }}" method="POST">
        @csrf
        Room No: <input type="text" name="room_no" value="{{ $room->room_no }}"><br><br>
        Total Beds: <input type="number" name="total_beds" value="{{ $room->total_beds }}"><br><br>
        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('room.list') }}">Back to List</a>
</body>
</html>
