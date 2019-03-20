<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select correo from usuarios where correo = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['correo'];

   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>