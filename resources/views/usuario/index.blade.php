@extends('gentelella.layouts.app')

@section('content')

<div class="x_panel modal-content">
    <div class="x_title">
       <h2>Usuários</h2>
       <ul class="nav navbar-right panel_toolbox">
          <a href="{{url('user/create')}}" class="btn-circulo btn  btn-success btn-md  pull-right " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Novo Usuário"> Novo Usuário </a>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
         <table id="tb_user" class="table table-hover table-striped compact" style="width: 100%;">
            <thead>
               <tr>
                  <th>Nome do Usuário</th>
                  <th>E-mail</th>
                  <th>Ações</th>
               </tr>
            </thead>   
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
       </div>
    </div>
 </div>

@endsection

@push('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script> 
$(document).ready(function(){
      var tb_user = $("#tb_user").DataTable({
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