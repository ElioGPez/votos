<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Registro de Ventas</h3>
    </div>
    <div id="row1" class="row">
      <div id="card" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <form class="card-body">
          <div>
            <h4 class="text-center">Alimentos y Bebidas</h4>
          </div>
          <div class="form-group">
            <!-- Cliente -->
            <div class="row">
              <div class="col">
                <div style="margin-left:30px;">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1"
                  v-model="cliente"
                  @change="clienteSeleccionado($event)"
                >
                <label class="form-check-label" for="exampleCheck1">Cliente</label>
                </div>
              </div>
              <div class="col">
                <select
                  class="custom-select"
                  :disabled="inputCliente == 1"
                  @change="establecerCliente($event)" v-model="cliente_id">
                  <option value="0" selected>Seleccione al Cliente...</option>
                  <option v-for="item of clientes" :key="item.id" :value="item.id">{{item.nombre}}</option>
                </select>
              </div>
            </div>
            <hr>
            <!-- Listas Tipo y Categoria -->
            <div class="row">
              <div class="col">
                <select class="custom-select" @change="obtenerCategorias($event)" v-model="tipo">
                  <option value="0" selected>Seleccione el Tipo de Producto...</option>
                  <option value="1">Alimentos</option>
                  <option value="2">Bebidas</option>
                </select>
              </div>
              <div class="col">
                <select
                  class="custom-select"
                  :disabled="validated == 1"
                  @change="obtenerProductos($event)"
                  v-model="categoria"
                >
                  <option value="0" selected>Seleccione la Categoria de Producto...</option>
                  <option v-for="item of categorias" :key="item.id" :value="item.id">{{item.nombre}}</option>
                </select>
              </div>
            </div>
            <hr>
            <!-- Lista Producto y Boton -->
            <div class="form-group">
              <div class="row">
                <div class="col-6">
                  <select class="custom-select" :disabled="validated2 == 1" v-model="producto">
                    <option value="0" selected>Seleccione el Producto...</option>
                    <option
                      v-for="item of productos"
                      :key="item.id"
                      :value="item.id"
                    >{{item.producto}}</option>
                  </select>
                </div>
                <div class="col-4">
                  <input
                    v-model="cantidad"
                    type="number"
                    class="form-control"
                    placeholder="Cantidad"
                  >
                </div>
                <div class="col-2">
                  <button @click="obtenerProducto()" type="button" class="btn btn-danger">AGREGAR</button>
                </div>
              </div>
            </div>
            <!-- Tabla -->
            <div class="form-group">
              <fieldset>
                <div class>
                  <table
                    class="table table-striped table-bordered table-condensed table-hover"
                    style="background-color:white"
                  >
                    <thead style="background-color: rgb(177, 18, 18);">
                      <tr>
                        <th>Acciones</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>SubTotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) of linea_venta" :key="item.id">
                        <td data-label="Votos">
                          <a href>
                            <button
                              class="btn btn-warning"
                              @click.prevent="linea_venta.splice(index,1);actualizar()"
                            >X</button>
                          </a>
                        </td>
                        <td data-label="imagen">
                          <img :src="'/images/'+item.imagen" width="50" height="50">
                        </td>
                        <td data-label="Producto">{{item.producto.producto}}</td>
                        <td data-label="Producto">{{item.cantidad}}</td>
                        <td data-label="Producto">{{item.precio}}</td>
                        <td data-label="Producto">{{item.subtotal}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </fieldset>
              <div>
                <h4 align="right">TOTAL ${{total}}</h4>
              </div>
              <div class="row">
                <div class="col-6" id="btn">
                  <button
                    type="button"
                    data-toggle="modal"
                    data-target="#exampleModalCenter"
                    class="btn btn-secondary"
                    
                  >PENDIENTE</button>
                </div>
                <div align="right" class="col-6" id="btn">
                  <button type="button" class="btn btn-danger" @click="registrarVenta()"
                  data-toggle="modal"  data-target="#mensajeModal">REGISTRAR</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div id="card" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <form class="card-body">
          <div>
            <h4 class="text-center">Ventas Pendientes</h4>
          </div>
          <div class="row">
            <div v-for="(mesa,index)  of mesas_pendientes" :key="index" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="row">
                <div class="col">
                  <button
                    @click.prevent="modalPendiente(mesa);indiceModal(index);"
                    data-toggle="modal"
                    data-target=".bd-example-modal-lg"
                    type="button"
                    class="btn btn-danger"
                  >{{mesa.mesa}}</button>
                </div>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
                      <Pool></Pool>

    <br>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div align="center" style="background-color: rgb(177, 18, 18);" class="modal-header">
            <h3>VENTAS PENDIENTES</h3>
          </div>
          <div>
            <label for>Asociar venta pendiente a alguna de las siguientes mesas</label>
          </div>
          <div class="modal-body">
            <div align="center" style="background-color: rgb(173, 166, 166);">
              <label for>Mesas</label>
            </div>
            <br>
            <div class="row">
                <div align="center" class="form-check col">
                  <input
                  v-model="opcion_mesa"
                  @change="tipoMesa(event)"
                   class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="mesa_normal" checked>
                </div>
                <div class="col"><label for="">Mesa: </label></div>
                <div class="col"><input class="form-control" min="1" max="9" pattern="[0-9]+" :disabled="mesa_normal == 0" v-model="mesa_normal_valor" type="number"></div>
            </div>
            <!-- div class="row">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="row">
                  <div class="col-8">
                    <button type="button" class="btn btn-danger">Mesa 1</button>
                  </div>
                  <div class="col-4">
                    <input
                      class="form-check-input"
                      type="checkbox"
                    :disabled="mesas_enable.mesa1 == 0"
                    v-model="mesas_check.mesa1"
                    >
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="row">
                  <div class="col-8">
                    <button type="button" class="btn btn-danger">Mesa 2</button>
                  </div>
                  <div class="col-4">
                    <input
                      class="form-check-input"
                      type="checkbox"
                    :disabled="mesas_enable.mesa2 == 0"
                    v-model="mesas_check.mesa2"
                    >
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="row">
                  <div class="col-8">
                    <button type="button" class="btn btn-danger">Mesa 3</button>
                  </div>
                  <div class="col-4">
                    <input
                      class="form-check-input"
                      type="checkbox"
                    :disabled="mesas_enable.mesa3 == 0"
                    v-model="mesas_check.mesa3"
                    >
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="row">
                  <div class="col-8">
                    <button type="button" class="btn btn-danger">Mesa 4</button>
                  </div>
                  <div class="col-4">
                    <input
                      class="form-check-input"
                      type="checkbox"
                    :disabled="mesas_enable.mesa4 == 0"
                    v-model="mesas_check.mesa4"
                    >
                  </div>
                </div>
              </div>
            </div -->
            <hr>
            <!-- -->
            <div align="center" style="background-color: rgb(173, 166, 166);">
              <label for>Mesas de Pool</label>
            </div>
            <br>
            <div class="row">
                <div  align="center" class="form-check col">
                  <input 
                  @change="tipoMesa(event)"
                  v-model="opcion_mesa"
                  class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="mesa_pool">
                </div>
                <div class="col"><label for="">Mesa: </label></div>
                <div class="col"><input  class="form-control" min="1" max="9" pattern="[0-9]+" :disabled="mesa_pool == 0" v-model="mesa_pool_valor" type="number"></div>
            </div>
            <!--div class="row">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="row">
                  <div class="col-8">
                    <button type="button" class="btn btn-warning">Mesa 1</button>
                  </div>
                  <div class="col-4">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="inlineCheckbox1"
                      value="option1"
                    >
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="row">
                  <div class="col-8">
                    <button type="button" class="btn btn-warning">Mesa 1</button>
                  </div>
                  <div class="col-4">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="inlineCheckbox1"
                      value="option1"
                    >
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="row">
                  <div class="col-8">
                    <button type="button" class="btn btn-warning">Mesa 1</button>
                  </div>
                  <div class="col-4">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="inlineCheckbox1"
                      value="option1"
                    >
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="row">
                  <div class="col-8">
                    <button type="button" class="btn btn-warning">Mesa 1</button>
                  </div>
                  <div class="col-4">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="inlineCheckbox1"
                      value="option1"
                    >
                  </div>
                </div>
              </div>
            </div -->

            <!-- Fin -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="mesaPendiente()">GUARDAR</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
    id="modal_pendiente"
      class="modal fade bd-example-modal-lg"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
      v-if="modal_estado == 1"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div align="center" style="background-color: rgb(177, 18, 18);" class="modal-header">
            <h3>VENTAS PENDIENTES</h3>
          </div>
          <div>
            <label for>Venta Pendiente en {{modal.mesa}}</label>
          </div>
          <div class="modal-body">
            <!-- Cliente -->
            <div class="row">
              <div class="col">
                <div style="margin-left:30px;">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1"
                  v-model="modal.check_cliente"
                  @change="clienteSeleccionadoModel($event)"
                >
                <label class="form-check-label" for="exampleCheck1">Cliente</label>
                </div>
              </div>
              <div class="col">
                <select
                  class="custom-select"
                  :disabled="modal.inputCliente == 1"
                  @change="establecerClienteModal($event)" v-model="modal.cliente_id">
                  <option value="0" selected>Seleccione al Cliente...</option>
                  <option v-for="item of clientes" :key="item.id" :value="item.id">{{item.nombre}}</option>
                </select>
              </div>
            </div>
            <hr>
            <!-- Listas Tipo y Categoria -->
            <div class="row">
              <div class="col">
                <select class="custom-select" @change="obtenerCategorias($event)" v-model="tipo">
                  <option value="0" selected>Seleccione el Tipo de Producto...</option>
                  <option value="1">Alimentos</option>
                  <option value="2">Bebidas</option>
                </select>
              </div>
              <div class="col">
                <select
                  class="custom-select"
                  :disabled="validated == 1"
                  @change="obtenerProductos($event)"
                  v-model="categoria"
                >
                  <option value="0" selected>Seleccione la Categoria de Producto...</option>
                  <option v-for="item of categorias" :key="item.id" :value="item.id">{{item.nombre}}</option>
                </select>
              </div>
            </div>
            <hr>
            <!-- Lista Producto y Boton -->
            <div class="form-group">
              <div class="row">
                <div class="col-6">
                  <select class="custom-select" :disabled="validated2 == 1" v-model="producto">
                    <option value="0" selected>Seleccione el Producto...</option>
                    <option
                      v-for="item of productos"
                      :key="item.id"
                      :value="item.id"
                    >{{item.producto}}</option>
                  </select>
                </div>
                <div class="col-4">
                  <input
                    v-model="cantidad"
                    type="number"
                    class="form-control"
                    placeholder="Cantidad"
                  >
                </div>
                <div class="col-2">
                  <button @click="obtenerProductoModal()" type="button" class="btn btn-danger">AGREGAR</button>
                </div>
              </div>
            </div>
            <!-- Tabla -->
            <div class="form-group">
              <fieldset>
                <div class>
                  <table
                    class="table table-striped table-bordered table-condensed table-hover"
                    style="background-color:white"
                  >
                    <thead style="background-color: rgb(177, 18, 18);">
                      <tr>
                        <th>Acciones</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>SubTotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item,index) of modal.linea_venta" :key="item.id">
                        <td data-label="Votos">
                          <a href>
                            <button
                              class="btn btn-warning"
                              @click.prevent="mesas_pendientes[indice_modal].linea_venta.splice(index,1);
                              actualizarPendiente();"
                            >X</button>
                          </a>
                        </td>
                        <td data-label="imagen">
                          <img :src="'/images/'+item.imagen" width="50" height="50">
                        </td>
                        <td data-label="Producto">{{item.producto.producto}}</td>
                        <td data-label="Producto">{{item.cantidad}}</td>
                        <td data-label="Producto">{{item.precio}}</td>
                        <td data-label="Producto">{{item.subtotal}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </fieldset>
              <div>
                <h4 align="right">TOTAL ${{modal.total}}</h4>
              </div>
              <div>
                <button type="button" class="btn btn-warning" @click="limpiarMesa()">Cancelar Venta</button>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-danger" @click="registrarVentaMesa()"
                  data-toggle="modal"  data-target="#mensajeModal">REGISTRAR</button>
          </div>
        </div>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MENSAJE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{mensaje_registro}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ACEPTAR</button>
      </div>
    </div>
  </div>
</div>

  </div>
</template>


<script>
const axios = require("axios");

export default {
  created() {
    this.obtenerClientes();
  }
  ,
  data() {
    return {
      tipo: "0",
      categorias: [],
      validated: 1,
      validated2: 1,
      productos: [],
      categoria: "0",
      producto: "0",
      linea_venta: [],
      total: 0,
      cantidad: 1,
      cliente:false,
      inputCliente: 1,
      clientes : [],
      cliente_id : '1',
      mensaje_registro: '',
      mesas_check : [
        {mesa1 : false},
        {mesa2 : false},
        {mesa3 : false},
        {mesa4 : false},
      ],
      mesas_pendientes : [],
      mesas_enable : [
        {mesa1 : 1},
        {mesa2 : 1},
        {mesa3 : 1},
        {mesa4 : 1},
      ],
      modal : [
        {mesa : ""},
        {check_cliente : false},
        {inputCliente : 1},
        {cliente_id : '1'},
        {total : 0},
        {linea_venta : []}
        ],
        modal_estado : 0,
        indice_modal : 0,
        mesa_normal_valor : 0,
        mesa_pool_valor : 0,
        mesa_pool : 0,
        mesa_normal : 1,
        opcion_mesa : "mesa_normal"
    };
  },
  methods: {
    obtenerClientes() {

        var urlClientes = "api/cliente";
        axios.get(urlClientes).then(response => {
          console.log(response.data);
          this.clientes = response.data;
        });
    },
    obtenerCategorias(event) {
      if (event.target.value != 0) {
        var urlCategorias = "api/sub_categoria/" + event.target.value;
        axios.get(urlCategorias).then(response => {
          this.categorias = response.data;
          this.validated = 0;
        });
      }
    },
    establecerCliente(){
      if (event.target.value != 0) {
        this.cliente_id = event.target.value;
      }
    },
    establecerClienteModal(){
      if (event.target.value != 0) {
        this.modal.cliente_id = event.target.value;
      }
    },
    obtenerProductos(event) {
      if (event.target.value != 0) {
        var urlProductos = "api/producto/" + event.target.value;
        axios.get(urlProductos).then(response => {
          this.productos = response.data;
          this.validated2 = 0;
        });
      }
    },
    obtenerProducto() {
      for (var item of this.productos) {
        if (this.producto == item.id) {
          var linea = new Object();
          linea.id = item.id;
          linea.imagen = item.imagen;
          linea.producto = item;
          linea.cantidad = this.cantidad;
          linea.precio = item.precio;
          linea.subtotal = this.cantidad * item.precio;
          linea.categoria_id = this.tipo;

          this.total += linea.subtotal;
          this.linea_venta.push(linea);
          this.limpiar();
          return;
        }
      }
    },
    obtenerProductoModal(){
      for (var item of this.productos) {
        if (this.producto == item.id) {
          var linea = new Object();
          linea.id = item.id;
          linea.imagen = item.imagen;
          linea.producto = item;
          linea.cantidad = this.cantidad;
          linea.precio = item.precio;
          linea.subtotal = this.cantidad * item.precio;
          linea.categoria_id = this.tipo;

          this.modal.total += linea.subtotal;
          console.log(this.indice_modal);
          this.mesas_pendientes[this.indice_modal].linea_venta.push(linea);
          this.mesas_pendientes[this.indice_modal].total = this.modal.total;
          this.mesas_pendientes[this.indice_modal].cliente_id = this.modal.cliente_id;
          this.limpiar();
          return;
        }
      }
    },
    tipoMesa(){
      if(this.opcion_mesa == "mesa_normal"){
        this.mesa_normal = 1;
        this.mesa_pool = 0; 
      }else{
        this.mesa_normal = 0;
        this.mesa_pool = 1; 
      }
    },
    indiceModal(index){
      this.indice_modal = index;
      console.log("indice: "+this.indice_modal);
    },
    limpiar() {
      this.cantidad = 1;
      this.producto = 0;
    },
    limpiarRegistro(){
      this.cantidad = 1;
      this.producto = 0;
      this.cliente_id = '1';
      this.linea_venta = [];
      this.total = 0;
    },
    actualizar() {
      this.total = 0;
      for (var item of this.linea_venta) {
        this.total += item.subtotal;
      }
    },
    actualizarPendiente() {
      this.mesas_pendientes[this.indice_modal].total = 0;
      for (var item of this.mesas_pendientes[this.indice_modal].linea_venta) {
        this.mesas_pendientes[this.indice_modal].total += item.subtotal;
        this.modal.total = this.mesas_pendientes[this.indice_modal].total;
      }
      this.modal_estado = 0;
      this.modal_estado = 1;
    },
    modalPendiente(mesa){
      this.modal_estado = 0;
      console.log(mesa);
      this.modal.total = mesa.total;
      this.modal.linea_venta = mesa.linea_venta;
      this.modal.mesa = mesa.mesa;
      this.modal.cliente_id = mesa.cliente_id;
      console.log("Pasa con valor del total del: "+this.modal.total);
      this.modal_estado = 1;
    },
    mesaPendiente(){
      var mesa = "Mesa "+ this.mesa_normal_valor;
      var esPool = false;
      if(this.mesa_pool == 1){
        esPool = true;
        mesa = "Mesa Pool "+ this.mesa_pool_valor;
      }
      var mesa1 = new Object();
          mesa1.total = this.total;
          mesa1.cliente_id = this.cliente_id;
          mesa1.linea_venta = this.linea_venta;
          mesa1.mesa = mesa;
          mesa1.esPool = esPool;
      this.mesas_pendientes.push(mesa1);
      this.limpiarRegistro();
      /*if(this.mesas_check.mesa1){
        var mesa1 = new Object();
          mesa1.total = this.total;
          mesa1.cliente_id = this.cliente_id;
          mesa1.linea_venta = this.linea_venta;
          mesa1.mesa = "Mesa 1";
      this.mesas_pendientes.push(mesa1);
      this.limpiarRegistro();
      this.mesas_enable.mesa1 = 0;
      }else
      if(this.mesas_check.mesa2){
        var mesa2 = new Object();
          mesa2.total = this.total;
          mesa2.cliente_id = this.cliente_id;
          mesa2.linea_venta = this.linea_venta;
          mesa2.mesa = "Mesa 2";
      this.mesas_pendientes.push(mesa2);
      this.limpiarRegistro();
      this.mesas_enable.mesa2 = 0;
      }else
      if(this.mesas_check.mesa3){
        var mesa3 = new Object();
          mesa3.total = this.total;
          mesa3.cliente_id = this.cliente_id;
          mesa3.linea_venta = this.linea_venta;
          mesa3.mesa = "Mesa 3";
      this.mesas_pendientes.push(mesa3);
      this.limpiarRegistro();
      this.mesas_enable.mesa3 = 0;
      }else
      if(this.mesas_check.mesa4){
        var mesa4 = new Object();
          mesa4.total = this.total;
          mesa4.cliente_id = this.cliente_id;
          mesa4.linea_venta = this.linea_venta;
          mesa4.mesa = "Mesa 4";
      this.mesas_pendientes.push(mesa4);
      this.limpiarRegistro();
      this.mesas_enable.mesa4 = 0;
      }*/
    },
    registrarVenta() {
      if (this.linea_venta.length != 0) {
        var urlVenta = "api/venta";
        axios
          .post(urlVenta, {
            cliente_id : this.cliente_id,
            linea_venta: this.linea_venta,
            total: this.total
          })
          .then(response => {
            console.log(response.data);
            this.limpiar();
            this.limpiarRegistro();
            this.mensaje_registro = "Venta REGISTRADA!!";
          });
      }
    },
    registrarVentaMesa(){
      console.log("Tamano: "+this.mesas_pendientes[this.indice_modal].linea_venta.length);
      if (this.mesas_pendientes[this.indice_modal].linea_venta.length != 0) {
        var urlVenta = "api/venta";
        axios
          .post(urlVenta, {
            cliente_id : this.mesas_pendientes[this.indice_modal].cliente_id,
            linea_venta: this.mesas_pendientes[this.indice_modal].linea_venta,
            total: this.mesas_pendientes[this.indice_modal].total
          })
          .then(response => {
            console.log(response.data);
            this.limpiar();
            this.limpiarRegistro();
            this.limpiarMesa();
            this.mensaje_registro = "Venta REGISTRADA!!";
          });
      }
    },
    limpiarMesa(){
      var mesa = this.mesas_pendientes[this.indice_modal].mesa;
              console.log(mesa);

      if(mesa == "Mesa 1"){
        console.log(mesa);
        this.mesas_enable.mesa1 = 1;
        this.mesas_check.mesa1 = 0;
      }else
      if(mesa == "Mesa 2"){
        this.mesas_enable.mesa2 = 1;
        this.mesas_check.mesa2 = 0;
      }else
      if(mesa == "Mesa 3"){
        this.mesas_enable.mesa3 = 1;
        this.mesas_check.mesa3 = 0;
      }else
      if(mesa == "Mesa 4"){
        this.mesas_enable.mesa4 = 1;
        this.mesas_check.mesa4 = 0;
      }
            this.mesas_pendientes.splice(this.indice_modal,1);
            $('#modal_pendiente').modal('hide');

    },
    clienteSeleccionado(event){
      if(this.cliente){
        this.inputCliente = 0;
      }else{
        this.inputCliente = 1;
      }
    },
    clienteSeleccionadoModel(event){
      if(this.modal.check_cliente){
        this.modal.inputCliente = 0;
      }else{
        this.modal.inputCliente = 1;
      }
    },
  }
};
</script>

<style>
.table td {
  text-align: center;
  font-weight: bold;
}
.table tr {
  text-align: center;
}
.table tr th {
  color: white;
}
h3 {
  background-color: rgb(177, 18, 18);
  color: white;
  padding: 5px;
}
h4 {
  background-color: rgb(173, 166, 166);
  padding: 5px;
}

label {
  font-weight: bold;
  text-align: center;
}
#cardlist {
  background-color: rgb(235, 235, 235);
  margin-left: 45px;
  margin-right: 45px;
}
#card {
  background-color: rgb(235, 235, 235);
}
#row1 {
  margin-left: 45px;
  margin-right: 45px;
}
#row2 {
  margin-left: 40px;
  margin-right: 40px;
}
input[type="checkbox"] {
  transform: scale(1.5);
}
</style>
