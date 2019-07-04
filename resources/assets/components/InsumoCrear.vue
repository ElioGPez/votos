<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Crear Insumo</h3>
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
            <label for>Descripcion</label>
            <input v-model="descripcion" type="text" class="form-control">
          </div>

          <div>
            <label for>Imagen</label>
            <input type="file" @change="onFileChange" class="form-control">

            <div id="preview">
              <img width="180" height="120" v-if="url" :src="url">
            </div>
          </div>

          <div>
            <label for>Stock</label>
            <input v-model="stock" type="number" class="form-control">
          </div>
          <!-- Fin Datos -->
          <br>
          <div id="btn">
            <button data-toggle="modal"  data-target="#mensajeModal"
            @click="registrarProducto()" type="button" class="btn btn-danger btn-lg btn-block">REGISTRAR</button>
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

      categoria: "0",
      nombre : '',
      descripcion : '',
      precio : '',
      stock : '',
      imagen : '',
      mensaje : ''
    };
  },
  methods: {
    registrarProducto(){
      let datos = new FormData();
      datos.append('producto',this.nombre);
      datos.append('descripcion',this.descripcion);
      datos.append('precio','0');
      datos.append('stock',this.stock);
      datos.append('imagen',this.imagen);
      datos.append('subcategoria_id',this.categoria);

        var urlProducto = "api/insumo";
        axios
          .post(urlProducto, 
            datos
          )
          .then(response => {
            console.log("Producto Agregado!!");
            this.mensaje = "INSUMO AGREGADO!!"
            this.limpiar();
            /*this.limpiarRegistro();
            this.mensaje_registro = "Producto Agregado!!";*/
          });
    },
    limpiar(){
      this.nombre = '';
      this.descripcion = '';
      this.precio = '';
      this.stock = '';
      this.imagen = '';
      this.categoria = '0';
      this.url = null;
    },
    onFileChange(e) {
      let file = e.target.files[0];
      this.url = URL.createObjectURL(file);
      //Siguiendo el tutorial desde aqui
                let reader = new FileReader();
                reader.readAsDataURL(e.target.files[0]);
                 
                reader.onload = (e) => {
                    this.imagen = e.target.result;
                };
                //  reader.readAsDataURL(file);

      console.log(this.imagen);
    }
  }
};
</script>

<style>
label {
  text-align: center;
}
</style>
