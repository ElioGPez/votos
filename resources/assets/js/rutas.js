import Vue from 'vue'
import Router from 'vue-router'
import Venta from '../components/Venta.vue'
import Compra from '../components/Compra.vue'
import ListadoVentas from '../components/ListadoVentas.vue'
import VentaDetalle from '../components/VentaDetalle.vue'
import CompraDetalle from '../components/CompraDetalle.vue'
import ListadoCompras from '../components/ListadoCompras.vue'
import Producto from '../components/Producto.vue'
import ProductoCrear from '../components/ProductoCrear.vue'
import Insumo from '../components/Insumo.vue'
import InsumoCrear from '../components/InsumoCrear.vue'
import InsumoModificar from '../components/InsumoModificar.vue'
import ProductoModificar from '../components/ProductoModificar.vue'
import Informe from '../components/Informe.vue'
import Gasto from '../components/Gasto.vue'
import GastoCrear from '../components/GastoCrear.vue'
import GastoModificar from '../components/GastoModificar.vue'
import GastoRegistro from '../components/GastoRegistro.vue'
import GastoDetalle from '../components/GastoDetalle.vue'
import Cliente from '../components/Cliente.vue'
import ClienteCrear from '../components/ClienteCrear.vue'
import ClienteModificar from '../components/ClienteModificar.vue'

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
            path : '/venta_detalle/:id',
            name : 'venta_detalle',
            component: VentaDetalle

        },
        {
            path : '/compra_detalle/:id',
            name : 'compra_detalle',
            component: CompraDetalle

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
            path : '/producto_modificar/:id',
            name : 'producto_modificar',
            component: ProductoModificar
        },
        {
            path : '/insumo_modificar/:id',
            name : 'insumo_modificar',
            component: InsumoModificar
        },
        {
            path : '/insumo',
            name : 'insumo',
            component: Insumo
        },
        {
            path : '/insumo_crear',
            name : 'insumo_crear',
            component: InsumoCrear
        },
        {
            path : '/gasto',
            name : 'gasto',
            component: Gasto
        },
        {
            path : '/gasto_crear',
            name : 'gasto_crear',
            component: GastoCrear
        },
        {
            path : '/gasto_modificar',
            name : 'gasto_modificar',
            component: GastoModificar
        },
        {
            path : '/gasto_registro',
            name : 'gasto_registro',
            component: GastoRegistro
        },
        {
            path : '/gasto_detalle',
            name : 'gasto_detalle',
            component: GastoDetalle
        },
        {
            path : '/informe',
            name : 'informe',
            component: Informe
        },
        {
            path : '/cliente',
            name : 'cliente',
            component: Cliente
        },
        {
            path : '/cliente_crear',
            name : 'cliente_crear',
            component: ClienteCrear
        },
        {
            path : '/cliente_modificar/:id',
            name : 'cliente_modificar',
            component: ClienteModificar
        },
    ],
    mode : 'history'  //evita que aparezca el # en las rutas

})
