<!--
<?php

  if(isset($_GET['search_boxname'])&&$_GET['search_boxname']!=null)
  {

    $value=false;
  }
  $count=0;
  $result=array(array());

  if(!$value)
  {
    $s_type=$_GET['search_typee'];
    $s_sound=$s_type."sound";

    $parts=explode(" ",$_GET['search_boxname']);
    $sql="select *from books";
    $result1=mysqli_query($con,$sql);


     while($row1=mysqli_fetch_assoc($result1))
     {  $found=false;
        foreach ($parts as $temp)
        {
          if(strlen($temp)>=4&&metaphone($temp)!=metaphone("books") && metaphone($temp)!=metaphone("book"))
          {
                if($row1[$s_sound]!=null&&(strpos($row1[$s_sound],metaphone($temp))!==false||strpos(metaphone($temp),$row1[$s_sound])!==false))
                {
                  $result[$count]=$row1;
                  $count++;
                  $found=true;
                }
          }
          if($found)
          break;
        }
     }


  }
else{
  $query="Select * from books;";
  $result1=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($result1))
    {
      $result[$count]=$row;
      $count++;
    }
 }
 for($i=0;$i<$count;$i++)
 {
 ?>

<div class="item">
  <div class="icon">
    <img src="book_icons\dummy.jpg" alt="Pic N/A"/>
  </div>
  <div class="desc">
    <h1 class="title"><?php echo $result[$i]['bookname']; ?></h1>
    <h4 class="metadata">Author: <?php echo $result[$i]['authorname']; ?></h4>
    <h4 class="metadata">Category: <?php echo $result[$i]['category']; ?></h4>
    <h3 class="price">Rs 1000</h3>
  </div>
</div>
<hr/>

<?php
}
  ?> -->

  <?php
     
    if(isset($_GET['search_boxname'])&&$_GET['search_boxname']!=null)
    {

      $value=false;
    }
    $count=0;
    $result=array(array());

    if(!$value)
    {
      $s_type=$_GET['search_typee'];
      $s_sound=$s_type."sound";

      $parts=explode(" ",$_GET['search_boxname']);
      $sql="select *from books";


       $taken=array();
       $taken=array_fill(0,200,0);
       foreach ($parts as $temp)
       {
         $found=false;
         $result1=mysqli_query($con,$sql);
          while($row1=mysqli_fetch_assoc($result1))
          {
            if(strlen($temp)>=3 && $temp!="books" && $temp!="book")
            //if($temp!="books" && $temp!="book")
            {
                  if($row1[$s_sound]!=null&&$temp!=null&&(strpos($row1[$s_sound],metaphone($temp))!==false||strpos(metaphone($temp),$row1[$s_sound])!==false))
                  {
                    if($taken[$row1['bookid']]!=1)
                    {
                        $result[$count]=$row1;
                        $taken[$row1['bookid']]=1;
                        $count++;

                    }
                        //$found=true;
                  }
            }
            // if($found)
            // break;
          }
       }


    }
  else{
    $query="Select * from books;";
    $result1=mysqli_query($con,$query);
      while($row=mysqli_fetch_assoc($result1))
      {
        $result[$count]=$row;
        $count++;
      }
   }
   for($i=0;$i<$count;$i++)
   {
   ?>

  <div class="item">
    <div class="icon">
      <img src="book_icons\dummy.jpg" alt="Pic N/A"/>
    </div>
    <div class="desc">
      <h1 class="title"><?php echo $result[$i]['bookname']; ?></h1>
      <h4 class="metadata">Author: <?php echo $result[$i]['authorname']; ?></h4>
      <h4 class="metadata">Category: <?php echo $result[$i]['category']; ?></h4>
      <h3 class="price">Rs 1000</h3>
    </div>
  </div>
  <hr/>

  <?php
  }
    ?>
