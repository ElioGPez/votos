<template>
  <div>
    <br>
    <div class="container">
      <h3 class="text-center">Detalle de Venta</h3>
    <div id="info" class="row">
      <div class="col-12">
        <label for="">Fecha: {{venta[0].fecha}}</label>
      </div>
      <div class="col-12">
        <label for="">Estado: 
        <span style="font-size: 20px;" v-if="venta[0].estado == `pagada`" class="badge badge-success badge-pill">{{venta[0].estado}}</span>
        <span style="font-size: 20px;" v-if="venta[0].estado == `impaga`" class="badge badge-danger badge-pill">{{venta[0].estado}}</span>
      </label>
      </div>
      <div class="col-12">
        <label for="">Cliente: {{venta[0].cliente.nombre}}</label>
      </div>
      <div class="col-12">
        <label style="color: rgb(0, 175, 67);" for="">Total: ${{venta[0].total}}</label>
      </div>
      <div class="col-12">
        <button @click.prevent="cambiarEstado(venta[0].estado)" class="btn btn-warning">
          Cambiar ESTADO
        </button>
      </div>
    </div>

    <!-- Segunda seccion -->

    <hr>
    <div id="info" class="card">
      <div>
        <p id="subtitulo">Lineas de Venta</p>
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
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>SubTotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item of venta[0].linea_venta" :key="item.id">
                        <td data-label="imagen">
                        <img :src="'/images/'+item.producto.imagen"  width="50" height="50">
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
            venta_id : this.$route.params.id,
            venta : {}
    }
  },
  methods: {
    obtenerVenta(){
        var urlVenta = "http://127.0.0.1:8000/api/venta/"+this.venta_id;
        console.log(urlVenta);
        axios.get(urlVenta).then(response => {
          console.log(response.data);
          this.venta = response.data;
        });
    },
    cambiarEstado(estado){
        var url = "http://127.0.0.1:8000/api/venta/"+this.venta[0].id;

      if(estado == 'pagada'){
        this.venta[0].estado = 'impaga';
      }else{
        this.venta[0].estado = 'pagada';
      }
      axios.put(url,this.venta[0]).then(response => {
        console.log(response.data);
      });
    }
  },
  created() {
    this.obtenerVenta();
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
