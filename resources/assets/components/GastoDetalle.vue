<template>
  <div>
    <br>
    <div class="container">
      <h3 class="text-center">Detalle de Registro de Gasto</h3>
    <div id="info" class="row">
      <div class="col-12">
        <label for="">Fecha: {{compra[0].fecha}}</label>
      </div>

      <div class="col-12">
        <label style="color: rgb(0, 175, 67);" for="">Total: ${{compra[0].total}}</label>
      </div>
    </div>

    <!-- Segunda seccion -->

    <hr>
    <div id="info" class="card">
      <div>
        <p id="subtitulo">Lineas de Gasto</p>
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
                        <th>Gasto</th>
                        <th>Cantidad</th>
                        <th>Costo</th>
                        <th>SubTotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item of compra[0].linea_gasto" :key="item.id">
                        <td data-label="imagen">
                        <img :src="'/images/'+item.producto.imagen"  width="50" height="50">
                        </td>
                        <td data-label="Producto">{{item.producto.producto}}</td>
                        <td data-label="Producto">{{item.cantidad}}</td>
                        <td data-label="Producto">{{item.costo}}</td>
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
            compra_id : this.$route.params.id,
            compra : {}
    }
  },
  methods: {
    obtenerCompra(){
        var url = "http://127.0.0.1:8000/api/gastos/"+this.compra_id;
        console.log(url);
        axios.get(url).then(response => {
          console.log(response.data);
          this.compra = response.data;
        });
    }
  },
  created() {
    this.obtenerCompra();
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
