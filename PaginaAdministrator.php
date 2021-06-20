<?php
    include 'Header.php';
    
//    session_start();
    if(!isset($_SESSION['logat'])){
        header("Location: Conectare.php");
} else if($_SESSION['nume'] != "MrImobiliare" ){
        header("Location: index.php");
        
        //Trebuie incercata renuntarea la hardcodarea numelui utilizatorului (in locul MrImobiliare sa facem un retrieve la numele din tabelul admin)
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mr.Imobiliare</title>
    <meta name="description" content="Imobiliare Transilvania de Nord">
    <meta name="keywords" content="Imobiliare Satu Mare, Imobiliare Baia Mare">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

  </head>

<body>
  <!-- START: header -->
  
  <div class="probootstrap-loader"></div>
      
        
   
<div class="back">

  <div class="div-center">
    <div class="content">
         <a href="autentificare/delogare.php" class="btn btn-primary">Delogare</a>

    </div>

  </div>

</div>



      


  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>
  

  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>
    
</body> 
</html>