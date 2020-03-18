<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Middleware\Auth;
class Admincount
{
    protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$users=\App\User::where('cargo','=',1)->count();
        if(Auth()->check()){
            //return view('usuarios');
            return redirect('usuarios');

        }else{
            return redirect('/home');
        }

        //return $next($request);
    }
}
