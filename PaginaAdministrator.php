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
              <th scope="col" class="text-center">Operații</th>
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
              <th scope="row"><?= $i ?></th>
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
              
          <button type="submit" class="btn btn-secondary ">Adaugă Agent!</button>
        </form>
      </div>
            
            
            
<?php
  //  Cautam agentul care trebuie edita bazat pe id-ul agentului care este egal cu valoarea lui editez
      
            if(isset($_GET["editez"])){
  $editez = $_GET["editez"]; 
  $caut = "SELECT * FROM agenti where id_agent = $editez";
  $rezultat = mysqli_query($cnx, $caut);
  $rez = mysqli_fetch_assoc($rezultat);
   mysqli_close($cnx);  
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
              
          <button type="submit" class="btn btn-secondary ">Modifică!</button>
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