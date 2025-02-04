<?php

namespace App\Http\Controllers;


class FlightController extends Controller
{
    public function showFlights()
    {
        // $pattern = "/[0-9]{3}/";
        // if (!preg_match($pattern, $id)) return abort(404);
        // return view("flight");
        return response()->json([
            'data' => ['message' => 'Hello from FlightController']
        ]);
    }
}
