<?php
  $poll_name = $_POST["name"];
  $poll_options = $_POST["options"];
  $user_id = $_COOKIE["user"];


  $servername = getenv("DB_SERVER");
  $username = getenv("DB_USER");
  $password = getenv("DB_PASS");
  $dbname = getenv("DB_NAME");

  $conn = new mysqli($servername,$dbuser,$dbpass,$dbname);

  $insertPollQry = "INSERT INTO polls(`name`,`userid`) VALUES ('".$poll_name."','".$user_id."')";
  $poll_id = -1;
  if($conn->query($insertPollQry)===TRUE) {
    $poll_id = $conn->insert_id;
  } else {
    $conn->close();
    header("Location: ../index.php?err=db_err1");
    exit;
  }
  foreach($poll_options as $option ) {
    $insertOptionsQry = "INSERT INTO polloptions(`option`,`pollid`) VALUES ('".$option."','".$poll_id."')";
    $conn->query($insertOptionsQry);
  }

  $conn->close();
  header("Location: ../index.php?p=newpollsuccess&pollid=".$poll_id);
  exit;
?>

