<template>
	<div>
		<label class="control-label col-md-1 col-sm-1 col-xs-12" for="nu_pjud">Numero:</label>
		<div class="col-md-2 col-sm-2 col-xs-12">
			<input type="text" id="nu_pjud" class="form-control" name="nu_pjud" required="" v-mask="'#######-##.####'" >
		</div>

		<div class="col-md-1 col-sm-1 col-xs-6">
			<input type="text" id="nu_estado_pjud" class="form-control" name="nu_estado_pjud" required="" 
			value=".8.19." v-mask="'.#.##.'"
			style="font-size: 20px;border: 0px;padding-left: 0px;padding-right: 0px;text-align: center;">
		</div>

		<div class="col-md-1 col-sm-1 col-xs-6">
			<input type="text" id="nu_comarca_pjud" class="form-control" name="nu_comarca_pjud" required="" v-mask="'####'">
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
