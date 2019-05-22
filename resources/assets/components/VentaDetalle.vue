<template>
  <div>
    <br>
    <div class="container">
      <h3 class="text-center">Detalle de Venta</h3>
    <div id="info" class="row">
      <div class="col-12">
        <label for="">Fecha: 05/06/19</label>
      </div>
      <div class="col-12">
        <label for="">Estado: PAGADA</label>
      </div>
      <div class="col-12">
        <label for="">Cliente: Alberto Gomez</label>
      </div>
      <div class="col-12">
        <label style="color: rgb(0, 175, 67);" for="">Total: $500</label>
      </div>
    </div>

    <!-- Segunda seccion -->

    <hr>
    <div id="info" class="card">
      <div>
        <p id="subtitulo">Lineas de Venta</p>
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
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>SubTotal</th>
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
                        <td data-label="Producto">$50</td>
                      </tr>

                      <tr>
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


  </div>
</template>

<script>

export default {
  
}
</script>
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
  font-weight: bold;
  padding: 5px;
}

label {
       font-weight: bold;
    font-size: 20px;
}
#info {
  background-color: rgb(235, 235, 235);
  margin-left: 20px;
  margin-right: 20px;
}
#subtitulo {
     background-color: rgb(190, 190, 190); 
       font-weight: bold;
    font-size: 25px;
    text-align: center;

}

#row2 {
  margin-left: 40px;
  margin-right: 40px;
}
</style>
