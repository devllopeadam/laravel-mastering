<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipationController extends Controller
{
    public function filmsWithActors()
    {
        $result = DB::table('films')
            ->join('participations', 'films.id', '=', 'participations.film_id')
            ->join('actors', 'actors.id', '=', 'participations.actor_id')
            ->select('films.title', 'actors.name')
            ->get();
        return response()->json($result);
    }

    public function actorsInActionFilms()
    {
        $actors = DB::table('actors')
            ->join('participations', 'actors.id', '=', 'participations.actor_id')
            ->join('films', 'films.id', '=', 'participations.film_id')
            ->where('films.genre', 'Action')
            ->get();
        return response()->json($actors);
    }

    public function filmActorRoles()
    {
        $result = DB::table('films')
            ->join('participations', 'films.id', '=', 'participations.film_id')
            ->join('actors', 'actors.id', '=', 'participations.actor_id')
            ->select('films.title', 'actors.name', 'participations.role')
            ->get();
        return response()->json($result);
    }

    public function actorsWithParticipationCount()
    {
        $actors = DB::table('actors')
            ->join('participations', 'actors.id', '=', 'participations.actor_id')
            ->select('actors.name', DB::raw('COUNT(participations.id) as participation_count'))
            ->groupBy('actors.name')
            ->having('participation_count', '>', 3)
            ->get();
        return response()->json($actors);
    }

    public function filmCountForActor($actorId)
    {
        $count = DB::table('participations')
            ->where('actor_id', $actorId)
            ->count();
        return response()->json(['film_count' => $count]);
    }
}
