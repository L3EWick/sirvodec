<template>
	<div>
		<div class="ln_solid"> </div>
		<div class="col-md-3 col-md-offset-9 alinha_direita">
			<button id="btn_confirma" 
				type="submit" 
				class="btn btn-success  botoes"
				data-toggle="tooltip" 
				title="Confirma a operação">  
				Confirma    
			</button>							

			<a v-bind:href="url_cancela"
				id="btn_cancela"
				class="btn btn-danger  botoes" 
				data-toggle="tooltip" 
				title="Cancela e retorna a tela anterior">  
				Cancela
			</a>
		</div>
	</div>
	
</template>


<script>
	export default {
		props: ['url_cancela'],
	}
</script>

<style>
	.alinha_direita{
		text-align: right;
	}

	.botoes{
		border-radius: 10px;
	}
</style>
