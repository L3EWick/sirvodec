@extends('gentelella.layouts.app')

@section('content')

<div class="x_panel modal-content ">

	<div class="x_title">
	   <h2>Novo Funcionário </h2>
	   <div class="clearfix"></div>
	</div>

	<div class="x_panel ">
	   <div class="x_content">
	   		<form id="formulario_user" class="form-horizontal form-label-left" method="post" action="{{ route('user.store') }}">
				{{ csrf_field()}}
					<div class="form-group row">
						<div class=" form-group col-md-6 col-sm-6 col-xs-12">
							<label class="control-label" >Nome</label>
							<input type="text" id="name" class="form-control " name="name" minlength="4" maxlength="100" required >	
						</div>
            
                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
							<label class="control-label" for="email">Email</label>
							<input type="email" id="email" class="form-control" name="email" required>	
						</div>
				</div>
				{{-- BOTÕES --}}
				<div class="clearfix"></div>
				<div class="ln_solid"> </div>
					<div class="footer text-right">
            {{-- Voltar --}}
						<button id="btn_voltar" class="botoes-acao btn btn-round btn-primary" >
							<span class="icone-botoes-acao mdi mdi-backburger"></span>   
							<span class="texto-botoes-acao"> CANCELAR </span>
							<div class="ripple-container"></div>
						</button>
            {{-- Salvar --}}
						<button type="submit" id="btn_salvar" class="botoes-acao btn btn-round btn-success ">
							<span class="icone-botoes-acao mdi mdi-send"></span>
							<span class="texto-botoes-acao"> SALVAR </span>
							<div class="ripple-container"></div>
						</button>
					</div>
			</form>
	   </div>
	</div>
@endsection
@push('scripts')
	<script type="text/javascript">
	$(document).ready(function(){
    $("#btn_voltar").click(function(){
      event.preventDefault();
      window.location.href = "{{ URL::route('user.index') }}"; 
    });
  });
	</script>
@endpush