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
                          <img :src="item.imagen" width="50" height="50">
                        </td>
                        <td data-label="Producto">{{item.producto}}</td>
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
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="row">
                <div class="col">
                  <button
                    data-toggle="modal"
                    data-target=".bd-example-modal-lg"
                    type="button"
                    class="btn btn-danger"
                  >Mesa 1</button>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="row">
                <div class="col">
                  <button type="button" class="btn btn-danger">Mesa 2</button>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <div class="row">
                <div class="col">
                  <button type="button" class="btn btn-warning">Mesa Pool 1</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
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
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="row">
                  <div class="col-8">
                    <button type="button" class="btn btn-danger">Mesa 1</button>
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
                    <button type="button" class="btn btn-danger">Mesa 2</button>
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
                    <button type="button" class="btn btn-danger">Mesa 3</button>
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
                    <button type="button" class="btn btn-danger">Mesa 4</button>
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
            </div>
            <hr>
            <!-- -->
            <div align="center" style="background-color: rgb(173, 166, 166);">
              <label for>Mesas de Pool</label>
            </div>
            <br>
            <div class="row">
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
            </div>
            <!-- Fin -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">GUARDAR</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade bd-example-modal-lg"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div align="center" style="background-color: rgb(177, 18, 18);" class="modal-header">
            <h3>VENTAS PENDIENTES</h3>
          </div>
          <div>
            <label for>Venta Pendiente de Mesa 1</label>
          </div>
          <div class="modal-body">
            <!-- Listas Tipo y Categoria -->
            <div class="row">
              <div class="col">
                <select class="custom-select" id="exampleFormControlSelect1">
                  <option selected>Seleccione el Tipo de Producto...</option>
                  <option>Alimentos</option>
                  <option>Bebidas</option>
                </select>
              </div>
              <div class="col">
                <select class="custom-select" id="exampleFormControlSelect1">
                  <option selected>Seleccione la Categoria...</option>
                  <option>Sandwich</option>
                  <option>Pizzas</option>
                  <option>Al Plato</option>
                </select>
              </div>
            </div>
            <hr>
            <!-- Lista Producto y Boton -->
            <div class="form-group">
              <div class="row">
                <div class="col-10">
                  <select class="custom-select" id="exampleFormControlSelect1">
                    <option selected>Seleccione el Producto...</option>
                    <option>Pizza Comun</option>
                    <option
                      style="background:url(resources/assets/imagenes/hamburguesa.jpg) no-repeat center left; padding-left:20px;"
                    >Tu texto</option>
                  </select>
                </div>
                <div class="col-2">
                  <button type="button" class="btn btn-danger">AGREGAR</button>
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
                      <tr>
                        <td data-label="Votos">
                          <a href>
                            <button class="btn btn-warning">X</button>
                          </a>
                        </td>
                        <td data-label="imagen">
                          <img src="../imagenes/hamburguesa.jpg" width="50" height="50">
                        </td>
                        <td data-label="Producto">Pizza</td>
                        <td data-label="Producto">1</td>
                        <td data-label="Producto">$50</td>
                        <td data-label="Producto">$50</td>
                      </tr>

                      <!--tr>
                        <td data-label="Votos">
                          <a href>
                            <button class="btn btn-warning">X</button>
                          </a>
                        </td>
                        <td data-label="imagen">
                          <img src="../imagenes/hamburguesa.jpg" width="50" height="50">
                        </td>
                        <td data-label="Producto">Pizza</td>
                        <td data-label="Producto">1</td>
                        <td data-label="Producto">$50</td>
                        <td data-label="Producto">$50</td>
                      </tr-->
                    </tbody>
                  </table>
                </div>
              </fieldset>
              <div>
                <h4 align="right">TOTAL $500</h4>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger">REGISTRAR</button>
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
      mensaje_registro: ''
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
          linea.producto = item.producto;
          linea.cantidad = this.cantidad;
          linea.precio = item.precio;
          linea.subtotal = this.cantidad * item.precio;

          this.total += linea.subtotal;
          this.linea_venta.push(linea);
          this.limpiar();
        }
      }
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
    clienteSeleccionado(event){
      if(this.cliente){
        this.inputCliente = 0;
      }else{
        this.inputCliente = 1;
      }
    }
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
