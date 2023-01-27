<template>
	<div class="form-group row fundo">
		<label><span class="label_campo">ORIGEM: 	</span><span class="label_dado">{{acompanhamento['origem']}}</span></label>	
		<label><span class="label_campo">AD: 		</span><span class="label_dado">{{acompanhamento['atendimento_domiciliar']}}</span></label>	
		<label><span class="label_campo">BASE:		</span><span class="label_dado">{{acompanhamento['base']}}</span></label>
		<label><span class="label_campo">SITUAÇÃO:	</span><span class="label_dado">{{acompanhamento['situacao']}}</span></label>
		<label><span class="label_campo">CID:		</span><span class="label_dado">{{acompanhamento['cid']['codigo']}}</span></label>

		<label><span class="label_campo">INÍCIO:	</span><span class="label_dado">{{ acompanhamento['dt_inicio'] | moment("DD/MM/YYYY") }} </span></label>
		<label><span class="label_campo">TÉRMINO:	</span>
			<span class="label_dado">
				<span v-if="acompanhamento['dt_termino'] != null">
					{{ acompanhamento['dt_termino'] | moment("DD/MM/YYYY") }} 
				</span>
				<span v-else>
					--- 
				</span>
			</span>
		</label>
	</div>
	
</template>

<script>
	export default {
		mounted() {
			//console.log('Component mounted.')
		},
	
		props: ['acompanhamento']
	
		
   		
	}
	
	
</script>

