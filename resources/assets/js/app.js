
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('gentelella');
require('./config');
require('./bootstrap-notify-3.1.3/dist/bootstrap-notify.min');

window.echarts 		= require('echarts');
window.swal         = require('sweetalert2'); 
window.icheck       = require('icheck-bootstrap');
window.Inputmask    = require('inputmask');
window.moment       = require('moment');
window.timepicker   = require('timepicker');
window.Swal         = require('sweetalert2'); 

require('parsleyjs'); //https://parsleyjs.org/doc/index.html
require('parsleyjs/dist/i18n/pt-br');
require('jquery-mask-plugin');
require('jquery.redirect'); //https://github.com/mgalante/jquery.redirect
require('./funcoes');
require('./scripts');

//import store from './vuex/store.js';

window.Vue = require('vue');

import Vuex from "Vuex";
import notifications from "./vuex/modulos/notifications";
Vue.use(Vuex);

const store = new Vuex.Store({
	modules: {
        notifications,
    }

})


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* Vue.component('example-component', require('./components/ExampleComponent.vue')); */

Vue.use(require('vue-moment'));
Vue.component('notificacoes', 		require('./components/notificacoes/Notificacoes.vue').default); 
Vue.component('notificacao', 		require('./components/notificacoes/Notificacao.vue').default); 

Vue.component('caixa', 				require('./components/dashboard/caixa.vue').default); 
Vue.component('nu_pjud', 			require('./components/nu_pjud.vue').default); 
Vue.component('nu_padm', 			require('./components/nu_padm.vue').default); 
Vue.component('Escolhe_processo', 	require('./components/Escolhe_processo.vue').default); 
Vue.component('vc_botao_adiciona', 	require('./components/comum/vc_botao_adiciona.vue').default); 
Vue.component('vc_modal', 			require('./components/comum/vc_modal.vue').default); 
Vue.component('vc_botao_ok_cancel', require('./components/comum/vc_botao_ok_cancel.vue').default); 
Vue.component('painel_paciente', 	require('./components/comum/painel_paciente.vue').default); 
Vue.component('painel_acompanhamento', 	require('./components/comum/painel_acompanhamento.vue').default); 

const app = new Vue({
	el: '#app',
	store,
});

