<?php
session_start();

function corectez($sir) {
  $sir = trim($sir);
  $sir = stripslashes($sir);
  $sir = htmlspecialchars($sir);
  return $sir;
}

$numeNou = corectez($_POST['nume_agent']);
$prenumeNou = corectez($_POST['prenume_agent']);
$usernameNou = corectez($_POST['username']);
$passwordNou = corectez($_POST['password']);

$fileName = $_FILES["uploadfile"]["name"];
$tempName = $_FILES["uploadfile"]["tmp_name"];   
$folder = "../img/agenti/".$fileName;

move_uploaded_file($tempName, $folder);
 
//  Nu sunt mesaje de eroare
 include 'conectare.php';
// formulez comanda INSERT
 $comanda = "INSERT INTO agenti (nume_agent, prenume_agent, username, password,poza_agent) VALUES (?,?,?,?,?)";
  if($stm = mysqli_prepare($cnx, $comanda)) {
 mysqli_stmt_bind_param($stm,'sssss',$numeNou,$prenumeNou,$usernameNou,$passwordNou,$fileName);
      mysqli_stmt_execute($stm);
      

      
    } else {
      echo "Eroare !!t.";
    }
    mysqli_close($cnx);
    //  Reincarc "functii.php"
    header('Location: ../PaginaAdministrator.php');
 

?>