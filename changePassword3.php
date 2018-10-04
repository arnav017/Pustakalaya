<?php
require "connection.php";

session_start();
if(isset($_SESSION['userId'])){
  $user_id=$_SESSION['userId'];

if(isset($_POST["newPassword"])&&$_POST['newPassword']!=null) {

//echo "dkfjadskl";
$new_pass=$_POST["newPassword"];
$new_hash=md5($new_pass);



$mysql_query="SELECT PASSWORD FROM USER_DETAILS WHERE USER_ID = '$user_id'; ";
$result= mysqli_query($conn,$mysql_query);
$old_hash=mysqli_fetch_assoc($result)['PASSWORD'];

//echo $old_hash;
//echo "++++++++++++";
//echo $new_hash;
if($old_hash==$new_hash){
      echo "<script> alert('please select a password different from last password for security reasons');</script>";
      echo "<script> location.href='newPassword1.php'</script>";
    }
else{
      $mysql_query1="UPDATE USER_DETAILS SET PASSWORD='".$new_hash."' WHERE USER_ID = '$user_id'; ";
      $result2= mysqli_query($conn,$mysql_query1);
      echo "<script> alert('Password Reset Complete');</script>";
      echo "<script> location.href='login.php'</script>";
    }
}
else{
  echo "<script> alert('Set password again');</script>";
  echo "<script> location.href='newPassword1.php'</script>";
}
}
else {
//  echo "go to enter email id page again";
    echo "<script> alert('go to enter email id page again');</script>";
}
 ?>
