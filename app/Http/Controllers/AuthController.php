<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class AuthController extends Controller
{
	public function login()
	{
		if(Auth::user())
		{
			return redirect()->intended('/');
		}
		
		return view('auth.login');
	}

	public function entrar(Request $request)
	{
		$request->validate([
			'email' 	=> 'required|email',
			'password'  => 'required',
		]);

		$credentials = ['email' => $request->email, 'password' => $request->password];

		
		if(Auth::attempt($credentials))
        {
			return redirect()->intended('/');
			// dd($credentials);
        }else{
			return redirect()->back()->with('error','Acesso Negado, Email ou senha invalida');
        }
	}

	public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }


	  

}

