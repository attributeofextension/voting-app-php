<?php
  if(!isset($_COOKIE["user"])) {
    header("Location: ../index.php");
    exit;
  }

?>
<div class="new-poll-page container">
  <h2>New Poll</h2>
  <form method="POST" action="/api/newpoll.php">
  <div class="form-group">
    <label>Name of your poll</label>
    <input type="text" class="form-control" name="name" id="poll_name">
  </div>
  <div class="form-group new-poll-input" id="newpollOptionPanel">
    <label>Options</label>
    <input type="text" class="form-control" name="options[]">
    <input type="text" class="form-control" name="options[]">
  </div>
  <div class="row justify-content-center">
    <button class="btn btn-light btn-outline-secondary new-poll-btn" type="button" onclick="addNewOption()">Another Option</button>
  </div>
  <div class="row justify-content-center">
    <button type="submit" class="btn btn-success new-poll-btn">Submit</button>
  </div>

  </form>
</div>

<script>
  function addNewOption() {
    var newpollPanel = document.getElementById("newpollOptionPanel");
    var newOptionInput = document.createElement("input");
    newOptionInput.setAttribute("type","text");
    newOptionInput.setAttribute("class","form-control newpollOption");
    newOptionInput.setAttribute("name","options[]");
    newpollPanel.appendChild(newOptionInput);
  }
</script>