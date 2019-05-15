new Vue({
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