<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">INFORME</h3>
    <div class="row">
      <div class="col-2 row">
        <div class="col">
          <label for="exampleRadios1">Obtener Informe de HOY</label></div>
      </div>

      <div class="col-2" align="center">
          <button @click.prevent="obtenerValores()" style="margin:3px;" align="right" class="btn btn-danger">OBTENER</button>
      </div>
    </div>
    <hr>
        <div class="row">
      <div class="col-2 row">
        <div class="col">

          <label for="exampleRadios2">Filtrar por Fechas</label></div>
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
          <button @click.prevent="obtenerValoresFechas()" style="margin:3px;" align="right" class="btn btn-danger">OBTENER</button>
      </div>
    </div>
    </div>

    <!-- VENTAS -->
    <div id="cardlist" class="card">
      <div>
            <h4 class="text-center">VENTAS</h4>
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
                      <th>Acciones</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Total</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item of ventas" :key="item.id">
                      <td data-label="Producto">
                        <a href>
                            <button @click.prevent="detalle('venta',item)" class="btn btn-warning">
                              <i class="fas fa-info-circle"></i>
                            </button>        
                        </a>
                      </td>
                      <td data-label="fecha">
                        {{item.fecha}}                     
                        </td>
                      <td data-label="Producto">
                        <span style="font-size: 15px;" v-if="item.estado == `pagada`" class="badge badge-success badge-pill">{{item.estado}}</span>
                        <span style="font-size: 15px;" v-if="item.estado == `impaga`" class="badge badge-danger badge-pill">{{item.estado}}</span>
                      </td>
                      <td data-label="Producto">${{item.total}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </fieldset>
                <div>
                <h4 align="right">TOTAL ${{total_venta}}</h4>
                </div>
          </div>
        </div>
      </form>
    </div>
    <br>

            <!-- MESAS -->
    <div id="cardlist" class="card">
      <div>
            <h4 class="text-center">Mesas</h4>
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
                <th>Mesa</th>
                <th>Cantidad</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-label="Mesa">Mesa 1</td>
                <td data-label="Cantidad">{{mesas[0].mesa1[0].cantidad}}</td>
                <td data-label="Total">${{mesas[0].mesa1[0].suma}}</td>
              </tr>
              <tr>
                <td data-label="Mesa">Mesa 2</td>
                <td data-label="Cantidad">{{mesas[0].mesa2[0].cantidad}}</td>
                <td data-label="Total">${{mesas[0].mesa2[0].suma}}</td>
              </tr>
              <tr>
                <td data-label="Mesa">Mesa 3</td>
                <td data-label="Cantidad">{{mesas[0].mesa3[0].cantidad}}</td>
                <td data-label="Total">${{mesas[0].mesa3[0].suma}}</td>
              </tr>
            </tbody>
                </table>
              </div>
            </fieldset>
                <div>
                <h4 align="right">TOTAL ${{total_pool}}</h4>
                </div>
          </div>
        </div>
      </form>
    </div>
            <br>
        <!-- COMPRAS -->
    <div id="cardlist" class="card">
      <div>
            <h4 class="text-center">COMPRAS</h4>
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
                      <th>Acciones</th>
                      <th>Fecha</th>
                      <th>Total</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="compra in compras" :key="compra.id">
                      <td data-label="Producto">
                        <a href>
                            <button @click.prevent="detalle('compra',compra)" class="btn btn-warning">
                              <i class="fas fa-info-circle"></i>
                            </button>    
                        </a>
                      </td>
                      <td data-label="imagen">{{compra.fecha}}</td>
                      <td data-label="Producto">{{compra.total}}</td>

                    </tr>
                  </tbody>
                </table>
              </div>
            </fieldset>
                <div>
                <h4 align="right">TOTAL ${{total_compra}}</h4>
                </div>
          </div>
        </div>
      </form>
    </div>
            <br>

        <!-- GASTOS -->
    <div id="cardlist" class="card">
      <div>
            <h4 class="text-center">GASTOS</h4>
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
                      <th>Acciones</th>
                      <th>Fecha</th>
                      <th>Total</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="compra in gastos" :key="compra.id">
                      <td data-label="Producto">
                        <a href>
                            <button @click.prevent="detalle('gasto',compra)" class="btn btn-warning">
                              <i class="fas fa-info-circle"></i>
                            </button>   
                        </a>
                      </td>
                      <td data-label="imagen">{{compra.fecha}}</td>
                      <td data-label="Producto">{{compra.total}}</td>

                    </tr>
                  </tbody>
                </table>
              </div>
            </fieldset>
                <div>
                <h4 align="right">TOTAL ${{total_gasto}}</h4>
                </div>
          </div>
        </div>
      </form>
    </div>
                <br>

        <!-- TOTALES -->
    <div id="cardlist" class="card">
      <div>
            <h4 class="text-center">TOTAL</h4>
      </div>
      <form class="card-body">
        <div class="form-group">
            <h1 class="text-center" style="color:green;">TOTAL DE GANANCIAS NETAS OBTENIDAS: ${{total_neto}}</h1>
        </div>
      </form>
    </div>
    <hr>
        <!-- ACCIONES -->
    <div id="cardlist" class="card">

                  <div class="row">
                <div class="col-6" id="btn">
                  <button
                    type="button"
                    data-toggle="modal"
                    data-target="#exampleModalCenter"
                    class="btn btn-secondary"
                  >GUARDAR INFORME PDF</button>
                </div>
                <div align="right" class="col-6" id="btn">
                  <button type="button" class="btn btn-danger">IMPRIMIR</button>
                </div>
              </div>              </div>

    <!-- Modal -->
    <div
    id="modal_pendiente"
      class="modal fade bd-example-modal-lg"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div align="center" style="background-color: rgb(177, 18, 18);" class="modal-header">
            <h3>Detalle</h3>
          </div>
          <div class="modal-body">
            <hr>
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
                        <th v-if="tipo=='gasto'">Gasto</th>
                        <th v-else-if="tipo=='compra'">Insumo</th>
                        <th v-else>Producto</th>
                        <th>Cantidad</th>
                        <th>Monto</th>
                        <th>SubTotal</th>
                      </tr>
                    </thead>
                    <tbody v-if="tipo=='venta'">
                      <tr v-for="item of lineas" :key="item.id">
                        <td data-label="imagen">
                          <img :src="'/images/'+item.producto.imagen" width="50" height="50">
                        </td>
                        <td data-label="Producto">{{item.producto.producto}}</td>
                        <td data-label="Producto">{{item.cantidad}}</td>
                        <td data-label="Producto">{{item.precio}}</td>
                        <td data-label="Producto">{{item.subtotal}}</td>
                      </tr>
                    </tbody>
                    <tbody v-else-if="tipo=='gasto'">
                      <tr v-for="item of lineas" :key="item.id">
                        <td data-label="imagen">
                          <img :src="'/images/'+item.producto.imagen" width="50" height="50">
                        </td>
                        <td data-label="Producto">{{item.producto.producto}}</td>
                        <td data-label="Producto">{{item.cantidad}}</td>
                        <td data-label="Producto">{{item.costo}}</td>
                        <td data-label="Producto">{{item.subtotal}}</td>
                      </tr>
                    </tbody>
                    <tbody v-else-if="tipo=='compra'">
                      <tr v-for="item of lineas" :key="item.id">
                        <td data-label="imagen">
                          <img :src="'/images/'+item.producto.imagen" width="50" height="50">
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
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
  const axios = require('axios');

export default {
  data() {
    return {
      ventas : [],
      compras : [],
      gastos : [],
      mesas : [],
      total_neto : 0,
      total_venta : 0,
      total_compra : 0,
      total_gasto : 0,
      total_pool : 0,

      fecha_desde : '',
      fecha_hasta : '',

      tipo : '',
      lineas : []

    }
  },
  methods: {
    obtenerValores(page = 1){
      //ventas
var f = new Date();
    var fechaActual =f.getFullYear() + "-0" + (f.getMonth() +1) + "-0" +  f.getDate() ;

    var url = 'api/venta/informe/'+ fechaActual+'/-';
    console.log(url);
			axios.get(url)
				.then(response => {

          this.ventas = response.data[0].ventas.data;
          this.mesas =  response.data[0].mesas;
          this.compras = response.data[0].compras.data;
          this.gastos = response.data[0].gastos.data;

          console.log(this.mesas);

          for(var venta of this.ventas){
            this.total_venta += venta.total;
          }
          for(var compra of this.compras){
            this.total_compra += compra.total;
          }

          for(var gasto of this.gastos){
            this.total_gasto += gasto.total;
          }
            this.total_pool = this.mesas[0].mesa1[0].suma + this.mesas[0].mesa2[0].suma + this.mesas[0].mesa3[0].suma;

      console.log('Total Neto: '+this.total_neto+' - Total Venta: '+ this.total_venta + ' - Total Compra: '+this.total_compra +' - Total Gasto: '+this.total_gasto);
              //Sumatoria
      this.total_neto = this.total_pool + this.total_venta - this.total_compra - this.total_gasto;
      console.log('Total Neto: '+this.total_neto);
          });


    },
    obtenerValoresFechas(page = 1){
      //ventas

    var url = 'api/venta/informe/'+ this.fecha_desde+'/'+this.fecha_hasta;
    console.log(url);
			axios.get(url)
				.then(response => {

          this.ventas = response.data[0].ventas.data;
          this.mesas =  response.data[0].mesas;
          this.compras = response.data[0].compras.data;
          this.gastos = response.data[0].gastos.data;
                    
          console.log(response.data[0]);

          for(var venta of this.ventas){
            this.total_venta += venta.total;
          }
          for(var compra of this.compras){
            this.total_compra += compra.total;
          }

          for(var gasto of this.gastos){
            this.total_gasto += gasto.total;
          }
            this.total_pool = this.mesas[0].mesa1[0].suma + this.mesas[0].mesa2[0].suma + this.mesas[0].mesa3[0].suma;

      console.log('Total Neto: '+this.total_neto+' - Total Venta: '+ this.total_venta + ' - Total Compra: '+this.total_compra +' - Total Gasto: '+this.total_gasto);
              //Sumatoria
      this.total_neto = this.total_pool + this.total_venta - this.total_compra - this.total_gasto;
      console.log(this.total_neto);
          });


    },
    detalle(tipo,item){
      console.log(tipo);
      this.tipo = tipo;
      
      if(tipo=='venta'){
        this.lineas = item.linea_venta;
      }else
      if(tipo=='gasto'){
        this.lineas = item.linea_gasto;
      }else{
        this.lineas = item.linea_compra;
      }
      $('#modal_pendiente').modal('show');
    }
  },
  mounted() {
    this.obtenerValores();
  },
}
</script>