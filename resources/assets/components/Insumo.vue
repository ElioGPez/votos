<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Listado de Insumos</h3>
    </div>
    <br>

    <div id="cardlist" class="card">
      <div>
        <router-link style="color:white;" to="/insumo_crear">
          <button style="margin:3px;" align="right" class="btn btn-danger">
            <i class="fas fa-plus-circle"></i>Nuevo Insumo
          </button>
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
                  style="background-color:white"
                >
                  <thead style="background-color: rgb(177, 18, 18);">
                    <tr>
                      <th>Imagen</th>
                      <th>Insumo</th>
                      <th>Stock</th>
                      <th>Precio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item of listado_productos.data" :key="item.id">
                      <td data-label="imagen">
                        <img :src="'/images/'+item.imagen"  width="50" height="50">
                      </td>
                      <td data-label="Producto">{{item.producto}}</td>
                      <td data-label="Stock">{{item.stock}}</td>
                      <td data-label="Precio">{{item.precio}}</td>
                      <td data-label="Acciones">
                        <a href>
                          <router-link to="/producto_modificar">
                            <button class="btn btn-warning">
                              <i class="far fa-edit"></i>
                            </button>
                          </router-link>
                        </a>
                        <a href>
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
                        <pagination :data="listado_productos" @pagination-change-page="getResults"></pagination>            

            <br>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
const axios = require("axios");

export default {
  data() {
    return {
      listado_productos : {},
    }
  },
  methods: {

		getResults(page = 1) {
			axios.get('api/insumo?page=' + page)
				.then(response => {

          this.listado_productos = response.data;
          console.log(this.listado_productos);
				});
		}
  },
  created() {
    //this.obtenerVentas();
  },
  mounted() {
		this.getResults();
  },
}
</script>