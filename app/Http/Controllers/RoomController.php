<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;


class RoomController extends Controller
{
    // Get all rooms with pagination
    public function index()
    {
        return RoomResource::collection(Room::paginate(10));
    }

    // Store a new room
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|string|in:disponible,occupé,maintenance'
        ]);

        $room = Room::create($validatedData);
        return new RoomResource($room);
    }

    // Show a specific room
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return new RoomResource($room);
    }

    // Update a room
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|string|in:disponible,occupé,maintenance'
        ]);

        $room->update($validatedData);
        return new RoomResource($room);
    }

    // Delete a room
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json(['message' => 'Chambre supprimée avec succès'], 200);
    }
}

