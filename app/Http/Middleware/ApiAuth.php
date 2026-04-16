<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //check token 
            $access_token = $request->header('access_token');
                if ($access_token != null) {

        $user = User::where('access_token', $access_token)->first();

        if ($user) {
            return $next($request);
    } else {
        return response()->json([
            "msg" => "No data Founded",
        ], 404);
    }
        } else {
            return response()->json([
                "msg" => "access token not valid",
            ], 401);
        }
    }
}
