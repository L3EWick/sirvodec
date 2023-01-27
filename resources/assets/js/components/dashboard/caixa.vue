<template>
	<div class="col-md-2 col-sm-2 col-xs-6 tile_stats_count">
<!-- 		<p>{{this.$store.state.itens.teste}}</p> -->
		<span class="count_top"><i v-bind:class="icone"></i> {{titulo}}</span>

		<div class="count" style="text-align: center; font-size: 30px!important">{{ numero }}</div>
			<span class="count_bottom">
				<i v-bind:class="defineCorPercent">
					<i v-bind:class="defineIconePercent"></i>
					{{definePercent}}
				</i> 
				{{descricao}}
			</span>
	</div>
</template>

<script>
	export default {
		mounted() {
			//console.log('Component mounted.')
		},
	
		props: ['numero','icone','titulo','percent','descricao'],
		computed:{
			
			defineCorPercent: function () {
				//console.log(this.percent);
				if(this.percent < 0){ return "red" };
				if(this.percent > 0){ return "green"};
			},
			defineIconePercent: function () {
				if(this.defineCorPercent == "green"){return "fa fa-sort-asc";}
				if(this.defineCorPercent == "red"){return "fa fa-sort-desc";}
			},
			definePercent: function () {
				if(this.percent == null){return " ";}
				if(this.percent != ""){return this.percent +"% ";}
			}

		}  
   		
	}
	
</script>
