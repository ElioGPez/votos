<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Registro de Compras</h3>
    </div>
      <div id="card" class="card">
        <form class="card-body">
          <div class="form-group">

            <!-- Lista Producto y Boton -->
            <div class="form-group">
              <div class="row">
                <div class="col-1">
                  <label for="Insumo">Insumo</label>
                </div>
                <div class="col-11">
                  <select class="custom-select" v-model="producto">
                    <option value="0" selected>Seleccione el Insumo...</option>
                    <option v-for="producto in productos" :key="producto.id" :value=producto.id>Producto: {{producto.producto}}- Descripcion: {{producto.descripcion}}</option>
                  </select>
                </div>
                <!--div class="col-2">
                  <button type="button" class="btn btn-danger" @click="agregarProducto()">AGREGAR</button>
                </div-->
              </div>
              <hr>
              <div class="row">
                <div class="col-2">
                  <label for="cantidad">Cantidad (unidades/kg)</label>
                </div>
                <div class="col-3">
                  <input v-model="cantidad" type="number" class="form-control">
                </div>                
                <div class="col-2">
                  <label for="cantidad">Costo (unitario)</label>
                </div>
                <div class="col-3">
                  <input v-model="costo" type="number" class="form-control">
                </div>
                <div class="col-2">
                  <button type="button" class="btn btn-danger" @click="agregarProducto()">AGREGAR</button>
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
                      <tr v-for="linea in linea_compra" :key="linea.id">
                        <td data-label="Votos">
                          <a href>
                            <button class="btn btn-danger">Eliminar</button>
                          </a>
                        </td>
                        <td data-label="imagen">
                          <img :src="'/images/'+linea.imagen" width="50" height="50">
                        </td>
                        <td data-label="Producto">{{linea.producto.producto}}</td>
                        <td data-label="Producto">{{linea.cantidad}}</td>
                        <td data-label="Producto">{{linea.precio}}</td>
                        <td data-label="Producto">{{linea.subtotal}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </fieldset>
              <div>
                <h4 align="right">TOTAL ${{total}}</h4>
              </div>
              <div id="btn">
                <button @click.prevent="registrarCompra()" type="button" class="btn btn-danger btn-lg btn-block">REGISTRAR</button>
              </div>
            </div>
          </div>
        </form>
      </div>

  </div>
</template>

<script>
  const axios = require('axios');

  export default {
   created: function(){
      this.getProductos();
    },
   data() {
     return {
       categorias: [],
       subcategoria: [],
       productos: [],
       linea_compra: [],
       producto: '0',
       cantidad: '',
       costo: '',
       total: 0,
     }
   },
   methods: {
     /*getCategoria: function(){
       var urlCategoria = 'api/categoria';
       axios.get(urlCategoria).then(response=>{
         this.categorias = response.data;
       });
     },
     getSubCategorias: function(event){
       var urlSubCategoria = 'api/sub_categoria/'+event.target.value;
       if (event.target.value!=0) {
         axios.get(urlSubCategoria).then(response=>{
           this.subcategoria = response.data;
         });
       }
     },*/
     getProductos: function(){
       var urlProducto = 'api/insumos';
         axios.get(urlProducto).then(response=>{
           this.productos = response.data;
         });
     },
     agregarProducto: function(){
       // console.log(this.producto);
       for(var i of this.productos){
         if (this.producto == i.id) {
           var linea = new Object();
           linea.id = i.id;
           linea.producto = i;
           linea.cantidad = this.cantidad;
           linea.precio = i.precio;
           linea.imagen = i.imagen;
           linea.subtotal = this.cantidad*i.precio;

           this.total +=linea.subtotal;
           this.linea_compra.push(linea);

           this.limpiarAgregar();
         }
       }
     },
     limpiarAgregar (){
       this.producto = '0';
       this.cantidad = '';
       this.costo = '';
     },
     registrarCompra(){
      if (this.linea_compra.length != 0) {
        var url = "api/compra";
        axios
          .post(url, {
            linea_compra: this.linea_compra,
            total: this.total
          })
          .then(response => {
            console.log(response.data);
            this.limpiarRegistro();
          });
      }
     },
    limpiarRegistro(){
       this.limpiarAgregar();
       this.linea_compra = [];
       this.total = 0;
    }
   }
  }

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

#card {
  background-color: rgb(235, 235, 235);
    margin-left: 45px;
  margin-right: 45px;
}

#row2 {
  margin-left: 40px;
  margin-right: 40px;
}
</style>
