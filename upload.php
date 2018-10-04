<?php
      $s="localhost";
      $p="";
      $u="root";
      $d="pustakalaya";

      $con=mysqli_connect($s,$u,$p,$d);

      if(!$con)
      {
          die("Connection Failed");
      }



session_start();

          if(!(isset($_SESSION['user']))) {
              echo '<script> alert("please log in first")</script>';
          }





      if(isset($_POST['submit']))
        {
          $image=$_FILES['input_image'];
          $imagename=$_FILES['input_image']['name'];
          $imagetmpname=$_FILES['input_image']['tmp_name'];
          $imageSize=$_FILES['input_image']['size'];
          $imageError=$_FILES['input_image']['error'];
          $imageType=$_FILES['input_image']['type'];
          $pdf=$_FILES['input_pdf'];
          $pdfname=$_FILES['input_pdf']['name'];
          $pdftmpname=$_FILES['input_pdf']['tmp_name'];
          $pdfSize=$_FILES['input_pdf']['size'];
          $pdfError=$_FILES['input_pdf']['error'];
          $pdfType=$_FILES['input_pdf']['type'];

          $pdfExt=explode(".",$pdfname);
          $imageExt=explode(".",$imagename);

          $pdfActualExt=strtolower(end($pdfExt));
          $imageActualExt=strtolower(end($imageExt));

          $allowedpdf=array('pdf');
          $allowedImage=array('jpg','jpeg','png');
          $pdfDestination=null;
          $imageDestination=null;
          if(in_array($imageActualExt,$allowedImage)&&in_array($pdfActualExt,$allowedpdf))
          {
            if($imageError===0&&$pdfError===0)
            {
              if($imageSize<1000000&&$pdfSize<1000000000)
              {

                $imageNameNew=uniqid('',true).".".$imageActualExt ;
                $imageDestination='book_icons/'.$imageNameNew;
                move_uploaded_file($imagetmpname,$imageDestination);

                $pdfNameNew=uniqid('',true).".".$pdfActualExt ;
                $pdfDestination='book_pdf/'.$pdfNameNew;
                move_uploaded_file($pdftmpname,$pdfDestination);

              }
              else
              {
                if($imageSize>=1000000)
                  die("Image size too large");
                else
                  die("pdf size too large");

              }
            }
            else
            {
              if($imageError!==0)
                die("There was an error upload your image");
              else
                die("There was an error upload your pdf");

            }

          }
          else
          {
              if(!in_array($imageActualExt,$allowedImage))
                die("You can not upload images of this type");
              else
                die("You can not upload pdf of this type");

          }
          $bookname=$_POST['input_bookname'];
          $booknamesound=metaphone($bookname);
          $authorname=$_POST['input_authorname'];
          $authornamesound=metaphone($authorname);
          $category=$_POST['input_category'];
          $categorysound=metaphone($category);
          $price=$_POST['input_price'];
          $imageURL=$imageDestination;
          $pdfURL=$pdfDestination;
		$description=$_POST['input_description'];
          $sql="insert into books(bookname,booknamesound,authorname,authornamesound,category,categorysound,price,imageURL,pdfURL,Description) values('$bookname','$booknamesound','$authorname','$authornamesound','$category','$categorysound',$price,'$imageURL','$pdfURL','$description')";
          if(!mysqli_query($con,$sql))
          {
             die(mysqli_error($con));
          }

      }







 ?>
<html>
<head>
  <title></title>

  <script src="upload.js" type="text/javascript"></script>
</head>
<body>

  <?php include('div/search_bar.php');?>

  <?php include('div/bar.php');?>

  <div class="upload_frame" id="upload_frame_id">
      <form action="upload.php" method="POST" enctype="multipart/form-data" id="my_form">


            <div class="inner_block" id="bookname" onClick="myfunction(this.id)">
                <span class="block_name">Book Name</span>
                <span  class="display_block">Enter Book Name Here</span>
                <input type="text" name="input_bookname" class="input_field" placeholder="BookName">
                <span class="checkmark check_grey"></span>
                <span class="checkmark check_green"></span>
            </div>

            <div class="inner_block" id="authorname" onClick="myfunction(this.id)">
                <span class="block_name" >
                  Authorname
                </span>
                <span  class="display_block"  >
                  Enter AuthorName Here
                </span>
                <input type="text" name="input_authorname" class="input_field" placeholder="AuthorName">
                <span class="checkmark check_grey">
                </span>
                <span class="checkmark check_green">
                </span>
            </div>

            <div class="inner_block" id="category" onClick="myfunction(this.id)">
                <span class="block_name" >
                  Category
                </span>
                <span  class="display_block" >
                  Enter Category Here
                </span>
                <input type="text" name="input_category" class="input_field" placeholder="Category">
                <span class="checkmark check_grey">
                </span>
                <span class="checkmark check_green">
                </span>
            </div>

            <div class="inner_block" id="price" onClick="myfunction(this.id)">
                <span class="block_name" >
                  Price
                </span>
                <span  class="display_block">
                  Enter Price Here
                </span>
                <input type="text" name="input_price" class="input_field" placeholder="Price">
                <span class="checkmark check_grey">
                </span>
                <span class="checkmark check_green">
                </span>

            </div>

            <div class="inner_block" id="image" onClick="myfunction(this.id)">
                <span class="block_name">
                  Image
                </span>
                <span  class="display_block">
                  No file choosen
                </span>
                <input type="file" name="input_image" class="input_field">
                <span class="checkmark check_grey">
                </span>
                <span class="checkmark check_green">
                </span>
            </div>

            <div class="inner_block" id="pdf" onClick="myfunction(this.id)">
                <span class="block_name">
                  PDF
                </span>
                <span  class="display_block">
                  No file choosen
                </span>
                <input type="file" name="input_pdf" class="input_field">
                <span class="checkmark check_grey">
                </span>
                <span class="checkmark check_green">
                </span>


            </div>
			 <div class="inner_block" id="description" onClick="myfunction(this.id)">
                <span class="block_name">
                  Description:
                </span>
                <span  class="display_block">
                  Write Description Here
                </span>
				<textarea name="input_description" cols="40" rows="5" class="input_field"></textarea>
                <!--<input type="textarea" name="input_description" class="input_field">-->
                <span class="checkmark check_grey">
                </span>
                <span class="checkmark check_green">
                </span>
            </div>

            <div>
              <input type="submit" name="submit" value="UPLOAD">
            </div>

      </form>
  </div>

      <link rel="stylesheet" type="text/css" href="upload.css"/>
      <link rel="stylesheet" type="text/css" href="css/custom.css"/>
</body>
</html>
