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
            background: url("/img/reportes-bg.jpg") no-repeat center center fixed;
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
                    <a class="nav-link active" href="/reportes.php"><i class="fas fa-chart-line"></i> Reportes <span class="sr-only">(activo)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/vuelos.php"><i class="fas fa-plane"></i> Vuelos</a>
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

    <div class="container">
        <div class="row">
            <div class="col-5 my-2">
                <div class="card" style="background-color:rgba(255, 255, 255, 0.9);">
                    <div class="card-body">
                    <?php
                        $sql = "SELECT * FROM reservaciones ORDER BY fechaInicio;";
                        $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            echo '<h2><i class="fas fa-book-open"></i> Total de reservaciones '.$result->num_rows.'</h2>';

                            while($row = $result->fetch_assoc()) {
                                echo '<div class="card p-3 m-2">';
                                echo "<h3>Fecha Inicio: " . $row["fechaInicio"]. "</h3>";
                                $tipoServicio = preg_replace('/[^a-zA-Z]/', '', $row["reserva"]);
                                if($tipoServicio == 'vuelo'){
                                    echo '<i class="fas fa-plane fa-2x"></i><p>Tipo de servicio vuelo<hr>';
                                }
                                elseif($tipoServicio == 'hotel'){
                                    echo '<i class="fas fa-hotel fa-2x"></i><p>Tipo de servicio hotel<hr>';
                                }
                                elseif($tipoServicio == 'carro'){
                                    echo '<i class="fas fa-car-side fa-2x"></i><p>Tipo de servicio carro<hr>';
                                }
                                echo "<p>Total" . $row["total"]. "</p><hr>";
                                echo '</div>';
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-7 my-2">
                <div class="card" style="background-color:rgba(255, 255, 255, 0.9);">
                    <div class="card-body">
                    <?php
                        $sql = "select count(*) as total, usuario_id, nombre, apellido from reservaciones left join usuarios u on reservaciones.usuario_id = u.correo group by usuario_id ;";
                        $result = $db->query($sql);
                        echo '<h2><i class="fas fa-users"></i> Total de usuarios '.$result->num_rows.'</h2>';

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="card p-3 m-2">';
                                echo "<h3>Nombre del usuario: " . $row["nombre"]. " ". $row["apellido"]."</h3>";
                                echo "<h4>Correo: <a href='mailto:" . $row["usuario_id"]. "'>". $row["usuario_id"]."<a/></h4>";
                                echo "<h5>Total de reservas " . $row["total"]. "</h5><hr>";
                                echo '</div>';
                            }
                        }
                        $db->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>