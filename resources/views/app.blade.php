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
                    <li class="nav-item">
                        <a id="ac" class="nav-link">
                        <router-link style="color:white;" to="/"><b>Venta</b></router-link>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="ac" class="nav-link">
                        <router-link style="color:white;" to="/ventas"><b>Listado Ventas</b></router-link>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="ac" class="nav-link">
                        <router-link style="color:white;" to="/compra"><b>Compra</b></router-link>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a id="ac" class="nav-link">
                        <router-link style="color:white;" to="/compras"><b>Listado Compras</b></router-link>
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
