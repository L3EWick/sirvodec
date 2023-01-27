@extends('gentelella.layouts.app')


@section('content')
<div class="x_panel modal-content">
    <div class="x_title">
      
       <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
        <form action="{{action('ProfissaoController@update', $profissao->id)}}"  method="POST">
            {{ csrf_field() }}
            @method('PATCH')
                <div class="row ">
                    <div class="col-md-4 col-sm-12  form-group">
                        <input type="text" name="nome" value="{{$profissao->nome}}" class="form-control" required>
                    </div>

                </div>
                <div class="card-footer text-center">
                    <button type="update" id="btn_salvar" class="btn btn-primary" >Salvar</button>
                </div>
             </form>
       </div>
    </div>
 </div>

@endsection

@push('scripts')

	<script type="text/javascript">


	</script>
@endpush