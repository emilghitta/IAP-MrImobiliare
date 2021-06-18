<?php
     include 'autentificare/sesiune.php';

?>

<!DOCTYPE html>
<html>
    
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body>
     <!-- START: header -->
  
  <div class="probootstrap-loader"></div>

  <header role="banner" class="probootstrap-header">
    <div class="container">
        <a href="index.php" class="probootstrap-logo">Mr.Imobiliare</a>
        
        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="Proprietati.php">Proprietati</a></li>
            <li class="active"><a href="Agenti.php">Agenti</a></li>
            <li><a href="Contact.php">Contact</a></li>
              
              
             
            <li class = "<?= $display_btcon ?>">
            <a href="Conectare.php" class="btn-get-started">Conectare Agent</a>  
            </li> 
          
         
            <li class = "<?= $display_btdecon ?>">
            <a href="autentificare/delogare.php" class="btn-get-started"><?= $nume ?></a>  
            </li> 
        
            
                  
          </ul>
          <div class="extra-text visible-xs"> 
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
             <h5>Adresa</h5>
            <p>Satu Mare, Str Petru Bran nr 5</p>
            <h5>Connect</h5>
            <ul class="social-buttons">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook2"></i></a></li>
              <li><a href="#"><i class="icon-instagram2"></i></a></li>
              <li><?= $nume ?></li>    
            </ul>
          </div>
        
            
        </nav>
    </div>
  </header>
  <!-- END: header -->
    
    
    
  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>
  

  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>
</body>



</html>