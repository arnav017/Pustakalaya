<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "connection.php";
// if(isset($_SESSION['userId']))
// session_destroy();

session_start();

if(isset($_POST['forgottenEmail'])){
  $emailID=$_POST['forgottenEmail'];


  $_SESSION['userId']=$emailID;

  $mysql_query="SELECT USER_ID FROM USER_DETAILS WHERE (USER_ID = '$emailID')";
  $result= mysqli_query($conn,$mysql_query);
  $link="http://localhost/kuch/bookcart/forgotEmailPage.php";

  if(mysqli_num_rows($result)){

    $rand=rand(1000,9999);
    $add_otp="update user_details set OTP ='".$rand."' where USER_ID='".$emailID."';";
    mysqli_query($conn,$add_otp);
  //  echo "<br><br>____________________<br>$result1";
    $msg="
    <!DOCTYPE html>
    <html>
    <body>
      <div>
    <pre>
    We recieved a request to change password from your account
  and your OTP is $rand
        To change your password using OTP click <a href=$link>here</a> ;)

      </pre>
    </div>
        <div>
        <pre>
          If you have not generated the request,ignore the message and the link will de-activate in a day.

                  FROM:Team Pustakalaya
          </pre>
        </div>
    </body>
    </html>
    ";



require 'vendor/autoload.php';

$mail = new PHPMailer();

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//$mail->SMTPDebug=1;
$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = '3musketeyrs@gmail.com';
$mail->Password = 'arnanssum';
$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = false;

$SMTPAutoTLS = false;

$mail->From = 'MyUsername@gmail.com';
$mail->FromName = 'Arnav';
$mail->AddAddress($emailID);
$mail->AddReplyTo('[no-reply]pustakalaya@gmail.com', 'Information');

$mail->IsHTML(true);
$mail->Subject    = "Link to reset your password";
$mail->AltBody    = strip_tags($msg);
$mail->Body    = $msg;

if(!$mail->Send())
{
$error="Mailer Error: " . $mail->ErrorInfo;
echo "<script> location.href='forgotEmailPage.php?case=0'</script>";
  //echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
  //echo QUIT | openssl s_client -crlf -starttls smtp -CAfile /etc/ssl/cacert.pem -connect smtp.gmail.com:587;
}
else
{

  echo "<script> location.href='forgotEmailPage.php?case=1'</script>";

}
}
else {
  //user-id not registered
  echo "<script> location.href='forgotEmailPage.php?case=2'</script>";
}
}
?>
