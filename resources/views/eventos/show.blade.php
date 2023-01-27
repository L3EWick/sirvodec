@extends('gentelella.layouts.app')
@section('content')

<div class="x_panel modal-content">
	<div class="x-title">
		<h2>{{$evento->nome}}</h2>
		<div class="clearfix"></div>
	</div>

	<div class="x_panel">
		<div class="x_content">
			{{-- <div class="x-title">
				<div class="col-md-6 col-sm-4 col-xs-12 text-left">
					<span class="section">Título do Evento</span>
					<h5>{{$evento->nome}}</h5>
				</div>
			</div> --}}
			
			<div class="x-title">
				<div class="col-md-12 col-sm-12 col-xs-12 ">
					
					<span class="section">Descriçao do Evento</span>
						
					<h5>{{$evento->descricao}}</h5>
					<br>
				</div>
			</div>
		
			<div class="x-title">
				<div class="col-md-12 col-sm-4 col-xs-12 text-left">
					<span class="section">Fotos do Evento</span>
					@foreach ($evento_images as $img)
						<div class="col-md-4 col-sm-2 col-xs-12 text-left"> 
							<img src="{{asset('storage/evento/'.$img->image)}}" alt="" title="profile image" style="width: 100x; height: 150px;"/>
						</div>
					@endforeach
				</div>
			</div>	

			

		</div>
	</div>
</div>	

@endsection

@push('scripts')

	<script type="text/javascript">


	</script>
@endpush