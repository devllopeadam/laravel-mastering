<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    function getFilms()
    {
        $films = DB::table("films")->get();
        return response()->json(["films" => $films]);
    }
    function getFilmsName()
    {
        // $films = DB::table("films")->pluck('titre');
        // return response()->json(["filmsName" => $films]);
    }
    function getFilmsTitreDate(Request $request)
    {
        $films = DB::table("films")->where("anne", ">", $request->input("date"))->get();
        return response()->json(["filmsName" => $films]);
    }
}
