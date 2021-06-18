<?php

    $cnx = mysqli_connect("localhost","root","","mrimobiliare");
    if(mysqli_connect_errno()){
        die("Connectare la baza de date nereusita" . msqli_connect_error());
    }
    
    mysqli_set_charset($cnx,"utf8");




?>