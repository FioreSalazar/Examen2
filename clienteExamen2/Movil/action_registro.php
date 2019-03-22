<?php

include("config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $nombre =($_POST['nombre']);
      $apellido = ($_POST['apellido']);
      $cedula = ($_POST['cedula']);
      $telefono =($_POST['telefono']);
      $correo = ($_POST['correo']);
      $clave = ($_POST['clave']);
      $sql = "INSERT INTO usuarios (nombre,apellido,cedula,telefono,correo,clave,rol) VALUES( '$nombre','$apellido','$cedula','$telefono','$correo' , '$clave' ,'user')";

      if ($db->query($sql) == TRUE) {
         #echo "<script>alert('Nuevo registro insertado');</script>";
         header("location: reservaciones.php");
      }
      else {
		   echo "Error: " . $sql . "<br>" . $db->error;
		}
	   $db->close();
   }

?>
