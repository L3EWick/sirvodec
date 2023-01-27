@extends('gentelella.layouts.app')


@section('content')
<div class="x_panel modal-content">
    <div class="x_title">
       <h2>Nova Profissão</h2>
       <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
        <form action="{{url('/profissao')}}"  method="POST">
            {{ csrf_field() }}
                <div class="row ">
                    <div class="col-md-4 col-sm-12  form-group">
                        <input type="text" name="nome" placeholder="Nome da Profissão" class="form-control" autofocus required>
                    </div>

                </div>
                <div class="card-footer text-center">
                    <button type="submit" id="btn_salvar" class="btn btn-primary">Salvar</button>
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