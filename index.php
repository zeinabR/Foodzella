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

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark " style="background-color: #080c29;">
        <div class="container">
            <a class="navbar navbar-brand" href="#"><span class="header">F</span>oodzella</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarToggleExternalContent" >

                <ul class="navbar-nav ml-auto " >
                    <li class="nav-item ">
                        <a class="nav-link" data-scroll="home" href="index.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll="about"  href="about/about.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-scroll="contact" href="index/index.php">CONTACT US</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            OPTIONS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" >
                            <a class="dropdown-item" href="#">MESSAGES</a>
                            <a class="dropdown-item" href="#">LOG OUT</a>
                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                        </div>
                    </li>

                    <!-- login form -->

                    <?php
                        include 'connect.php';

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            
                                    $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
                                    $pass = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
                                    
                                    $errors;
                                    if (empty($email)) {
                                        $errors[] = 'Email Not Found';
                                    }
                                    if (empty($pass)) {
                                        $errors[] = 'Password Not Found';
                                    }
                                
                            

                        if (empty($errors)) {
                            
                            $stmt = $con->prepare("SELECT Name FROM administrator WHERE Email = ? AND Password = ? LIMIT 1");
                            $stmt->execute(array($email,$pass));
                            $row1 = $stmt->fetch();
                            $count1 = $stmt->rowCount();
                        
                                if ($count1 == 0) {

                                    $stmt = $con->prepare("SELECT Name FROM customer WHERE Email = ? LIMIT 1");
                                    $stmt->execute(array($email));
                                    $row2 = $stmt->fetch();
                                    $count2 = $stmt->rowCount();
                                    
                                    if($count2 == 0)
                                    {
                                        $stmt = $con->prepare("SELECT Name FROM manager WHERE Email = ? LIMIT 1");
                                        $stmt->execute(array($email));
                                        $row3 = $stmt->fetch();
                                        $count3 = $stmt->rowCount();

                                        if($count3 == 0)
                                             $errors[] = 'Email Or Password Is Incorrect';
                                        
                                        else {
                                                echo '<div class="success text-success">
                                                        <i class="fa fa-check fa-2x"></i>
                                                        Welcome ';  echo '<strong>' . $row3[0] . '</strong>';
                                                        echo '</div>';  
                                        }     
                                       
                                    }

                                    else{
                                        echo '<div class="success text-success">
                                        <i class="fa fa-check fa-2x"></i>
                                        Welcome ';  echo '<strong>' . $row2[0] . '</strong>';
                                        echo '</div>';  
                                     
                                    }
                                
                                }

                                else {
                                    echo '<div class="success text-success">
                                    <i class="fa fa-check fa-2x"></i>
                                    Welcome ';  echo '<strong>' . $row1[0] . '</strong>';
                                    echo '</div>';  
                                 
                                }
                        
                                   
                                
                               
                            }
                        }    
                    
                    
                        if (!empty($errors)) {
                            echo '<div class="error">';
                            foreach ($errors as $error) {  
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>';
                                    echo '<strong>' . $error . '</strong>';
                                    echo '</div>';
                            }
                            echo '</div>';
                        }
                    ?>

                    <li class="nav-item ">
                        <a class="nav-link " data-scroll="Login" href="#" id="navbarDropdownForm" data-toggle="dropdown">LOG IN</a>
                        <div class="dropdown-menu" id="dropForm" aria-labelledby="navbarDropdownForm" >
                            <form class="px-4 py-3" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
                                <div class=" form-group">
                                    <label for="DropdownFormEmail1">Email address</label>
                                    <input type="email" class="form-control"  maxlength="254" id="DropdownForm1" placeholder="email@example.com" name="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="DropdownFormPassword1">Password</label>
                                    <input type="password" class="form-control" minlength="8"  id="DropdownForm1" placeholder="Password" name="Password" required>
                                </div>
                                <!-- <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    Remember me
                                    </label>
                                </div> -->
                                <div class="blockquote-footer">
                                    You should complete all fields
                                </div>
                                <div id="DropdownForm">
                                    <button type="submit" class="btn btn-outline-danger btn-sm btn-block" >Sign in</button>
                                </div>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="SignUp/signup.php">New around here? Sign up</a>
           
                        </div>

                    </li>

                    <!-- end login form -->

                    <!-- <li class="nav-item">
                        <a class="nav-link " data-scroll="Signup" href="SignUp/signup.php">SIGN UP</a>
                    </li> -->
                   
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
    
    <script>
    $(".form form input").on("blur", function() {
        if ($(this).is(":invalid")) {
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }
    });
    </script>
   
</body>

</html>