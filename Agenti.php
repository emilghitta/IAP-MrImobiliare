<?php
    include 'Header.php';    


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

  <!-- END: header -->
  <section class="probootstrap-slider flexslider2 page-inner">
    <div class="overlay"></div>
    <div class="probootstrap-wrap-banner">
      <div class="container">
        <div class="row">
          <div class="col-md-8">

            <div class="page-title probootstrap-animate">
              <div class="probootstrap-breadcrumbs">
                <a href="#">Home</a><span>Agenti</span>
              </div>
              <h1>Agenti</h1>
            </div>

          </div>
        </div>
      </div>
    </div>
    <ul class="slides">
      <li style="background-image: url(img/slider_1.jpg);"></li>
      <li style="background-image: url(img/slider_4.jpg);"></li>
      <li style="background-image: url(img/slider_2.jpg);"></li>
    </ul>
  </section>
      
      
  <!-- END: slider  -->
      
    <section class="probootstrap-section probootstrap-section-lighter">
    <div class="container">
      <div class="row heading">
        <h2 class="mt0 mb50 text-center">Our Agents</h2>
      </div>
      <div class="row">
      
<?php 
        
        $interogare = "SELECT nume_agent, prenume_agent, poza_agent FROM agenti";
        $trimit = mysqli_query($cnx, $interogare) or die("Eroare:" . mysqli_error($cnx));

        while($rez = mysqli_fetch_assoc($trimit)) :?>
          
     <div class="col-md-3 col-sm-6">
          <div class="probootstrap-card probootstrap-person text-left">
            <div class="probootstrap-card-media">
              <img src="img/agenti/<?= $rez['poza_agent'] ?>" class="img-responsive">
            </div>
            <div class="probootstrap-card-text">
              <h2 class="probootstrap-card-heading mb0"> <?= $rez['nume_agent'] ?> <?= $rez['prenume_agent'] ?></h2>
            </div>
          </div>
        </div>
      
        <?php endwhile;
            
            ?>

      </div>
    </div>
  </section>


  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>
  

  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>

  </body>
</html>