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
 



//  Nu sunt mesaje de eroare
 include 'conectare.php';
// formulez comanda INSERT
 $comanda = "INSERT INTO agenti (nume_agent, prenume_agent, username, password) VALUES (?,?,?,?)";
  if($stm = mysqli_prepare($cnx, $comanda)) {
 mysqli_stmt_bind_param($stm,'ssss',$numeNou,$prenumeNou,$usernameNou,$passwordNou);
      mysqli_stmt_execute($stm);
    } else {
      echo "Eroare !!t.";
    }
    mysqli_close($cnx);
    //  Reincarc "functii.php"
    header('Location: ../PaginaAdministrator.php');
 

?>