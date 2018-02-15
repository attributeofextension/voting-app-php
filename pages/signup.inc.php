<div class="container signup-page" style="width:500px;">
  <h2 style="text-align:center;">Sign up</h2>

<form method="POST" action='/auth/signup.php' id="signup_form">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" id="signup-name" aria-describedby="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" id="signup-email" aria-describedby="email" placeholder="Enter email">
    
    <?php

    if($_GET["err"]=== "email_already_exists") {
      echo '<small class="form-text text-danger">Email address already signed up!</small>';
    }
    ?>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="pw1" id="signup-pw1" placeholder="Password">
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" class="form-control" name="pw2" id="signup-pw2" placeholder="Confirm Password">
  </div>
  <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
</form>

<script>
  function validateForm(event) {

    var form = document.getElementById("signup_form");
    var pass1 = document.getElementById("signup-pw1");
    var pass2 = document.getElementById("signup-pw2");
    
    
    
    if(form.checkValidity()) {
        if( pass1.value != pass2.value ) {
            pass2.setCustomValidity("Passwords don't match");
        } else {
            form.submit();
        }
    }
}
function stopSubmit(event) {
    event.preventDefault();
}
function loaded(event) {
    var signupForm = document.getElementById("signup_form");
    signupForm.addEventListener("submit",stopSubmit);
    var submitBtn = document.getElementById("submitBtn");
    submitBtn.addEventListener("click",validateForm);
}
$("document").ready(loaded);
</script>