@extends('gentelella.layouts.app')
@section('content')

<link href="{{ asset('css/tom-select.bootstrap5.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/filepreview.css') }}">

<div class="x_panel modal-content">
    <div class="x_title">
       <h2>Novo(a) Voluntário</h2>
       <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
        <form action="{{url('/voluntario')}}"  method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

                <div class="form-group row">
                    <div class="col-md-3 col-sm-3" style="float: left!important">
                        <div class="wrapper">
                           <div class="image">
                              <img class="img" >
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
                        <button onclick="defaultBtnActive()" id="custom-btn">Escolha uma Imagem</button>
                        <input id="default-btn" name="image" type="file" style="display: none" hidden>
                    </div>
                       
                    <div class=" form-group col-md-9 col-sm-9 col-xs-12">
                        <label class="control-label" >Nome</label>
                        <input type="text" id="nome" class="form-control" placeholder="Nome" name="nome" minlength="4" maxlength="100"
                       required >	
                    </div>

                    <div class="form-group col-md-2 col-sm-2 col-xs-12 ">
                        <label class="control-label" for="nascimento">Nascimento</label>
                        <input  class="form-control" name="data_de_nascimento" id="data_de_nascimento" type="date" placeholder="dd/mm/aaaa" required>
                    </div>

                    <div class="form-group col-md-2 col-sm-2 col-xs-12">
                        <label class="control-label" for="sexo">Sexo</label>
                        <select name="sexo" id="sexo" class="form-control  selectpicker error" 
                            data-style="select-with-transition has-dourado" required >
                            <option value="" selected>Escolha uma opção</option>
                            <option >Feminino</option>
                            <option >Masculino</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-2 col-xs-12">
                        <label class="control-label" for="ts">Tipo Sang.</label>
                        <select id="rh_fator" name="tipo_sanguineo" class="form-control" required>
                            <option value="" selected>Escolha uma opção</option>
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
                        <select id="nv_instruction" name="nivel_instrucao"  class="form-control" required>
                            <option value="" selected> Escolha uma opção</option>
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
                        <input type="email" id="email" name="email" placeholder="Email"  maxlength="50" class="form-control" required>
                    </div>
                    
                    <div class="form-group col-md-2 col-sm-2 col-xs-12 ">
                        <label class="control-label" for="telefone">Celular</label>
                        <input type="text" id="telefone" name="telefone" placeholder="(21)XXXXX-XXXX"  maxlength="14" class="form-control" required>
                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-xs-12 ">
                        <label class="control-label" for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" pattern=".{14,}" maxlength="14" class="form-control" required>
                    </div>
                </div>
                
                <div class="ln_solid"> </div>
                                        
                <h4 >Endereço</h4>
                <br/>
                {{-- ENDEREÇO --}}
                <div class="form-group row">
                    <div class="form-group col-md-2">
                        <label class="col-md-1 control-label" for="cep">CEP</label>
                        <input type="text" id="cep" name="cep" placeholder="00000-000"  maxlength="9" class="form-control" required>
                    </div>
                    
                    <div class="form-group col-md-5">
                        <label class="col-md-1 control-label" for="municipio">Município</label>
                        <input id="municipio" name="municipio" type="text" placeholder="Municipio"  class="form-control" required>
                    </div>
                    
                    <div class="form-group col-md-5">
                        <label class="col-md-1 control-label" for="bairro">Bairro</label>
                        <input id="bairro" name="bairro" type="text" placeholder="Bairro"  class="form-control" minlength="4" maxlength="30" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label class="col-md-1 control-label" for="endereco">Endereço</label>
                        <input id="endereco" name="endereco" type="text" class="form-control" minlength="4" maxlength="100" required>
                    </div>
                
                    <div class="form-group  col-md-4">
                        <label class="col-md-1 control-label" for="complemento">Complemento</label>
                        <input id="complemento" name="complemento" type="text" class="form-control" maxlength="100">
                    </div>
                </div>
           
        
            <div class="clearfix"></div>
            <div class="ln_solid"> </div>
        
            <div class="row">
				<div class=" form-group col-md-12 col-sm-12 col-xs-12">
					<label class="control-label" >Profissão:</label>
					<select name="profissao_id[]" id="profissao_id" multiple class="form-control">
						<option value="">Adicionar Profissões</option>  
						@foreach ($profissoes as $profissao)
							<option value="{{$profissao->id}}">{{$profissao->nome}}</option> 
						@endforeach
					</select>
				</div>
			</div>

            <div class="row">
				<div class=" form-group col-md-12 col-sm-12 col-xs-12">
					<label class="control-label" >Experiêcia:</label>
					<select name="experiencia_id[]" id="experiencia_id" multiple class="form-control">
						<option value="">Adicionar Experiêcia</option>  
						@foreach ($experiencias as $experiencia)
							<option value="{{$experiencia->id}}">{{$experiencia->nome}}</option> 
						@endforeach
					</select>
				</div>
			</div>     
            <div class="clearfix"></div>
            <div class="ln_solid"> </div>

            <br>
            <div class="card-footer text-center">
                <button type="submit" id="btn_salvar" class="btn btn-primary">Salvar</button>
            </div>
         </form>
   </div>
</div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/tom-select.complete.min.js') }}"></script>
<script src="{{ asset('js/vanillaMasker.min.js')}}"></script>
<script>
    const wrapper = document.querySelector(".wrapper");
    const fileName = document.querySelector(".file-name");
    const defaultBtn = document.querySelector("#default-btn");
    const customBtn = document.querySelector("#custom-btn");
    const cancelBtn = document.querySelector("#cancel-btn i");
    const img = document.querySelector(".img");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
    function defaultBtnActive(){
      defaultBtn.click();
      event.preventDefault();
    }
    defaultBtn.addEventListener("change", function(){
      const file = this.files[0];
      if(file){
        const reader = new FileReader();
        reader.onload = function(){
          const result = reader.result;
          img.src = result;
          wrapper.classList.add("active");
        }
        cancelBtn.addEventListener("click", function(){
          img.src = "";
          wrapper.classList.remove("active");
        })
        reader.readAsDataURL(file);
      }
      if(this.value){
        let valueStore = this.value.match(regExp);
        fileName.textContent = valueStore;
      }
    });
 </script>
    <script>
        VMasker($("#cpf")).maskPattern("999.999.999-99");
        VMasker($("#telefone")).maskPattern("(99)99999-9999");
        VMasker($("#cep")).maskPattern("99999-999");
    
    </script>
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