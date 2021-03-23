<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CompanyEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(Auth::check()){
        if(auth()->user()->Uprawnienia == 3){
        return $next($request);
        }
      }
        return redirect("/home")->with('error', 'Nie masz uprawnień do przeglądania tej strony');
      }
    }
