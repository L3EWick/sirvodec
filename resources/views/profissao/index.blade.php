@extends('gentelella.layouts.app')


@section('content')


<div class="x_panel modal-content">
    <div class="x_title">
       <h2>Profissões</h2>
       <ul class="nav navbar-right panel_toolbox">
          <a href="{{url('profissao/create')}}" class="btn-circulo btn  btn-success btn-md  pull-right " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Nova Sala"> Nova Profissão </a>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
         <table id="tb_Profissoes" class="table table-hover table-striped compact">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Açoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profissoes as $profissao)
                    <tr>
                        <td>{{$profissao->nome}}</td>
                 
                  <td> 
                    <a
                        id="btn_exclui_profissao"
                        class="btn btn-danger btn-xs action botao_acao btn_excluir"
                        data-profissao= {{$profissao->id}}>
                        <i class="glyphicon glyphicon-remove "></i>
                     </a>
                     {{-- <a
                     id="btn_edita_usuario"
                     class="btn btn-warning btn-xs action botao_acao btn_editar" 
                     data-valor="desabilitado" 
                     title="Editar Funcionario"
                     href="{{action('ProfissaoController@edit', $profissao->id)}}">  
                     <i class="glyphicon glyphicon-pencil "></i>
                  </a> --}}

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



$("table#tb_Profissoes").on("click", "#btn_exclui_profissao" ,function(){


let id = $(this).data('profissao');
               // console.log(id);
               let btn = $(this);
                Swal.fire({
                        title: 'Tem certeza?',
                        text: "Você não poderá reverter isso!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, tenho certeza!'
                          }).then((result) => {
                          if (result.isConfirmed) {
                             $.post("{{ url('/profissao') }}/" + id, {
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
            var tb_Profissoes = $("#tb_Profissoes").DataTable({
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