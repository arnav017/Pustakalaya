<!doctype HTML>

<html>
  <head>
    <title>Pustakalya | Login</title>
    <link rel="stylesheet" type="text/css" href="css/search_bar.css"/>
    <script src="emailValidation.js"></script>
  </head>
  <body>
    <?php include('div/search_bar.php'); ?>

    <?php include('div/bar.php');?>

<?php
    if(isset($_GET['tempp']))
      echo '<script> alert("Either log-in or sign-up to view profile");</script>';
    if(isset($_SESSION['user'])){
    echo '<script> alert("already logged in please go to homepage");</script>';
    }
 ?>
    <div
      class="loginbox widthset">

        <div
          class="loginform">
            <form action="loginAction.php"  method="post">
              <h1>Reader Login</h1>
              <div class="udiv bprop">
                <h3>Username / Email</h3>
                <input class="input" name="user" required="" type="text"/>
              </div>
              <div class="pdiv bprop">
                <h3>Password</h3>
                <input class="input" name="password2" required="" type="password"/>
              </div>
              <div class="sdiv">
                <a href="forgotEmailPage.php">I forgot my login!</a>
                <input class="submit" type="submit"/>
              </div>
            </form>
        </div>

        <div
          class="signupform">
            <form method="post" action="signUpAction.php" onSubmit="return validateForm()">
              <h1>Signup for free!</h1>

              <div class="udiv bprop">
                <h3>Username</h3>
                <input class="input" name="user_name1" required="" type="text"/>
              </div>

              <div class="ediv bprop">
                <h3>Email</h3>
                <input class="input" name="email" id="email1" required="" type="text"/>
              </div>

              <div class="pdiv bprop">
                <h3>Password</h3>
                <input class="input" name="pass" id="pass1" required="" type="password"/>
              </div>

              <div class="padiv bprop">
                <h3>Confirm Password</h3>
                <input class="input" name="confirm_password" id="rpass1" required="" type="password"/>
              </div>

              <div class="tncdiv">
                <a href="#">Terms and Conditions</a>
                <input class="submit" type="submit"/>
              </div>

            </form>
        </div>
        <hr/>
        <div
          class="signinothers">
            <button onclick="fbLogin">Sign in with FB</button> <a href="#">Sign in with G+</a></p>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="css/loginpage.css"/>
    <link rel="stylesheet" type="text/css" href="css/loginbox.css"/>



  </body>
</html>
