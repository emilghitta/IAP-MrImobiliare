<?php
  session_start();

    $display_message_visibility = "";
    $display_message = ""; 


  function corectez($sir) {
    $sir = trim($sir);
    $sir = stripslashes($sir);
    $sir = htmlspecialchars($sir);
    return $sir;
  }

  // preiau valorile din campurile formularului (nume și parola) 
  $eroare = '';

  $nume;
  $parola;

  if(empty($_POST['username'])) {
      
    $eroare .= '<p>Nu ați introdus numele!</p>';
      
  } else {
    $nume = corectez($_POST['username']);
  }

  if(empty($_POST['password'])) {
    $eroare .= '<p>Nu ați introdus parola!</p>';

      
  } else {
    $parola = corectez($_POST['password']);
  }

  //  Verific daca preluarea datelor s-a derulat corect
  if($eroare == '') {
    //  Nu sunt mesaje de eroare
    include 'conectare.php';

    // formulez comanda SELECT
    $comanda = "SELECT username, password FROM agenti  where username = ? and password = ?";
    if ($stm = mysqli_prepare($cnx, $comanda)) {
      mysqli_stmt_bind_param($stm, 'ss',$nume, $parola);
      mysqli_stmt_execute($stm);
      $rez = mysqli_stmt_get_result($stm); // obtin multimea de selectie

        
      if ($linie = mysqli_fetch_assoc($rez) ) {
        $_SESSION['logat'] = true;
        $_SESSION['nume'] = $linie['username'];
          
    mysqli_close($cnx);
//  Reincarc "index.php"
    header('Location: ../index.php');
          
  } else {
    $display_message_visibility = "b-block";
    $display_message = "Credentiale Invalide!";      
    header("Location: ../Conectare.php?test=failed");
    
  }
         
      }else{
        header("Location: ../Conectare.php?test=failed");

      }
      mysqli_free_result($rez);
    }
  



?>