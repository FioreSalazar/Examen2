<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
        body {
            background-image: linear-gradient(-90deg, lightblue, teal);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">RENTIVEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card my-2" style="background-color:rgba(255, 255, 255, 0.8);">
                    <div class="card-header bg-dark text-white">
                        <h2 class="text-center font-weight-bold">Iniciar sesion</h2>
                    </div>
                    <div class="card-body">
                        <img class="img-fluid center-block d-block mx-auto" alt="Expotur logo" src="img/rentivel.png">
                        <form class="form-horizontal form-signin" method="POST" action="/action_login.php">
                            <div class="form-group">
                                <label for="correo">Usuario:</label>
                                <input type="email" id="correo" class="form-control" name="correo" placeholder="Correo electronico" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="clave">Contraseña</label>
                                <input type="password" id="inputPassword" class="form-control" name="clave" placeholder="Contraseña" required>
                            </div>
                            <button class="btn btn-lg btn-primary" type="submit">Entrar</button>
                            <!-- <a class="btn btn-outline-primary" href="/password/reset">Recuperar la contraseña</a> -->
                            <?php if(isset($error)) { echo $error; } ?>
                        </form>
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