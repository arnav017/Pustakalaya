<script>
  function phclick(ph_id)
  {
    var str= "home.php?search_typee=category&search_boxname="+ph_id;
    var newstr=window.location+"";
    var strAry=newstr.split("home.php");
    var temp=strAry[0]+str;

    window.location=temp;


  }
</script>

        <div class="banner">
          <div class='anshul'>
            <span><h1>Shop By Categories</h1></span>
            <span>
              <form  name="top_downloads_form" id="downloads_form" action="home.php" method="GET">
                 <input type="submit" name="top_downloads" value="Top_Downloads" />
               </form>
             </span>
          </div>

          <div>
            <div id='photography' onClick="phclick(this.id)">
              <img src="clickables/art.png"/>
            </div>

            <div id='biography' onClick="phclick(this.id)">
              <img src="clickables/bio.png"/>
            </div>

            <div id='business' onClick="phclick(this.id)">
              <img src="clickables/bus1.png"/>
            </div>

            <div id='children' onClick="phclick(this.id)">
              <img src="clickables/chi1.png"/>
            </div>

            <div id='cook' onClick="phclick(this.id)">
              <img src="clickables/coo.png"/>
            </div>

            <div id='fiction' onClick="phclick(this.id)">
              <img src="clickables/fic1.png"/>
            </div>

            <div  id='history' onClick="phclick(this.id)">
              <img src="clickables/his1.png"/>
            </div>

            <div  id='mystery' onClick="phclick(this.id)">
              <img src="clickables/mys1.png"/>
            </div>

            <div  id='romance' onClick="phclick(this.id)">
              <img src="clickables/rom1.png"/>
            </div>

            <div  id='sci' onClick="phclick(this.id)">
              <img src="clickables/sci1.png"/>
            </div>

            <div  id='teens' onClick="phclick(this.id)">
              <img src="clickables/tee1.png"/>
            </div>
        </div>

        </div>

        <link rel="stylesheet" type="text/css" href="css/banner.css"/>
