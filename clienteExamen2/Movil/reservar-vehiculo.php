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
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<div data-role="page">
    <div data-role="header" class="vehiculo">
        <h1>Vehiculo</h1>
    </div>

    <div role="main" class="ui-content">
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
<script>
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

    //http://localhost:2144//Vuelos.svc/Vuelos
$( document ).ready(function() {
        $(".result").empty();
        var id = getUrlParameter('id');
        var url = "http://localhost:2144/Carros.svc/Carros/" + id;
        $.get(url , function( data ) {
                $(".result")
                .append('<h4><i class="fas fa-car"></i> Marca: ' + data.Marca +'</h4><p>Modelo: ' + data.Modelo +'</p><p>Categoria: ' + data.Categoria +'</p><p <?php echo $_SESSION['login_user']; ?>><i class="fas fa-palette"></i> Color: ' + data.Color +'</p><p>Precio: $' + data.Precio +'</p><br><hr/><form action="/action_reservar_vehiculo.php" method="post" data-ajax="false"><input type="hidden" name="user" id="user" value="<?php echo $_SESSION['login_user']; ?>"><input type="hidden" name="reserva" id="reserva" value="carro'+ data.Id +'"><input type="hidden" name="total" id="total" value="'+ data.Precio    +'"><label for="text-basic">Fecha de reservación:</label><input type="date" name="date" id="date" value=""><label for="dias" class="select">Cantidad de dias</label><select name="dias" id="dias"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option></select><button class="ui-btn vuelo" type="submit">Reservar</button></form>');
        })
});
</script>
</div>

</body>
</html>