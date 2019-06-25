<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Listado de Compras</h3>
    <div class="row">
      <div class="col-2 row">
        <div class="col"><label for="">FILTRAR POR FECHAS</label></div>
      </div>
      <div class="col-4 row">
        <div class="col-6" align="right"><label for="">Desde</label></div>
        <div class="col-6"><input v-model="fecha_desde" class="form-control" type="date" id="example-datetime-local-input"></div>
      </div>
      <div class="col-4 row">
        <div class="col-6" align="right"><label for="">Hasta</label></div>
        <div class="col-6"><input v-model="fecha_hasta" class="form-control" type="date" id="example-datetime-local-input"></div>
      </div>
      <div class="col-2" align="center">
          <button @click.prevent="obtenerComprasFechas()" style="margin:3px;" align="right" class="btn btn-danger">FILTRAR</button>
      </div>
    </div>
    </div>


    <div id="cardlist" class="card">
      <div>
        <router-link style="color:white;" to="/compra">
          <button style="margin:3px;" align="right" class="btn btn-danger"><i class="fas fa-plus-circle"></i>Nueva compra</button>
        </router-link>
      </div>
      <form class="card-body">
        <div class="form-group">
          <!-- Tabla -->
          <div class="form-group">
            <fieldset>
              <div class>
                <table
                  class="table table-striped table-bordered table-condensed table-hover"
                  style="background-color:white">
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
                    <tr v-for="compra in compras.data" :key="compra.id">
                      <td data-label="Votos">{{compra.id}}</td>
                      <td data-label="imagen">{{compra.fecha}}</td>
                      <td data-label="Producto">{{compra.estado}}</td>
                      <td data-label="Producto">{{compra.total}}</td>
                      <td>
                        <a>
                      <router-link :to="{
                        name : 'compra_detalle',
                        params : {id : compra.id}
                      }">
                      <button class="btn btn-warning">
                        <i class="far fa-edit"></i>
                      </button>        
                      </router-link>
                        </a>
                        <a>
                          <button class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                          </button>
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
                  <pagination :data="compras" @pagination-change-page="getCompras"></pagination>            

      <!-- <div class="col-md-5">
        <pre>
          {{compras}}
        </pre>
      </div> -->
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
        {{mensaje}}
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
const axios = require('axios');

export default {
 created: function(){
    this.getCompras();
  },
 data() {
   return {
     compras: {},
      fecha_desde : '',
      fecha_hasta : '',
      mensaje : ''
   }
 },
 methods: {
   getCompras: function(page = 1){
     var urlCompras = 'api/compra?page=' + page;
     axios.get(urlCompras).then(response=>{
       this.compras = response.data;
     });
   },
    obtenerComprasFechas(){
      var desde = new Date(this.fecha_desde);
      var hasta = new Date(this.fecha_hasta);


      if(this.fecha_desde=='' || this.fecha_hasta==''){
            $('#mensajeModal').modal('show');
            this.mensaje = 'Los campos DESDE y HASTA no deben estar vacios!';
      }else
      if(desde.getTime()>hasta.getTime()){
            $('#mensajeModal').modal('show');
            this.mensaje = 'El campo DESDE no puede ser mayor que el campo HASTA';
      }else{
        var url = "api/compra/"+this.fecha_desde+'/'+this.fecha_hasta;
        axios.get(url).then(response => {
          this.compras = response.data;
          console.log(this.compras);
        });}
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

#cardlist {
  background-color: rgb(235, 235, 235);
  margin-left: 45px;
  margin-right: 45px;
}

#row2 {
  margin-left: 40px;
  margin-right: 40px;
}
</style>
