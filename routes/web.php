<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\FlightMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get("/{name}", UserController::class . "@getName");

// Route::get("sayHello/{name}", UserController::class . "@sayHello")->middleware(AuthMiddleware::class);

// Route::get('sayHello', UserController::class . "@getName");




Route::get("/profile/{name?}", [ProfileController::class, "showProfile"]);

Route::get("/flights", [FlightController::class, "showFlights"]);

Route::get("/users", [UserController::class, "showUsers"])->middleware(UserMiddleware::class);


Route::get("/posts", [PostController::class, "showPosts"]);

Route::get("/posts/{id}", [PostController::class, "showPostById"]);

Route::get("/films", [FilmController::class, "getFilms"]);

Route::get("/filmsName", [FilmController::class, "getFilmsName"]);

Route::get("/filmsAfterDate", [FilmController::class, "getFilmsTitreDate"]);
