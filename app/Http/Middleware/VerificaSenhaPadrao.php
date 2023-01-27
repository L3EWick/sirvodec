<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Hash;

class VerificaSenhaPadrao
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
        if( ! Auth::user() ){
            return redirect('/');
        };
        
        if (Hash::check(retiraMascaraCPF(Auth()->user()->cpf), Auth()->user()->password))
        {
            return redirect('/alterasenha');
        }else{
            return $next($request);
        }
        
    }
}


//075.857.927-60
//52700941004