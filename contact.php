<?php
   require "connection.php";
    $con=mysqli_connect($s,$u,$p,$d);

    if(!$con)
    {
        die("Connection Failed");
    }

    $sql="select * from admin;";
    $result=mysqli_query($con,$sql);
    if(!$result)
    {
      echo "sfs".mysqli_error($con);
    }
    $count= mysqli_num_rows($result);
    ;
?>

<!doctype HTML>
<html>
  <head>
    <title>Pustakalaya | Contact</title>
  </head>
  <body>
    <?php include ('div/search_bar.php'); ?>
    <?php include ('div/bar.php'); ?>
    <div class="display">
      <?php
        while($count--)
        {
          $row=mysqli_fetch_assoc($result);
       ?>
      <div class="item"  id=<?php echo "\"".$row['id']."\"";?>  onclick="showDesc(this.id)">
        <div class="icon">
          <img src=<?php echo $row['dpURL']; ?> alt="Pic N/A"/>
        </div>
        <div class="desc">
          <h2 class="title"><?php echo $row['name']; ?></h2>
          <h4 class="metadata">Role: <?php echo $row['role']; ?></h4>
          <h4 class="metadata">Address: <?php echo $row['address']; ?></h4>
          <h4 class="metadata">Contact: <?php echo $row['contact']; ?></h4>
        </div>
      </div>
      <?php } ?>
    </div>
  </body>
  <link href="css/contact.css" type="text/css"  rel="stylesheet"/>
  <link href="css/custom.css" type="text/css"  rel="stylesheet"/>
</html>
