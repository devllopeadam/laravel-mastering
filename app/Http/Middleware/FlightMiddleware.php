<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FlightMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $users = [
            [
                "name" => "Adam",
                "email" => "adam@gmail.com",
                "token" => "adam",
                "role" => "admin"
            ],
            [
                "name" => "John",
                "email" => "josf@gmail.com",
                "token" => "john",
                "role" => "user"
            ]
        ];
        $name = $request->input('name');


        $foundUser = array_filter($users, function ($user) use ($name) {
            return $user['name'] === $name;
        });
        $userData = reset($foundUser);

        if ($userData && $userData['token'] === $request->input("token") && $userData['role'] === "admin") {
            return $next($request);
        } else {
            abort(403, "!! User Not found !!");
        }
    }
}
