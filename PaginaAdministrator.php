<?php
    include 'Header.php';
    
    
//    session_start();

//Daca nu exista utilizator logat, nu v-om putea accesa pagina administratorului in mod direct.

    if(!isset($_SESSION['logat'])){
        header("Location: Conectare.php");
        
//Daca sessiunea este activa iar variabila de sesiune "nume" nu contine MrImobiliare, atunci nu putem sa accesam PaginaAdministrator-ului (nu putem accesa pagina administrator-ului in mod direct cat timp suntem logat cat si agent)
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
          <h2 class="text-center" style="padding-top: 120px;">Agenti: <sup><button class="addNewAgent" style="width:20px; height:20px;" onclick="displayAdaugare(); hideEdit();">+</button></sup></h2>
      </div>
      <div class="container" style="width: 500px;">
        <table class="table mt-5" style="border-bottom: 2px solid #DEE2E6">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nume</th>
              <th scope="col">Prenume</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>    
              <th scope="col" class="text-center">Opera??ii</th>
            </tr>
          </thead>
          <tbody>
<?php
  $interogare = "SELECT * FROM agenti";
  $linii = mysqli_query($cnx, $interogare) or die("Eroare: " . mysqli_error($cnx));
  $i = 1;  
  while($rez = mysqli_fetch_assoc($linii)):
?>
            <tr>
              <th scope="row"><?= $rez['id_agent'] ?></th>
              <td class="w-70"><?= $rez['nume_agent'] ?></td>
              <td class="w-70"><?= $rez['prenume_agent'] ?></td> 
              <td class="w-70"><?= $rez['username'] ?></td>
              <td class="w-70"><?= $rez['password'] ?></td> 
              <td class="w-30 text-center">
                <a href="PaginaAdministrator.php?editez=<?= $rez['id_agent'] ?>">
                  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>  
                <a href="autentificare/stergFunctie.php?sterg=<?= $rez['id_agent'] ?>">
                  <i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
              </td>
            </tr>
              
              
<?php 
  $i++;
  endwhile;

?>
          </tbody>
        </table> 
      </div>
    
      <div class="container mt-5" style="width: 500px;display:none;" id="adaugareActiva">
          <h3>Adauga Agent:</h3>
        <form method="post" action="autentificare/adaugFunctie.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nume_agent">Nume Agent:</label>
            <input class="form-control" id="nume_agent" name="nume_agent" type="text" required>
            <label for="prenume_agent">Prenume Agent:</label>
            <input class="form-control" id="prenume_agent" name="prenume_agent" type="text"required>
            <label for="username">Username:</label>
            <input class="form-control" id="username" name="username" type="text" required>
            <label for="password">Password:</label>
            <input class="form-control" id="password" name="password" type="text" required>  
              <label for="fileUpload">Add Image:</label>  
            <input id="fileUpload" type="file" name="uploadfile" value="" required/>    
              
          </div>
              
          <button type="submit" class="btn btn-secondary ">Adaug?? Agent!</button>
        </form>
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
            <label for="functia">Username Agent:</label>
            <input class="form-control" id="username_agent_edit" name="username_agent_edit" type="text" value="<?= $rez['username'] ?>">
            <label for="functia">Password Agent:</label>
            <input class="form-control" id="password_agent_edit" name="password_agent_edit" type="text" value="<?= $rez['password'] ?>">
        
          </div>
              
          <button type="submit" class="btn btn-secondary ">Modific??!</button>
        </form>
      </div>
            
             <div class="container">
          <h2  style="padding-top: 120px;">Proprietati: <sup><button class="addNewAgent" style="width:20px; height:20px;" onclick="displayAdaugareProprietate(); hideAdaugareProprietate();">+</button></sup></h2>
      </div>
      <div style="width: 500px;">
        <table class="table mt-5" style="border-bottom: 2px solid #DEE2E6">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Id Agent Responsabil:</th>     
              <th scope="col">Descriere Proprietate:</th>    
              <th scope="col">Locatie</th>
              <th scope="col">Pret</th>
              <th scope="col">Suprafata</th>
              <th scope="col">Nr.Camere</th>
              <th scope="col">Nr.Bai</th>    
              <th scope="col">Nr.Bucatarii</th>    
              <th scope="col">Status</th>
              <th scope="col">Status Promovare</th>
                
              <th scope="col" class="text-center">Opera??ii</th>
            </tr>
          </thead>
          <tbody>
              
    <?php 
    
  
  $interogareProprietati = "SELECT * FROM proprietati";
  $liniiProprietate = mysqli_query($cnx, $interogareProprietati) or die("Eroare: " . mysqli_error($cnx));
  $i = 1;  
  while($rezProp = mysqli_fetch_assoc($liniiProprietate)):
?>
            <tr>
              <td class="w-70"><?= $rezProp['id_proprietate'] ?></td>
                <td class="w-70"><?= $rezProp['id_agent'] ?></td>
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
                <a href="PaginaAdministrator.php?editezProprietate=<?= $rezProp['id_proprietate'] ?>">
                  <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>  
                <a href="autentificare/stergProprietate.php?stergProprietate=<?= $rezProp['id_proprietate'] ?>">
                  <i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
              </td>
            </tr>
              
              
<?php 
  $i++;
  endwhile;

?>
          </tbody>
        </table> 
      </div>        
              
                <div class="container mt-5" style="width: 500px;display:none;" id="adaugareProprietateActiva">
          <h3>Adauga Proprietate:</h3>
        <form method="post" action="autentificare/adaugProprietate.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="descriere_proprietate">Descirere:</label>
            <input class="form-control" id="descriere_proprietate" name="descriere_proprietate" type="text" required>
            <label for="locatie_proprietate">Locatie:</label>
            <input class="form-control" id="locatie_proprietate" name="locatie_proprietate" type="text"required>
            <label for="pret_proprietate">Pret:</label>
            <input class="form-control" id="pret_proprietate" name="pret_proprietate" type="text" required>
            <label for="id_agent">Id Agent:</label> 
              <input class="form-control" id="id_agent" name="id_agent" type="text" required>
            <label for="suprafata_proprietate">Suprafata:</label>
            <input class="form-control" id="suprafata_proprietate" name="suprafata_proprietate" type="text" required>  
              <label for="camere_proprietate">Camere:</label>  <br>
            <input id="camere_proprietate" type="text" name="camere_proprietate"  required/> <br>   
                  <label for="bai_proprietate">Bai:</label>  <br>
            <input id="bai_proprietate" type="text" name="bai_proprietate" required/>  <br>
                  <label for="bucatarii_proprietate">Bucatarii:</label>  <br>
            <input id="bucatarii_proprietate" type="text" name="bucatarii_proprietate" required/>  <br>
                  <label for="status_proprietate">Status Proprietate:</label>  <br>
            <input id="status_proprietate" type="text" name="status_proprietate"required/>  <br>
                  <label for="status_proprietate">Status Promovare:</label>  <br>
            <input id="status_promovare" type="text" name="status_promovare" required/>  <br>
                  <label for="fileUploadProprietate">Poza:</label>  <br>
            <input id="fileUploadProprietate" type="file" name="fileUploadProprietate" value="" required/>    
              
          </div>
              
          <button type="submit" class="btn btn-secondary ">Adaug?? Proprietate!</button>
        </form>
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
              
          <button type="submit" class="btn btn-secondary ">Modific?? Proprietate!</button>
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