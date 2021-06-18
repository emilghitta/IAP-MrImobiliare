<?php
    include 'Header.php';
    include 'autentificare/logare.php';


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mr.Imobiliare</title>
    <meta name="description" content="Imobiliare Transilvania de Nord">
    <meta name="keywords" content="Imobiliare Satu Mare, Imobiliare Baia Mare">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
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
        
        <div class="">
        <h4></h4>
        
        </div>
           

    
          
      <h3>Login</h3>
      <hr />
        
      <form action="autentificare/logare.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Utilizator</label>
          <input type="input" name="username" class="form-control" id="exampleInputEmail1" placeholder="utilizator" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Parola</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="parola" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <hr />


      </form>

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