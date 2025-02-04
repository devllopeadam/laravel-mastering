<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
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
                "id" => 1,
                "name" => "John Doe",
                "email" => "john@gmail.com"
            ],
            [
                "id" => 2,
                "name" => "Jane Doe",
                "email" => "jane@gmail.com"
            ],
        ];

        $userId = $request->input("id"); //? id =  1

        $userWithId = array_values(array_filter($users, function ($user) use ($userId) {
            return $user['id'] == $userId;
        }))[0] ?? null;

        if (!$userWithId) {
            return abort(404, "User not found");
        }
        return $next($request);
    }
}
