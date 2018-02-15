<?php
  $poll_id = $_GET["id"];


  $servername = getenv("DB_SERVER");
  $dbuser = getenv("DB_USER");
  $dbpass = getenv("DB_PASS");
  $dbname = getenv("DB_NAME");

  $conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);


  $qry = "SELECT * FROM polloptions WHERE pollid='".$poll_id."'";

  $res = $conn->query($qry);
  $options = Array();
  while($row = $res->fetch_assoc()) {
    $obj = new stdClass();
    $obj->option = $row["option"];
    $obj->votes = $row["votes"];
    $options[] = $obj;
  }
  $data->options = $options;
  $json = json_encode($data);
  echo $json;


?>