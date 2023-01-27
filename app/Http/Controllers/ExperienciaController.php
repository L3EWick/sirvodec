<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experiencia;

class ExperienciaController extends Controller
{
    public function index ()
    {
        $experiencias = Experiencia::all();
       
        return view('experiencia.index',compact('experiencias'));
    }

    public function create ()
    {

        return view('experiencia.create');

    }

    public function store (Request $request)
    {
        // dd($request->all());

        $experiencia = new Experiencia;

        $experiencia->nome = $request->nome;

        $experiencia->save();




        return redirect()->route('experiencia.index');
    }


    public function destroy($id)
	{

		$experiencia = Experiencia::find($id);

		$experiencia->delete();


	}

    public function edit($id){

        $experiencia = Experiencia::find($id);
		
        
        
        return view('experiencia.edit', compact('experiencia'));





    }
    public function update(Request $request, $id){
        
        $experiencia = Experiencia::find($id);
        $experiencia->nome = $request->nome;

        $experiencia->save();
    
        return redirect()->route('experiencia.index');
    }
}
