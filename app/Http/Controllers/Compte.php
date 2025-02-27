<?php

namespace App\Http\Controllers;

use App\Models\Compte as ModelsCompte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Compte extends Controller
{
    public function showLogin(Request $request) {
        return view("login");
    }

    public function showProfile() {
        $user = session()->get("user");
        return view("profile", ["user" => $user]);
    }

    public function showRegister() {
        return view("register");
    }

    public function login(Request $request) {
        $validator = validator([
            "login" => "required|login",
            "password" => "required"
        ]);
        $compte = DB::table("comptes")->where("login", $request->login)->first();
        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 422);
        }
        if (!$compte) {
            return back()->withErrors(["login" => "User not found"])->withInput();
        }
        $request->session()->put("user", $compte);
        Log::channel('custom')->warning('User logged in and stored in the session: ', [
            'id' => $compte->id,
            'login' => $request->login,
            'profile' => $request->profile
        ]); 
        return redirect()->route("profile");
    }

    public function register(Request $request) {
        $validator = validator([
            "login" => "required|login",
            "password" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 422);
        }
        ModelsCompte::create($request->all());
        return redirect()->route("login")->with("success", "User registered successfully");
    }

    public function logout(Request $request) {
        $request->session()->forget("user");
        return redirect()->route("login");
    }
}
