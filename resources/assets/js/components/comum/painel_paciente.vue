<template>
	<div class="row">
		<div class="col-md-6" >
			<table class="table table-bordered tabela_compacta_vue">
				<tr><td><b>Prontuário</b></td> 		<td> {{paciente['prontuario']}} </td></tr>
				<tr><td><b>SUS</b></td>				<td> {{paciente['sus']}} </td></tr>
				<tr><td><b>CPF</b></td>				<td> {{paciente['cpf']}} </td></tr>
				<tr><td><b>Nome</b></td> 			<td> {{paciente['nome']}} </td></tr>
				<tr><td><b>Nascimento</b></td>		<td>{{ paciente['nascimento'] | moment("DD/MM/YYYY") }} </td></tr>
				
				<tr v-if="paciente['obito'] == 1"><td><b>Óbito</b></td>		
					<td v-if="paciente['dt_obito'] != null"> 	{{ paciente['dt_obito'] | moment("DD/MM/YYYY") }} </td>
					<td v-else-if="paciente['obito'] == 1"> 	Óbito com data não informada </td>
					<td v-else> --- </td>
				</tr>
			</table>
		</div>

		<div class="col-md-6" >
			<table class="table table-bordered tabela_compacta_vue">

				<tr><td><b>Endereço</b></td> 			<td>{{paciente['logradouro']}}, nº 
															{{paciente['numero']}} - 
															{{paciente['bairro']}} - 
															{{paciente['complemento']}}</td></tr>

				<tr><td><b>Telefone 1</b></td>			<td>{{paciente['telefone1']}}</td></tr>
				<tr><td><b>Telefone 2</b></td>			<td>{{paciente['telefone2']}}</td></tr>
				<tr><td><b>Telefone 3</b></td>			<td>{{paciente['telefone3']}}</td></tr>

			</table>
		</div>
	</div>
	
</template>

<script>
	export default {
		mounted() {
			//console.log('Component mounted.')
		},
	
		props: ['paciente'],
		
   		
	}
	
</script>

<style media="screen">
	.tabela_compacta_vue td {
		font-size: 12px !important;
		padding-bottom: 2px !important;
		padding-top: 2px !important;
		vertical-align: middle !important;
		border: 1px solid #ddd;
		padding: 8px;
    	line-height: 1.42857143;
	}
</style>
