<?php
	require "connection.php";

	if(isset($_POST['user_name1'])&& isset($_POST['email'])&& isset($_POST['pass']) && isset($_POST['confirm_password'])){
		$fname=$_POST['user_name1'];
		$email=$_POST['email'];
	$password=$_POST['pass'];
	$cpassword=$_POST['confirm_password'];

		$pass=md5($_POST['pass']);

		if($cpassword!=$password){
			//header("Location: first.html");
			echo "pass not matched";
			//echo '<script>window.location.href = "first.html";</script>';
			exit();
}
		$mysql_qry=  "SELECT USER_ID FROM USER_DETAILS WHERE USER_ID like '$email'";


		$result= mysqli_query($conn,$mysql_qry);

		if(mysqli_num_rows($result)==0){

			$sql= "insert into USER_DETAILS(USER_NAME,USER_ID,PASSWORD) values('$fname','$email','$pass')" ;
			if(mysqli_query($conn,$sql)){
				
				session_start();
		$_SESSION['user']=$fname;
		$_SESSION['pwd']=$password;
//echo $_SESSION['user'];

				echo "<script> location.href='profile.php'</script>";

			}else{
				echo "Error: ". $sql ."<br>".$conn->error;
			}
		}else{
			echo "An account with given email ID already exists! Please provide a different emailID";
		}
	}
	else{
		echo "Fill out all your details";
	}



?>
