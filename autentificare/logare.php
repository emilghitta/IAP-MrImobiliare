<?php
    session_start();

    $display_message_visibility = "";
    $display_message = ""; 


//In cazul in care exista un user logat cu sessiune activa atunci se inlocuieste butonul de conectare cu numele user-ului in nav bar (header)
if(isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
  $nume = '<i class="fa fa-user-o" aria-hidden="true"></i>' . '  ' . $_SESSION['nume'];
  $display_btcon = "d-none";   //  Butonul Conectare nu va fi vizibil
  $display_btdecon = "d-block";   //  Butonul Deonectare va fi vizibil
    
 //In cazul in care nu exista un user logat cu sessiune activa atunci butonu lde conectare agent o sa fie displayed in navbare (header)   
} else {
  $nume = '<i class="fa fa-user-o" aria-hidden="true"></i>   Nelogat';
  $display_btcon = "d-block";  //  Butonul Conectare va fi vizibil
  $display_btdecon = "d-none";   //  Butonul Deonectare nu va fi vizibil

    
}

//Declaram 3 metode care o sa ne ajute in logica de evaluare pe baza careia se v-a conecta sau nu cu success utilizatorul.

  $nume;
  $parola;


//Ne ajuta pentru nav bar in header.php
$pagina;

//In cazul in care avem o sessiune activa cu user-ul MrImobiliare atunci la accesarea paginii specifice de utilizatori o sa primim Pagina Administrator-ului. In cazul in care sesiunea activa este pe un alt user decat MrImobiliare atunci la accesarea paginii specifice de utilizatori o sa primim Pagina Agentului (Doar agentii si administratorului se poate loga in aplicatia noastra)

    if($_SESSION['nume'] == "MrImobiliare"){
          $pagina = 'PaginaAdministrator.php';
      }else{
          $pagina = 'PaginaAgenti.php';
      }


// Impiedicam inserarea codului html in formular (XSS attack) prin metoda corectez care ne returneaza parametrul dat corectat.
  function corectez($sir) {
    $sir = trim($sir);
    $sir = stripslashes($sir);
    $sir = htmlspecialchars($sir);
    return $sir;
  }

  
  $eroare = '';

// preiau valorile din campurile formularului (nume și parola) 

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

    // formulez comenzile de select care v-or interoga 2 tabele (cel al agentului si cel al administratorului de aplicatie)
    $comanda = "SELECT username, password FROM agenti  where username = ? and password = ?";
    $comanda2 = "SELECT username, password FROM admin where username = ? and password = ?";  
      
    if ($stm = mysqli_prepare($cnx, $comanda)) {
      mysqli_stmt_bind_param($stm, 'ss',$nume, $parola);
      mysqli_stmt_execute($stm);
      $rez = mysqli_stmt_get_result($stm); 
     
        
        // Stabilim variabilele sesiunii (de aici reiese si ce username o sa fie conectat). In cazul in care exista un query valid pe comanda 1 de agent:
      if ($linie = mysqli_fetch_assoc($rez) ) {
        $_SESSION['logat'] = true;
        $_SESSION['nume'] = $linie['username'];

          
    mysqli_close($cnx);
//  Reincarc "index.php"
    header('Location: ../index.php');
          
  } else {
          
          //In cazul in care se incearca conectarea cu credentialele admin-ului si astfel comanda2 e singura care returneaza ceva o sa executam codul de mai jos
          $stm = mysqli_prepare($cnx,$comanda2);
          mysqli_stmt_bind_param($stm, 'ss',$nume, $parola);
          mysqli_stmt_execute($stm);
          $rez = mysqli_stmt_get_result($stm);
          
          //O sa setam astfel session variabila de nume pe username-ul administratorului logat
          if($linie = mysqli_fetch_assoc($rez)){
              $_SESSION['logat'] = true;
              $_SESSION['nume'] = $linie['username'];
              
                mysqli_close($cnx);
//  Reincarc "index.php"
    header('Location: ../index.php');
          }else{
              
              //In cazul in care ambele query-uri nu returneaza nimic (utilizator-ul sau parola sun invalide atunci o sa facem display la mesajul de eroare in pagina de logare)
                 $display_message_visibility = "b-block";
                $display_message = "Credentiale Invalide!";  
              //V-om face un page referesh si v-om adauga ca query parameter test=failed care reprezinta o conditie de activare a script-ului nostru din custom.js
                header("Location: ../Conectare.php?test=failed");
          }
  }
         
      }else{
        header("Location: ../Conectare.php?test=failed");

      }
      mysqli_free_result($rez);
    }
  
include 'conectare.php';


?>