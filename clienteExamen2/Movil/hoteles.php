<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<div data-role="page">
    <div data-role="header" class="hotel">
        <h1>Hoteles</h1>
    </div>

    <div role="main" class="ui-content">
        <a href="#mypanel" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-search">Abrir buscador</a>
        <div class="result"></div>
    </div><!-- /content -->

    <div data-role="footer" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a data-ajax="false" href="/vuelos.php"><i class="fas fa-plane"></i></a></li>
                <li><a data-ajax="false" href="/hoteles.php"><i class="fas fa-hotel"></i></a></li>
                <li><a data-ajax="false" href="/vehiculos.php"><i class="fas fa-car-side"></i></a></li>
                <li><a data-ajax="false" href="/index.php"><i class="fas fa-user"></i></a></li>
            </ul>
        </div>
    </div>
    <div data-role="panel" id="mypanel" class="gradient-hotel">
        <label for="select-native-6" class="text-light">Ubicación:</label>
        <select name="select-native-6" id="select-native-6" data-mini="true">
            <option>Barranquilla</option>
            <option>Busan</option>
            <option>Cali</option>
            <option>Guanacaste</option>
            <option>Heredia</option>
            <option>Madrid</option>
            <option>Nueva York, a 0.5 millas de: Times Square</option>
            <option>Perú</option>
            <option>Puntarenas</option>
            <option>Sabana</option>
            <option>Singapore</option>
            <option>Tamarindo</option>
        </select>
        <label for="select-native-6" class="text-light">Tipo de habitación:</label>
        <select name="select-native-6" id="select-native-6" data-mini="true">
            <option>Doble</option>
            <option>Matrimonial</option>
            <option>Sencilla</option>
            <option>Suite</option>
        </select>
        <label for="submit-6" class="text-light">Buscar:</label>
        <a id="listar" class="ui-shadow ui-btn ui-corner-all">Buscar</a>
        <a href="#header" data-rel="close" class="ui-shadow ui-btn ui-corner-all">Cerrar buscador</a>
    </div><!-- /panel -->
<script>
    //http://localhost:2144//Vuelos.svc/Vuelos
    $("#listar").click(function(){
        $(".result").empty();
        $.get( "http://localhost:2144/Hoteles.svc/Hoteles", function( data ) {
            console.log(data[0]);
            for (i = 0; i < data.length; i++) {
                $(".result")
                .append('<div><a data-ajax="false" href="reservar-hotel.php?id='+data[i].Id+'"><h2><i class="fas fa-hotel"></i> ' + data[i].Nombre +'</h2><p><i class="fas fa-phone-square"></i> Telefono: ' + data[i].Telefono +'</p><p><i class="fas fa-location-arrow"></i> Ubicacion: ' + data[i].Ubicacion +'</p></p>PRECIO: $'+data[i].Precio+'</p></a><hr/></div>');
            }
        })
    });
</script>
</div>

</body>
</html>