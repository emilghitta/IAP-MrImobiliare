<?php
session_start();

  $cod = $_POST['editez'];

  $nume_agent_edit = $_POST['nume_agent_edit'];

  $prenume_agent_edit = $_POST['prenume_agent_edit'];

  $username_agent_edit = $_POST['username_agent_edit'];

  $password_agent_edit = $_POST['password_agent_edit'];

  include 'conectare.php';

  $comanda = "UPDATE agenti SET nume_agent = '$nume_agent_edit', prenume_agent = '$prenume_agent_edit' , username = '$username_agent_edit', password = '$password_agent_edit' WHERE id_agent = '$cod'";
    


  mysqli_query($cnx, $comanda);
  mysqli_close($cnx);
  //  Reincarc "functii.php"
  header('Location: ../PaginaAdministrator.php');
 



?>



 
