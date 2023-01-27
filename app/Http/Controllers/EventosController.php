<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Eventos;
use App\Models\Eventos_Images;


class EventosController extends Controller
{
   public function index() {


      $eventos = Eventos::all();
    
      return view('eventos.index', compact('eventos'));
   }

   public function create(){

      $eventos = Eventos::all();
      
      return view('eventos.create');

   }


   public function store(Request $request){

      $evento = new Eventos;

      $evento->nome       = $request->nome;
      $evento->descricao  = $request->descricao;
      $evento->data       = $request->data;

      // dd($request->all());
      $evento->fill($request->all());

      $evento->save();


      if(isset($request->imagens)) {
         $imagens_ids = [];

         foreach($request->imagens as $imagem){
            if($imagem !== null) {
               $img = Eventos_Images::create([
                  'eventos_id' => $evento->id,
                  'image'      => $imagem
               ]);
               $imagens_ids[] = $img->id;
            }
         }
      }

      foreach($request->input('imagens', []) as $file){
         $pasta_tmp = storage_path('app/public/evento/tmp/'.$file);

         $pasta_definitiva = storage_path('app/public/evento/'.$file);

         rename($pasta_tmp, $pasta_definitiva);

      }
     

      return redirect()->route('eventos.index');

   }
   
   public function destroy($id)
	{
		$evento = Eventos::find($id);

		$evento->delete();


	}
   public function edit($id){
     
      // $evento_images = Eventos_Images::all();
      
      $evento = Eventos::with('evento_images')->find($id);

      // dd($evento_images);
      
      return view('eventos.edit', compact('evento'));
  } 

   public function update(Request $request, $id){
      
      $evento = Eventos::find($id); //Não ta FUNCIONANDO

      $evento->nome       = $request->nome;
      $evento->descricao  = $request->descricao;
      $evento->data       = $request->data;

      $evento->fill($request->all());
		
		$evento->save();

      if(isset($request->imagens)) {
         $imagens_ids = [];

         foreach($request->imagens as $imagem){
            if($imagem !== null) {
               $img = Eventos_Images::create([
                  'eventos_id' => $evento->id,
                  'image'      => $imagem
               ]);
               $imagens_ids[] = $img->id;
            }
         }
      }

      foreach($request->input('imagens', []) as $file){
         $pasta_tmp = storage_path('app/public/evento/tmp/'.$file);

         $pasta_definitiva = storage_path('app/public/evento/'.$file);

         rename($pasta_tmp, $pasta_definitiva);
      }

      return redirect(url('/eventos'));
   }

   public function deleteimg ($id){

      $imagem = Eventos_Images::find($id);

      unlink(storage_path('app/public/evento/'.$imagem->image));

      $imagem->delete();

      return "IMAGEM DELETADA";
   }


   public function show($id){

      $evento_images = Eventos_Images::all();
      
      $evento = Eventos::with('evento_images')->find($id);

      // dd($evento_images);
      return view('eventos.show', compact('evento','evento_images'));

   }

   public function storeImage(Request $request){

      $path = storage_path('app/public/evento/tmp');

      if(!file_exists($path)) {
         mkdir($path, 007, true);
      }

      $file = $request->file('file');

      $name = uniqid(). '_' . trim($file->getClientOriginalName());

      $file->move($path, $name);

      return response()->json([
         'name' => $name,
         'original_name' => $file->getClientOriginalName(),
      ]);

   }




}

