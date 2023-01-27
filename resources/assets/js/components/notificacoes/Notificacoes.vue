<template>
   
      <li class="">
         <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Notificações ({{ notifications.length }})
            <span class=" fa fa-angle-down"></span>
         </a>
         <ul class="dropdown-menu dropdown-usermenu pull-right">
          
            <notificacao
               v-for="notification in notifications" 
               :key="notification.id"
               :notification="notification">

            </notificacao>
            <li>
               <a href="#" class="dropdown-item">
                  <span @click.prevent="markAllasRead()">Limpar Notificações </span>           

                  
               </a>
            </li>
           
         </ul>
      </li>
   
</template>

<script>

import Notificacao from './Notificacao.vue';

export default {
   created() {
      this.$store.dispatch('loadNotifications')
   },
    
   computed: {
      notifications (){
         //return this.notificationsItens;
         return this.$store.state.notifications.itens
      }
   },  

   methods:{
      markAllasRead(){
         this.$store.dispatch('markAllasRead')
      }

   } 

}
</script>


