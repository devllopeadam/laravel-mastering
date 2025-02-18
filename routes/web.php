<?php

use App\Http\Controllers\Compte;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CompteMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\FlightMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(CompteMiddleware::class)->group(
    function () {
        Route::get("/login", [Compte::class, "showLogin"])->name("login")->middleware(CompteMiddleware::class);
        Route::get("/register", [Compte::class, "showRegister"])->name("register")->middleware(CompteMiddleware::class);
        Route::get("profile", [Compte::class, "showProfile"])->name("profile")->middleware(CompteMiddleware::class);
        Route::get("/logout", [Compte::class, "logout"])->name("logout")->middleware(CompteMiddleware::class);

        Route::post("/login", [Compte::class, "login"])->middleware(CompteMiddleware::class);
        Route::post("/register", [Compte::class, "register"])->middleware(CompteMiddleware::class);
    }
);
