
window.Vue = require('vue');

Vue.component('app',require('../components/Home.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('Pool',require('../components/Pool.vue'));
Vue.component('PoolListado',require('../components/PoolListado.vue'));

import router from './rutas';
const axios = require('axios');

import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

const app = new Vue({
    router,
    el: '#main',
    created() {
    //this.obtenerCategorias();   
    },
    data() {
        return {
             categorias : []
        }
    },
    methods: {
        obtenerCategorias: function(){
            var urlCategorias = 'categoria';
            axios.get(urlCategorias).then(response => {
                this.categorias = response.data
            });

        }    
    },
});