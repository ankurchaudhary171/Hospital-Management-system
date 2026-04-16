<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Bed;

class RoomController extends Controller
{
    // Show add form
    public function addRoomForm()
    {
        return view('rooms.add');
    }

    // Store new room
    public function storeRoom(Request $request)
    {
        $request->validate([
            'room_no' => 'required|unique:rooms,room_no',
            'total_beds' => 'required|integer|min:1',
        ]);

        $room = Room::create($request->only(['room_no', 'total_beds']));

        // Auto-create beds for that room
        for ($i = 1; $i <= $request->total_beds; $i++) {
            Bed::create([
                'room_id' => $room->id,
                'bed_no' => 'B' . $i,
            ]);
        }

        return redirect()->route('room.list')->with('success', 'Room added successfully with beds!');
    }

    // List all rooms
    public function roomList()
    {
        $rooms = Room::withCount('beds')->get();
        return view('rooms.list', compact('rooms'));
    }

    // Edit room
    public function editRoom($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    // Update room
    public function updateRoom(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $request->validate([
            'room_no' => 'required|unique:rooms,room_no,'.$room->id,
            'total_beds' => 'required|integer|min:1',
        ]);

        $room->update($request->only(['room_no', 'total_beds']));

        return redirect()->route('room.list')->with('success', 'Room updated successfully!');
    }

    // Delete room
    public function deleteRoom($id)
    {
        Room::destroy($id);
        return redirect()->route('room.list')->with('success', 'Room deleted successfully!');
    }

    // Show all beds for a room
    public function bedList($room_id)
    {
        $room = Room::with('beds')->findOrFail($room_id);
        return view('rooms.beds', compact('room'));
    }
}
