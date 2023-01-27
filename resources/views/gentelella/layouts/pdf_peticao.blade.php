<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>@section('title') @show</title>

		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" rel="stylesheet">
	
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
	
		{{-- datatables --}}
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/zf/dt-1.10.18/r-2.2.2/datatables.min.css"/>
	

		<link rel="stylesheet" href="{{ asset('css/pdf.css') }}">

	</head>
	<body>
		<div id= "app"> </div>
		<!-- Conteúdo -->
	
		@yield('conteudo')  

		<button type="button" class="print btn btn-danger" style="left: 1rem; position: fixed; top: 6rem;" id="btn_cancel">
			<span class="fa fa-times" aria-hidden="true"></span>
			<span >Fechar</span>
		</button>
		
		<button type="button" class="print btn btn-primary" id="btn_print">
			<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
			<span >Imprimir</span>
		</button>


	</body>

	<script src="{{ url(mix('/js/app.js'))}}"></script>
	<script src="{{ asset('/js/components.js')}}"></script>
	
	<script type="text/javascript">
		var bottom = 0; /* Position of first page number - 0 for bottom of first page */
		var pagNum = 2; /* First sequence - Second number */
		$(document).ready(function() {
			/* For each 10 paragraphs, this function: clones the h3 with a new page number */
			$("tr:nth-child(30n)").each(function() {
				bottom -= 110;
				botString = bottom.toString();
				var $counter = $('h3.pag1').clone().removeClass('pag1');
				$counter.css("bottom", botString + "vh");
				numString = pagNum.toString();
				$counter.addClass("pag" + numString);
				($counter).insertBefore('.insert');
				pagNum = parseInt(numString);
				pagNum++; /* Next number */
			});
		
			var pagTotal = $('.pag').length; /* Gets the total amount of pages by total classes of paragraphs */
			pagTotalString = pagTotal.toString();
		
			$("h3[class^=pag]").each(function() {
				/* Gets the numbers of each classes and pages */
				var numId = this.className.match(/\d+/)[0];
				document.styleSheets[1].addRule('h3.pag' + numId + '::before', 'content: " ' + numId + ' de ' + pagTotalString + '";');
			});
		});

		$('#btn_print').on('click', function() {

			window.print();
			return false;
		});


		$('#btn_cancel').on('click', function() {
			window.close();
			/* window.history.back(); */
		});
	</script>
</html>