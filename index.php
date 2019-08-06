<?php
include("import.php");
include("Navigation.php");
?>
<form method="POST" action="signup.php">
<div class="container" style="height:650px">
<div class="row">
  <div class="col l6 m6 s12">
  <h5>Login</h5><hr>
<table class="responsive-table">
<tr><td>Enter Email</td><td><input type="text" name="email1" placeholder="enter email"></td></tr>
<tr><td>Enter Password</td><td><input type="password" name="password1" placeholder="enter password"></td></tr>
<tr><td><input type="submit" value="login" name="login" class="btn green"></td><td><input type="submit" value="Forgot Password" name="fpass" class="btn green"></td></tr>
</table>
  </div>

  <div class="col l6 m6 s12">
  <h5>Sign Up</h5><hr>
  <table>
<tr><td>User Name </td><td><input type="text" id="name" name="name" placeholder="enter user name"></td></tr>
<tr><td>Email </td><td><input type="text" id="email" name="email" placeholder="enter email"></td></tr>

<tr><td>Enter gender </td><td>
      <label>
        <input class="with-gap" name="gender" group="gender" type="radio" value="M" />
        <span>Male</span>
      </label>
      <label>
        <input class="with-gap" name="gender" group="gender" type="radio" value="F"  />
        <span>Female</span>
      </label>
</td></tr>
<tr><td>Enter password </td><td><input type="password" id="password" name="password" placeholder="enter password"></td></tr>
<tr><td>Confirm password </td><td><input type="password" id="cpassword" name="cpassword" placeholder="confirm password"></td></tr>
<tr><td><input type="submit" value="signup" name="signup" class="btn green"></td><td> </td></tr>
</table>

  </div>
</div>
</div>
</form>
<?php
include("footer.php");
?>
