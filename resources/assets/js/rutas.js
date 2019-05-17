import Vue from 'vue'
import Router from 'vue-router'
import Venta from '../components/Venta.vue'
import About from '../components/About.vue'


Vue.use(Router)
export default new Router({

    routes : [
        {
            path : '/',
            name : 'venta',
            component: Venta

        },
        {
            path : '/about',
            name : 'about',
            component: About

        },
    ],
    mode : 'history'  //evita que aparezca el # en las rutas

})