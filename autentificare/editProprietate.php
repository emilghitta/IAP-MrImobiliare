<?php

session_start();

$codPropr = $_POST['editezProprietate'];

$descrierePropr = $_POST['descriere'];
$locatiePropr = $_POST['locatie'];
$pretPropr = $_POST['pret'];
$suprafataPropr = $_POST['suprafata'];
$camerePropr = $_POST['camere'];
$baiPropr = $_POST['bai'];
$bucatariiPropr = $_POST['bucatarii'];
$statusVanzarePropr = $_POST['statusProprietate'];
$statusPromovarePropr = $_POST['promovare'];

include 'conectare.php';

$comandaProp = "UPDATE proprietati SET descriere_proprietate = '$descrierePropr', locatie_proprietate = '$locatiePropr', pret_proprietate = '$pretPropr', suprafata_proprietate = '$suprafataPropr',suprafata_proprietate = '$suprafataPropr', nr_camere = '$camerePropr', nr_bai = '$baiPropr', nr_bucatarii = '$bucatariiPropr', status_proprietate = '$statusVanzarePropr', status_promovare = '$statusPromovarePropr'";

mysqli_query($cnx, $comandaProp);
mysqli_close($cnx);

header('Location: ../PaginaAgenti.php');






?>