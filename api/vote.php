<?php
  $poll_id = $_POST["pollid"];
  $poll_option = $_POST["options"];
  print_r($_POST);
  
  $servername = "localhost";
  $dbuser = "votingapp";
  $dbpass = "password";
  $dbname = "voting-app";

  $conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);

  $qry = "UPDATE polloptions SET votes = votes + 1 WHERE id='".$poll_option."'";
  $res = $conn->query($qry);

  $conn->close();
  header("Location: ../index.php?p=voted&id=".$poll_id."&vote=".$poll_option);
  exit;
?>