<template>
  <div>
    <br>
    <div id="row2">
      <h3 class="text-center">Listado de Ventas</h3>
    </div>
      <div id="card" class="card">
          <router-link style="color:white;" to="/">
                            <button class="btn btn-danger">Registro de Ventas</button>
          </router-link>
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
