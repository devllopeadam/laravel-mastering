<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\FlightMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get("/{name}", UserController::class . "@getName");

// Route::get("sayHello/{name}", UserController::class . "@sayHello")->middleware(AuthMiddleware::class);

// Route::get('sayHello', UserController::class . "@getName");




Route::get("/profile/{name?}", [ProfileController::class, "showProfile"]);



Route::get("/flights", [FlightController::class, "showFlights"])->middleware(FlightMiddleware::class);
