<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
        body {
            background: url("/img/vuelos-bg.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .hover:hover {
            background-image: linear-gradient(-30deg, #127ba3, #f75bd0) !important;
            color:white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">RENTIVEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/reportes.php"><i class="fas fa-chart-line"></i> Reportes <span class="sr-only">(activo)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/vuelos.php"><i class="fas fa-plane"></i> Vuelos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/hoteles.php"><i class="fas fa-hotel"></i> Hoteles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/vehiculos.php"><i class="fas fa-car-side"></i> Vehiculos</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/action_logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-1 ">
                <div class="card text-white my-3" style="background-color:rgba(255, 255, 255, 0.8);">
                    <div class="card-header bg-primary">
                        <h5>Lista de vuelos</h5>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-success" id="listar">Cargar lista de vuelos <i class="fas fa-sync"></i></a>
                        <div class="result text-dark"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <div class="card text-white my-3" style="background-color:rgba(255, 255, 255, 0.8);">
                    <div class="card-header bg-primary"><h5>Ingreso de vuelos</h5></div>
                    <div class="card-body text-dark">
                        <p class="card-title">Ingresar los campos para crear una nueva oferta de vuelo.</p>
                        <form id="formVuelo">
                            <div class="form-group">
                                <label for="Origen">Origen</label>
                                <select class="form-control" name="Origen">
                                    <option>Costa Rica</option>
                                    <option>Colombia,Medellín</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Destino">Destino</label>
                                <select class="form-control" name="Destino">
                                    <option>Colombia,Medellín</option>
                                    <option>Colombia,Bogota</option>
                                    <option>Costa Rica</option>
                                    <option>Madrid</option>
                                    <option>Singapur</option>
                                    <option>São Paulo (SAO)</option>
                                    <option>Tokio</option>
                                    <option>Venecia</option>
                                    <option>Cancún</option>
                                    <option>Barcelona</option>
                                    <option>Toronto</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Agencia">Linea aerea</label>
                                <input type="text" class="form-control" name="Agencia">
                            </div>
                            <div class="form-group">
                                <label for="Categoria">Categoria</label>
                                <select class="form-control" name="Categoria">
                                    <option>Económica</option>
                                    <option>Ejecutiva</option>
                                    <option>Primera clase</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Precio">Precio</label>
                                <input type="text" class="form-control" name="Precio">
                            </div>
                            <a class="btn btn-primary btn-block text-white" id="crear">Crear <i class="fas fa-plus-circle"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        //http://localhost:2144//Vuelos.svc/Vuelos
        $("#listar").click(function(){
            $(".result").empty();
            $.get( "http://localhost:2144//Vuelos.svc/Vuelos", function( data ) {
                for (i = 0; i < data.length; i++) {
                    $(".result")
                        .append('<div class="card my-1"><div class="card-header text-white bg-dark">Vuelo id: ' + data[i].Id +'</div><div class="card-body hover"><ul><li>Aerolinia: ' + data[i].Agencia +'</li><li><i class="fas fa-plane-departure"></i> Origen: ' + data[i].Origen +' - <i class="fas fa-plane-arrival"></i> Destino: ' + data[i].Destino +'</li><li><i class="fas fa-money-bill"></i> Categoria: ' + data[i].Categoria +'</li></ul><p>Precio: $' + data[i].Precio +'</p><br></div></div>')
                }
            })
        });
        $("#crear").click(function(){
            $(".result").empty();
            var mydata = $('#formVuelo').serializeArray();
            var json = "";
            jQuery.each(mydata, function(){
                jQuery.each(this, function(i, val){
                    if (i=="name") {
                        json += '"' + val + '":';
                    } else if (i=="value") {
                        json += '"' + val.replace(/"/g, '\\"') + '",';
                    }
                });
            });
            json = "{" + json.substring(0, json.length - 1) + "}";
            $.post ({
                url: "http://localhost:2144//Vuelos.svc/Vuelos",
                type: "POST",
                data: json,
                dataType: "json",
                contentType: "application/json; charset=utf-8"
            })
        });
    </script>
</body>
</html>