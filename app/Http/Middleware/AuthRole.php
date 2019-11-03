<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-03T19:04:57+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-03T19:05:56+00:00




namespace App\Http\Middleware;

use Closure;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, String $role)
     {
       if (!$request->user() || !$request->user()->hasRole($role)) {
         // return response('Unauthorized', 401);
         return redirect()->route('home');
       }
       return $next($request);
     }
 }
