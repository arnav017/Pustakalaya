<?php
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
        echo "dcoisdnws";
        echo $imageActualExt;
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
    }
    ?>
