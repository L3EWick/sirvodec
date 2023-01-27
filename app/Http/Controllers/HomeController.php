<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller
{
 	
	public function index()
	{
		return view('home');
	}

	public function embreve($rotina)
	{
		return view ('embreve');
	}

}
