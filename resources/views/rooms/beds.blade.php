<!DOCTYPE html>
<html>
<head><title>Bed List</title></head>
<body>
    <h1>Room {{ $room->room_no }} - Beds</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th><th>Bed No</th><th>Room ID</th>
        </tr>
        @foreach($room->beds as $bed)
        <tr>
            <td>{{ $bed->id }}</td>
            <td>{{ $bed->bed_no }}</td>
            <td>{{ $bed->room_id }}</td>
        </tr>
        @endforeach
    </table>

    <br>
    <a href="{{ route('room.list') }}">Back to Room List</a>
</body>
</html>
