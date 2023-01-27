<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
  
		<title>SIRVODEC</title>
  
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" rel="stylesheet">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
				
		{{-- datatables --}}
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>
  
  		
	  	{{-- bootstrap-datetimepicker --}}
	  	<link rel="stylesheet" href="{{ asset('bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}"> 
	 
	 	{{-- jquery-timepicker --}}
	 	{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/timepicker@1.11.14/jquery.timepicker.min.css">       

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}

		
		{{-- icheck --}}
		{{-- <link rel="stylesheet" href="{{ asset('icheck/skins/flat/green.css') }}">  --}}
		<link rel="stylesheet" href="{{ asset('icheck/skins/all.css') }}"> 

		  
		 
	  	<link rel="stylesheet" href="{{ url(mix('/css/app.css')) }}">      
	</head>
	
	

	
	<body class="nav-md">
		<div class="container body" >
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0; text-align: center">
							
							
							<a href="{{ route('home')}}" class="site_title">
								{{-- <div class="profile_pic">
									<img src="{{asset('img/Brasao_guarda.png')}}" alt="..."  height="55">
								</div> --}}

								<span style="color: #bfa15f; ">SIRVODEC</span>
								<span style="font-size: 8px">V 0.5</span> 
							</a>
						</div>

						<div class="clearfix"></div>

						<!-- menu profile quick info -->
						{{-- @include('gentelella.layouts.partials.htmlprofile') --}}
						<!-- /menu profile quick info -->
						
						<!-- sidebar menu -->
						@include('gentelella.layouts.partials.sidebar')
						<!-- /sidebar menu -->

						<!-- /menu footer buttons -->

						@include('gentelella.layouts.partials.footerbuttons')

						<!-- /menu footer buttons -->
					</div>
				</div>
				
				
				<!-- top navigation -->
				@include('gentelella.layouts.partials.mainheader')
				<!-- /top navigation -->

				{{-- <div id="app"> --}}
					<!-- page content -->
					<div class="right_col" role="main" style="min-height: 717px;">
						<div class="page-title">
							<div class="title_left">
								<h3>@yield('page_title')</h3>
							</div>
							
							{{-- @include('gentelella.layouts.partials.htmlsearch') --}}
						</div>
						<div class="clearfix"></div>
							
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">

								@yield('content')
								
							</div>
						</div>           
					</div>
					<!-- /page content -->
				{{-- </div> --}}
				
				<footer>
					<div class="pull-right">
						© 2021 <a href="http://devs.mesquita.rj.gov.br/" target="_blank"><i style=" color:black" class="fab fa-free-code-camp"></i></a> Equipe de Desenvolvimento de Sistemas - Subsecretaria da Tecnologia da Informação - Prefeitura Municipal de Mesquita - RJ 
					</div>
					<div class="clearfix"></div>
				</footer>
			</div>
		</div>

		<script>
			//variáveis globais ao sistema
			let url_base    	= "{{ url("/") }}"; 
			let token       	= "{{ csrf_token() }}";
			let chamador 		= "{{ str_replace(url('/'), '', url()->previous()) }} ";
			let volta_pagina 	= "{{ url()->previous() }} ";
			let flagsUrl 		= '{{ env('APP_URL') }}'; //this is the url from .env file

			window.Laravel = {!! json_encode([
				'csrf' 		=> csrf_token(),
				'pusher'	=> [
					'key' 		=> config('broadcasting.connections.pusher.key'),
					'cluster' 	=> config('broadcasting.connections.pusher.options.cluster'),
				],
				'user' => auth()->check() ? auth()->user()->id : '',  

			]) !!}
			
		</script>   
		
		
		
		<!-- scripts -->
		<script src="{{ url(mix('/js/app.js'))}}"></script>
		
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<!-- Datatables -->
		{{-- <script src="{{asset('pdfmake/pdfmake.min.js')}}"></script>
		<script src="{{asset('pdfmake/vfs_fonts.js')}}"></script> --}}

		<link rel="icon" href="{{ URL::asset('/img/Brasao_guarda.png') }}" type="image/x-icon"/>
		
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>

		{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
		<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
		
		<script src="{{asset('datatables/datetime-moment.js')}}"></script>
		
		{{-- icheck --}}
		<script src="{{asset('icheck/icheck.min.js')}}"></script>
		
		
		
		<script src="{{ asset('/js/components.js')}}"></script>
		{{-- <script src="https://cdn.jsdelivr.net/npm/timepicker@1.11.14/jquery.timepicker.min.js"></script> --}}
		

		<script> 
			
			 
			//mensagens de sucesso
			@if (session('sucesso'))
				$.notify("{{ session('sucesso') }}", "success");
			@endif

			//mensagem para os erros de acesso pela ACL
			@if (session('erro_seguranca'))
				funcoes.notificationRight("top", "right", "danger", "{{ session('erro_seguranca') }}"); 
			@endif

			@if (session('erro'))
				funcoes.notificationRight("top", "right", "danger", "{{ session('erro') }}"); 
			@endif

			@if (session('error') )
				funcoes.notificationRight("top", "right", "danger", "{{ session('error') }}"); 
			@endif
			
			@if (session('warning') )
				funcoes.notificationRight("top", "right", "warning", "{{ session('warning') }}"); 
			@endif
			
			@if (session('sucesso_swal') )
				console.log('suasdasd');
				swal("{{ session('sucesso_swal') }}",' ','success');
			@endif
			
			
			//configura o toast
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 6000
			});


			// Testar se há algum erro, e mostrar a notificação 
			var tempo = 0;
			var incremento = 500;
			@if ($errors->any())
				@foreach ($errors->all() as $error)
					setTimeout(function(){funcoes.notificationRight("top", "right", "danger", "{{ $error }}"); }, tempo);
					tempo += incremento;
				@endforeach
			@endif
		</script>

		@stack('scripts')

		
		
	</body>
</html>
