<template>
	<!-- 99/99999/99	
	mes/numero processo/ano -->

	<div>
		<label class="control-label col-md-1 col-sm-1 col-xs-12" for="tipo_processo">Tipo:</label>
		<div class="col-md-3 col-sm-3 col-xs-12">
			<select v-model="selected" type="text" id="tipo_processo" class="form-control" name="tipo_processo" required="" autofocus >
				<option value="">Selecione o Tipo...</option>
				<option value="PJUD"> Judicial </option>
				<option value="PADM"> Administrativo </option>
			</select>
		</div>

		<div class="form-group" v-if="selected === 'PJUD'">
			<nu_pjud></nu_pjud>
		</div>

		<div class="form-group" v-if="selected === 'PADM'">
			<nu_padm></nu_padm>
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

		data: function () {
			return {
				selected:''
				//mostra_caixa_numero_PJUD: true
			}
		}
		
	}
	
</script>
