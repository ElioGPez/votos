import Vue from 'vue'
import Router from 'vue-router'
import Venta from '../components/Venta.vue'
import Compra from '../components/Compra.vue'
import ListadoVentas from '../components/ListadoVentas.vue'
import VentaDetalle from '../components/VentaDetalle.vue'
import ListadoCompras from '../components/ListadoCompras.vue'
import Producto from '../components/Producto.vue'
import ProductoCrear from '../components/ProductoCrear.vue'
import ProductoModificar from '../components/ProductoModificar.vue'
import Informe from '../components/Informe.vue'

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
        {
            path : '/venta_detalle',
            name : 'venta_detalle',
            component: VentaDetalle

        },
        {
            path : '/compras',
            name : 'listado_compras',
            component: ListadoCompras
        },
        {
            path : '/producto',
            name : 'producto',
            component: Producto
        },        
        {
            path : '/producto_crear',
            name : 'producto_crear',
            component: ProductoCrear
        },         
        {
            path : '/producto_modificar',
            name : 'producto_modificar',
            component: ProductoModificar
        },        
        {
            path : '/informe',
            name : 'informe',
            component: Informe
        }
    ],
    mode : 'history'  //evita que aparezca el # en las rutas

})