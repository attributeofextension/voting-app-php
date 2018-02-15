<?php

  $servername = getenv("DB_SERVER");
  $username = getenv("DB_USER");
  $password = getenv("DB_PASS");
  $dbname = getenv("DB_NAME");

  echo $servername;

  $conn = new mysqli($servername, $username, $password, $dbname);
?>