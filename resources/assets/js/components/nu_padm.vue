<template>
	<!-- 99/99999/99	
	mes/numero processo/ano -->

	<div>
		<label class="control-label col-md-1 col-sm-1 col-xs-12" for="nu_padm">Numero:</label>
		<div class="col-md-2 col-sm-2 col-xs-12">
			<input type="text" id="nu_padm" class="form-control" name="nu_padm" required="" v-mask="'##/#####/##'"  >
		</div>
	</div>
</template>

<script>
	/* https://vuejs-tips.github.io/vue-the-mask/ */
	
	import {TheMask} from 'vue-the-mask'
	export default {
		mounted() {
			//console.log('Component mounted.')
		},
			
	}
	
</script>
