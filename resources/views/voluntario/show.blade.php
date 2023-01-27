@extends('gentelella.layouts.app')

@section('content')

<link href="{{ asset('css/tom-select.bootstrap5.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/filepreview.css') }}">

<div class="x_panel modal-content">
	<div class="x-title">
		<h2>Informações</h2>
		<div class="clearfix"></div>
	</div>

	<div class="form-group row">
		<div class="col-md-3 col-sm-3" style="float: left!important">
			<div class="wrapper">
			   <div class="image">
				@if (isset($voluntario->image))
					<img class="img" src="{{asset('storage/voluntarios/'.$voluntario->image)}}">  
				@else
					<img class="img" >
				@endif
			   </div>
			   <div class="content">
				  <div class="icon" style="padding-left: 45%;">
					 <i class="fas fa-cloud-upload-alt"></i>
				  </div>
				  <div class="text" style="padding-bottom: 70px;">
					Nenhum Arquivo Selecionado
				  </div>
			   </div>
			   <div id="cancel-btn">
				  <i class="fas fa-times"></i>
			   </div>
			   <div class="file-name">
				  File name here
			   </div>
			</div>
			<input id="default-btn" name="image" type="file" style="display: none" hidden>
		</div>
		   
		<div class=" form-group col-md-9 col-sm-9 col-xs-12">
			<label class="control-label" >Nome</label>
			<input type="text" id="nome" class="form-control" placeholder="Nome" name="nome" minlength="4" maxlength="100" value="{{$voluntario->nome}}" disabled required>	
		</div>

		<div class="form-group col-md-2 col-sm-2 col-xs-12 ">
			<label class="control-label" for="nascimento">Nascimento</label>
			<input required class="form-control datepicker" name="data_de_nascimento" id="data-de-nascimento" type="date" value="{{$voluntario->data_de_nascimento}}" disabled placeholder="dd/mm/aaaa" >
		</div>

		<div class="form-group col-md-2 col-sm-2 col-xs-12">
			<label class="control-label" for="sexo">Sexo</label>
			<select name = "sexo" id="sexo" disabled class="form-control  selectpicker error" 
				data-style="select-with-transition has-dourado" required >
				<option selected value="{{$voluntario->sexo}}">{{$voluntario->sexo}}</option>
				<option >Feminino</option>
				<option >Masculino</option>
			</select>
		</div>

		<div class="form-group col-md-2 col-sm-2 col-xs-12">
			<label class="control-label" for="ts">Tipo Sang.</label>
			<select id="rh_fator" name="tipo_sanguineo" disabled class="form-control" required>
				<option selected value="{{$voluntario->tipo_sanguineo}}">{{$voluntario->tipo_sanguineo}}</option>
				<option >A+</option>
				<option >A-</option>
				<option >B+</option>
				<option >B-</option>
				<option >AB+</option>
				<option >AB-</option>
				<option >O+</option>
				<option >O- </option>
			</select>
		</div>

		<div class="form-group col-md-3 col-sm-3 col-xs-12">
			<label class="control-label" for="ts">Nível de Instrução:</label>
			<select id="nv_instruction" name="nivel_instrucao" disabled class="form-control" required>
				<option selected value="{{ $voluntario->nivel_intrucao }}" >{{ $voluntario->nivel_intrucao }}</option>
				<option>Fundamental - Incompleto</option>
				<option>Fundamental - Completo</option>
				<option>Médio - Incompleto</option>
				<option>Médio - Completo</option>
				<option>Superior - Incompleto</option>
				<option>Superior - Completo</option>
			</select>
		</div>

		<div class=" form-group col-md-4 col-sm-4 col-xs-12">
			<label class="control-label">Email</label>
			<input type="email" id="email" name="email" placeholder="Email" disabled maxlength="50" class="form-control" value="{{$voluntario->email}}" required>
		</div>
		
		<div class="form-group col-md-2 col-sm-2 col-xs-12 ">
			<label class="control-label" for="telefone">Celular</label>
			<input type="text" id="telefone" name="telefone" placeholder="(21)XXXXX-XXXX" disabled maxlength="14" class="form-control" value="{{$voluntario->telefone}}" required>
		</div>

		<div class="form-group col-md-3 col-sm-3 col-xs-12 ">
			<label class="control-label" for="cpf">CPF</label>
			<input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" pattern=".{14,}" disabled maxlength="14" class="form-control" value="{{$voluntario->cpf}}" required>
		</div>
	</div>
	
	<div class="ln_solid"> </div>
							
	<h4 >Endereço</h4>
	<br/>
	{{-- ENDEREÇO --}}
	<div class="form-group row">
		<div class="form-group col-md-2">
			<label class="col-md-1 control-label" for="cep">CEP</label>
			<input type="text" id="cep" name="cep" placeholder="00000-000"  maxlength="9" disabled class="form-control" value="{{$voluntario->cep}}" required>
		</div>
		
		<div class="form-group col-md-5">
			<label class="col-md-1 control-label" for="municipio">Município</label>
			<input id="municipio" name="municipio" type="text" placeholder="Municipio" disabled class="form-control" value="{{$voluntario->municipio}}" required>
		</div>
		
		<div class="form-group col-md-5">
			<label class="col-md-1 control-label" for="bairro">Bairro</label>
			<input id="bairro" name="bairro" type="text" placeholder="Bairro" disabled class="form-control" minlength="4" maxlength="30" value="{{$voluntario->bairro}}" required>
		</div>
	</div>

	<div class="form-group row">
		<div class="form-group col-md-6">
			<label class="col-md-1 control-label" for="endereco">Endereço</label>
			<input id="endereco" name="endereco" type="text" class="form-control" minlength="4" disabled maxlength="100" value="{{$voluntario->endereco}}" required>
		</div>
	
		<div class="form-group  col-md-4">
			<label class="col-md-1 control-label" for="complemento">Complemento</label>
			<input id="complemento" name="complemento" type="text" class="form-control" maxlength="100" disabled value="{{$voluntario->complemento}}">
		</div>
	</div>


	<div class="clearfix"></div>
	<div class="ln_solid"> </div>

	<div class="row">
		<div class=" form-group col-md-12 col-sm-12 col-xs-12">
			<label class="control-label" >Profissão:</label>
			<select name="profissao_id[]" id="profissao_id" disabled multiple class="form-control">
				@foreach ($voluntario->profissoes as $proffis)
					<option value="{{$proffis->id}}" selected>{{$proffis->nome}}</option> 
				@endforeach
			</select>
		</div>
	</div>

	<div class="row">
		<div class=" form-group col-md-12 col-sm-12 col-xs-12">
			<label class="control-label" >Experiêcia:</label>
			<select name="experiencia_id[]" id="experiencia_id" disabled multiple class="form-control">
				@foreach ($voluntario->experiencias as $exps)
					<option value="{{$exps->id}}" selected>{{$exps->nome}}</option> 
				@endforeach
			</select>
		</div>
	</div>     

		
	</div>	

@endsection

@push('scripts')
<script src="{{ asset('js/tom-select.complete.min.js') }}"></script>
<script type="text/javascript">
	new TomSelect('#profissao_id',{
		maxOptions: 150,
		sortField: {
			field: 'text',
			direction: 'asc'
		}
	});

	new TomSelect('#experiencia_id',{
		maxOptions: 150,
		sortField: {
			field: 'text',
			direction: 'asc'
		}
	});

</script>
@endpush