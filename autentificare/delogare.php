<?php
  session_start();

  session_unset(); // Sterge doar variabilele sesiunii dar sesiunea este mentinuta
  session_destroy(); // Sterge toate datele asociate cu sesiunea curenta
  //  Reincarc "index.php"
  header('Location: ../index.php');
?>