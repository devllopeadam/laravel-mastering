<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActeurController extends Controller
{
    public function index()
    {
        $actors = DB::table('actors')->get();
        return response()->json($actors);
    }

    public function startsWith($letter)
    {
        $actors = DB::table('actors')->where('name', 'like', $letter . '%')->get();
        return response()->json($actors);
    }

    public function actorsWithoutFilms()
    {
        $actors = DB::table('actors')
            ->leftJoin('participations', 'actors.id', '=', 'participations.actor_id')
            ->whereNull('participations.film_id')
            ->get();
        return response()->json($actors);
    }

    public function actorsBetweenYears($start, $end)
    {
        $actors = DB::table('actors')
            ->join('participations', 'actors.id', '=', 'participations.actor_id')
            ->join('films', 'films.id', '=', 'participations.film_id')
            ->whereBetween('films.release_date', [$start, $end])
            ->get();
        return response()->json($actors);
    }
}
