<template>
  <div>
    <div>
      <h4 style="background-color: rgb(173, 166, 166);" class="text-center">Mesas de Pool</h4>
    <div class="row">
      <div class="col-2 row">
        <div class="col"><label for="">FILTRAR POR FECHAS</label></div>
      </div>
      <div class="col-4 row">
        <div class="col-6" align="right"><label for="">Desde</label></div>
        <div class="col-6"><input class="form-control" type="date" v-model="fecha_desde"></div>
      </div>
      <div class="col-4 row">
        <div class="col-6" align="right"><label for="">Hasta</label></div>
        <div class="col-6"><input class="form-control" type="date" v-model="fecha_hasta"></div>
      </div>
      <div class="col-2" align="center">
          <button @click.prevent="obtenerMesasFechas()" style="margin:3px;" align="right" class="btn btn-danger">FILTRAR</button>
      </div>
    </div>
    </div>
    <div class="form-group">
      <fieldset>
        <div class>
          <table
            class="table table-striped table-bordered table-condensed table-hover"
            style="background-color:white"
          >
            <thead style="background-color: rgb(177, 18, 18);">
              <tr>
                <th>Mesa</th>
                <th>Cantidad</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-label="Mesa">Mesa 1</td>
                <td data-label="Cantidad">{{mesas.mesa1[0].cantidad}}</td>
                <td data-label="Total">${{mesas.mesa1[0].suma}}</td>
              </tr>
              <tr>
                <td data-label="Mesa">Mesa 2</td>
                <td data-label="Cantidad">{{mesas.mesa2[0].cantidad}}</td>
                <td data-label="Total">${{mesas.mesa2[0].suma}}</td>
              </tr>
              <tr>
                <td data-label="Mesa">Mesa 3</td>
                <td data-label="Cantidad">{{mesas.mesa3[0].cantidad}}</td>
                <td data-label="Total">${{mesas.mesa3[0].suma}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </fieldset>
      <br />
    </div>
  </div>
</template>


<script>
const axios = require("axios");

export default {
    data() {
        return {
            mesas : [],
            fecha_desde : '',
            fecha_hasta : ''
        }
    },
    methods: {
        obtenerMesas(){
        var url = "api/pool";
        axios.get(url).then(response => {
          this.mesas = response.data[0];
          console.log('Mesas:');
          console.log(this.mesas);

        });
        },
    obtenerMesasFechas(){
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
        var url = "api/pool/"+this.fecha_desde+'/'+this.fecha_hasta;
        axios.get(url).then(response => {
          this.mesas = response.data[0];
        });}
    },
    },
    mounted() {
        this.obtenerMesas();
    },
}
</script>
