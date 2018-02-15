  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  
  <ul class="nav">
    <a class="navbar-brand" href="/index.php">Vote App</a>
    <li class="nav-item"><a class="nav-link" href="/index.php?p=browse">Browse All</a></li>
  </ul>

  <ul class="nav justify-content-end">

<?php
  if(isset($_COOKIE["user"])) {
    echo '<li class="nav-item"><a class="nav-link" href="/index.php?p=mypolls">My Polls</a></li>
          <li class="nav-item"><a class="nav-link" href="/index.php?p=newpoll">New Poll</a></li>
          <li class="nav-item"><a class="nav-link" href="/auth/logout.php">Logout</a></li>';
  } else {
    echo '<li class="nav-item">
      <a class="nav-link" href="/index.php?p=login">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/index.php?p=signup">Signup</a>
    </li>';
  }
?>

  </ul>
  </div>
</nav>