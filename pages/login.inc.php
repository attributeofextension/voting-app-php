<div class="container login-page" style="width:500px;">
  <h2 style="text-align:center;">Login</h2>

<form method="POST" action='/auth/login.php' id="login_form">
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" id="signup-email" aria-describedby="email" placeholder="Enter email">
    <?php
    if($_GET["err"]=== "user_not_found") {
      echo '<small class="form-text text-danger">No user found with that email address!</small>';
    }
    ?>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="pw1" id="signup-pw1" placeholder="Password">
    
    <?php
    if($_GET["err"]=== "wrong_password") {
      echo '<small class="form-text text-danger">Incorrect password!</small>';
    }
    ?>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>

function stopSubmit(event) {
    event.preventDefault();
}
function validateForm(event) {

    var form = document.getElementById("signup_form");
    
    if(form.checkValidity()) {
        form.submit();
    }
}
function loaded(event) {
    
    var loginForm = document.getElementById("login_form");
    signupForm.addEventListener("submit",stopSubmit);
}

$("document").ready(loaded);






</script>