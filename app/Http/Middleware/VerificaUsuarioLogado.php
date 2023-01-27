<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Hash;

class VerificaUsuarioLogado
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
        $user = User::where('email', $request->email)->first();

		if ( $user->ativo ){

			if ( count($user->roles) > 0){

				if (Auth::attempt($credentials)) {
		
					//dd(Auth::user()->hasRole('LOGIN') );
					/* $usuario_logado = Auth::user();
					$retorno = DB::connection('mysql_sisseg')->select("select consulta_role($usuario_logado->id , 'SCP', 'LOGIN') as retorno"); */
					//dd($retorno[0]->retorno);
			
					return redirect()->intended('/');
		
				}else{
		
					return redirect()->back()->with('erro','Acesso Negado, Email ou senha invalida');
		
				}
			}else{
		
				return redirect()->back()->with('erro','Voce não tem acesso ao sistema');

			}
	
		}else{
			return redirect()->back()->with('erro','Usuário desativado para esse sistema!');

		}
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

