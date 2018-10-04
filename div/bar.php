<div class="dummydiv" style="margin-top:55px">
</div>
<div class="bar">
      <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="<?php
            if(isset($_SESSION['user']))
            echo "profile.php";
            else{
              echo "login.php?tempp=true";
            }
          ?>">Profile</a></li>
          <li><a href="upload.php">Publish</a></li>
          <li><a href="contact.php">Contact us</a></li>
          <?php
//session_start();
if(isset($_SESSION['user']))
        echo '<li><a href="logOut.php">'.$_SESSION['user'].'</a></li>';
else
        echo  '<li><a href="login.php">Log-in</a></li>';
        ?>
      </ul>
</div>

<link rel="stylesheet" type="text/css" href="css/bar.css"/>
