<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profissao;

class ProfissaoController extends Controller
{
    public function index ()
    {

        $profissoes = Profissao::all();

        return view('profissao.index',compact('profissoes'));

    }

    public function create ()
    {
        return view('profissao.create');

    }

    public function store(Request $request)
    {

        $profissao = new Profissao;

        $profissao->nome = $request->nome;

        $profissao->save();

        return redirect()->route('profissao.index');    
    }


    public function destroy($id)
	{
		$profissaoum = Profissao::find($id);

		$profissaoum->delete();


	}

    public function edit($id){

        $profissao = Profissao::find($id);
		
        
        
        return view('profissao.edit', compact('profissao'));





    }
    public function update(Request $request, $id){
        
        $profissao = Profissao::find($id);
        $profissao->nome = $request->nome;

        $profissao->save();
    
        return redirect()->route('profissao.index');
    }
}
