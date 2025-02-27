<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{
    public function index()
    {
        return RoomResource::collection(Room::paginate(10));
    }

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

    public function show($id)
    {
        return new RoomResource(Room::findOrFail($id));
    }

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

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json(['message' => 'Chambre supprimée avec succès'], 200);
    }

    public function search(Request $request)
    {
        $rooms = Room::where('type', $request->type)->get();
        return RoomResource::collection($rooms);
    }
}
