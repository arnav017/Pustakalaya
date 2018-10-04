<?php
    $s="localhost";
    $p="kronosServer";
    $u="root";
    $d="pustakalaya";

    $con=mysqli_connect($s,$u,$p,$d);

    if(!$con)
    {
        die("Connection Failed");
    }
    session_start();
?>


<!doctype html>
<html>
    <head>

            <script type="text/javascript">
                function myfunction(element_id)
                 {

                   var element=document.getElementsByName(element_id);
                   for(var i=0;i<element.length;i++)
                   {

                       if(element[i].checked)
                         element[i].checked=false;
                   }


                 }





                </script>
                <script>
                  function dummy_function()
                  {
                    var box=document.getElementById('dummy_search_box');
                    var main_box=document.getElementById('search_box');
                    box.value=main_box.value;

                    var option=document.getElementById('dummy_search_type');
                    var main_option=document.getElementById('search_type');

                    //alert(main_option.value);
                    option.value=main_option.value;

                  }
                </script>




    </head>
    <body>

        <?php include('div/search_bar.php');?>

        <?php include('div/bar.php');?>

        <?php include('div/gallery.php'); ?>

        <?php include('div/banner.php') ;?>


        <link rel="stylesheet" type="text/css" href="css/bar.css">
        <div class="catalogue">

          <div class="filter">
            <div>

              <form name="filter_form" action="home.php" method="GET" >
                  <h1>Shop by</h1>
                  <ul class="aul">
                    <li><input type="submit" name="filter_button" value="APPLY" onclick="dummy_function()" /></li>
                  </ul>
                  <br/>
                  <input id="dummy_search_box"  type="search" name="search_boxname" style="display:none;" />
                  <input id="dummy_search_type"  name="search_typee" style="display:none;" />
                  <h3>Price</h3>
                  <ul class="cul"><li><button class="clear" type="button"  onclick="myfunction('price')">clear</button></li></ul>
                  <ul>
                    <li><input name="price" value="0-100" type="radio"/>less than 100</li>
                    <li><input name="price" value="100-500" type="radio" />100-500</li>
                    <li><input name="price" value="500-1000"type="radio"/>500-1000</li>
                    <li><input name="price" value="1000-200000" type="radio"/>1000+</li>
                  </ul>

                  <h3>Rating</h3>
                  <ul class="cul"><li><button class="clear" type="button"  onclick="myfunction('rating')">clear</button></li></ul>
                  <ul>
                    <li><input name="rating" value="4.5-5.0" type="radio"/>Top:4.5+</li>
                    <li><input name="rating" value="3.5-4.5" type="radio" />4.5-3.5</li>
                    <li><input name="rating" value="2.5-3.5" type="radio"/>3.5-2.5</li>
                    <li><input name="rating" value="0-2.5" type="radio" />less than 2.5</li>
                  </ul>

                  <h3>Popular Authors</h3>
                  <ul class="cul"><li><button class="clear" type="button"  onclick="myfunction('author')">clear</button></li></ul>
                  <ul>
                    <li><input name="author" value="Ruskin Bond" type="radio" >Ruskin Bond</li>
                    <li><input name="author" value="Ashwin Singh" type="radio" />Ashwin Sanghi</li>
                    <li><input name="author" value="Chetan Bhagat" type="radio" />Chetan Bhagat</li>
                    <li><input name="author" value="all" type="radio" />Others</li>
                  </ul>

                  <h3>Fresh Arrivals</h3>
                  <ul class="cul"><li><button class="clear" type="button"  onclick="myfunction('arrivals')">clear</button></li></ul>
                  <ul>
                    <li><input name="arrivals" value="<?php echo  date('Y-m-d', strtotime('-7 days'));?>" type="radio" />Latest</li>
                    <li><input name="arrivals" value="<?php echo  date('Y-m-d', strtotime('-15 days'));?>" type="radio" />Fortnightly</li>
                    <li><input name="arrivals" value="<?php echo  date('Y-m-d', strtotime('-30 days'));?>" type="radio" />Month ago</li>
                    <li><input name="arrivals" value="<?php echo  date('Y-m-d', strtotime('-180 days'));?>" type="radio" />3 Months ago</li>
                    <li><input name="arrivals" value="<?php echo  date('Y-m-d', strtotime('-360 days'));?>" type="radio" />1 year ago</li>
                    <li><input name="arrivals" value="<?php echo  date('Y-m-d', strtotime('-1440 days'));?>" type="radio" />Old is Gold</li>

                  </ul>
              </form>


            </div>

          </div>

          <div class="display">
              <?php
              $value=true;

               include('search2.php'); ?>

          </div>

        </div>

        <link rel="stylesheet" type="text/css" href="css/catalogue.css"/>

        <link rel="stylesheet" type="text/css" href="css/custom.css"/>



    </body>


</html>
