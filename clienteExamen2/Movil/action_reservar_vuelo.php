<?php

include("config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {


      $user =($_POST['user']);
      $reserva = ($_POST['reserva']);
      $total = ($_POST['total']);
      $date =($_POST['date']);
      $sql = "INSERT INTO reservaciones (usuario_id,fechaInicio,reserva,total) VALUES( '$user', '$date', '$reserva', '$total')";

      if ($db->query($sql) == TRUE) {
        header("location: gracias.php");
     }
     else {
       header("location: oops.php");
		}
	   $db->close();
   }

?>