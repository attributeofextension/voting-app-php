<?php
  $poll_id = $_GET["pollid"];
  $url = '/index.php?p=showpoll&id='.$poll_id;

  echo '<div class="new-poll-posted">
    <h2>Congratulations!</h2>
    <p>Your poll has been posted to<br>
    <a href="'.$url.'">'.$url.'</a></p>
</div>'

?>