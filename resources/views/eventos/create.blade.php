@extends('gentelella.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dropzone.min.css')}}">

<div class="x_panel modal-content">
    <div class="x_title">
       <h2>Novo Evento</h2>
       <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
        <form action="{{url('/eventos')}}"  method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                
                <div class="form-group row">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label class="form-label fw-normal" for="nomeCompleto">Titulo do Evento:</label>
                        <input required class="form-control" name="nome" type="text" id="nome" placeholder="Titulo do Evento" maxlength="96">
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label class="form-label fw-normal" for="data">Data do Evento:</label>
                        <input required class="form-control" name="data" type="date" id="data" placeholder="Data do Evento">
                    </div>
                </div>
                       
                <div class="form-group row">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="form-label fw-normal" for="nomeCompleto">Descriçao do Evento:</label>   
                        <textarea class="form-control" id="nome" rows="3"  name="descricao"></textarea>
                    </div>
                </div>
                
                
                <div class="form-group">
				    <label for="document">Imagens</label>
					<div class="needsclick dropzone" id="document-dropzone">
					</div>
				</div>

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
<script src="{{ asset('js/dropzone.min.js')}}"></script>

<script type="text/javascript">
    var uploadedDocumentMap = {}
		Dropzone.options.documentDropzone = {
		    url: '{{ route('evento.storeImage') }}',
		    maxFilesize: 5, // MB
		    addRemoveLinks: true,
		    headers: {
		    	'X-CSRF-TOKEN': "{{ csrf_token() }}"
		    },
		    success: function (file, response) {
		    	$('form').append('<input type="hidden" name="imagens[]" value="' + response.name + '">')
		    	uploadedDocumentMap[file.name] = response.name
		    },
		    removedfile: function (file) {
		    	file.previewElement.remove()
		    	var name = ''
		    	if (typeof file.file_name !== 'undefined') {
		    	name = file.file_name
		    	} else {
		    	name = uploadedDocumentMap[file.name]
		    	}
		    	$('form').find('input[name="imagens[]"][value="' + name + '"]').remove()
				
                // console.log(name)
		    },
		    init: function () {
		    	@if(isset($project) && $project->document)
		    	var files =
		    		{!! json_encode($project->document) !!}
		    	for (var i in files) {
		    		var file = files[i]
		    		this.options.addedfile.call(this, file)
		    		file.previewElement.classList.add('dz-complete')
		    		$('form').append('<input type="hidden" name="imagens[]" value="' + file.file_name + '">')
		    	}
		    	@endif
		    }
		}
</script>

@endpush