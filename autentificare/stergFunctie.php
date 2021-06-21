<?php
session_start();

  $cod = $_GET['sterg'];
  include 'conectare.php';
  $comanda = "DELETE FROM agenti where id_agent = $cod";
  mysqli_query($cnx, $comanda);
  mysqli_close($cnx);
  //  Reincarc "functii.php"
  header('Location: ../PaginaAdministrator.php');

?>