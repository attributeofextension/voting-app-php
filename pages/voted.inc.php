<?php
  
  
  $poll_id = $_GET["id"];
  $poll_option_id = $_GET["vote"];
  
  $servername = getenv("DB_SERVER");
  $username = getenv("DB_USER");
  $password = getenv("DB_PASS");
  $dbname = getenv("DB_NAME");

  $conn = mysqli_connect($servername,$dbuser,$dbpass,$dbname);

  $qry = "SELECT polls.name, polloptions.option 
          FROM polls INNER JOIN polloptions 
          ON polls.id=polloptions.pollid 
          WHERE polloptions.id='".$poll_option_id."'";

  $res = $conn->query($qry);

  $row = $res->fetch_assoc();

  $poll_name = $row["name"];
  $poll_option_name = $row["option"];
  $url = '/index.php?p=showpoll&id='.$poll_id;
?>

<div class="container voted-page">
  <h2>Congratulations! You voted for </h2>
  <h2><?php echo $poll_option_name; ?></h2>
  <h3><?php echo $poll_name; ?></h3>
  <div id="voteChart" class="voteChart"></div>
  <input type="hidden" value="<?php echo $_GET['id']; ?>" name="pollid" id="pollid" />  
  <p>To vote again or share this poll<br><a href="<?php echo $url;?>"><?php echo $url;?></a></p>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="/js/showpoll.js"></script>