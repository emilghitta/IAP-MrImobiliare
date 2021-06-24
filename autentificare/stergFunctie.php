<?php
session_start();

  $cod = $_GET['sterg']; // Preiau query param-ul cu cheia de sterg 
  include 'conectare.php';

//Pregatim 2 comenzi SQL, una de stergere a tabelului conform id-ului de stergere dat si una prin care gasim numele pozei agentului (pe care dorim sa il stergem)

  $comanda = "DELETE FROM agenti where id_agent = $cod";
  $numePoza = "SELECT poza_agent FROM agenti where id_agent = $cod";


//Prima data executam query-ul si stocam return-ul in variabila $rez care v-a fi apoi utilizata in alta variabila %folder ce o sa contina path-ul catre poze + numele pozei luat ca rezultat al query-ului

$stergPoza = mysqli_query($cnx, $numePoza);
$rez = mysqli_fetch_assoc($stergPoza);
     $folder = "../img/agenti/".$rez['poza_agent'];


//Executam Comanda generala de stergere a tabelului de agenti
  mysqli_query($cnx, $comanda);

//Prin comanda unlik o sa stergem imaginea din path-ul server-ului nostru. Stergem imaginea ca odata la stergea user-ului sa nu lasam artefacte in folder-ul de pe server
  !unlink($folder);

  mysqli_close($cnx);
  //  Reincarc "functii.php"
  header('Location: ../PaginaAdministrator.php');

?>