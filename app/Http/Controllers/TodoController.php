<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function index() {
        $todos = Todo::all();
        return response()->json($todos);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $todo = Todo::create($request->all());

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $todo
        ], 201);
    }

    public function destroy($id) {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $todo->delete();

        return response()->json(['message' => 'Post deleted successfully'], 200);
    }

    public function update(Request $request, $id) {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $todo->update($request->all());

        return response()->json([
            'message' => 'Post updated successfully',
            'post' => $todo
        ], 200);
    }
}
