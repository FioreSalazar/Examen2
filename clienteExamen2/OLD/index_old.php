<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .myButton {
	-moz-box-shadow: 3px 4px 0px 0px #8a2a21;
	-webkit-box-shadow: 3px 4px 0px 0px #8a2a21;
	box-shadow: 3px 4px 0px 0px #8a2a21;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24437));
	background:-moz-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:-webkit-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:-o-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:-ms-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:linear-gradient(to bottom, #c62d1f 5%, #f24437 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24437',GradientType=0);
	background-color:#c62d1f;
	-moz-border-radius:18px;
	-webkit-border-radius:18px;
	border-radius:18px;
	border:1px solid #d02718;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:7px 25px;
	text-decoration:none;
	text-shadow:0px 1px 0px #810e05;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24437), color-stop(1, #c62d1f));
	background:-moz-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:-webkit-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:-o-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:-ms-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:linear-gradient(to bottom, #f24437 5%, #c62d1f 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24437', endColorstr='#c62d1f',GradientType=0);
	background-color:#f24437;
}
.myButton:active {
	position:relative;
	top:1px;
}
    </style>
</head>
<body>

    <h3>Mantenimiento Hoteles</h3>
    <form id="formHotel">
        <p>Nombre</p>
        <input type="text" name="Nombre">
        <p>Telefono</p>
        <input type="text" name="Telefono">
        <p>Ubicacion</p>
        <input type="text" name="Ubicacion">
        <p>TipoHabitacion</p>
        <input type="text" name="TipoHabitacion">
        <p>Precio</p>
        <input type="text" name="Precio">
        <hr>
        <a class="myButton" type="submit" id="crear">Crear</a>

    </form>

    <a class="myButton" type="submit" id="listar">Obtener lista</a>
    <h3>Listar Hoteles</h3>
    <div class="result"></div>
    <script
        src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script>
        //http://localhost:2144/Hoteles.svc/Hoteles
        $("#listar").click(function(){
            $(".result").empty();
            $.get( "http://localhost:2144/Hoteles.svc/Hoteles", function( data ) {
                console.log(data);
                for (i = 0; i < data.length; i++) {
                    $(".result")
                    .append( '<div style="border:solid #000 1px;background-color:#acacac;margin:10px;padding:2px;"><p>Nombre: ' + data[i].Nombre + '</p><p>Habitacion: ' + data[i].TipoHabitacion + '</p><p>Telefono: ' + data[i].Telefono + '</p><a class="myButton" type="submit">Eliminar</a><br/><a class="myButton" type="submit" id="actualizar">Actualizar</a></div>');
                }
            })
        });
        $("#crear").click(function(){
            var mydata = $('#formHotel').serializeArray();
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
                url: "http://localhost:2144/Hoteles.svc/Hoteles",
                type: "POST",
                data: json,
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                success: function(){
                    $(".result")
                    .empty()
                    .append('<p>Insert con exito!</p>');
                }
            })
        });
    </script>
</body>
</html>