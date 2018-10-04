<?php
session_start();
if(isset($_SESSION['user']) ){
  echo 'logged out now';
session_destroy();
echo 'logged out now'  ;
}

 else {
  echo 'already logged out';
 }
echo "<script> location.href='home.php'</script>";
 ?>
