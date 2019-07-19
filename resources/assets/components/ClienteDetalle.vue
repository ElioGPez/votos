<template>
  <div>
    <br>
    <div class="container">
      <h3 class="text-center">Detalle del Cliente</h3>
    <div id="info" class="row">
      <div class="col-12">
        <label for="">ID: {{cliente.id}}</label>
      </div>
      <div class="col-12">
        <label for="">Nombre: {{cliente.nombre}}</label>
      </div>
      <div class="col-12">
        <label for="">Direccion: {{cliente.direccion}}</label>
      </div>
      <div class="col-12">
        <label for="">Telefono: {{cliente.telefono}}</label>
      </div>
    </div>

    <!-- Segunda seccion -->

    <hr>
    <div id="info" class="card">
      <div>
        <p id="subtitulo">Ventas</p>
      </div>
      <form class="card-body">
        <div class="form-group">
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
                      <th>Id</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Total</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item of listado_ventas" :key="item.id">
                      <td data-label="Votos">
                        {{item.id}}
                      </td>
                      <td data-label="fecha">
                        {{item.fecha}}                     
                        </td>
                      <td data-label="Producto">
                        <span style="font-size: 15px;" v-if="item.estado == `pagada`" class="badge badge-success badge-pill">{{item.estado}}</span>
                        <span style="font-size: 15px;" v-if="item.estado == `impaga`" class="badge badge-danger badge-pill">{{item.estado}}</span>
                      </td>
                      <td data-label="Producto">${{item.total}}</td>
                      <td data-label="Producto">
                    <a href>
                      <router-link :to="{
                        name : 'venta_detalle',
                        params : {id : item.id}
                      }">
                      <button class="btn btn-warning">
                        <i class="far fa-edit"></i>
                      </button>        
                      </router-link>

                    </a>

                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </fieldset>
            <br>
          </div>
        </div>
      </form>
    </div>

    </div>


  </div>
</template>

<script>
const axios = require("axios");

export default {
  data() {
    return {
            cliente_id : this.$route.params.id,
            cliente : {},
            listado_ventas : {}
    }
  },
  methods: {
    obtenerCliente(){
        var url = "http://127.0.0.1:8000/api/cliente_detalle/"+this.cliente_id;
        console.log(url);
        axios.get(url).then(response => {
          console.log(response.data);
          this.cliente = response.data[0].cliente;
          this.listado_ventas = response.data[0].ventas;
        });
    }
  },
  created() {
    this.obtenerCliente();
  },
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
  font-weight: bold;
  padding: 5px;
}

label {
       font-weight: bold;
    font-size: 20px;
}
#info {
  background-color: rgb(235, 235, 235);
  margin-left: 20px;
  margin-right: 20px;
}
#subtitulo {
     background-color: rgb(190, 190, 190); 
       font-weight: bold;
    font-size: 25px;
    text-align: center;

}

#row2 {
  margin-left: 40px;
  margin-right: 40px;
}
</style>
