<?php
session_start();

$cod = $_GET['stergProprietate'];
include 'conectare.php';

$comandaStergere = "DELETE  FROM proprietati where id_proprietate = $cod";

mysql_query($cnx,$comanda);
mysqli_close($cnx);

header('Location: ../PaginaAgenti.php');



?>