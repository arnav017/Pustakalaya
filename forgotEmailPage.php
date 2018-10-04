<?php
session_start();
$case=-1;
if(isset($_SESSION['userId'])){
  $user_id=$_SESSION['userId'];
}
if(isset($_GET['case'])){
  $case=$_GET['case'];
  if($case==0)
   echo "<script>alert('Error in contacting the email address')</script>";
  else if($case==1)
   echo "<script>alert('OTP sent')</script>";
  else if($case==2)
   echo "<script>alert('Wrong email-ID')</script>";
   else if($case==4)
    echo "<script>alert('Wrong OTP')</script>";
}
 ?>

<html>
  <head><title>Forgot Password | Pustakayala</title>
	  <script>
          function down(input_id,event)
          {
           var key = event.which || event.keyCode;
            var val=String.fromCharCode((96 <= key && key <= 105) ? key-48 : key);
            var element=document.getElementById(input_id);
            if(element.value.length==1)
            {
              if(input_id=="otpa1")
              {
                  document.getElementById('otpa2').focus();
                  document.getElementById('otpa2').value=val;

              }
              else if(input_id=="otpa2")
              {

                document.getElementById('otpa3').focus();
          
                document.getElementById('otpa3').value=val;

              }
            else  if(input_id=="otpa3")
              {
                document.getElementById('otpa4').focus();
                document.getElementById('otpa4').value=val;

              }

            }


          }

      </script>
  </head>
  <body>
    <div class="tag"><p>Powered by <span><span>Pustakalaya<span></span></p></div>
    <div class="emailform">
      <form class="emailaction" action="emailExample.php" method="post">
        <input type="text" name="forgottenEmail" placeholder="<?php
        if(isset($_SESSION['userId'])&&$case==1)
        echo $user_id;
        else {
          echo "Enter email";
        }
         ?>
"
<?php
if(isset($_SESSION['userId'])&&$case==1)
echo " readonly";
 ?>

        />
        <input type="submit" value="Send"/>
      </form>
      <hr class="opacity0"/>
      <hr class="opacity0"/>
      <hr class="opacity5"/>
      <hr class="opacity0"/>

      <form class="otpaction" action="newPassword1.php" method="post">
        <input type="text" name="otp1" maxlength="1" id="otpa1" onkeypress="down(this.id,event)"/>
        <input type="text" name="otp2" maxlength="1" id="otpa2" onkeypress="down(this.id,event)"/>
        <input type="text" name="otp3" maxlength="1" id="otpa3" onkeypress="down(this.id,event)"/>
        <input type="text" name="otp4" maxlength="1" id="otpa4" onkeypress="down(this.id,event)"/><hr class="opacity0"/>
        <input type="submit" value="Confirm"/>
      </form>
    </div>
    <link rel="stylesheet" href="css/forgotEmailPage.css" type="text/css" />
    <!-- <link rel="stylesheet" href="css/custom.css" type="text/css" /> -->
  </body>
</html>
