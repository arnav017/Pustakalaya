        <div class="search_bar">

             <h1>Pustakalaya</h1>

            <form id="search_form" name="search_form" action="home.php" method="GET">
                <select form="search_form" name="search_typee" id="search_type">
                  <option value="bookname" <?php
                                                if(isset($_GET['search_typee'])&&$_GET['search_typee']=="bookname")
                                                  {
                                                      echo "selected";

                                                  }

                                                ?>>Books</option>
                  <option value="authorname" <?php
                                                if(isset($_GET['search_typee'])&&$_GET['search_typee']=="authorname")
                                                  {
                                                      echo "selected";

                                                  }

                                                ?>>Author</option>
                  <option value="category" <?php
                                                if(isset($_GET['search_typee'])&&$_GET['search_typee']=="category")
                                                  {
                                                      echo "selected";

                                                  }

                                                ?>>Category</option>
                </select>
                <input id="search_box" type="search" placeholder="Search Here" value="<?php
                                                                                        if(isset($_GET['search_boxname']))
                                                                                        {
                                                                                            echo $_GET['search_boxname'];

                                                                                        }

                                                                                      ?>" name="search_boxname" />
                <input type="submit" id="search_button" value="!"/>
            </form>

        </div>

        <link rel="stylesheet" type="text/css" href="css/search_bar.css"/>
