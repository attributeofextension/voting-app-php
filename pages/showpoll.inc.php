<?php

  $servername = "localhost";
  $dbuser = "votingapp";
  $dbpass = "password";
  $dbname = "voting-app";

  $conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);

  $poll_id = $_GET["id"];

  $selectPollQry = "SELECT polls.name, polloptions.option, polloptions.id FROM polls INNER JOIN polloptions ON polls.id=polloptions.pollid WHERE polls.id='".$poll_id."'";
  $selectPollRes = $conn->query($selectPollQry);

  
  $poll_options = array();
  $poll_name = "";
  while($row = $selectPollRes->fetch_assoc()) {
    $poll_name = $row["name"];
    $poll_options[] = array($row["option"],$row["id"]);
  }
  $conn->close();

?>

<div class="container showpoll-page">
  <h3 style="text-align:center"><?php echo $poll_name; ?></h3>
  <div id="voteChart"></div>
  <form method="post" action="/post/vote.php">
    <div class="btn-group-vertical btn-group-toggle voteBtnPanel" data-toggle="buttons">
      <?php foreach($poll_options as $option) {    
        echo '<label class="btn btn-primary">
             <input type="radio" name="options" id="'.$option[1].'" value="'.$option[1].'" autocomplete="off">'.$option[0].'
            </label>';
      }
      ?>
    </div>
    <div class="voteSubmit">
      <input type="hidden" value="<?php echo $poll_id?>" name="pollid" id="pollid" />  
      <div class="input-group voteBtnPanel">
        <input type="text" class="form-control" placeholder="Add a New Option" name="newoption" id="addInput">
        <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit" name="addoption" id="addBtn" formaction="/api/addpolloption.php">+</button>
        </span>
      </div>
      <div class='row'></div>
        <button type="submit" class="btn btn-success voteSubmitBtn" name="vote" id="voteSubmit" formaction="/api/vote.php">Vote</button>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript" src="../js/showpoll.js"></script>
