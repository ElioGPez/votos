<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Listado de Productos</h3>
      <div class="row">
        <div class="col-2">
          <label for>Filtrar Productos por Tipo</label>
        </div>
        <div class="col-10">
          <select class="custom-select" id="exampleFormControlSelect1">
            <option selected>Todos</option>
            <option>Alimento</option>
            <option>Bebida</option>
          </select>
        </div>
      </div>
    </div>
    <br>

    <div id="card" class="card">
      <div>
        <router-link style="color:white;" to="/producto_crear">
          <button style="margin:3px;" align="right" class="btn btn-danger">
            <i class="fas fa-plus-circle"></i>Nuevo Producto
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
                      <th>Producto</th>
                      <th>Stock</th>
                      <th>Precio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-label="imagen">
                        <img src="../imagenes/hamburguesa.jpg" width="50" height="50">
                      </td>
                      <td data-label="Producto">Pizza</td>
                      <td data-label="Producto">1</td>
                      <td data-label="Producto">$50</td>
                      <td data-label="Votos">
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

                    <tr>
                      <td data-label="imagen">
                        <img src="../imagenes/hamburguesa.jpg" width="50" height="50">
                      </td>
                      <td data-label="Producto">Pizza</td>
                      <td data-label="Producto">1</td>
                      <td data-label="Producto">$50</td>
                      <td data-label="Votos">
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
            <br>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

