<?php

  $poll_id = $_GET["pollid"];


  $servername = getenv("DB_SERVER");
  $username = getenv("DB_USER");
  $password = getenv("DB_PASS");
  $dbname = getenv("DB_NAME");

  $conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);

  $qry = "DELETE FROM polls WHERE id='".$poll_id."'";
  $conn->query($qry);
  $qry = "DELETE FROM polloptions WHERE pollid='".$poll_id."'";
  $conn->query($qry);

  $conn->close();
  header("Location: ../index.php?p=mypolls");
  exit; 
?>