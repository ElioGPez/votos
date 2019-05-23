<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">INFORME</h3>
    <div class="row">
      <div class="col-2 row">
        <div class="col"><label for="">FILTRAR POR...</label></div>
      </div>
      <div class="col-4 row">
        <div class="col-6" align="right"><label for="">Desde</label></div>
        <div class="col-6"><input class="form-control" type="date" id="example-datetime-local-input"></div>
      </div>
      <div class="col-4 row">
        <div class="col-6" align="right"><label for="">Hasta</label></div>
        <div class="col-6"><input class="form-control" type="date" id="example-datetime-local-input"></div>
      </div>
      <div class="col-2" align="center">
          <button style="margin:3px;" align="right" class="btn btn-danger">OBTENER</button>
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
                      <th>Id</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Total</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-label="Votos">
                        1
                      </td>
                      <td data-label="imagen">
                        20-05-19                      
                        </td>
                      <td data-label="Producto">PAGADA</td>
                      <td data-label="Producto">$500</td>
                    </tr>
                    <tr>
                      <td data-label="Votos">
                        1
                      </td>
                      <td data-label="imagen">
                        20-05-19                      
                        </td>
                      <td data-label="Producto">PAGADA</td>
                      <td data-label="Producto">$500</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </fieldset>
                <div>
                <h4 align="right">TOTAL $500</h4>
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
                      <th>Id</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Total</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-label="Votos">
                        1
                      </td>
                      <td data-label="imagen">
                        20-05-19                      
                        </td>
                      <td data-label="Producto">PAGADA</td>
                      <td data-label="Producto">$500</td>

                    </tr>
                    <tr>
                      <td data-label="Votos">
                        1
                      </td>
                      <td data-label="imagen">
                        20-05-19                      
                        </td>
                      <td data-label="Producto">PAGADA</td>
                      <td data-label="Producto">$500</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </fieldset>
                <div>
                <h4 align="right">TOTAL $500</h4>
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
                      <th>Id</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Total</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-label="Votos">
                        1
                      </td>
                      <td data-label="imagen">
                        20-05-19                      
                        </td>
                      <td data-label="Producto">PAGADA</td>
                      <td data-label="Producto">$500</td>

                    </tr>
                    <tr>
                      <td data-label="Votos">
                        1
                      </td>
                      <td data-label="imagen">
                        20-05-19                      
                        </td>
                      <td data-label="Producto">PAGADA</td>
                      <td data-label="Producto">$500</td>

                    </tr>
                  </tbody>
                </table>
              </div>
            </fieldset>
                <div>
                <h4 align="right">TOTAL $500</h4>
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
            <h1 class="text-center" style="color:green;">TOTAL DE GANANCIAS NETAS OBTENIDAS: $40000</h1>
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

  </div>
</template>