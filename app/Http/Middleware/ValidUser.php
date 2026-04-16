<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// use Symfony\Component\HttpFoundation\Response;

// class ValidUser
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next, string $role): Response
//     {
//         // Assuming you are using Auth with Register model properly configured
//         if (Auth::check() && Auth::user()->role === 1) {
//             return redirect('/admindash');
//         }elseif(Auth::check() && Auth::user()->role === 0){
//             return redirect('/staffdash');

//         }elseif(Auth::check() && Auth::user()->role === 3){
//             return redirect('/doctordash');

//         }else{

//         return redirect('/login')->with('error', 'Unauthorized access.');

//         }

//     }
// }   

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $userRole = Auth::user()->role;

        // Agar "check" diya hai to bas role ke hisaab se redirect kar de
      if ($role === 'check') {
    if ($userRole == 1) {
        return redirect('/admindash');
    } elseif ($userRole == 0) {
        return redirect('/staffdash');
    } elseif ($userRole == 3) {
        return redirect('/doctordash'); // ✅ doctor allowed
    } else {
        return redirect('/login')->with('error', 'Unauthorized access.');
    }
}


        // Otherwise role ko match kare
        if ($userRole != (int)$role) {
            return redirect('/login')->with('error', 'Access denied.');
        }

        return $next($request); // ✅ continue kare request
    }
}

