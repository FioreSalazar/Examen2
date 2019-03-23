
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
        <h1>Acerca de nosotros</h1>
    </div>

    <div role="main" class="ui-content">
       <center><img src="/img/rentivel.png" height="200" width="auto"></center><br>
    <div class="container-fluid text-white">
        <div class="row">
            <div class="col-8 mx-auto">
                <hr class="bg-light">
                <h1 class="display text-white text-center my-2">Rentivel ofrece en una sola plataforma búsqueda y reservaciones de distintos servicios turísticos</h1>
       <center><img src="/img/Capture.png" height="140" width="auto"></center><br>
                <hr class="bg-light">
                <div class="row py-2">
                    <div class="col-md-4">
                        <img class="center-block d-block mx-auto rounded" src="img/home4.jpg" height="120">
                    </div>
                    <div class="col-8 align-self-center">
                        <h2 class="text-center">Fácil acceso a la información</h2>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-4">
                        <img class="center-block d-block mx-auto rounded" src="img/home5.jpg" height="120">
                    </div>
                    <div class="col-8 align-self-center">
                        <h2 class="text-center">Plataforma robusta</h2>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-4">
                        <img class="center-block d-block mx-auto rounded" src="img/home6.jpg" height="120">
                    </div>
                    <div class="col-8 align-self-center">
                        <h2 class="text-center">Segura para la gestión de las reservaciones</h2>
                    </div>
                </div>
                <hr class="bg-light">
                <div class="row">
                    <div class="col">
                        <h4 class="text-muted text-center my-4">Transforma busquedas en clientes.</h4>
                        <h1 class="text-center my-4">¿Que realiza nuestro sistema?</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <h4>Permite buscar  todo su catálogo de servicios en una sola plataforma.</h4>
                        <img class="center-block d-block mx-auto rounded" src="img/home7.png" height="120">
                    </div>
                    <div class="col-md">
                        <h4>Permite que los clientes se registren.</h4>
                        <img class="center-block d-block mx-auto rounded" src="img/home8.png" height="120">
                    </div>
                    <div class="col-md">
                        <h4>Permite que sus clientes reserven directamente lo que buscan.</h4>
                        <img class="center-block d-block mx-auto rounded" src="img/home9.png" height="120">
                    </div>
                </div>
                <hr class="bg-light">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center my-4">Especificación técnica</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 align-self-center">
                        <ul>
                            <li><h4 class="my-4">Posee una arquitectura distribuida ofreciendo la capacidad de la operación independiente de sus partes.</h4></li>
                            <li><h4 class="my-4">Los directorios de servicios turisticos al ser servicios web, permiten una simple lectura y publicación.</h4></li>
                        </ul>
                    </div>
                    <div class="col">
                        <img class="center-block d-block mx-auto rounded img-fluid" src="img/home10.jpg">
                    </div>
                </div>
                <hr class="bg-light">
                <h2 class="text-center">Una aplicación centralizada compuestas de 2 partes mesa de trabajo y  aplicación web // móvil, encargadas de la gestión interna de las reservaciones ofreciendo la capacidad de replicar sólo los aplicativos cliente y centralizar los catálogos.</h2>
                <img class="center-block d-block mx-auto rounded img-fluid" src="img/home11.jpg">
                <hr class="bg-light">
                <h5 class="text-white text-center">El alcance e impacto que puede llegar a tener esta herramienta es muy amplio ya que el turismo es una actividad y servicio muy requerido por el humano y el poder facilitar y empoderar la operación de las empresas que tienen como objetivo brindar este servicio promueve toda una serie de acciones que son eje transversal de cultura, sostenibilidad y paz.</h5>
                <hr class="bg-light">
            </div>
        </div>
    </div>
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
</div>
<form action="/action_reservar_vuelo.php"></form>
</body>
</html>