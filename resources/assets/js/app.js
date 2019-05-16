
window.Vue = require('vue');

Vue.component('app',require('../components/Home.vue'));
import router from './rutas';
const axios = require('axios');

const app = new Vue({
    router,
    el: '#main',
    created() {
    this.obtenerCategorias();   
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