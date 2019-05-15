@extends('app')

@section('contenido')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table responsibe">
        <table class="table table-striped table-condensed table-hover table-bordered">
          <thead>
            <th>Id</th>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Opciones</th>
          </thead>
            <tr v-for="categoria in categorias">
              <td>@{{categoria.id}}</td>
              <td>@{{categoria.nombre}}</td>
              <td>@{{categoria.descripcion}}</td>
              <td>
                <a href=""><button class="btn btn-info">Editar</button></a>
                <a href="" data-target="" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
              </td>
            </tr>

        </table>
      </div>
    </div>
  </div>

@endsection