
window.Vue = require('vue');

Vue.component('app',require('../components/Home.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));

import router from './rutas';
const axios = require('axios');

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