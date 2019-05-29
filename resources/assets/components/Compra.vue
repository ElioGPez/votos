<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Registro de Compras</h3>
    </div>
      <div id="card" class="card">
        <form class="card-body">
          <div class="form-group">
            <!-- Listas Tipo y Categoria -->
            <div class="row">
              <div class="col">
                <select class="custom-select"  @change="getSubCategorias($event)" >
                  <option selected >Seleccione el Tipo de Producto...</option>
                  <option v-for="categoria in categorias" :value=categoria.id >{{categoria.nombre}}</option>
                </select>
              </div>
              <div class="col">
                <select class="custom-select" @change="getProductos($event)">
                  <option selected>Seleccione la Categoria...</option>
                  <!-- <option>Sandwich</option> -->
                  <!-- <option>Pizzas</option> -->
                  <!-- <option>Al Plato</option> -->
                  <option v-for="sc in subcategoria" :value=sc.id>{{sc.nombre}}</option>
                </select>
              </div>
            </div>
            <hr>
            <!-- Lista Producto y Boton -->
            <div class="form-group">
              <div class="row">
                <div class="col-10">
                  <select class="custom-select" >
                    <option selected>Seleccione el Producto...</option>
                    <option v-for="producto in productos" :value=producto.id>{{producto.producto}} {{producto.descripcion}}</option>

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
                            <button class="btn btn-danger">Eliminar</button>
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

                      <tr>
                        <td data-label="Votos">
                          <a href>
                            <button class="btn btn-danger">Eliminar</button>
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
                    </tbody>
                  </table>
                </div>
              </fieldset>
              <div>
                <h4 align="right">TOTAL $500</h4>
              </div>
              <div id="btn">
                <button type="button" class="btn btn-danger btn-lg btn-block">REGISTRAR</button>
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
      this.getCategoria();
    },
   data() {
     return {
       categorias: [],
       subcategoria: [],
       productos: []
     }
   },
   methods: {
     getCategoria: function(){
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
     },
     getProductos: function(event){
       var urlProducto = 'api/producto/'+event.target.value;
       if (event.target.value!=0) {
         axios.get(urlProducto).then(response=>{
           this.productos = response.data;
         });
       }
     },
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
