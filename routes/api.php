<?php

use App\Http\Controllers\ImageUploader;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::get('auth', function () {
//     return response()->json([
//         'data' => ['message' => 'Hello get method']
//     ]);
// });

// Route::post('auth', function (Request $request) {
//     $name = $request->input("name");
//     return response()->json([
//         'data' => ['message' => "Hello $name"]
//     ]);
// });

// Route::put('auth', function () {
//     return response()->json([
//         'data' => ['message' => 'Hello put method']
//     ]);
// });

// Route::delete('auth', function () {
//     return response()->json([
//         'data' => ['message' => 'Hello delete method']
//     ]);
// });


Route::post("createUser", UserController::class . "@store");

Route::post("posts", [PostController::class, "store"])->middleware("auth:api");

Route::get("posts", [PostController::class, "getPosts"]);

Route::get("posts/count", [PostController::class, "countPosts"]);

Route::get("posts/{id}", [PostController::class, "getPostById"]);

Route::post("register", [UserController::class, "register"]);

Route::post("login", [UserController::class, "login"]);

Route::post("upload", [ImageUploader::class, "upload"]);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('rooms', RoomController::class);
});

Route::get('rooms/search', [RoomController::class, 'search'])->middleware("auth:sanctum");
