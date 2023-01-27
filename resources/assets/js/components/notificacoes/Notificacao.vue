<template>
   
      <li>
         <a href="#" class="dropdown-item"> 
            <span @click.prevent="markAsRead(notification.id)">Lida - </span>           

            {{ requerimento.tipo }} - {{ requerimento.sequencia }}
            
         </a>
      </li>
   
</template>
   

<script>
export default {
   props: ['notification'],
   
   computed: {
      requerimento(){
         //return this.notification.data;
         return this.notification.data.requerimento;
      }
   },   

   methods:{
      markAsRead(idNotification){
         this.$store.dispatch('markAsRead', {id: idNotification})
      },
   }
}
</script>


