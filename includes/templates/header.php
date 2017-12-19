<?php
//    session_start();
// $_SESSION['LOGIN'] = $Login
?>

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
                <a class="nav-link" data-scroll="home" href="../Home/index.php">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll="about"  href="../about/about.php">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-scroll="contact" href="../Home/index.php">CONTACT US</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    OPTIONS
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" >
                    <a class="dropdown-item" href="#">MESSAGES</a>
                    <a class="dropdown-item" href="../LogOut/LogOut.php">LOG OUT</a>
                    <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
            </li>

            <li class="nav-item ">
            <a class="nav-link " data-scroll="Login"
            
            <?php 
            if($_SESSION['LOGIN']=='LOG IN')
            echo'
             href="../Login/login.php" >';
             else
             echo'
             href="../PersonalData/Data.php" >';
           
            //  echo 'LOG IN' . '</a>';
            // else
         
             echo $_SESSION['LOGIN'] ?> </a> 
            
            <!-- <div class="dropdown-menu form" id="dropForm" aria-labelledby="navbarDropdownForm" >
                <form class="px-4 py-3" method="POST" action=" ">
                    <div class=" form-group">
                        <label for="DropdownFormEmail1">Email address</label>
                        <input type="email" class="form-control"  maxlength="70" id="EmailDropdownForm1" placeholder="email@example.com" name="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="DropdownFormPassword1">Password</label>
                        <input type="password" class="form-control" minlength="8"  id="PassDropdownForm1" placeholder="Password" name="Password" required>
                    </div>
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Remember me
                        </label>
                    </div> 
                    <div class="blockquote-footer">
                        You should complete all fields
                    </div>
                    <div id="DropdownForm">
                        <button type="submit" class="btn btn-outline-danger btn-sm btn-block submitbutton" nane="login" >Sign in</button>
                    </div>
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="SignUp/signup.php">New around here? Sign up</a>

            </div> -->

        </li>

            

            <!-- end login form -->

            <!-- <li class="nav-item">
                <a class="nav-link " data-scroll="Signup" href="SignUp/signup.php">SIGN UP</a>
            </li> -->
           
        </ul>
    </div>
</div>
</nav>


<script>
// $(function() {
//     $(".form form input").on("blur", function() {
//         if ($(this).is(":invalid")) {
//             $(this).removeClass("is-valid");
//             $(this).addClass("is-invalid");
//         } else {
//             $(this).removeClass("is-invalid");
//             $(this).addClass("is-valid");
//         }
//     });

// }) 
    // var buttonpressed;
    // $(".submitbutton").on("click",function(){
    //     buttonpressed = $(this).attr('name');

    // });

    // $('form').submit(function() {
    //       alert('button clicked was ' + buttonpressed)
    //         buttonpressed=''
    //     return(false)
    // });

     </script>
    
