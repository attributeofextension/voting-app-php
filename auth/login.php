<?php
/*
  $servername = "localhost";
  $username = "votingapp";
  $password = "password";
  $dbname = "voting-app";
*/
  $servername = getenv("DB_SERVER");
  $username = getenv("DB_USER");
  $password = getenv("DB_PASS");
  $dbname = getenv("DB_NAME");

  $conn = new mysqli($servername, $username, $password, $dbname);

  $user_email = $_POST["email"];
  $user_password = $_POST["pw1"];



  $findUserQry = "SELECT * FROM users WHERE email='".$user_email."'";
  $findUserRes = mysqli_query($conn,$findUserQry);

  if(mysqli_num_rows($findUserRes) < 1) {
    $conn->close();
    header("Location: ../index.php?p=login&err=user_not_found");
    exit;
  }

  $row = $findUserRes->fetch_assoc();
  $user_hash = $row["password"];
  if(password_verify($user_password,$user_hash)) {
    $user_id = $row["id"];
    $conn->close();
    setcookie("user", $user_id,time()+7*24*60*60*1000, '/');
    header("Location: ../index.php?p=mypolls");
    exit;
  } else {
    $conn->close();
    header("location: ../index.php?p=login&err=wrong_password");
    exit;
  }



?>