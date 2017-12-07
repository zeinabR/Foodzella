<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php getTitle(); ?></title>

    <!-- css files -->
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/header/header.css">
    <?php get_css(); ?>
</head>


<nav class="navbar fixed-top navbar-expand-lg navbar-dark " style="background-color: #080c29;">
    <div class="container">
        <a class="navbar navbar-brand" href="#"><span class="header">F</span>oodzella</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse " id="navbarToggleExternalContent" >

            <ul class="navbar-nav ml-auto " >
                <li class="nav-item ">
                    <a class="nav-link" data-scroll="home" href="../index.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-scroll="about"  href="../about/about.php">ABOUT</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link " data-scroll="contact" href="#">CONTACT US</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        OPTIONS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #ecea94;">
                        <a class="dropdown-item" href="#">MESSAGES</a>
                        <a class="dropdown-item" href="#">LOG OUT</a>
                        <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link " data-scroll="Login" href="#">LOG IN</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " data-scroll="Signup" href="../SignUp/signup.php">SIGN UP</a>
                </li>
            
            </ul>
        </div>
    </div>
</nav>
