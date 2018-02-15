<?php
  $servername = "localhost";
  $dbuser = "votingapp";
  $dbpass = "password";
  $dbname = "voting-app";

  $conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);

  $poll_id = $_POST["pollid"];
  $new_option = $_POST["newoption"];

  $qry = "INSERT INTO polloptions(`option`,`pollid`) VALUES ('".$new_option."','".$poll_id."')";

  $res = $conn->query($qry);

  $conn->close();
  header("Location: ../index.php?p=showpoll&id=".$poll_id);
  exit;
?>