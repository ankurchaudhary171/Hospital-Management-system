<!DOCTYPE html>
<html>
<head><title>Room List</title></head>
<body>
<h1>Room List</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<a href="{{ route('room.add') }}">Add New Room</a>

<table border="1" cellpadding="8" style="margin-top:10px;">
    <tr>
        <th>ID</th><th>Room No</th><th>Total Beds</th><th>Action</th>
    </tr>
    @foreach($rooms as $room)
    <tr>
        <td>{{ $room->id }}</td>
        <td>{{ $room->room_no }}</td>
        <td>{{ $room->total_beds }}</td>
        <td>
            <a href="{{ route('room.edit', $room->id) }}">Edit</a> |
            <a href="{{ route('room.delete', $room->id) }}" onclick="return confirm('Delete room?')">Delete</a> |
            <a href="{{ route('room.beds', $room->id) }}">View Beds</a>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>
