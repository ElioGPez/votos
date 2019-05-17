import Vue from 'vue'
import Router from 'vue-router'
import Venta from '../components/Venta.vue'
import Compra from '../components/Compra.vue'
import ListadoVentas from '../components/ListadoVentas.vue'


Vue.use(Router)
export default new Router({

    routes : [
        {
            path : '/',
            name : 'venta',
            component: Venta

        },
        {
            path : '/compra',
            name : 'compra',
            component: Compra

        },
        {
            path : '/ventas',
            name : 'listado_ventas',
            component: ListadoVentas

        },
    ],
    mode : 'history'  //evita que aparezca el # en las rutas

})