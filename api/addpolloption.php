<?php

  $servername = getenv("DB_SERVER");
  $dbuser = getenv("DB_USER");
  $dbpass = getenv("DB_PASS");
  $dbname = getenv("DB_NAME");

  $conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);

  $poll_id = $_POST["pollid"];
  $new_option = $_POST["newoption"];

  $qry = "INSERT INTO polloptions(`option`,`pollid`) VALUES ('".$new_option."','".$poll_id."')";

  $res = $conn->query($qry);

  $conn->close();
  header("Location: ../index.php?p=showpoll&id=".$poll_id);
  exit;
?>