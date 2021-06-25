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
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

  </head>
  <body>

  <!-- Header -->
  
  <div class="probootstrap-loader"></div>
      
      
  <!-- Header -->
      
  <section class="probootstrap-slider flexslider">
    <div class="probootstrap-wrap-banner">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

            <div class="probootstrap-home-search probootstrap-animate">
              <form action="" method="post">
                <h2 class="heading">Gaseste-ti casa visurilor</h2>
                <div class="probootstrap-field-group">
                  <div class="probootstrap-fields">
                    
                    <div class="search-field">
                      <i class="icon-location2"></i>
                      <input type="text" class="form-control" placeholder="Enter address, ZIP code, Neighborhoods">
                    </div>
                    <div class="search-category">
                      <i class="icon-chevron-down"></i>
                      <select name="#" id="" class="form-control">
                        <option value="">Vanzare</option>
                        <option value="">Inchiriere</option>
                      </select>
                    </div>
                  </div>
                  <button class="btn btn-success" type="submit"><i class="icon-magnifying-glass t2"></i> Start Search</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
    <ul class="slides">
      <li style="background-image: url(img/slider_1.jpg);" class="overlay"></li>
    </ul>
  </section>
  <!-- END: slider  -->

  <!-- END: section -->

  <section class="probootstrap-section probootstrap-section-lighter">
    <div class="container">
      <div class="row heading">
        <h2 class="mt0 mb50 text-center">Proprietati Promovate</h2>
      </div>
      <div class="row">
          
    <?php
          
          $interogareProprietatiPromovate = "SELECT poza_proprietate, descriere_proprietate, locatie_proprietate, pret_proprietate, suprafata_proprietate, nr_camere, nr_bucatarii, nr_bai, status_proprietate FROM proprietati WHERE status_promovare = '1'";
          $trimitQueryProprietatiPromovate = mysqli_query($cnx,$interogareProprietatiPromovate) or die("Errorare: " . mysqli_error($cnx));
          
          while($rezProprietatiPromovate = mysqli_fetch_assoc($trimitQueryProprietatiPromovate)) :?>
          
          
        <div class="col-md-4 col-sm-6">
          <div class="probootstrap-card probootstrap-listing">
            <div class="probootstrap-card-media">
              <img src="img/casa1/<?= $rezProprietatiPromovate['poza_proprietate'] ?>" class="img-responsive" alt="Free HTML5 Template by uicookies.com">
              <a href="#" class="probootstrap-love"><i class="icon-heart"></i></a>
            </div>
            <div class="probootstrap-card-text">
              <h2 class="probootstrap-card-heading"><a href="#"><?= $rezProprietatiPromovate['descriere_proprietate']?></a></h2>
              <div class="probootstrap-listing-location">
                <i class="icon-location2"></i> <span><?= $rezProprietatiPromovate['locatie_proprietate'] ?></span>
              </div>
              <div class="probootstrap-listing-category for-sale"><span><?= $rezProprietatiPromovate['status_proprietate'] ?></span></div>
              <div class="probootstrap-listing-price"><strong>$ <?= $rezProprietatiPromovate['pret_proprietate'] ?></strong></div>
            </div>
            <div class="probootstrap-card-extra">
              <ul>
                <li>
                  Suprafata
                  <span><?= $rezProprietatiPromovate['suprafata_proprietate']?> m2</span>
                </li>
                <li>
                  Camere
                  <span><?= $rezProprietatiPromovate['nr_camere']?></span>
                </li>
                <li>
                  Bai
                  <span><?= $rezProprietatiPromovate['nr_bai']?></span>
                </li>
                <li>
                  Bucatarii
                  <span><?= $rezProprietatiPromovate['nr_bucatarii']?></span>
                </li>
              </ul>
            </div>
          </div>
            
            <?php endwhile;
                   
                   ?>
          <!-- END listing -->
        </div>
          
          
      </div>
    </div>
  </section>

  <!-- END: section -->

  <section class="probootstrap-section probootstrap-section-lighter">
    <div class="container">
      <div class="row heading">
        <h2 class="mt0 mb50 text-center">Agentii Nostrii</h2>
      </div>
        
          <div class="row">
        
        <?php 
        
        $interogare = "SELECT nume_agent, prenume_agent, poza_agent FROM agenti";
        $trimit = mysqli_query($cnx, $interogare) or die("Eroare:" . mysqli_error($cnx));

        while($rez = mysqli_fetch_assoc($trimit)) :?>
          
         <div class="col-md-3">
          <div class="probootstrap-card probootstrap-person text-left">
            <div class="probootstrap-card-media">
              <img src="img/agenti/<?= $rez['poza_agent'] ?>" class="img-responsive">
            </div>
            <div class="probootstrap-card-text">
              <h2 class="probootstrap-card-heading mb0"><?= $rez['nume_agent'] ?> <?= $rez['prenume_agent'] ?></h2>
                
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