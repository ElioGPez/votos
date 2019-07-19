<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Crear Producto</h3>
    </div>
    <br>

    <div id="cardlist" class="card">
      <form class="card-body">
        <div class="form-group">
          <!-- Datos -->
          <div>
            <label for>Tipo de Producto</label>
              <select class="custom-select" @change="obtenerCategorias($event)" v-model="tipo">
                  <option value="0" selected>Seleccione el Tipo de Producto...</option>
                  <option value="1">Alimentos</option>
                  <option value="2">Bebidas</option>
            </select>
          </div>
          <div>
            <label for>Categoria</label>
                <select
                  class="custom-select"
                  v-model="categoria"
                >
                  <option value="0" selected>Seleccione la Categoria de Producto...</option>
                  <option v-for="item of categorias" :key="item.id" :value="item.id">{{item.nombre}}</option>
                </select>
          </div>
          <div>
            <label for>Nombre</label>
            <input v-model="nombre" type="text" class="form-control" :class="{ error: $v.nombre.$error }">
          </div>
          <div v-if="$v.nombre.$dirty">
            <div v-if="!$v.nombre.required" class="alert alert-danger" role="alert">
              <strong>Cuidado!</strong> Este campo es requerido
            </div>
          </div>
          <div>
            <label for>Descripcion</label>
            <input v-model="descripcion" type="text" class="form-control">
          </div>

          <div>
            <label for>Precio</label>
            <input v-model="precio" type="number" class="form-control" :class="{ error: $v.precio.$error }">
          </div>
          <div v-if="$v.precio.$dirty">
            <div v-if="!$v.precio.required" class="alert alert-danger" role="alert">
              <strong>Cuidado!</strong> Este campo es requerido
            </div>
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
            <input :disabled="tipo < 2" v-model="stock" type="number" class="form-control">
          </div>
          <!-- Fin Datos -->
          <br>
          <div id="btn">
            <button 
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




import {
  required,
  minLength,
  between,
  integer
} from "vuelidate/lib/validators";

export default {
  data() {
    return {
      url: null,
      tipo : '0',
      categorias: [],
      categoria: "0",
      nombre : '',
      descripcion : '',
      precio : '',
      stock : '',
      imagen : '',
      mensaje : ''
    };
  },
  validations: {
    nombre: {
      required
    },
    precio: {
      required,
    }
  },
  methods: {
    registrarProducto(){

      this.submitted = true;
      // stop here if form is invalid
      this.$v.$touch();
      if (this.$v.$invalid) {
        return;
      }
      if(this.categoria != '4'){
        this.stock = '';
      }
      let datos = new FormData();
      datos.append('producto',this.nombre);
      datos.append('descripcion',this.descripcion);
      datos.append('precio',this.precio);
      datos.append('stock',this.stock);
      datos.append('imagen',this.imagen);
      datos.append('tipo_id',this.tipo);
      datos.append('subcategoria_id',this.categoria);

        var urlProducto = "api/producto";
        axios
          .post(urlProducto, 
            datos
          )
          .then(response => {
            console.log("Producto Agregado!!");
            this.mensaje = "PRODUCTO AGREGADO!!"
            $('#mensajeModal').modal('show');
                  this.submitted = false;
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
      this.tipo = '0';
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
    },
    obtenerCategorias(event) {
      if (event.target.value != 0) {
        var urlCategorias = "api/sub_categoria/" + event.target.value;
        axios.get(urlCategorias).then(response => {
          this.categorias = response.data;
        });
      }
    },
  }
};
</script>

<style>
label {
  text-align: center;
}
.error {
  border: 1px solid red;
}
</style>
