<!DOCTYPE html>
<html lang="pt-br">
	@section('htmlheader_title', 'Login')
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>SIRVODEC</title>
	
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" rel="stylesheet">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
		
		{{-- datatables --}}
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/zf/dt-1.10.18/r-2.2.2/datatables.min.css"/>
	
			{{-- bootstrap-datetimepicker --}}
			{{-- <link rel="stylesheet" href="{{ asset('/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}">       --}}
		
			{{-- jquery-timepicker --}}
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/timepicker@1.11.14/jquery.timepicker.min.css">       
			
			<link rel="stylesheet" href="{{ url(mix('/css/app.css')) }}">      
	</head>

	<body class="login">

		<div id="app" style="background-color: white; "> 
			<a class="hiddenanchor" id="signup"></a>
			<a class="hiddenanchor" id="signin"></a>
			<div class="cor_fundo_roxo" style="width:100%; height:150px; text-align: center;">
				<img class="logo_topo" src="{{ asset("img/logoretangular.jpg") }}">
			</div>
			<div id="app">
				@include('flash-message')
		
		
				@yield('content')
			</div>
			{{-- <div class="login_wrapper"> --}}
			<div class="logindiv">
				{{--  login  --}}
				<div class="animate form login_form">
					<section class="login_content">
						<form method="POST" action="{{ route('login') }}">
							{{ csrf_field() }}
							
							<h1 class="cor_texto_roxo">SIRVODEC - Sistema de rede de voluntários da Defesa Civíl</h1>
							
							<div class="form-group row">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Email:</label>
								<div class="col-md-10 col-sm-10 col-xs-12">
									<input type="email" name="email" id="email_fake" autocomplete="off" style="display: none;" />
  								
									<input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required >
									@if ($errors->has('email'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif	
								</div>
							</div>
							
							<div class="form-group row">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="password">Senha:</label>
								<div class="col-md-10 col-sm-10 col-xs-12">
										<input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="off">
								
										@if ($errors->has('password'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
										@endif
								</div>
							</div>

							
							<div>
								<button type="submit" class="btn btn-default submit">
									Login
								</button>               
								
								
							</div>
							
							<div class="clearfix"></div>
							
							
						</form>
					</section>
				</div>
		
			</div>
			<footer class="rodape ">
				<div class="separator">
							
					<h5><a href="http://devs.mesquita.rj.gov.br/" target="_blank"><i style=" color:black" class="fab fa-free-code-camp"></i></a> Equipe de Desenvolvimento de Sistemas</h5>
					<h6> Subsecretaria da Tecnologia da Informação - Prefeitura Municipal de Mesquita - RJ </h6>
					<h6> Rua Arthur Oliveira Vecchi, 120 - Centro - Mesquita - RJ - CEP: 26553-080</h6>
				</div>
			</footer>
		</div>

		<script src="{{ url(mix('/js/app.js'))}}"></script>
		<script src="{{ asset('/js/components.js')}}"></script>

		{{-- <script src="{{ asset('js/sweetalert2.js') }}"></script> --}}

		{{-- Vanilla Masker --}}
		<script src="{{ asset('js/vanillaMasker.min.js') }}"></script>


		<script>

			$("#modulo").focus();
			$().ready(function() {
				//mensagens de sucesso
			
				@if (session('erro'))
					funcoes.notificationRight("top", "right", "danger", "{{ session('erro') }}"); 
				@endif
			
							
			});
			
		</script>


		
		

	</body>
</html>


