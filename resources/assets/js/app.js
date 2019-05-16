const Home = {template : '<h2> Home </h2>'}
const About = {template : '<h2> Acerca de </h2>'}

const routes = [
    {path: '/', component: Home},
    {path: '/about', component: About},
]

const router = new VueRouter({
    routes    
})

new Vue({
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