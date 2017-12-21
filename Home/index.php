

<?php
session_start();

$pageTitle = 'FoodZella';

  $css_files = '<link rel="stylesheet" href="../css/home.css">';

  include '../init.php';

  include '../connect.php';
  
?>

       <!--Intro Food tip-->

    <header class="intro " id="home-section">
        <div class="overlay ">
            <div class="container" id="Intro">    
                <div class="wow bounce">
                    <h1 class="head">
                    
                    <?php  
             $stmt = $con->prepare("SELECT Text FROM foodtips WHERE Admin_ID = ? ");
             $stmt->execute(array(1));
             $row1 = $stmt->fetchAll();
            echo $row1[0][0]; 
                   ?> </h1>

                    <p>Food is maybe the only universal thing that really has the power to bring everyone together.</p>
                </div>
                
            </div>
            <div class="bottom-part">
                <div class="arrow">
                    <span> <i class="fa fa-chevron-down" aria-hidden="true"></i> </span>
                </div>
            </div>
        </div>
    </header>


       <!-- start about sec -->

       <div class="about" id="about-section">
            <div class="container">         
             <!-- enter code here -->
            </div>
        </div>

        <!-- end about sec -->



        <!-- start categories sec -->
    
        <div class= "restaurantORrecipe"> 
            <div class="container">
                <div class="restaurants">               
                    <img src="../images/restaurant.jpg" class="restaurant" "img-responsive">
                <a href="../RestCategories/Dessert.php">
                    <img src="../images/dessert4.jpg" class="small_images R1"></a>
                <a href="../RestCategories/HealthFood.php">
                    <img src="../images/health.jpg" class="small_images R2"></a>
                <a href="../RestCategories/FastFood.php">
                    <img src="../images/fastfood2.jpg" class="small_images R3"></a>
                <a href="../RestCategories/EasternFood.php">
                    <img src="../images/easternfood.jpg" class="small_images R4"></a>
                <a href="../RestCategories/Pizza.php">
                    <img src="../images/diet2.jpg" class="small_images R5"></a>
                <a href="../RestCategories/Syrian.php">
                     <img src="../images/syrian2.jpg" class="small_images R6"></a>
                </div>
                <div class="recipes">
                        <img src="../images/recipe.jpg" class=" recipe" "img-responsive" >
                    <a href="recipe.php">
                        <img src="../images/dessert6.jpg" class="small_images C1"></a>
                    <a href="#">
                        <img src="../images/easternfood2.jpg" class="small_images C2"></a>
                    <a href="#">
                        <img src="../images/healthfood.jpg" class="small_images C3"></a>
                    <a href="#">
                        <img src="../images/fastfood3.jpg" class="small_images C4"></a>
                    <a href="#">
                        <img src="../images/DIET.jpg" class="small_images C5"></a>
                    <a href="#">
                         <img src="../images/syrian3.jpg" class="small_images C6"></a>
                </div>
            </div>
         <div class="clear"></div>
<!--        </div>     -->

        <!-- end categories sec -->

    
         <!-- start Recommendation sec -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 400px; margin: 0 auto;margin-top:30px;">
            <h3 class="re">Try Our Delicious Recipes!</h3><!--Recommendations-->
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active"><a href="#1">
                <img class="d-block w-100 imagerecommend" src="../images/dessert5.jpg" alt="First slide">
              </a></div>
              <div class="carousel-item"><a href="#2">
                  <img class="d-block w-100 imagerecommend" src="../images/dessert.jpg" alt="Second slide">
              </a></div>
              <div class="carousel-item"><a href="#3">
                  <img class="d-block w-100 imagerecommend" src="../images/dessert1.jpg" alt="Third slide">
              </a></div>
              <div class="carousel-item"><a href="#4">
                  <img class="d-block w-100 imagerecommend" src="../images/bakery.jpg" alt="Forth slide">
              </a></div>
              <div class="carousel-item"><a href="#5">
                  <img class="d-block w-100 imagerecommend" src="../images/cafe.jpg" alt="Fifth slide">
               </a></div>
              <div class="carousel-item"><a href="#6">
                  <img class="d-block w-100 imagerecommend" src="../images/pizza.jpg" alt="Sexth slide">
               </a></div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
     </div>


<!-- start contact us -->

     <div class="contactUs" style="text-align:center; width:500px;margin:auto;padding:10px">
        <h5>
        <?php
        $stmt = $con->prepare("SELECT Email,PhoneNo FROM administrator WHERE ID = ? LIMIT 1");
        $stmt->execute(array(1));
        $row1 = $stmt->fetch();

        echo ' Email : ' . $row1[0] . '<hr>' . 'Contact Number : ' . $row1[1] ;
        ?>
        </h5>
     </div>

      <!-- end contact us -->
    <!-- ---------------------------------------------------------------------------------------------------------------
    <div class="contianer">
     <div class="row">
            <div class="col-xs-12">

                <div id="imageCarousel" class="carousel slide" data-interval="2000"
                     data-ride="carousel" data-pause="hover" data-wrap="true">

                    <ol class="carousel-indicators">
                        <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#imageCarousel" data-slide-to="1"></li>
                        <li data-target="#imageCarousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="Images/dessert.jpg" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3>Desert</h3>
                                        <p>Desert Image Description</p>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <img src="Images/fastfood.jpg" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3>Jellyfish</h3>
                                        <p>Jellyfish Image Description</p>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <img src="Images/health.jpg" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3>Penguins</h3>
                                        <p>Penguins Image Description</p>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <img src="Images/healthfood.jpg" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3>Penguins</h3>
                                        <p>Penguins Image Description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="Images/Lighthouse.jpg" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3>Lighthouse</h3>
                                        <p>Lighthouse Image Description</p>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <img src="Images/Hydrangeas.jpg" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3>Hydrangeas</h3>
                                        <p>Hydrangeas Image Description</p>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <img src="Images/Koala.jpg" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3>Koala</h3>
                                        <p>Koala Image Description</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="Images/tulips.jpg" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3>Tulips</h3>
                                        <p>Tulips Image Description</p>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <img src="Images/Chrysanthemum.jpg" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3>Chrysanthemum</h3>
                                        <p>Chrysanthemum Image Description</p>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <img src="Images/stripes.jpg" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3>Stripes</h3>
                                        <p>Stripes Image Description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#imageCarousel" class="carousel-control left" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#imageCarousel" class="carousel-control right" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script> -->

        

        <!-- end Recommendaton sec -->
    
    
    
      

        <!-- start footer sec -->
    <?php 
    // $js_files = '<script src="../js/home.js"></script>';

    include '../' . $tmpl . 'footer.php';

    ?>   
        <!-- end footer sec -->

   
    <!-- </body> -->
