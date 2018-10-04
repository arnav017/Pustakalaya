<?php
require "connection.php";
//echo "loading";
session_start();
  //echo $_SESSION['user'];

 if(isset($_POST['firstname'])&&isset($_POST['lastname']))
{
  //echo "name";
  $user_name= $_SESSION['user'];
  //echo $_SESSION['user'];

  $fname=$_POST['firstname'];
  $lname=$_POST['lastname'];
//db
$gender='NULL';
$date='NULL';
$prof='NULL';
$mob='NULL';


  if(isset($_POST['gender'])){
    //echo "gender";
    $gender=$_POST['gender'];
    //db
  }

    if(isset($_POST['date'])){
      //echo "date";
      $date=$_POST['date'];
      //db
    }


      if(isset($_POST['profession'])){
        //echo "profession";
        $prof=$_POST['profession'];
        //db

      }

        if(isset($_POST['mobilenumber'])){
          //echo "mobilenumber";
          $mob=$_POST['mobilenumber'];
          //db
        }


        $sql_update_query="UPDATE USER_DETAILS SET
         FIRSTNAME='".$fname."' ,
        LASTNAME='".$lname."',
        PROFESSION='".$prof."',
         PHONE='".$mob."',
           PROFILE_FLAG='1'
         WHERE USER_NAME='".$user_name."'";
         $result=  mysqli_query($conn,$sql_update_query);

        if(isset($_POST['gender'])){
        $sql_update_query="UPDATE USER_DETAILS SET
        GENDER='".$gender."'";
        $result=  mysqli_query($conn,$sql_update_query);
      }

        if(isset($_POST['date'])){
        $sql_update_query="UPDATE USER_DETAILS SET
        DOB='".$date."'";
        $result=  mysqli_query($conn,$sql_update_query);
      }
        if($_POST['date']==""){
        $sql_update_query="UPDATE USER_DETAILS SET
        DOB=NULL";
        $result=  mysqli_query($conn,$sql_update_query);
      }

         // $sql_update_query="UPDATE USER_DETAILS SET FIRSTNAME='".$fname."' ,
         // LASTNAME='".$lname."',
         // GENDER=NULL ,
         //   DOB='".$date."',
         //  PHONE='".$mob."',
         //   PROFILE_FLAG='1'
         //  WHERE USER_NAME='".$user_name."'";
        //  echo mysqli_query($conn,$sql_update_query);
        // $sql_update_query='UPDATE USER_DETAILS SET FIRSTNAME='.$fname.' ,
        // LASTNAME='.$lname.',
        // GENDER='."'M'".' ,
        //  PHONE=NULL
        //  WHERE USER_NAME='a7';


         //echo $result;
        echo '<script> location.href="home.php"</script>';
}
 ?>
