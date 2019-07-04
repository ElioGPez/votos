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
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item,index) of listado_productos.data" :key="item.id">
                      <td data-label="imagen">
                        <img :src="'/images/'+item.imagen"  width="50" height="50">
                      </td>
                      <td data-label="Producto">{{item.producto}}</td>
                      <td data-label="Stock">{{item.stock}}</td>
                      <td data-label="Acciones">
                        <a href>
                      <router-link :to="{
                        name : 'insumo_modificar',
                        params : {id : item.id}
                      }">
                      <button class="btn btn-warning">
                        <i class="far fa-edit"></i>
                      </button>        
                      </router-link>
                        </a>
                        <a href>
                          <button @click.prevent="eliminarModal(item.id,index);"
                          data-toggle="modal" data-target="#exampleModal" 
                           class="btn btn-danger">
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

                                  <br>
                                  <!-- Modal ELIMMINAR-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MENSAJE DE CONFIRMACION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="text-align:center" class="modal-body">
        Esta seguro que desea eliminar el Insumo?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button @click.prevent="eliminarProducto()" type="button" class="btn btn-danger">CONFIRMAR ELIMINACION</button>
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
      listado_productos : {},
      eliminar_id : '',
      eliminar_index : ''
    }
  },
  methods: {

		getResults(page = 1) {
			axios.get('api/insumo?page=' + page)
				.then(response => {

          this.listado_productos = response.data;
          console.log(this.listado_productos);
				});
		},
    eliminarModal(id,index){
      this.eliminar_id = id;
      this.eliminar_index = index;
    },
    eliminarProducto(){
			axios.delete('api/producto/'+this.eliminar_id)
				.then(response => {
          console.log("Producto Eliminado!!");
          this.listado_productos.data.splice(this.eliminar_index,1)
          $('#exampleModal').modal('hide');

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