<?php
    include 'Header.php';

//In cazul in care nu avem o sesiune activa, nu putem sa accesam pagina de agenti in mod direct (ne v-om redirectiona spre Conectare.php). 

    if(!isset($_SESSION['logat'])){
        header("Location: Conectare.php");
}else if($_SESSION['nume'] == "MrImobiliare" ){
        header("Location: index.php");
        
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
      
      <style>
          
    table, th, td {
  border: 1px solid black;
}

    table td{
  width: 100%;
}  
          
}

          
      </style>

  </head>

<body>
  <!-- START: header -->
  
  <div class="probootstrap-loader"></div>
      
        
   
<div class="back">

  <div class="div-center">
      
        <main id="main">
      <div class="container">
          <h2 class="text-center" style="padding-top: 120px;">Detalii Cont:</h2>
      </div>
      <div class="container" style="width: 500px;">
        <table class="table mt-5" style="border-bottom: 2px solid #DEE2E6">
          <thead>
            <tr>
              <th scope="col">Nume</th>
              <th scope="col">Prenume</th>
              <th scope="col">Password</th>
              <th scope="col">Optiuni</th>
        
            </tr>
          </thead>
          <tbody>
<?php
    //O sa facem retrieve doar la username-ul logat...astfel sa nu putem edita alti useri din contu de agent
  $sessionUsername = $_SESSION['nume'];              
  $interogare = "SELECT id_agent,nume_agent,prenume_agent,username,password FROM agenti where username = '$sessionUsername'";
  $linii = mysqli_query($cnx, $interogare) or die("Eroare: " . mysqli_error($cnx));
  $i = 1;  
  $rez = mysqli_fetch_assoc($linii)
?>
            <tr>
              <td class="w-70"><?= $rez['nume_agent'] ?></td>
              <td class="w-70"><?= $rez['prenume_agent'] ?></td> 
              <td class="w-70"><?= $rez['password'] ?></td> 
              <td class="w-30 text-center">
                <a href="PaginaAgenti.php?editez=<?= $rez['id_agent'] ?>">
                  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>  
              </td>
            </tr>
              
          </tbody>
        </table> 
      </div>        
            
            
<?php
  //  Cautam agentul care trebuie edita bazat pe id-ul agentului care este egal cu valoarea lui editez
      
            if(isset($_GET["editez"])){
  $editez = $_GET["editez"]; 
  $caut = "SELECT * FROM agenti where id_agent = $editez";
  $rezultat = mysqli_query($cnx, $caut);
  $rez = mysqli_fetch_assoc($rezultat);
 
            }
            

?>
            
            <div class="container mt-5" id="editareActivata" style="width: 500px;display:none; ">
                <h3>Editeaza Agent:</h3>
        <form method="post" action="autentificare/editFunctie.php">
          <input type="hidden" name="editez" value="<?= $editez ?>">
          <div class="form-group">
            <label for="functia">Nume Agent:</label>
            <input class="form-control" id="nume_agent_edit" name="nume_agent_edit" type="text" value="<?= $rez['nume_agent'] ?>">
            <label for="functia">Prenume Agent:</label>
            <input class="form-control" id="prenume_agent_edit" name="prenume_agent_edit" type="text" value="<?= $rez['prenume_agent'] ?>">
            <label for="functia">Password Agent:</label>
            <input class="form-control" id="password_agent_edit" name="password_agent_edit" type="text" value="<?= $rez['password'] ?>">
        
          </div>
              
          <button type="submit" class="btn btn-secondary ">Modifică!</button>
        </form>
      </div>
            
   <div class="container">
          <h2  style="padding-top: 120px;">Proprietati:</h2>
      </div>
      <div style="width: 500px;">
        <table class="table mt-5" style="border-bottom: 2px solid #DEE2E6">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Descriere Proprietate:</th>    
              <th scope="col">Locatie</th>
              <th scope="col">Pret</th>
              <th scope="col">Suprafata</th>
              <th scope="col">Nr.Camere</th>
              <th scope="col">Nr.Bai</th>    
              <th scope="col">Nr.Bucatarii</th>    
              <th scope="col">Status</th>
              <th scope="col">Status Promovare</th>
                
              <th scope="col" class="text-center">Operații</th>
            </tr>
          </thead>
          <tbody>
<?php
 $interogareId = "SELECT id_agent from agenti where username = '$sessionUsername' ";
  $agentID = mysqli_query($cnx, $interogareId) or die("Eroare: " . mysqli_error($cnx));
  $i = 1;  
  $rezAgentId = mysqli_fetch_assoc($agentID);
  $agent = $rezAgentId['id_agent'];             
  
  $interogareProprietati = "SELECT * FROM proprietati where id_agent = '$agent'";
  $liniiProprietate = mysqli_query($cnx, $interogareProprietati) or die("Eroare: " . mysqli_error($cnx));
  $i = 1;  
  while($rezProp = mysqli_fetch_assoc($liniiProprietate)):
