<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Modificar Producto</h3>
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
            <input v-model="producto.producto" type="text" class="form-control">
          </div>

          <div>
            <label for>Descripcion</label>
            <input v-model="producto.descripcion" type="text" class="form-control">
          </div>

          <div>
            <label for>Precio</label>
            <input v-model="producto.precio" type="number" class="form-control">
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
            <input v-model="producto.stock" type="number" class="form-control">
          </div>
          <!-- Fin Datos -->
          <br>
          <div id="btn">
            <button @click.prevent="modificarProducto()" type="button" class="btn btn-danger btn-lg btn-block">Modificar</button>
          </div>
        </div>
      </form>
    </div>
    <br>
  </div>
</template>
<script>

const axios = require("axios");

export default {
  data() {
    return {
      url: null,
      producto_id : this.$route.params.id,
      producto : [],
      categorias: [],
      categoria_id : '',
      tipo : '0',
      categoria : ''
    };
  },
  created() {
    this.obtenerProducto();
  },
  methods: {
    onFileChange(e) {
      let file = e.target.files[0];
      this.url = URL.createObjectURL(file);
      //Siguiendo el tutorial desde aqui
                let reader = new FileReader();
                reader.readAsDataURL(e.target.files[0]);
                 
                reader.onload = (e) => {
                    this.producto.imagen = e.target.result;
                };
                //  reader.readAsDataURL(file);

      console.log(this.producto.imagen);
    },
    obtenerProducto(){
        var url = "http://127.0.0.1:8000/api/producto/show/"+this.producto_id;
        console.log(url);
        axios.get(url).then(response => {
          console.log(response.data);
          this.producto = response.data;
          this.obtenerSubcategorias();
          this.url = 'http://127.0.0.1:8000/images/'+this.producto.imagen;
        });
    },
    obtenerSubcategorias(){
        var url = "http://127.0.0.1:8000/api/sub_categorias/"+this.producto.subcategoria_id;
        console.log(url);
        axios.get(url).then(response => {
          console.log(response.data);
          this.categorias = response.data;
          this.categoria = this.producto.subcategoria_id;
        });
    },
    obtenerCategorias(event) {
      if (event.target.value != 0) {
        var urlCategorias = "api/sub_categoria/" + event.target.value;
        axios.get(urlCategorias).then(response => {
          this.categorias = response.data;
        });
      }
    },
    modificarProducto(){
        this.producto.subcategoria_id = this.categoria;
        var url = "http://127.0.0.1:8000/api/producto/"+this.producto.id;
        console.log(url);
        axios.put(url,this.producto).then(response => {
          console.log(response.data);
        });
    }
  }
};
</script>

<style>
label {
  text-align: center;
}
</style>
