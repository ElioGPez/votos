<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Modificar Cliente</h3>
    </div>
    <br>

    <div id="cardlist" class="card">
      <form class="card-body">
        <div class="form-group">
          <!-- Datos -->
          <div>
            <label for>Nombre</label>
            <input v-model="cliente.nombre" type="text" class="form-control">
          </div>

          <div>
            <label for>Descripcion</label>
            <input v-model="cliente.direccion" type="text" class="form-control">
          </div>

          <div>
            <label for>Precio</label>
            <input v-model="cliente.telefono" type="number" class="form-control">
          </div>
          <!-- Fin Datos -->
          <br>
          <div id="btn">
            <button  data-toggle="modal"  data-target="#mensajeModal"
 @click.prevent="modificarCliente()" type="button" class="btn btn-danger btn-lg btn-block">Modificar</button>
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
      cliente_id : this.$route.params.id,
      cliente : [],
      mensaje : ''
    };
  },
  created() {
    this.obtenerCliente();
  },
  methods: {
    obtenerCliente(){
        var url = "http://127.0.0.1:8000/api/cliente/"+this.cliente_id;
        console.log(url);
        axios.get(url).then(response => {
          console.log(response.data);
          this.cliente = response.data;
        });
    },
    modificarCliente(){
        var url = "http://127.0.0.1:8000/api/cliente/"+this.cliente.id;
        console.log(url);
        axios.put(url,this.cliente).then(response => {
          console.log(response.data);
                      this.mensaje = "CLIENTE MODIFICADO!!"

        });
    },
  }
};
</script>

<style>
label {
  text-align: center;
}
</style>
