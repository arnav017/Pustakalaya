<?php
require "connection.php";
session_start();

if(isset($_POST['otp1'])&&isset($_POST['otp2'])&&isset($_POST['otp3'])&&isset($_POST['otp4'])){
$otp1=$_POST['otp1'];
$otp2=$_POST['otp2'];
$otp3=$_POST['otp3'];
$otp4=$_POST['otp4'];

$otp=$otp1.$otp2.$otp3.$otp4;
//echo $otp;

if(isset($_SESSION['userId'])){
  $user_id=$_SESSION['userId'];
//  echo $user_id;
  //echo "xxxxxxxxx";
$sql="SELECT OTP FROM USER_DETAILS WHERE USER_ID='$user_id'; ";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$sentOtp=$row['OTP'];
//echo $sentOtp;
if($sentOtp==$otp){
  //echo "dnfndk";
}

else{
        echo "<script> location.href='forgotEmailPage.php?case=4;'</script>";
        echo "<script> alert('Wrong otp');</script>";
}
}
}
?>
<!DOCTYPE html>
<html>
<body>
<div style="margin-top:200px; margin-left:570px;" >
  <div>
    Enter new password
  </div>

    <div>
      <form action="changePassword3.php" method="post">
          <input type="password" name="newPassword"/>
          <input type="submit"/>
      </form>
    </div>
</div>
</body>
</html>
