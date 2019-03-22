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
<div data-role="page"class="gradient">
    <div data-role="header" class="gris">
        <h1>Registro</h1>
    </div>

    <div role="main" class="ui-content">
       <center><img src="/img/rentivel.png" height="100" width="auto"></center><br>
         <form data-ajax="false" action="action_registro.php" method="post">
             <label for="cedula">Cedula</label>
            <input type="number" name="cedula" id="cedula" value="">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" value="">
            <label for="telefono">Teléfono</label>
            <input type="number" name="telefono" id="telefono" value="">
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" value="">
            <label for="clave">Clave</label>
            <input type="password" name="clave" id="clave" value=""><br>
            <button type="submit" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5">Registrarse</button>
        </form>
    </div>

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
</div>
</body>
</html>