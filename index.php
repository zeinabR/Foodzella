<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- css files -->
    <link href="CustomStyles.css" rel="stylesheet" />
    
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/home.css" />
     <link rel='stylesheet' href="css/style.css"/>
    <title>FOODZELLA</title>
</head>

<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar navbar-brand" href="#"><span class="header">F</span>oodzella</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse " id="navbarToggleExternalContent" >

                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item ">
                        <a class="nav-link" data-scroll="home" href="index.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll="about"  href="about/about.php">ABOUT</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link " data-scroll="contact">CONTACT US</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>

       <!--Introo-->

    <header class="intro" id="home-section">
        <div class="overlay">
            <div class="container" id="Intro">
                <div class="wow bounce">
                    <h1 class="head"><span class="header">S</span>trike The Glory</h1>
                    
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
                    <img src="images/restaurant.jpg" class="restaurant" "img-responsive">
                <a href="#">
                    <img src="images/dessert4.jpg" class="small_images R1"></a>
                <a href="#">
                    <img src="images/health.jpg" class="small_images R2"></a>
                <a href="#">
                    <img src="images/fastfood2.jpg" class="small_images R3"></a>
                <a href="#">
                    <img src="images/easternfood.jpg" class="small_images R4"></a>
                <a href="#">
                    <img src="images/diet2.jpg" class="small_images R5"></a>
                <a href="#">
                     <img src="images/syrian2.jpg" class="small_images R6"></a>
                </div>
                <div class="recipes">
                        <img src="images/recipe.jpg" class=" recipe" "img-responsive" >
                    <a href="recipe.php">
                        <img src="images/dessert6.jpg" class="small_images C1"></a>
                    <a href="#">
                        <img src="images/easternfood2.jpg" class="small_images C2"></a>
                    <a href="#">
                        <img src="images/healthfood.jpg" class="small_images C3"></a>
                    <a href="#">
                        <img src="images/fastfood3.jpg" class="small_images C4"></a>
                    <a href="#">
                        <img src="images/DIET.jpg" class="small_images C5"></a>
                    <a href="#">
                         <img src="images/syrian3.jpg" class="small_images C6"></a>
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
                <img class="d-block w-100 imagerecommend" src="images/dessert5.jpg" alt="First slide">
              </a></div>
              <div class="carousel-item"><a href="#2">
                  <img class="d-block w-100 imagerecommend" src="images/dessert.jpg" alt="Second slide">
              </a></div>
              <div class="carousel-item"><a href="#3">
                  <img class="d-block w-100 imagerecommend" src="images/dessert1.jpg" alt="Third slide">
              </a></div>
              <div class="carousel-item"><a href="#4">
                  <img class="d-block w-100 imagerecommend" src="images/bakery.jpg" alt="Forth slide">
              </a></div>
              <div class="carousel-item"><a href="#5">
                  <img class="d-block w-100 imagerecommend" src="images/cafe.jpg" alt="Fifth slide">
               </a></div>
              <div class="carousel-item"><a href="#6">
                  <img class="d-block w-100 imagerecommend" src="images/pizza.jpg" alt="Sexth slide">
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
    <!------------------------------------------------------------------------------------------------------------------->
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
    <script src="bootstrap/js/bootstrap.min.js"></script>


        <!-- end Recommendaton sec -->
    
    
    
        <!-- start contact us sec -->

        







        






        <!-- end contact us sec -->


        <!-- start footer sec -->

    <footer class="text-center">
        <div class="copy-rights">&copy; 2017 Foodzella</div>
        <div class="social">
            <a href="#" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
            <a href="#" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
            <a href="#" target="_blank"><i class="fa fa-instagram fa-lg"></i></a>
        </div>
    </footer>

        <!-- end footer sec -->

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- js files -->
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/home.js"></script>
   
</body>

</html>