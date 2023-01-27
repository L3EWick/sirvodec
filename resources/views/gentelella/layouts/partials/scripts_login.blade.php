<script src="{{ url(mix('/js/app.js'))}}"></script>
<script src="{{ asset('/js/components.js')}}"></script>

{{-- <script src="{{ asset('js/sweetalert2.js') }}"></script> --}}

{{-- Vanilla Masker --}}
<script src="{{ asset('js/vanillaMasker.min.js') }}"></script>


<script>

	$().ready(function() {
	
		@if ($errors->any())
         @foreach ($errors->all() as $error)
				new PNotify({
					title: 'Oh No!',
					text: "{{ $error }}",
					type: "error",
					styling: 'fontawesome',
					desktop: {
						desktop: true,
					}
				});
         @endforeach
      @endif

		$('#rb_escolhe_login_email').change(function(){
			$('#email').attr('type', 'email');
			VMasker ($("#email")).unMask();
		}); 
      $('#rb_escolhe_login_email').change(function(){
			$('#email').attr('type', 'text');
			VMasker ($("#email")).maskPattern("999.999.999-99");
		}); 
	});
	
</script>

