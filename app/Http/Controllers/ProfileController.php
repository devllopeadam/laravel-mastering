<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile($name = null)
    {
        return view("profile", ["name" => $name]);
    }
}
