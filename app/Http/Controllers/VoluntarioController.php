<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Profissao;
use App\Models\Experiencia;
use App\Models\Voluntario;
use App\Models\Voluntario_profissao;
use App\Models\Voluntario_exp;

class VoluntarioController extends Controller
{
    public function index()
    {
        $voluntarios = Voluntario::with('experiencias', 'profissoes')->get();
        
        return view('voluntario.index', compact('voluntarios'));

        // return view('voluntario.index');
    }

    public function create()
    {
        $profissoes = Profissao::all();
        $experiencias = Experiencia::all();
        return view('voluntario.create',compact('profissoes','experiencias'));

    }
    
    public function store (Request $request)
    {
        
        // dd($request->all());

        $voluntario = new Voluntario;

        $voluntario->nome               = $request->nome;
        $voluntario->data_de_nascimento = $request->data_de_nascimento;
        $voluntario->cpf                = $request->cpf;
        $voluntario->tipo_sanguineo     = $request->tipo_sanguineo;
        $voluntario->endereco           = $request->endereco;
        $voluntario->cep                = $request->cep;
        $voluntario->bairro             = $request->bairro;
        $voluntario->municipio          = $request->municipio;
        $voluntario->email              = $request->email;
        $voluntario->telefone           = $request->telefone;
        $voluntario->nivel_intrucao     = $request->nivel_instrucao;
        $voluntario->complemento        = $request->complemento;
        $voluntario->image              = $request->image;    
        $voluntario->sexo               = $request->sexo;


        if($request->image != null){
            $salva_file = $request->image->store('public/voluntarios');
            $voluntario->image  =  substr($salva_file, 19);
        }
        
                
        $voluntario->save();
        
        if($request->profissao_id != null){
            foreach($request->profissao_id as $profissao_id)
            {
                $profissao = new Voluntario_profissao;

                $profissao->profissao_id = $profissao_id;
                $profissao->voluntario_id = $voluntario->id;
                $profissao->save();
            }
        }
        
        if($request->experiencia_id != null){
            foreach($request->experiencia_id as $experiencia_id)
            {

                $experiencia = new Voluntario_exp;

                $experiencia->experiencia_id = $experiencia_id;
                $experiencia->voluntario_id = $voluntario->id;
                $experiencia->save();
            }
        }
        return redirect()->route('voluntario.index');
    }

    public function destroy($id)
	{
		$voluntario = Voluntario::find($id);

		$voluntario->delete();


	}
    

    public function edit($id){

        $profissoes = Profissao::all();
        $experiencias = Experiencia::all();
		$voluntario = Voluntario::with('experiencias', 'profissoes')->find($id);
    
    
        return view('voluntario.edit', compact('voluntario','experiencias','profissoes'));
    }


    public function update(Request $request, $id){
        
		$voluntario = Voluntario::with('experiencias', 'profissoes')->find($id);

        $voluntario->nome = $request->nome;
        $voluntario->data_de_nascimento = $request->data_de_nascimento;
        $voluntario->cpf = $request->cpf;
        $voluntario->tipo_sanguineo = $request->tipo_sanguineo;
        $voluntario->endereco = $request->endereco;
        $voluntario->cep = $request->cep;
        $voluntario->bairro = $request->bairro;
        $voluntario->municipio = $request->municipio;
        $voluntario->email = $request->email;
        $voluntario->telefone = $request->telefone;
        $voluntario->nivel_intrucao = $request->nivel_instrucao;
        $voluntario->complemento = $request->complemento;
        $voluntario->sexo        = $request->sexo;
        
        $imagem_antiga = $voluntario->image;
        
        if($request->hasFile('image')) {

            unlink(storage_path('app/public/voluntarios/'.$imagem_antiga));

            $file = $request->file('image');
            $originalname = $file->getClientOriginalName();
            $filename = md5(microtime()).'_'.$originalname;
            $file->move('./storage/voluntarios', $filename);
            $voluntario->image = $filename;
        }
    
        $voluntario->save();
       
        $arr_exp = $request->experiencia_id;

        $arr_prof = $request->profissao_id;
        
        $voluntario->experiencias()->sync($arr_exp);

        $voluntario->profissoes()->sync($arr_prof);


        return redirect()->route('voluntario.index');
    

    }

    public function show($id){

		$voluntario = Voluntario::with('experiencias', 'profissoes')->find($id);
    
        return view('voluntario.show', compact('voluntario'));
        
    }
  
        
        
     
}
