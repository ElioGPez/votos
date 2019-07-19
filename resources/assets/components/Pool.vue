<template>
  <div>
    <div id="row2">
      <h3 class="text-center">Registro de Fichas de Pool</h3>
    </div>
    <div id="card">
        <!-- Mesa 1 -->
      <div id="mesas" class="row" align="center">
        <div id="ficha" class="col-2">
            <div class="col">
                <label style="color:white;" for="titulo"><b>Mesa 1</b></label>
            </div>
            <div class="col">
                <button @click="registrarFicha('Mesa1');mesa_1++;" class="btn btn-light"><i class="fas fa-plus-circle"></i>Ficha</button>
                <button @click="fichaPagar(1)" class="btn btn-warning">FP</button>
            </div>
            <div class="col">
                <label style="color:white;" for="titulo">Fichas Registradas: {{mesa_1}}</label>
            </div>
        </div>
        <div v-for="(pendiente,index) of mesa1" :key="index" id="pendiente" class="col-2">
            <div class="col">
                <label for="titulo"><b>{{pendiente.hora}}</b></label>
            </div>
            <div class="col">
                <button @click="registrarFicha('Mesa1');mesa_1++;mesa1.splice(index,1);" class="btn btn-danger">Saldar</button>
            </div>
        </div>
      </div>
      <!-- Mesa 2 -->
      <div id="mesas" class="row" align="center">
        <div id="ficha" class="col-2">
            <div class="col">
                <label style="color:white;" for="titulo"><b>Mesa 2</b></label>
            </div>
            <div class="col">
                <button @click="registrarFicha('Mesa2');mesa_2++;" class="btn btn-light"><i class="fas fa-plus-circle"></i>Ficha</button>
                <button @click="fichaPagar(2)" class="btn btn-warning">FP</button>
            </div>
            <div class="col">
                <label style="color:white;" for="titulo">Fichas Registradas: {{mesa_2}}</label>
            </div>
        </div>
        <div v-for="(pendiente,index) of mesa2" :key="index" id="pendiente" class="col-2">
            <div class="col">
                <label for="titulo"><b>{{pendiente.hora}}</b></label>
            </div>
            <div class="col">
                <button @click="registrarFicha('Mesa2');mesa_2++;mesa2.splice(index,1);" class="btn btn-danger">Saldar</button>
            </div>
        </div>
      </div>
      <!-- Mesa 3 -->
      <div id="mesas" class="row" align="center">
        <div id="ficha" class="col-2">
            <div class="col">
                <label style="color:white;" for="titulo"><b>Mesa 3</b></label>
            </div>
            <div class="col">
                <button @click="registrarFicha('Mesa3');mesa_3++;" class="btn btn-light"><i class="fas fa-plus-circle"></i>Ficha</button>
                <button @click="fichaPagar(3)" class="btn btn-warning">FP</button>
            </div>
            <div class="col">
                <label style="color:white;" for="titulo">Fichas Registradas: {{mesa_3}}</label>
            </div>
        </div>
        <div v-for="(pendiente,index) of mesa3" :key="index" id="pendiente" class="col-2">
            <div class="col">
                <label for="titulo"><b>{{pendiente.hora}}</b></label>
            </div>
            <div class="col">
                <button @click="registrarFicha('Mesa3');mesa_3++;mesa2.splice(index,1);" class="btn btn-danger">Saldar</button>
            </div>
        </div>
      </div>
      <!-- Mesa 4 -->
      <div id="mesas" class="row" align="center">
        <div id="ficha" class="col-2">
            <div class="col">
                <label style="color:white;" for="titulo"><b>Mesa 4</b></label>
            </div>
            <div class="col">
                <button @click="registrarFicha('Mesa4');mesa_4++;" class="btn btn-light"><i class="fas fa-plus-circle"></i>Ficha</button>
                <button @click="fichaPagar(4)" class="btn btn-warning">FP</button>
            </div>
            <div class="col">
                <label style="color:white;" for="titulo">Fichas Registradas: {{mesa_4}}</label>
            </div>
        </div>
        <div v-for="(pendiente,index) of mesa4" :key="index" id="pendiente" class="col-2">
            <div class="col">
                <label for="titulo"><b>{{pendiente.hora}}</b></label>
            </div>
            <div class="col">
                <button @click="registrarFicha('Mesa4');mesa_4++;mesa2.splice(index,1);" class="btn btn-danger">Saldar</button>
            </div>
        </div>
      </div>
      <!-- Mesa 5 -->
      <div id="mesas" class="row" align="center">
        <div id="ficha" class="col-2">
            <div class="col">
                <label style="color:white;" for="titulo"><b>Mesa 5</b></label>
            </div>
            <div class="col">
                <button @click="registrarFicha('Mesa5');mesa_5++;" class="btn btn-light"><i class="fas fa-plus-circle"></i>Ficha</button>
                <button @click="fichaPagar(5)" class="btn btn-warning">FP</button>
            </div>
            <div class="col">
                <label style="color:white;" for="titulo">Fichas Registradas: {{mesa_5}}</label>
            </div>
        </div>
        <div v-for="(pendiente,index) of mesa5" :key="index" id="pendiente" class="col-2">
            <div class="col">
                <label for="titulo"><b>{{pendiente.hora}}</b></label>
            </div>
            <div class="col">
                <button @click="registrarFicha('Mesa5');mesa_5++;mesa5.splice(index,1);" class="btn btn-danger">Saldar</button>
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
            mesa_1 : 0,
            mesa_2 : 0,
            mesa_3 : 0,
            mesa_4 : 0,
            mesa_5 : 0,
        mesa1 : [],
        mesa2 : [],
        mesa3 : [],
        mesa4 : [],
        mesa5 : [],
        }
    },
    methods: {
        fichaPagar(mesa){
            var fecha = new Date();
            var hora = fecha.getHours()+":"+fecha.getMinutes();
            var ficha_pendiente = new Object();
            ficha_pendiente.hora = hora;

            if(mesa==1){

                this.mesa1.push(ficha_pendiente);
            }else
            if(mesa==2){
                this.mesa2.push(ficha_pendiente);
            }else
            if(mesa==3){
                this.mesa3.push(ficha_pendiente);
            }else
            if(mesa==4){
                this.mesa4.push(ficha_pendiente);
            }else
            if(mesa==5){
                this.mesa5.push(ficha_pendiente);
            }
        },
        registrarFicha(mesa){
            var url = "api/pool";
            let datos = new FormData();
                datos.append('mesa',mesa);
                axios.post(url,datos).then(response => {
                    console.log(response.data);
                });
        }
    },
}
</script>
<style>
#mesas{
    background-color: antiquewhite;
    margin: 15px;
}
#ficha{
    background-color: crimson;
    margin: 15px;
}
#pendiente{
    background-color: white;
    margin: 15px;
}
</style>
