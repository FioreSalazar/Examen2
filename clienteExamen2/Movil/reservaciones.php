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
    <div data-role="header" class="gris">
        <h1>Reservaciones</h1>
    </div>

    <div role="main" class="ui-content">
        <h3>Reservas de la base de datos</h3>
        <?php

            $sql = "SELECT fechaInicio, reserva, total FROM reservaciones WHERE usuario_id ='" . $_SESSION['login_user']."'";
            $result = $db->query($sql);
                if($result) {
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<h3>Fecha Inicio: " . $row["fechaInicio"]. "</h3>";
                            $tipoServicio = preg_replace('/[^a-zA-Z]/', '', $row["reserva"]);
                            if($tipoServicio == 'vuelo'){
                                echo '<a data-ajax="false" href="reservar-vuleo.php?id='.preg_replace('/[^0-9,.]+/i', '', $row["reserva"]).'">Ver detalles del Vuelo</a>';
                            }
                            elseif($tipoServicio == 'hotel'){
                                echo '<a data-ajax="false" href="reservar-hotel.php?id='.preg_replace('/[^0-9,.]+/i', '', $row["reserva"]).'">Ver detalles del Hotel</a>';
                            }
                            elseif($tipoServicio == 'carro'){
                                echo '<a data-ajax="false" href="reservar-vehiculo.php?id='.preg_replace('/[^0-9,.]+/i', '', $row["reserva"]).'">Ver detalles del Vehiculo</a>';
                            }
                            echo "<p>Total" . $row["total"]. "</p><hr>";
                        }
                }
            }
            $db->close();
            /*

                    if(preg_replace('/[^a-zA-Z]/', '', $row["reserva"]) == "vuelo") {
                        echo '<a href="reservar-vuleo.php?id='+preg_replace('/[^0-9,.]+/i', '',$row["reserva"])+'">Ver detalles del Hotel</a>';
                    }
                    if(preg_replace('/[^a-zA-Z]/', '', $row["reserva"]) == "hotel") {
                        echo '<a href="reservar-hotel.php?id='+preg_replace('/[^0-9,.]+/i', '',$row["reserva"])+'">Ver detalles del Hotel</a>';
                    }
                    if(preg_replace('/[^a-zA-Z]/', '', $row["reserva"]) == "carro") {
                        echo '<a href="reservar-vehiculo.php?id='+preg_replace('/[^0-
            */
        ?>
    </div><!-- /content -->

    <div data-role="footer" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a data-ajax="false" href="/vuelos.php"><i class="fas fa-plane"></i></a></li>
                <li><a data-ajax="false" href="/hoteles.php"><i class="fas fa-hotel"></i></a></li>
                <li><a data-ajax="false" href="/vehiculos.php"><i class="fas fa-car-side"></i></a></li>
                <li><a data-ajax="false" href="/action_logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>