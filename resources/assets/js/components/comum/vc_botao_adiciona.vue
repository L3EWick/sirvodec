<template>
	<div>
		<a v-bind:href="url" 
			class=" btn btn-primary btn-md   pull-right btn-adiciona" 
			data-toggle="tooltip"  
			data-placement="bottom" 
			v-bind:title="descricao">
			<span class="fa fas fa-plus-circle cor">  </span>
			<span class="descricao cor"> Novo </span>
		</a>
	  <div class="clearfix"></div>
	</div>
</template>

<script>
	export default {
		mounted() {
			console.log('Component mounted.')
		},

		props: ['url','descricao'],
		
	}
</script>

<style>
	.btn-adiciona{
		text-align: center;
		font-size: 13px;
		line-height: 1.428571429;
		border-radius: 10px;
		
    padding-top: 4px;
    padding-bottom: 4px;
    padding-left: 8px;
    padding-right: 8px;

	}

	.cor{
		color: currentColor!important;
	}

	.descricao {
    	font-size: 14px !important;
	 	padding-right: 10px !important;
	}
</style>
