<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">


        <title>Laravel y Vue</title>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <style>
        #ac {
            color: white;
        }
        #ab { 
            color: red;
        }
        </style>
      
    </head>
    <body>
    <div id="main"> 
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e60000;">
        <!-- Logo -->
        <a id="ac" class="navbar-brand" href="#"><h2><b>Sistema Sandwicheria</b></h2></a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <!-- Menu Area -->
            <div class="navbar-collapse collapse" id="ca-navbar" style="">
                <ul class="navbar-nav ml-auto" id="nav">
                <li class="nav-item dropdown">
        <a id="ac" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Ventas</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="/">
                <i class="fas fa-plus-circle"></i>
                    <b>Nueva Venta</b>
                </router-link>
            </a>
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="/ventas">
                <i class="fas fa-list-ol"></i>    
                    <b>Listado</b>
                </router-link>
            </a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a id="ac" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Compras</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="/compra">
                <i class="fas fa-plus-circle"></i>
                    <b>Nueva Compra</b>
                </router-link>
            </a>
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="/compras">
                <i class="fas fa-list-ol"></i>    
                    <b>Listado</b>
                </router-link>
            </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a id="ac" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Productos</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="/producto_crear">
                <i class="fas fa-plus-circle"></i>
                    <b>Nuevo Producto</b>
                </router-link>
            </a>
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="/producto">
                <i class="fas fa-list-ol"></i>    
                    <b>Listado</b>
                </router-link>
            </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a id="ac" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Insumos</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="insumo_crear">
                <i class="fas fa-plus-circle"></i>
                    <b>Nuevo Insumo</b>
                </router-link>
            </a>
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="/insumo">
                <i class="fas fa-list-ol"></i>    
                    <b>Listado</b>
                </router-link>
            </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a id="ac" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Gastos</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="gasto_registro">
                <i class="fas fa-plus-circle"></i>
                    <b>Registro de Gastos</b>
                </router-link>
            </a>
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="gasto_crear">
                <i class="fas fa-plus-circle"></i>
                    <b>Nuevo Gasto</b>
                </router-link>
            </a>
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="/gasto">
                <i class="fas fa-list-ol"></i>    
                    <b>Listado</b>
                </router-link>
            </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a id="ac" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>Clientes</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="cliente_crear">
                <i class="fas fa-plus-circle"></i>
                    <b>Nuevo Cliente</b>
                </router-link>
            </a>
            <a id="ab" class="nav-link">
                <router-link style="color:red;" to="/cliente">
                <i class="fas fa-list-ol"></i>    
                    <b>Listado</b>
                </router-link>
            </a>
        </div>
      </li>
                    <li class="nav-item">
                        <a id="ac" class="nav-link">
                        <router-link style="color:white;" to="/informe"><b>Informe</b></router-link>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>


        
        
        <router-view/>
        <!--app></app-->


        </div>


    <script>

    </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
