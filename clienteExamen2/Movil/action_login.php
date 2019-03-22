<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $correo = mysqli_real_escape_string($db,$_POST['correo']);
      $clave = mysqli_real_escape_string($db,$_POST['clave']);

      $sql = "SELECT id FROM usuarios WHERE correo = '$correo' and clave = '$clave' and rol = 'user'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      if($count == 1) {
         session_start("correo");
         $_SESSION['login_user'] = $correo;

         header("location: reservaciones.php");
      }else {
         header("location: index.php");
         $error = "Fallo en las credenciales";
      }
   }
?>