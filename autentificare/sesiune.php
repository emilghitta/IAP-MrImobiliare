<?php 
session_start();
if(isset($_SESSION['logat']) && $_SESSION['logat'] == true) {
  $nume = '<i class="fa fa-user-o" aria-hidden="true"></i>' . '  ' . $_SESSION['nume'];
  $display_btcon = "d-none";   //  Butonul Conectare nu va fi vizibil
  $display_btdecon = "d-block";   //  Butonul Deonectare va fi vizibil
   
} else {
  $nume = '<i class="fa fa-user-o" aria-hidden="true"></i>   Nelogat';
  $display_btcon = "d-block";  //  Butonul Conectare va fi vizibil
  $display_btdecon = "d-none";   //  Butonul Deonectare nu va fi vizibil

    
}




include 'conectare.php';
?>