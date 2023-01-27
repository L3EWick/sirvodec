<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Guarda;
use App\Models\User;

class ApiController extends Controller
{
	
    public function buscaCPF(Request $request)
	{
        
		$secretaria = DB::connection('mysql_sisseg')->table('secretarias')
                                                    ->select("id")
                                                    ->where('sigla','=', 'SEMSOP')
                                                    ->get();

        //return response()->json($secretaria[0]->id, 202);
        $secretaria_id = $secretaria[0]->id;

		$user = User::where('cpf', $request->cpf)->where('secretaria_id','=',$secretaria_id)->get();


		if(sizeof($user) > 0 ){
			return response()->json($user, 202);
		}else{
			return response()->json(null, 200);
		}
	}

}
