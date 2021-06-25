<?php
session_start();



// Impiedicam inserarea codului html in formular (XSS attack) prin metoda corectez care ne returneaza parametrul dat corectat.

function corectez($sir) {
  $sir = trim($sir);
  $sir = stripslashes($sir);
    
//Convertinm caracterele speciale in entitati HTML    
  $sir = htmlspecialchars($sir);
  return $sir;
}

// Preluam valoarea din fiecare field al form-ului de editare si o transmitem ca parametru spre metoda corectez iar rezultatul este stocat in variabile.
$numeNou = corectez($_POST['nume_agent']);
$prenumeNou = corectez($_POST['prenume_agent']);
$usernameNou = corectez($_POST['username']);
$passwordNou = corectez($_POST['password']);


//Preluam fisierul ce a fost uploaded si salvam numele intr-o variabila.
$fileName = $_FILES["uploadfile"]["name"];

//Preluam imaginea trimisa via upload de catre user si o punem pe server in path-ul ce contine imaginile agentilor
$tempName = $_FILES["uploadfile"]["tmp_name"];   
$folder = "../img/agenti/".$fileName;

//Mutarea efectiva se realizeaza prin move_uploaded file care o sa mute fisierul in folder-ul de mai sus
move_uploaded_file($tempName, $folder);
 
//  Nu sunt mesaje de eroare
 include 'conectare.php';

// formulez comanda INSERT un se vor da ca si parametrii pentru query variabilele de mai sus
 $comanda = "INSERT INTO agenti (nume_agent, prenume_agent, username, password,poza_agent) VALUES (?,?,?,?,?)";
  if($stm = mysqli_prepare($cnx, $comanda)) {
      // Parametrii sunt transferati prin mysqli_stmt_bind_param
      
 mysqli_stmt_bind_param($stm,'sssss',$numeNou,$prenumeNou,$usernameNou,$passwordNou,$fileName);
      
      //Executam query-ul de mai sus
      mysqli_stmt_execute($stm);
      

      
    } else {
      echo "Eroare !!t.";
    }
    mysqli_close($cnx);
    //  Reincarc "functii.php"
     if($_SESSION['nume'] != "MrImobiliare" ){
        header("Location: ../PaginaAgent.php");
        
        //Trebuie incercata renuntarea la hardcodarea numelui utilizatorului (in locul MrImobiliare sa facem un retrieve la numele din tabelul admin)
    }else{
        header("Location: ../PaginaAdministrator.php");
    }
 

?>