<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- link bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- link ICONOS fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
        body {
            background: url("/img/hotel.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
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
                    <a class="nav-link" href="/index.php"><i class="fas fa-chart-line"></i> Reportes <span class="sr-only">(activo)</span></a>
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
                    <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card text-white my-3" style="background-color:rgba(255, 255, 255, 0.8);">
                    <div class="card-header bg-primary">
                        <h5>Lista de vehiculos</h5>
                        <a class="btn btn-success" id="listar">Cargar lista de vehiculos <i class="fas fa-sync"></i></a>
                    </div>
                    <div class="card-body text-dark">
                        <div class="result"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card text-white my-3 position-fixed" style="background-color:rgba(255, 255, 255, 0.8);">
                    <div class="card-header bg-primary"><h5>Ingreso de vehiculos</h5></div>
                    <div class="card-body text-dark">
                        <p class="card-title">Ingresar los campos para crear una nueva oferta de vehiculo.</p>
                        <form id="formVuelo">
                            <div class="form-group">
                                <label for="Marca">Marca</label>
                                <select class="form-control" name="Marca">
                                    <option>Lamborghini</option>
                                    <option>BMW</option>
                                    <option>Land Rover</option>
                                    <option>Ferrari</option>
                                    <option>Audi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Modelo">Modelo</label>
                                <select class="form-control" name="Modelo">
                                    <option>Ni idea</option>
                                    <option>Ni idea</option>
                                    <option>Ni idea</option>
                                    <option>Ni idea</option>
                                    <option>Ni idea</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Categoria">Categoria</label>
                                <input type="text" class="form-control" name="Categoria">
                            </div>
                            <div class="form-group">
                                <label for="Color">Color</label>
                                <select class="form-control" name="Color">
                                    <option>Rojo</option>
                                    <option>Azul</option>
                                    <option>Negro</option>
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
    <!-- script JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        //http://localhost:2144//Vuelos.svc/Vuelos
        $("#listar").click(function(){
            $(".result").empty();
            $.get( "http://localhost:2144//Vehiculos.svc/Vehiculos", function( data ) {
                for (i = 0; i < data.length; i++) {
                    $(".result")
                        .append('<div class="card my-1"><div class="card-header text-white bg-dark">Vehiculo id: ' + data[i].Id +'</div><div class="card-body"><ul><li>Marca: ' + data[i].Marca +'</li><li>Modelo: ' + data[i].Modelo +' - Categoria: ' + data[i].Categoria +'</li><li>Color: ' + data[i].Color +'</li></ul><p>Precio: $' + data[i].Precio +'</p><br><a class="btn btn-danger btn-block text-white" id="eliminar">Eliminar <i class="fas fa-minus-circle"></i></a></div></div>')
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
            $('#formVuelo').empty();
            $.post ({
                url: "http://localhost:2144//Vehiculos.svc/Vehiculoss",
                type: "POST",
                data: json,
                dataType: "json",
                contentType: "application/json; charset=utf-8"
            })
        });
    </script>
</body>
</html>