?>
            <tr>
              <td class="w-70"><?= $rezProp['id_proprietate'] ?></td>
              <td class="w-70"><?= $rezProp['descriere_proprietate'] ?></td> 
              <td class="w-70"><?= $rezProp['locatie_proprietate'] ?></td>
              <td class="w-70"><?= $rezProp['pret_proprietate'] ?></td> 
             <td class="w-70"><?= $rezProp['suprafata_proprietate'] ?></td> 
             <td class="w-70"><?= $rezProp['nr_camere'] ?></td> 
             <td class="w-70"><?= $rezProp['nr_bai'] ?></td> 
             <td class="w-70"><?= $rezProp['nr_bucatarii'] ?></td> 
             <td class="w-70"><?= $rezProp['status_proprietate'] ?></td>
             <td class="w-70"><?= $rezProp['status_promovare'] ?></td> 
              <td class="w-30 text-center">
                <a href="PaginaAgenti.php?editezProprietate=<?= $rezProp['id_proprietate'] ?>">
                  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>  
              </td>
            </tr>
              
              
<?php 
  $i++;
  endwhile;

?>
          </tbody>
        </table> 
      </div>     
            
            
<?php

      
  if(isset($_GET["editezProprietate"])){
  $editezPropr = $_GET["editezProprietate"]; 
  $cautPro = "SELECT * FROM proprietati where id_proprietate = $editezPropr";
  $rezultatEdPropr = mysqli_query($cnx, $cautPro);
  $rezEdPropr = mysqli_fetch_assoc($rezultatEdPropr);
 
            }
            
?>
            
            <div class="container mt-5" id="editareProprietateActivata" style="width: 500px;display:none; ">
                <h3>Editeaza Proprietate:</h3>
        <form method="post" action="autentificare/editProprietate.php">
          <input type="hidden" name="editezProprietate" value="<?= $editezPropr ?>">
          <div class="form-group">
              
            <label for="descriere_proprietate">Descriere</label>
            <input class="form-control" id="descriere_proprietate" name="descriere" type="textarea" value="<?= $rezEdPropr['descriere_proprietate'] ?>">
              
            <label for="locatie_proprietate">Locatie:</label>
             <input class="form-control" id="locatie_proprietate" name="locatie" type="text" value="<?= $rezEdPropr['locatie_proprietate'] ?>">
              
             <label for="pret_proprietate">Pret:</label>  
             <input class="form-control" id="pret_proprietate" name="pret" type="text" value="<?= $rezEdPropr['pret_proprietate'] ?>">
              
              
              <label for="suprafata_proprietate">Suprafata:</label>  
             <input class="form-control" id="suprafata_proprietate" name="suprafata" type="text" value="<?= $rezEdPropr['suprafata_proprietate'] ?>">
              
              
               <label for="nr_camere">Camere:</label> 
             <input class="form-control" id="nr_camere" name="camere" type="text" value="<?= $rezEdPropr['nr_camere'] ?>">
              
              
            <label for="nr_bai">Bai:</label> 
             <input class="form-control" id="nr_bai" name="bai" type="text" value="<?= $rezEdPropr['nr_bai'] ?>">
              
            <label for="nr_bucatarii">Bucatarii:</label>   
             <input class="form-control" id="nr_bucatarii" name="bucatarii" type="text" value="<?= $rezEdPropr['nr_bucatarii'] ?>">
              
              
            <label for="status_proprietate">Status Vanzare:</label>     
             <input class="form-control" id="status_proprietate" name="statusProprietate" type="select" value="<?= $rezEdPropr['status_proprietate'] ?>">
              
<!--              Maybe redo this ^ to select -->
              
             <!--              Sa adaugam si poza pentru proprietate? --> 
              
            <label for="status_promovare">Status Promovare:</label>     
             <input class="form-control" id="status_promovare" name="promovare" type="text" value="<?= $rezEdPropr['status_promovare'] ?>">  
              
              
              
            
        
          </div>
              
          <button type="submit" class="btn btn-secondary ">Modifică Proprietate!</button>
        </form>
      </div>            
            
      
               <div class="content">
                
         <a href="autentificare/delogare.php" class="btn btn-primary">Delogare</a>

    </div>  
    </main>

 

  </div>



  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>
    </div>
  

  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>
    
</body> 
</html>