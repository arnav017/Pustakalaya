
<?php
  function sortByDownloads($a,$b)
  {
    return $b['downloads']-$a['downloads'];
  }

  function sortByDate($a,$b)
  {
    $temp=strtotime($b['publish_date'])-strtotime($a['publish_date']);
    if($temp==0)
      $temp=($b['rating'])-($a['rating']);
    return $temp;
  }

  function sortByDateRev($a,$b)
  {
    $temp=strtotime($a['publish_date'])-strtotime($b['publish_date']);
    if($temp==0)
      $temp=($b['rating'])-($a['rating']);
    return $temp;
  }

  if(isset($_GET['search_boxname'])&&$_GET['search_boxname']!=null)
  {

    $value=false;
  }
  $count=0;
  $result_search=array(array());


  if(!$value)
  {
    $s_type=$_GET['search_typee'];
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
          {
                // if(isset($_POST[filter_button])&&$_POST())
                // {
                //
                // }
                // else
                // {
                    if($row1[$s_type]!=null&&$temp!=null&&(strpos(strtolower($row1[$s_type]),$temp)!==false||strpos($temp,strtolower($row1[$s_type]))!==false))
                    {
                      if($taken[$row1['bookid']]!=1)
                      {
                          $result_search[$count]=$row1;
                          $taken[$row1['bookid']]=1;
                          $count++;

                      }

                    }
                //  }

          }


        }
     }


  }
else{
  $query="Select * from books;";
  $result1=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($result1))
    {
      $result_search[$count]=$row;
      $count++;
    }
 }

usort($result_search,'sortByDate');

 //filter for price

 $result_price=array(array());
 if(isset($_GET['price']))
 {
       $price=explode("-",$_GET['price']);
       $temp_count=0;
       for($i=0;$i<$count;$i++)
       {
         if($result_search[$i]['Price']>=$price[0]&&$result_search[$i]['Price']<=$price[1])
         {
           $result_price[$temp_count]=$result_search[$i];
           $temp_count++;
         }

       }
       $count=$temp_count;
  }
  else {
    $result_price=$result_search;
  }

  $result_rating=array(array());
  if(isset($_GET['rating']))
  {
        $rating=explode("-",$_GET['rating']);
        $temp_count=0;
        for($i=0;$i<$count;$i++)
        {
          if($result_price[$i]['rating']>=$rating[0]&&$result_price[$i]['rating']<=$rating[1])
          {
            $result_rating[$temp_count]=$result_price[$i];
            $temp_count++;
          }

        }
        $count=$temp_count;
   }
   else {
     $result_rating=$result_price;
   }

   $result_author=array(array());
   if(isset($_GET['author'])&&$_GET['author']!=="all")
   {
        echo $_GET['author'];

         $temp_count=0;
         for($i=0;$i<$count;$i++)
         {
           if($result_rating[$i]['authorname']==$_GET['author'])
           {
             $result_author[$temp_count]=$result_rating[$i];
             $temp_count++;
           }

         }
         $count=$temp_count;
    }
    else {
      $result_author=$result_rating;
    }


    $result_arrivals=array(array());
    if(isset($_GET['arrivals']))
    {
          $arrivals=$_GET['arrivals'];
          $temp_count=0;
          for($i=0;$i<$count;$i++)
          {
            if(strtotime($result_author[$i]['publish_date'])>=strtotime($arrivals))
            {
              $result_arrivals[$temp_count]=$result_author[$i];
              $temp_count++;
            }

          }
          $count=$temp_count;
		   usort($result_arrivals,'sortByDateRev');


     }
     else {
       $result_arrivals=$result_author;
     }


$result=array(array());

$result=$result_arrivals;
if(isset($_GET['top_downloads'])){
   usort($result,'sortByDownloads');
 }
 for($i=0;$i<$count;$i++)
 {
 ?>

<div class="item"  id=<?php echo "\"".$result[$i]['bookid']."\"";?>  onclick="showDesc(this.id)">
  <div class="icon">
    <img src=<?php echo $result[$i]['imageURL']; ?> alt="Pic N/A"/>
  </div>
  <div class="desc">
    <h2 class="title"><?php echo $result[$i]['bookname']; ?></h2>
    <h4 class="metadata">Author: <?php echo $result[$i]['authorname']; ?></h4>
    <h4 class="metadata">Category: <?php echo $result[$i]['category']; ?></h4>
    <h4 class="price">Rs <?php echo $result[$i]['Price'];?></h4>
    <h4 class="price">Downloads <?php echo $result[$i]['downloads'];?></h4>
    <h4 class="price">Date <?php echo $result[$i]['publish_date'];?></h4>

    <div class="rate">
      <h4>Rating</h4>
      <div class="star">
        <?php
          $rate=$result[$i]['rating'];
          $ratei=(int)$rate;
          $ratef=$rate-$ratei;
          while($ratei--){
         ?>
            <img src="clickables/fs.png"/>
        <?php
          }
          if($ratef>0)
          {
          ?>
            <img src="clickables/hs.png"/>
          <?php
          }
          ?>

      </div>
    </div>
    <div class="dete" >
      <h4>Description: </h4>
      <p class="para" ><?php echo $result[$i]['Description']; ?></p>
      <a href="<?php echo "download_increment.php";?>?a=increase&id=<?php echo $result[$i]['bookid']?>&url=<?php echo $result[$i]['pdfURL']?>&<?php echo $_SERVER['QUERY_STRING']?>">Press Me</a>


    </div>

  </div>

</div>
<hr/>

<?php
}
  ?>

  <script>
    function showDesc(f_id)
    {
      var a=document.getElementById(f_id);
      var x=a.getElementsByClassName('desc')[0];
      var y=x.getElementsByClassName('dete')[0];

      if(y.style.display=="none")
      {
          y.style.display="block";
      }
      else
      {
          y.style.display="none";
      }

    }
  </script>
