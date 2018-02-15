<?php
  if(!isset($_COOKIE["user"])) {
    header("Location: ../index.php");
    exit;
  }

  $servername = "localhost";
  $dbuser = "votingapp";
  $dbpass = "password";
  $dbname = "voting-app";

  $conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);

  $user_id = $_COOKIE["user"];
  $qry = "SELECT * FROM polls WHERE userid='".$user_id."'";
  $res = $conn->query($qry);

  $polls = Array();
  while($row = $res->fetch_assoc()) {
    $polls[] = $row;
  }
  $conn->close();
?>



<div class="container mypolls-page">
    <h3>These are my polls</h3>
   
   <div class="container myPollsPanel">
      <ul class="list-group">
        <?php 
        if( sizeof($polls) < 1  ) {
          echo '<li class="list-group-item">You currently have no polls</li>';
        } else {
          foreach($polls as $poll) {
            echo '
              <li class="list-group-item">
                <form method="DELETE" action="/api/deletepoll.php">
                <input type="hidden" value="'.$poll["id"].'" name="pollid" />
                <a href="/index.php?p=showpoll&id='.$poll["id"].'">'.$poll['name'].'</a><button type="submit" class="btn btn-secondary btn-sm float-right">Delete</button>
                </form>    
              </li>';
          }
        }
        ?>
      </ul>
</div>
</div>