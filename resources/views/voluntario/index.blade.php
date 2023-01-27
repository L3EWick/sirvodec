@extends('gentelella.layouts.app')


@section('content')


<div class="x_panel modal-content">
    <div class="x_title">
       <h2>Voluntários</h2>
       <ul class="nav navbar-right panel_toolbox">
          <a href="{{url('voluntario/create')}}" class="btn-circulo btn  btn-success btn-md  pull-right " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Nova Sala"> Novo(a) Voluntário </a>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
         <table id="tb_voluntarium" class="table table-hover table-striped compact">
           


            <thead>
               <tr>
                  <th>Nome</th>
                  <th>Profissões</th>
                  <th>Experiência</th>
                  <th>Ações</th>
                  {{-- <th>Foto</th> --}}

               </tr>
            </thead>
            <tbody>
               @foreach ($voluntarios as $voluntario)
                   <tr>
                     <td>{{$voluntario->nome}}</td>
                     <td>
                        @foreach ($voluntario->profissoes as $profissoes)
                            {{$profissoes->nome}}
                            <br>
                        @endforeach
                     </td>
                     <td>@foreach ($voluntario->experiencias as $experiencias)
                        {{$experiencias->nome}}
                        <br>
                    @endforeach
                  </td>
                     <td> 
                     <a
                        id="btn_edita_usuario"
                        class="btn btn-warning btn-xs action botao_acao btn_editar" 
                        href="{{action('VoluntarioController@edit', $voluntario->id)}}"
                        title="Editar Funcionario">  
                        <i class="glyphicon glyphicon-pencil "></i>
                     </a>

                     <a
                        id="btn_vizualiza_usuario"
                        class="btn btn-primary btn-xs action botao_acao btn_vizualiza" 
                        href="{{action('VoluntarioController@show', $voluntario->id)}}"
                        title="Vizualizar Funcionario">  
                        <i class="glyphicon glyphicon-eye-open "></i>
                     </a>

                     <a
                        id="btn_exclui_funcionario"
                        class="btn btn-danger btn-xs action botao_acao btn_excluir"
                        data-voluntario = {{$voluntario->id}}
                        title="Apagar Funcionario">
                        <i class="glyphicon glyphicon-remove "></i>
                     </a>

                     </td> 
                   </tr>
               @endforeach

            </tbody>
        </table>
      
       </div>
    </div>
 </div>

@endsection

@push('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

$("table#tb_voluntarium").on("click", "#btn_edita_usuario",function(){
			
         let valor = $(this).data('usuario');
         let btn = $(this);
         
         if( valor == 'usuarium' )
         { 
            console.log('entrou')
           
         }
      });

  $("table#tb_voluntarium").on("click", "#btn_exclui_funcionario" ,function(){


 let id = $(this).data('voluntario');
				// console.log(id);
				let btn = $(this);
               Swal.fire({
                           title: 'Você tem certeza?',
                           text: "Você não poderá reverter isso!",
                           icon: 'warning',
                           showCancelButton: true,
                           confirmButtonColor: '#3085d6',
                           cancelButtonColor: '#d33',
                           confirmButtonText: 'Sim, delete isso!'
                           }).then((result) => {
                           if (result.isConfirmed) {
                              $.post("{{ url('/voluntario') }}/" + id, {
								      id: id,
								      _method: "DELETE",
                              _token: "{{ csrf_token() }}"
								     
							         }).done(function() {
								      location.reload();
							         });
                        
                           }
                        })
                     

  });

 $(document).ready(function(){
            var tb_voluntarium = $("#tb_voluntarium").DataTable({
               language: {
                     'url' : '{{ asset('js/portugues.json') }}',
               "decimal": ",",
               "thousands": "."
               },
               stateSave: true,
               stateDuration: -1,
               responsive: true,
            })
         });
	</script>
@endpush