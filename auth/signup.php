<?php
/*
  $servername = "localhost";
  $username = "votingapp";
  $password = "password";
  $dbname = "voting-app";


*/
 // $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $servername = getenv("DB_SERVER");
  $dbuser = getenv("DB_USER");
  $dbpass = getenv("DB_PASS");
  $dbname = getenv("DB_NAME");

  $conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);

  $user_name = $_POST["name"];
  $user_email = $_POST["email"];
  $user_password = password_hash($_POST["pw1"],PASSWORD_DEFAULT);

  // Create connection

  echo mysqli_error($conn);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  
  
  $findUserQry = "SELECT * FROM users WHERE email='".$user_email."'";
  $findUserRes = mysqli_query($conn,$findUserQry);

  if(mysqli_num_rows($findUserRes) > 0 ) {
    $conn->close();
    header("Location: ../index.php?p=signup&err=email_already_exists");
    exit;
  }
  $insertUserQry = "INSERT INTO users(name,email,password) VALUES ('"
    .$user_name."','".$user_email."','".$user_password."')";

  $insertUserRes = mysqli_query($conn,$insertUserQry);

  $findUserIdQry = "SELECT id FROM users WHERE email='".$user_email."' limit 1";
  $findUserIdRes = mysqli_query($conn,$findUserIdQry);

  $row = $findUserIdRes->fetch_assoc();
  $user_id = $row["id"];

  $conn->close();
  setcookie("user", $user_id,time()+7*24*60*60*1000, '/');
  header("Location: ../index.php?p=mypolls");
  exit;
?>