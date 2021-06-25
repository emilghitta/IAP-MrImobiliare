<?php
session_start();


function corectez($sir) {
  $sir = trim($sir);
  $sir = stripslashes($sir);
    
//Convertinm caracterele speciale in entitati HTML    
  $sir = htmlspecialchars($sir);
  return $sir;
}

$descriereProprietate = corectez($_POST['descriere_proprietate']);
$locatieProprietate = corectez($_POST['locatie_proprietate']);
$pretProprietate = $_POST['pret_proprietate'];
$suprafataProprietate = corectez($_POST['suprafata_proprietate']);
$camereProprietate = corectez($_POST['camere_proprietate']);
$baiProprietate = corectez($_POST['bai_proprietate']);
$bucatariiProprietate = corectez($_POST['bucatarii_proprietate']);
$statusProprietate = corectez($_POST['status_proprietate']);
$statusPromovare = corectez($_POST['status_promovare']);
$idAgentProprietate = corectez($_POST['id_agent']);



$filename = $_FILES["fileUploadProprietate"]["name"];
$tempName = $_FILES["fileUploadProprietate"]["tmp_name"];   
$folder = "../img/casa1/".$filename;

move_uploaded_file($tempName, $folder);

include 'conectare.php';

 $comanda = "INSERT INTO proprietati (descriere_proprietate, locatie_proprietate, pret_proprietate, suprafata_proprietate,nr_camere,nr_bai,nr_bucatarii,status_proprietate,status_promovare, poza_proprietate,id_agent) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
  if($stm = mysqli_prepare($cnx, $comanda)) {
      // Parametrii sunt transferati prin mysqli_stmt_bind_param
      
 mysqli_stmt_bind_param($stm,'sssssssssss',$descriereProprietate,$locatieProprietate,$pretProprietate,$suprafataProprietate,$camereProprietate,$baiProprietate,$bucatariiProprietate,$statusProprietate,$statusPromovare,$filename,$idAgentProprietate);
      
      //Executam query-ul de mai sus
      mysqli_stmt_execute($stm);
      

      
    } else {
      echo "Eroare !!t.";
    }
    mysqli_close($cnx);
    //  Reincarc "functii.php"
    header('Location: ../PaginaAdministrator.php');
    
?>