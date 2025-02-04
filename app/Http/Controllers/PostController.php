<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request)
    {
        return $request->user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'string|min:10',
            'thumbnail' => 'string|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // Eloquent ORM
        $post = Post::create([
            'title' => $request->input("title"),
            'description' => $request->input("description"),
            'thumbnail' => $request->input("thumbnail"),
        ]);

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post
        ], 201);
    }

    public function getPosts()
    {
        $posts = DB::table('posts')->get();
        return response()->json($posts, 200);
    }

    public function showPosts()
    {
        //? Eloquent ORM (To make easy operation such as create, read, update, delete)
        // $posts = Post::all();
        // return response()->json($posts, 200);

        //? Query Builder
        $posts = DB::table("posts")->get();
        return response()->json($posts, 200);
    }

    public function countPosts()
    {
        return DB::table("posts")->count();
    }

    public function getPostById($id)
    {
        // $post = Post::find($id);
        // if (!$post) {
        //     return response()->json(['message' => 'Post not found'], 404);
        // }
        $post = DB::table("posts")->find($id);
        return response()->json($post, 200);
    }

    public function showPostById($id)
    {
        //? Eloquent ORM (To make easy operation such as create, read, update, delete)
        // $post = Post::find($id);
        // return response()->json($post, 200);
        //? Query Builder
        $post = DB::table("posts")->where("id", $id)->first();
        return response()->json($post, 200);
    }
}
