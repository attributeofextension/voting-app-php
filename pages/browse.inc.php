<?php
 

  $servername = "localhost";
  $dbuser = "votingapp";
  $dbpass = "password";
  $dbname = "voting-app";

  $conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);

  $user_id = $_COOKIE["user"];
  $qry = "SELECT * FROM polls";
  $res = $conn->query($qry);

  $polls = Array();
  while($row = $res->fetch_assoc()) {
    $polls[] = $row;
  }
  $conn->close();
?>


   
   
<div class="container mypolls-page">
    <h3>Browse All Polls</h3>
      <ul class="list-group">
        <?php 
        if( sizeof($polls) < 1  ) {
          echo '<li class="list-group-item">There are currently no polls</li>';
        } else {
          foreach($polls as $poll) {
            echo '<li class="list-group-item">
                <form method="DELETE" action="/api/deletepoll.php">
                <input type="hidden" value="'.$poll["id"].'" name="pollid" />
                <a href="/index.php?p=showpoll&id='.$poll["id"].'">'.$poll['name'].'</a>
                </form>    
              </li>';
          }
        }
        ?>
      </ul>
</div>
