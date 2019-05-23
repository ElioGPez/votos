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
            <select class="custom-select" id="exampleFormControlSelect1">
              <option selected>Almineto</option>
              <option>Bebida</option>
            </select>
          </div>

          <div>
            <label for>Nombre</label>
            <input type="text" class="form-control" placeholder="Sandwich Comun">
          </div>

          <div>
            <label for>Descripcion</label>
            <input type="text" class="form-control" placeholder="De milanesa comun">
          </div>

          <div>
            <label for>Precio</label>
            <input type="text" class="form-control" placeholder="$200">
          </div>

          <div>
            <label for>Imagen</label>
            <input type="file" @change="onFileChange" class="form-control" placeholder="imagen.png">

            <div id="preview">
              <img width="180" height="120" v-if="url" :src="url">
            </div>
          </div>

          <div>
            <label for>Stock</label>
            <input type="number" class="form-control" placeholder="10">
          </div>
          <!-- Fin Datos -->
          <br>
          <div id="btn">
            <button type="button" class="btn btn-danger btn-lg btn-block">REGISTRAR</button>
          </div>
        </div>
      </form>
    </div>
    <br>
  </div>
</template>
<script>
export default {
  data() {
    return {
      url: null
    };
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    }
  }
};
</script>

<style>
label {
  text-align: center;
}
</style>
