@extends('gentelella.layouts.app')


@section('content')
<link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
<link href="{{ asset('css/gallery.css') }}" rel="stylesheet" />

<div class="x_panel modal-content">
    <div class="x_title">
       <h2>Novo(a) Voluntário</h2>
       <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
        <form action="{{url("eventos/$evento->id")}}"  method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
                <div class="form-group row">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label class="form-label fw-normal" for="nomeCompleto">Titulo do Evento:</label>
                        <input required class="form-control" name="nome" type="text" id="nome" placeholder="Titulo do Evento" maxlength="96" value="{{$evento->nome}}">
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label class="form-label fw-normal" for="data">Data do Evento:</label>
                        <input required class="form-control" name="data" type="date" id="data" placeholder="Data do Evento" value="{{$evento->data}}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="form-label fw-normal" for="nomeCompleto">Descriçao do Evento:</label>   
                        <textarea class="form-control" id="nome" rows="3"  name="descricao">{{$evento->descricao}}</textarea>
                    </div>
                </div>
                
                <div class="row"> 
                    @foreach($evento->evento_images as $images)
                        <div class="imagem_relatorio imagem_{{ $images->id }} form-group col-md-2 col-sm-2 col-xs-2">
                            <div class="fileinput-new thumbnail">
                                <img src="{{ URL('storage/evento/') . '/' . $images->image }}" class="img_rel" width="300" height="200" style="display: initial;max-width: 100%;height: inherit;margin-right: initial;margin-left: inherit;"/>
                            </div>
                            <button data-id="{{ $images->id }}" class="btn btn-dange btn_excluir_imagem">Deletar</button>
                        </div>
                    @endforeach
                </div>
                
                <div class="form-group">
                    <div class="form-group">
						<label for="document">Imagens</label>
						<div class="needsclick dropzone" id="document-dropzone">

						</div>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function() {
            $("button.btn_excluir_imagem").click(function(e) {
                e.preventDefault();
                console.log("Chamou a função de deletar");
                let id = $(this).data('id');
                $.post("{{ url('evento/deleteimg') }}/" + id, {
                    id: id,
                    _method: "DELETE",
                    _token: "{{ csrf_token() }}",
                }, function(data) {
                    // Apagar a imagem na tela
                    $("div.imagem_relatorio.imagem_" + id).remove();
                    console.log("REQUEST ENVIADA", data);
                });
                return false;
            })
    });
</script>

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