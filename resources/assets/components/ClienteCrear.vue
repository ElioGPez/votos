<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Agregar Cliente</h3>
    </div>
    <br>

    <div id="cardlist" class="card">
      <form class="card-body">
        <div class="form-group">
          <!-- Datos -->

          <div>
            <label for>Nombre</label>
            <input v-model="nombre" type="text" class="form-control">
          </div>

          <div>
            <label for>Direccion</label>
            <input v-model="direccion" type="text" class="form-control">
          </div>

          <div>
            <label for>Telefono</label>
            <input v-model="telefono" type="text" class="form-control">
          </div>
          <!-- Fin Datos -->
          <br>
          <div id="btn">
            <button data-toggle="modal"  data-target="#mensajeModal"
            @click="registrarCliente()" type="button" class="btn btn-danger btn-lg btn-block">REGISTRAR</button>
          </div>
        </div>
      </form>
    </div>
    <br>
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
        {{mensaje}}
      </div>
      <div class="modal-footer">
        <button  
         type="button" class="btn btn-secondary" data-dismiss="modal">ACEPTAR</button>
      </div>
    </div>
  </div>
</div>
  </div>
</template>
<script>
const axios = require("axios");


export default {
  data() {
    return {
      url: null,

      nombre : '',
      direccion : '',
      telefono : '',
      mensaje : ''
    };
  },
  methods: {
    registrarCliente(){
      let datos = new FormData();
      datos.append('nombre',this.nombre);
      datos.append('direccion',this.direccion);
      datos.append('telefono',this.telefono);
     // datos.append('subcategoria_id',this.categoria);

        var urlProducto = "api/cliente";
        axios
          .post(urlProducto, 
            datos
          )
          .then(response => {
            console.log("Producto Agregado!!");
            this.mensaje = "CLIENTE AGREGADO!!"
            this.limpiar();
            /*this.limpiarRegistro();
            this.mensaje_registro = "Producto Agregado!!";*/
          });
    },
    limpiar(){
      this.nombre = '';
      this.direccion = '';
      this.telefono = '';
      this.url = null;
    },

  }
};
</script>

<style>
label {
  text-align: center;
}
</style>
