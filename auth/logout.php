<?php
  setcookie("user",0,time() - 6000, '/');
  header("Location: ../index.php");
  exit;

?>