@extends('gentelella.layouts.app')


@section('content')
<div class="x_panel modal-content">
    <div class="x_title">
       <h2>Eventos</h2>
       <ul class="nav navbar-right panel_toolbox">
          <a href="{{url('eventos/create')}}" class="btn-circulo btn  btn-success btn-md  pull-right " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Nova Sala"> Novo Evento </a>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
         <table id="tb_eventos" class="table table-hover table-striped compact">
           


            <thead>
               <tr>
                  <th>Título do Evento</th>
                  <th>Data</th>
                 
                  <th>Ações</th>
                  {{-- <th>Foto</th> --}}

               </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                   <tr>
                     <td>
                        {{$evento->nome}}
                     </td> 
                     <td>
                        {{$evento->data}}
                     </td>
                  
                     <td>                         
                        <a
                           id="btn_edita_usuario"
                           class="btn btn-warning btn-xs action botao_acao btn_editar" 
                           href="{{action('EventosController@edit', $evento->id)}}"
                           title="Editar Funcionario">  
                           <i class="glyphicon glyphicon-pencil "></i>
                        </a>

                        <a
                           id="btn_edita_usuario"
                           class="btn btn-primary btn-xs action botao_acao btn_editar" 
                           href="{{action('EventosController@show', $evento->id)}}"
                           title="Editar Funcionario">  
                           <i class="glyphicon glyphicon-eye-open "></i>
                        </a>

                        <a
                           id="btn_exclui_funcionario"
                           class="btn btn-danger btn-xs action botao_acao btn_excluir"
                           data-evento = {{$evento->id}}>
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

         $(document).ready(function(){
            var tb_voluntarium = $("#tb_eventos").DataTable({
               language: {
                     'url' : '{{ asset('js/portugues.json') }}',
               "decimal": ",",
               "thousands": "."
               },
               stateSave: true,
               stateDuration: -1,
               responsive: true,
               columns: [
                  { data: 'nome', name: 'nome'},
                  { data: 'data', name: 'data'},
                  { data: 'acoes', name: 'acoes'},
               ],
               "columnDefs": [
                  { render: function ( data, type, row ){if( ! data ) {return "";}else{return (moment(data).format("DD/MM/YYYY"));}},targets: [1]},
               ]
            })
         });

   $("table#tb_eventos").on("click", "#btn_exclui_funcionario" ,function(){
      let id = $(this).data('evento');
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
                             $.post("{{ url('/eventos') }}/" + id, {
                             id: id,
                             _method: "DELETE",
                             _token: "{{ csrf_token() }}"
                            
                             }).done(function() {
                             location.reload();
                             });
                       
                          }
                       })                    
               });

	</script>
@endpush