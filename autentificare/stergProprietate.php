<?php
session_start();

$cod = $_GET['stergProprietate'];
include 'conectare.php';

$comandaStergere = "DELETE  FROM proprietati where id_proprietate = $cod";
$numePoza = "SELECT poza_proprietate FROM proprietati where id_proprietate = $cod";


$stergPoza = mysqli_query($cnx, $numePoza);
$rez = mysqli_fetch_assoc($stergPoza);
     $folder = "../img/casa1/".$rez['poza_proprietate'];

  mysqli_query($cnx, $comandaStergere);

//Prin comanda unlik o sa stergem imaginea din path-ul server-ului nostru. Stergem imaginea ca odata la stergea user-ului sa nu lasam artefacte in folder-ul de pe server
  !unlink($folder);

  mysqli_close($cnx);
  //  Reincarc "functii.php"

        header("Location: ../PaginaAdministrator.php");



?>