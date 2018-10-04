<?php
    $username="root";
    $password="kronosServer";
    $database="pustakalaya";
    $servername="localhost";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn)
    {
      die("Connection failed");
    }


    $sql='drop table admin;';
    $just=mysqli_query($conn,$sql);

	  $sql='
      create table admin(
	  id int auto_increment primary key,
	  dpURL VARCHAR(32),
	  name VARCHAR(30),
	  role VARCHAR(30),
    address VARCHAR(100),
	  contact VARCHAR(30)
	  );';
    $just=mysqli_query($conn,$sql);
    if (!$just)
      {
         echo("Error description: " . mysqli_error($conn));
      }


    $sql='insert into admin(dpURL,name,role,address,contact) values
    ("book_icons/art.jpg","Office","Office","Kanpur,India","+91-8077074331"),
    ("book_icons/art.jpg","Anshul Garg","Admin","Kanpur,India","+91-7607491516"),
    ("book_icons/art.jpg","Arnav Srivastava","Admin","NY,USA","+91-7618922251"),
    ("book_icons/art.jpg","Sumit Tomar","Admin","Bangluru,India","+91-8077084331")
    ';
    $just=mysqli_query($conn,$sql);
    if (!$just)
      {
         echo("Error description: " . mysqli_error($conn));
      }


    $sql='drop table USER_DETAILS;';
    $just=mysqli_query($conn,$sql);

	$sql='
      create table USER_DETAILS(
      USER_NAME VARCHAR(200) NOT NULL,
	  USER_ID VARCHAR(200) NOT NULL,
	  PASSWORD VARCHAR(32) NOT NULL,
	  FIRSTNAME VARCHAR(30),
	  LASTNAME VARCHAR(30),
	  GENDER CHAR(1),
	  PHONE VARCHAR(30),
	  PROFILE_FLAG TINYINT(1) Default 0,
	  DOB DATE,
	  PROFESSION VARCHAR(25),
	  OTP VARCHAR(4)
	  );';
    $just=mysqli_query($conn,$sql);




    $sql='drop table books;';
    $just=mysqli_query($conn,$sql);


    $sql='
      create table books(
      bookid int auto_increment primary key,
      bookname varchar(300),
      authorname varchar(300),
      category varchar(300));';
      $just=mysqli_query($conn,$sql);

    $sql='
      insert into books(bookname,authorname,category) values
      ("The Power of Subconscious Mind","Joseph Murphy","Phycology"),
      ("General Knowledge 2019","Manohar Pandey","General Knowledge"),
      ("On the origin of species","Olivia Laing","Science"),
      ("The interpretation of Dreams","Sigmund Freud","Science"),
      ("Walden","Henry David Thoreau","Biography & Memory"),
      ("The Discovery of India","Jawaharlal Nehru","History"),
      ("Two Lives","Vikram Seth","Literature"),
      ("Geetanjali","Rabindranath Tagore","Literature"),
      ("Silent Spring","Rachel Carson","Literature"),
      ("The Diary of Young Girl","Anne Frank","Biography"),
      ("Travels of ibn battuta","ibn battuta","Travel"),
      ("A brief history of time","Stephen Hawking","Science"),
      ("Capa in color","Robert Capa","Photography"),
      ("Chromes","William Eggleston","Photography"),
      ("Modernism Rediscovered","Julius Schulman","Photography"),
      ("Diane Arbus:An Aperture Monograph","Diane Arbus","Photography"),
      ("Paul Strand in Mexico","Paul Strand","Photography"),
      ("Invisible City","Ken Schles","Photography"),
      ("Drive","Andrew Bush","Photography"),
      ("Infra","Richard Mosse","Photography"),
      ("A Moveable Feast","Ernest Hemingway","Biography"),
      ("The life of Samuel Johnson","James Boswell","Biography"),
      ("Eminent Victorians","Lytton Strachey","Biography"),
      ("GoodBye to All That","Robert Graves","Biography"),
      ("The Moon\'s a Ballon","David Niven","Biography"),
      ("My Experiments with truth","MK Gandhi","Biography"),
      ("Wings of fire","Dr. APJ Abdul Kalam","Biography"),
      ("Playing it my way","Sachin Tendulkar","Biography"),
      ("Lessons for Corporate America","Warren Buffet","Business"),
      ("Beating the Street","Peter Lynch","Business"),
      ("Think and Grow Rich","Napolean Hill","Business"),
      ("The Intelligent Investor","Benjamin Graham","Business"),
      ("Almanack","Peter Kaufman","Business"),
      ("Common Stocks and Uncommon Profits","Philip Fisher","Business"),
      ("Business Adventures","John Brooks","Business"),
      ("The Dhandho Investor","Mohnish Pabrai","Business"),
      ("Antifragile","Nassim Talib","Business"),
      ("Magnus Chase","Rick Riordan","Children"),
      ("The Joy of Cooking","Irma Rombauer","CookBook"),
      ("Mastering the Art of French Cooking","Julia Child","CookBook"),
      ("Betty Crocker CookBook","Betty Crocker","CookBook"),
      ("Vegetarian Cooking for Everyone","Deborah Madison","CookBook"),
      ("The Fannie Farmer Cookbook","Marion Cunningham","CookBook"),
      ("Essentials of Classic Italian Cooking","Marcella Hazan","CookBook"),
      ("Everyday Food","Martha Stewart","CookBook"),
      ("The Silver Spoon","Clelia Onofrio","CookBook"),
      ("The New Enchanted Broccoli Forest","Mollie Katzen","CookBook"),
      ("The New Book of Middle Eastern Food","Claudia Roden","CookBook"),
      ("The Silver Palate Cookbook","Claudin Roden","CookBook"),
      ("India After Gandhi","Ramachandra Guha","History"),
      ("India A history","John Keay","History"),
      ("City of Djinns:A year in Delhi","Willean Dalrymple","History"),
      ("The Last Mughal","Willaim Dalrymple","History"),
      ("India After Independence","Bipan Chandra","History"),
      ("Indira","Katherine Frank","History"),
      ("An Autobiography:Toward Freedom","Jawarharlal Nehru","History"),
      ("Asoka and the Decline of the Mauryas","Romila Thapar","History"),
      ("Freedom of Midnight","Larry Collins","History"),
      ("Jai Somnath","Kanhaiyalal Maniklal Munshi","History"),
      ("The Agrarian System of Mughal India","Irfan Habib","History"),
      ("The Mughal Throne","Abraham Eraly","History"),
      ("Hind Swaraj or Indian Home Rule","Mahatma Gandhi","History"),
      ("The Story of India","Michael Wood","History"),
      ("Siamese White","Maurice Collis","History"),
      ("The Accidental Universe","Alan Lightman","Science"),
      ("Asap Science","M.Moffit","Science"),
      ("Bad Science","Ben Goldacre","Science"),
      ("The Blind Watchmaker","Richard Dawkins","Science"),
      ("Bonk","Mary Roach","Science"),
      ("The Book of Beetles","Patrice Bouchard","Science"),
      ("The Book of Eggs","Mark E.Hauber","Science"),
      ("The Book of Trees","Manuel Lima","Science"),
      ("Cosmos","Carl Sagan","Science"),
      ("The Drunken Botanist","Amy Stewart","Science"),
      ("The Elegant Universe","Brian Greene","Science"),
      ("Evolution:The Human Story","DK Publishing","Science"),
      ("Evolution:A colouring Book","Annu Kilpelainen","Science"),
      ("The Fabric of the Cosmos","Brian Greene","Science"),
      ("The God Delusion","Richard Dawkins","Science"),
      ("The Grand Design","Stephen Hawkin","Science"),
      ("The Greatest show on Earth","Richard Dawkins","Science"),
      ("The Hubble Cosmos","David H.Devorkin","Science"),
      ("Natural History","Smithsonian","Science"),
      ("The Origin of Species","Charles Darwin","Science"),
      ("Packing of Mars","Mary Roach","Science"),
      ("Pale Blue Dot","Carl Sagan","Science"),
      ("Physics of the Impossible","Michio Kaku","Science"),
      ("The Pleasure of Finding Things Out","Richard P.Feynman","Science"),
      ("Science","Robert Dinwiddie","Science"),
      ("The Science of Shakespeare","Dan Falk","Science"),
      ("The Jungle Book","Ruskin Bond","Fiction"),
      ("Letter from a Father to her Daughter","JL Nehru","Non Fiction"),
      ("Discovery of India","JL Nehru","Non Fiction"),
      ("Malgudy School Days","RK Narayan","Teens"),
      ("I too had a love story","Ravinder Singh","Teens"),
      ("2 States: The story of my marriage","Chetan Bhagat","Romance"),
      ("Revolution 2020","Chetan Bhagat","Non Fiction"),
      ("Gulliver\'s Travel","Jonathan Swift","Teens"),
      ("The Monk who sold his Ferarri","Robin Sharma","Non Fiction"),
      ("The Immortals of Melhua","Amit Trivedi","Non Fiction"),
      ("Eyes Not Here","Ruskin Bond","Fiction"),
      ("Twilight","Stephen Meyer","Fiction"),
      ("The Room on the Roof","Ruskin Bond","Teens"),
      ("The Blue Umbrella","Ruskin Bond","Teens"),
      ("The Oliver Twist","Charles Dickens","Teens"),
      ("The Adventures of Tom Sawyer","Mark Twain","Teens"),
      ("The Adventures of Huckelberry Finn","Mark Twain","Teens"),
      ("A Christmas Carol","Charles Dicken","Teens"),
      ("The Gigantic Turnip","Aleksey Nikolayevich Tolstoy","Children"),
      ("Jack and the Beanstalk","","Children"),
      ("Goldilocks and the Three Bears","Robert Southey","Children"),
      ("Cinderella","","Children"),
      ("Snow White","","Children"),
      ("Rapunzel","Gerry M","Children"),
      ("Thumbelina","Hans Christian Anderson","Children"),
      ("Alice\'s Adventures in Wonderland","Lewis Carroll","Chidren"),
      ("Turn Right at Machu Picchu: Rediscovering the Lost City One Step at a Time","Mark Adams","Travel"),
      ("Lonely Planet Sri Lanka","Ryan Berkmoes and Stuart Butler","Travel"),
      ("India: A Million Mutinies Now","V.S. Naipaul","Travel"),
      ("India: The Rough Guide","David Abram","Travel"),
      ("Following the Equator","Mark Twain","Travel"),
      ("Chai Chai","Bishwanath Ghosh","Travel"),
      ("If It\'s Monday It Must Be Madurai: A Conducted Tour of India","Srinath Perur","Travel"),
      ("Following Fish: Travels Around the Indian Coast","Samanth Subramanian","Travel"),
      ("Banāras, City of Light","Diana L. Eck","Travel"),
      ("Fifty Shades of Grey","E. L. James","Romance"),
      ("Pride and Prejudice","Jane Austen","Romance"),
      ("The Notebook","Nicholas Sparks","Romance"),
      ("Call Me by Your Name","André Aciman","Romance"),
      ("The Light We Lost","Jill Santopolo","Romance"),
      ("Jill Santopolo","Sudeep Nagarkar","Romance"),
      ("Shadow of the moon","M. M. Kaye","Romance"),
      ("Forbidden Jewel of India","Louise Allen","Romance"),
      ("The Indian Tycoon\'s Marriage Deal","Adite Banerjie","Romance"),
      ("Killing Floor","Lee Child","Mystery and Suspense"),
      ("The Krishna Key","Ashwin Sanghi","Mystery and Suspense"),
      ("The Rozabal Line","Ashwin Sanghi","Mystery and Suspense"),
      ("Midnight\'s Children","Salman Rushdie","Mystery and Suspense"),
      ("Shantaram","Gregory David Roberts","Mystery and Suspense"),
      ("Othello","Shakespeare","Tragedy"),
      ("Julius Caesar","Shakespeare","Tragedy"),
      ("Poetics","Aristotle","Tragedy"),
      ("The Fault in Our Stars","John Green and Rodrigo Corral","Tragedy"),
      ("Macbeth","Shakespeare","Tragedy"),
      ("Hamlet","Shakespeare","Tragedy"),
      ("Agamemnon","Aeschylus","Tragedy");';
      $just=mysqli_query($conn,$sql);

      $sql='alter table books add categorysound varchar(200) after category;';$just=mysqli_query($conn,$sql);
      $sql='alter table books add booknamesound varchar(200) after bookname;';$just=mysqli_query($conn,$sql);
      $sql='alter table books add authornamesound varchar(200) after authorname;';$just=mysqli_query($conn,$sql);
      $sql='ALTER TABLE books ADD Price INT AFTER categorysound;  ';$just=mysqli_query($conn,$sql);


      	if (!$just)
          {
             echo("Error description: " . mysqli_error($conn));
          }



    $sql="select *from books;";

    $result=mysqli_query($conn,$sql);
	$sql="alter table books add column imageURL varchar(500);" ;
	$just=mysqli_query($conn,$sql);
	$sql="alter table books add column pdfURL varchar(500);" ;
	$just=mysqli_query($conn,$sql);
	$sql="alter table books add column Description varchar(3000) Default 'Dummy Text: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum';";
	$just=mysqli_query($conn,$sql);

	$sql="alter table books add column rating decimal(3,2);" ;
	$just=mysqli_query($conn,$sql);

  $sql="alter table books add column downloads int default 0;" ;
  $just=mysqli_query($conn,$sql);

  $sql="alter table books add column publish_date date;" ;
  $just=mysqli_query($conn,$sql);

	if (!$just)
    {
       echo("Error description: " . mysqli_error($conn));
    }

    while($row=mysqli_fetch_assoc($result))
    {
      if($row['bookid']==147)
      break;

      $bookid=$row['bookid'];
      $flag=mt_rand(0,100);
        $sql1="update books set downloads='$flag' where bookid='$bookid'";
        mysqli_query($conn,$sql1);

      $bookid=$row['bookid'];
      $year=mt_rand(2012,2018);
      if($year==2018)
        $month=mt_rand(1,4);
      else {
        $month=mt_rand(1,12);
      }


      $date=mt_rand(1,25);
      $flag=$year."-".$month."-".$date;
      $sql1="update books set publish_date='$flag' where bookid='$bookid'";
      mysqli_query($conn,$sql1);

  	  $bookid=$row['bookid'];
      $flag=mt_rand(0,1);
  	  $rate=mt_rand(1,5)-$flag*0.5;
      $sql1="update books set rating='$rate' where bookid='$bookid'";
      mysqli_query($conn,$sql1);

	    $price=mt_rand(0,99)*pow(10,rand(0,1));
      $sql1="update books set price='$price' where bookid='$bookid'";
      mysqli_query($conn,$sql1);


      $temp=metaphone($row['bookname']);
      $temp2=$row['bookname'];
      $sql1="update books set booknamesound='$temp' where bookname='$temp2'";
      mysqli_query($conn,$sql1);

      $temp=metaphone($row['authorname']);
      $temp2=$row['authorname'];
      $sql1="update books set authornamesound='$temp' where authorname='$temp2'";
      mysqli_query($conn,$sql1);

      $temp=metaphone($row['category']);
      $temp2=$row['category'];
      $sql1="update books set categorysound='$temp' where category='$temp2'";
      mysqli_query($conn,$sql1);

      $temp2=$row['category'];
      $URL="book_icons/dummy.jpg";
      $sql1="update books set imageURL='$URL' where category='$temp2'";
      mysqli_query($conn,$sql1);

      $temp2=$row['category'];
      $URL="book_pdf/morris_mano.pdf";
      $sql1="update books set pdfURL='$URL' where category='$temp2'";
      mysqli_query($conn,$sql1);
    }


    //sumit bhiya ki spelling correction
    $sql="update books set category='Psychology' where category like '%phyco%';" ;
    $just=mysqli_query($conn,$sql);

    //category generic photo

    $sql="update books set imageURL='book_icons/tee.jpg' where category like '%teen%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/history.jpg' where category like 'history';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/romance.jpg' where category like '%mance%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/coo.jpg' where category like '%cook%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/art.jpg' where category like '%photo%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/lit.jpg' where category like '%lit%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/travel.jpg' where category like '%ravel%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/generalK.jpg' where category like '%general%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/psy.jpg' where category like '%psy%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/tragedy.jpg' where category like '%ragedy%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/fict.jpg' where category like '%fict%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/mys.jpg' where category like 'mys%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/sci.jpg' where category like '%scien%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/bus.webp' where category like 'bus%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/children.jpg' where category like 'children%';" ;
    $just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/bio.jpg' where category like 'bio%';" ;
    $just=mysqli_query($conn,$sql);


    //indivisual books photos

    $sql="update books set imageURL='book_icons/Diaryofyounggirl.jpg' where bookname like 'The Diary%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/2StatesTheStoryofmymarriage.jpg' where bookname='2 States: The Story of my marriage';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/BeatingtheStreet.jpg' where bookname='Beating the Street';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/CapainColor.jpg' where bookname='Capa in Color';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/Chromes.png' where bookname='Chromes';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/FiftyShadesofGrey.jpg' where bookname like 'Fifty%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/IndiaAfterGandhi.jpg' where bookname like 'India%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/Itoohadalovestory.jpg' where bookname like 'I too%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/KillingFloor.jpg' where bookname like 'Killing%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/LessonsForCorporateAmerica.jpg' where bookname like 'Lessons%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/MagnusChase.jpg' where bookname like 'Magnus%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/MalgudySchoolDays.jpg' where bookname like 'Malgudy%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/MasteringtheArtofFrenchCooking.jpg' where bookname like 'Mastering%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/Onthe0riginofSpecies.jpg' where bookname like 'On the%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/TheDiscoveryofIndia.jpg' where bookname like 'The Discovery%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/TheGiganticTurnip.jpg' where bookname like 'The Gigantic%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/TheinterpretationofDreams.jpg' where bookname like '%interpretation%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/TheJoyofCooking.jpg' where bookname like '%Joy%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/TheJungleBook.jpg' where bookname like '%Jungle%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/TheKrishnaKey.jpg' where bookname like '%Krishna%';" ;
  	$just=mysqli_query($conn,$sql);

    $sql="update books set imageURL='book_icons/Walden.jpg' where bookname like 'Walden';" ;
  	$just=mysqli_query($conn,$sql);
 ?>
