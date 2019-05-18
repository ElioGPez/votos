<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Listado de Ventas</h3>
    </div>

    <div id="card" class="card">
      <div>
        <router-link style="color:white;" to="/">
          <button align="right" class="btn btn-danger">Nueva Venta</button>
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
                      <th>Acciones</th>
                      <th>Imagen</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>SubTotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-label="Votos">
                        <a href>
                          <button class="btn btn-danger">Eliminar</button>
                        </a>
                      </td>
                      <td data-label="imagen">
                        <img src="../imagenes/hamburguesa.jpg" width="50" height="50">
                      </td>
                      <td data-label="Producto">Pizza</td>
                      <td data-label="Producto">1</td>
                      <td data-label="Producto">$50</td>
                      <td data-label="Producto">$50</td>
                    </tr>

                    <tr>
                      <td data-label="Votos">
                        <a href>
                          <button class="btn btn-danger">Eliminar</button>
                        </a>
                      </td>
                      <td data-label="imagen">
                        <img src="../imagenes/hamburguesa.jpg" width="50" height="50">
                      </td>
                      <td data-label="Producto">Pizza</td>
                      <td data-label="Producto">1</td>
                      <td data-label="Producto">$50</td>
                      <td data-label="Producto">$50</td>
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
  background-color: rgb(173, 166, 166);
  padding: 5px;
}

label {
  font-weight: bold;
  text-align: center;
}

#card {
  background-color: rgb(235, 235, 235);
  margin-left: 45px;
  margin-right: 45px;
}

#row2 {
  margin-left: 40px;
  margin-right: 40px;
}
</style>
