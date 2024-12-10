<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;


class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::where("email", "=","dhaliliakot@gmail.com")->first();
        if($user->email == "dhaliliakot@gmail.com") {
        return $next($request);
    }
    else{
        return redirect("/");
    }
   }
}
