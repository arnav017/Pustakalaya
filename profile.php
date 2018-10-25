<?php
require "connection.php";

session_start();
//echo "<br>";
//echo $_SESSION['user'];
//echo "<br>";

$flag=0;
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
  //echo "conn failed";
    die("Connection failed:".mysqli_connect_error());
  }


  else if(isset($_SESSION['user'])){
//    echo 'Welcome logged in user';
//echo "<script type='text/javascript'>alert('old user');</script>";
    $user_name=$_SESSION['user'];
    // $sql_get_flag="SELECT FLAG FROM USER_DETAILS WHERE USER_NAME='$user_name'; ";
    // $flag1=mysqli_query($conn,$sql_get_flag);
    // $flag_row=mysql_fetch_array($flag1);
    // $

    //$sql_select_query= "SELECT FIRSTNAME,LASTNAME,GENDER,PHONE,PROFESSION,PROFILE_FLAG,DATE_FORMAT(DOB, '%d/%m/%y') FROM USER_DETAILS WHERE USER_NAME='$user_name'; ";
//SELECT DATE_FORMAT(column_name, '%d/%m/%Y') FROM tablename
$sql_select_query= "SELECT FIRSTNAME,LASTNAME,GENDER,PHONE,PROFESSION,PROFILE_FLAG,DOB FROM USER_DETAILS WHERE USER_NAME='$user_name'; ";
     $result= mysqli_query($conn,$sql_select_query);

     if(!$result){
       //echo "ERROR";
       echo "<script>alert('".mysqli_error($conn)."')</script>";
     }
    $row=mysqli_fetch_assoc($result);
    $set_profile_flag=$row['PROFILE_FLAG'];

    if($set_profile_flag==1){
    $fname=$row['FIRSTNAME'];
    $lname=$row['LASTNAME'];
    $gender=$row['GENDER'];
    //$dob=$row["DATE_FORMAT(DOB, "."%d/%m/%y".")"];
    $dob=$row['DOB'];
    $prof=$row['PROFESSION'];
    $phone=$row['PHONE'];

    $flag=1;
    //echo $fname;

  }
  }

?>

<html>
<head>
  <script src="profile.js" type="text/javascript"  >

  </script>
  <script src="phoneValidation.js" type="text/javascript"  >
  </script>
</head>
<body>
    <?php include('div/search_bar.php');?>
    <?php include('div/bar.php');?>
    <!-- <div class="dummydiv" style="margin-top:55px">
    </div>
    <div class="bar">
          <ul>
              <li><a href="http://localhost/kuch/bookcart/home.php">Home</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Publish</a></li>
              <li><a href="#">Good Reads</a></li>
              <li><a href="#">Contact us</a></li>
          </ul>
      </div> -->


<div class="main">
    <div class="right">
      <form method="POST" action="setProfile.php" name="form1" onSubmit="return validatePhone()">
            <div id="Pinf">
                <div class="tagmy">
                    <h3>Personal Information </h3>
                </div>
                <input type="text" class="input" name="firstname" required="" value="<?php
if($flag==1){
echo $fname;
}
 ?>"/>
                <input type="text" class="input" name="lastname"required=""  value="<?php
if($flag==1){
echo $lname;
}
 ?>"/>

                <div id="genderinfo">
                    <h4>Your Gender</h4>
                    <div id="male">
                        <input name="gender" type="radio" value="M" <?php if($flag==1&&$gender == "M") echo "CHECKED";?>/><p> Male</p>
                    </div>
                    <div id="female">
                        <input name="gender" type="radio" id="F" value="F" <?php if($flag==1&&$gender == "F") echo "CHECKED";?>/><p> Female</p>
                    </div>
                </div>
            </div>

            <div id="dob">
                <div class="tagmy">
                      <h3>Date Of Birth </h3>
                </div>
                <input type="<?php
                if($flag==1){
                echo "text";
                }
                else {
                  echo "date";
                }
                 ?>"  class="input" name="date" placeholder="yyyy-mm-dd" value="<?php
if($flag==1){
  $date=date_create($dob);
//echo date_format($date,'d/m/y');
echo $dob;
//echo "<script type='text/javascript'>alert('old user');</script>";
//echo date('d-m-y');
}
 ?>"/>
            </div>


            <div class="dropdown">
                <div class="tagmy">
                    <h3>Profession</h3>
                </div>
                <select class="input" name="profession" >
                    <option  value="Student" <?php if($flag==1&&$prof == "Student") echo "SELECTED";?>>Student</option>
                    <option  value="Teacher" <?php if($flag==1&&$prof == "Teacher") echo "SELECTED";?>>Teacher</option>
                    <option  value="Others" <?php if($flag==1&&$prof == "Others") echo "SELECTED";?>>Others</option>
                </select>
            </div>




            <div id="mobile">
                <div class="tagmy">
                    <h3>Mobile Number </h3>
                </div>
                <input type="text"  class="input" name="mobilenumber" id="mob" value="<?php
if($flag==1){
echo $phone;
}
 ?>"/>

            </div>

            <input type="submit" value="Save" style="width:150px; display:block; border:0px; background-color: #2874F0; margin-top: 20px; color:#FFFFFF" id="nameButton" class="input">
      </form>

    </div>
</div>


<link rel="stylesheet" type="text/css" href="css/catalogue.css"/>
<link rel="stylesheet" type="text/css" href="css/bar.css">
<link rel="stylesheet" type="text/css" href="css/custom.css"/>
<link rel="stylesheet" type="text/css" href="profile.css"/>
</body>

</html>
