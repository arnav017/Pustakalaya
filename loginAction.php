<?php
/*
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="pustakalaya";


	$conn= mysqli_connect($servername,$username,$password,$dbname);

	if (!$conn) {
		die("Connection failed: " . $conn);
	}*/

	require "connection.php";
session_start();

?>
	<html>
		<head>
			<title>hey</title>
		</head>
		<body>
		<?php
		if(isset($_SESSION['user'])){
		echo '<script> location.href="home.php"</script>';
		}

		else if(isset($_POST['user']) && isset($_POST['password2']) ){
		$email=$_POST['user'];
		$password=md5($_POST['password2']);


		$mysql_query="SELECT USER_ID FROM USER_DETAILS WHERE (USER_ID = '$email' OR USER_NAME='$email') AND PASSWORD = '$password'" ;
		$result= mysqli_query($conn,$mysql_query);

		if(mysqli_num_rows($result)){
			$_SESSION['user']=$email;
			$_SESSION['password2']=$password;
			echo '<script> location.href="home.php"</script>';
		}
		else{
		echo "Error:wrong id or password";
		}
		}
else{
	echo "fill out all the fields";
}
		?>
		</body>
	</html>
