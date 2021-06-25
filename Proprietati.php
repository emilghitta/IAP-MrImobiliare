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
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> -->
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
                <a href="#">Home</a><span>Proprietati</span>
              </div>
              <h1>Proprietati</h1>
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
        <div class="row">
           
          
            
    <?php 
        $interogare = "SELECT poza_proprietate, descriere_proprietate, locatie_proprietate, pret_proprietate, suprafata_proprietate, nr_camere, nr_bai, nr_bucatarii, status_proprietate FROM proprietati";
        $trimit = mysqli_query($cnx, $interogare) or die("Erroare: " . mysqli_error($cnx));

        while($rez = mysqli_fetch_assoc($trimit)) :?>
            <div class="probootstrap-card probootstrap-listing">
           
            <div class="probootstrap-card-media">
              <img src="img/casa1/<?= $rez['poza_proprietate'] ?>" class="img-responsive" width="100%">
            </div>
            <div class="probootstrap-card-text">
              <h2 class="probootstrap-card-heading"><a href="#"><?= $rez['descriere_proprietate'] ?></a></h2>
              <div class="probootstrap-listing-location">
                <i class="icon-location2"></i> <span><?= $rez['locatie_proprietate'] ?></span>
              </div>
              <div class="probootstrap-listing-category for-sale"><span><?= $rez['status_proprietate'] ?></span></div>
              <div class="probootstrap-listing-price"><strong>€ <?= $rez['pret_proprietate']?></strong> </div>
            </div>
            <div class="probootstrap-card-extra">
              <ul>
                <li>
                  Suprafata
                  <span><?= $rez['suprafata_proprietate'] ?> m2</span>
                </li>
                <li>
                  Camere
                  <span><?= $rez['nr_camere'] ?></span>
                </li>
                <li>
                  Bai
                  <span><?= $rez['nr_bai'] ?></span>
                </li>
                <li>
                  Bucatarii
                  <span><?= $rez['nr_bucatarii'] ?></span>
                </li>
              </ul>
            </div>
          </div>
            
            
            <?php endwhile;
        
        ?>
  
        </div>
      </div>
    </div>
  </section>


  <!-- END: section -->




  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>
  
  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>

  </body>
</html>