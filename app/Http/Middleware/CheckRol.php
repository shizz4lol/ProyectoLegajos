<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;



class CheckRol{
 public function handle(Request $request, Closure $next, ...$roles): Response {

       if (!auth()->check()) {

           return redirect('/');

       }

       if (!in_array(auth()->user()->tipo_rol, $roles)) {

           abort(403);

       }


     return $next($request);
   }

}







