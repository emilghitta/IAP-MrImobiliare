<?php
session_start();

  $cod = $_POST['editez'];

// Preiau valorile trimise prin formularul de editare agent prin metoda POST si le stochez in variabile pentru ca valoarea lor sa fie utilizata mai departe.

  $nume_agent_edit = $_POST['nume_agent_edit'];

  $prenume_agent_edit = $_POST['prenume_agent_edit'];

  $username_agent_edit = $_POST['username_agent_edit'];

  $password_agent_edit = $_POST['password_agent_edit'];

  include 'conectare.php';

// Creem query-ul pentru updatarea agentilor in baza de date iar ca valoare pe coloanele respective sunt date rezultatele form-ului (ce au fost stocate mai sus in variabile)

  $comanda = "UPDATE agenti SET nume_agent = '$nume_agent_edit', prenume_agent = '$prenume_agent_edit' , username = '$username_agent_edit', password = '$password_agent_edit' WHERE id_agent = '$cod'";
    
//Executam query-ul catre conexiunea noastra si cu comanda de mai sus

  mysqli_query($cnx, $comanda);
  mysqli_close($cnx);
  //  Reincarc "functii.php"
  header('Location: ../PaginaAdministrator.php');
 



?>

