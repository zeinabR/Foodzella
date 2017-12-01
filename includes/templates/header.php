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
    <link rel="stylesheet" href="../css/sidebar.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/sidebar.css">
    <?php get_css(); ?>
</head>


<div class="ui sidebar inverted vertical menu left uncover bg-dark" style=" color: #fff;">

        <h2 class="brand"><span>F</span>oodzella</h2>

        <div id="accordion" role="tablist"> 

 
            <div class="card bg-dark">
                <div class="card-header" role="tab" id="headingThree" >
                    <h5 class="mb-0">
                        <span>
                                    <a href="../index.php" style="color: inherit; text-decoration: none;">HOME</a>
                                        </span>
                        <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                    </h5>
                </div>
             
            </div>

            <div class="card bg-dark">
                <div class="card-header collapsed" role="tab" id="headingTwo" >
                    <h5 class="mb-0">
                        <span>
                          <a href="../About/about.php" style="color: inherit; text-decoration: none;">ABOUT</a>
                        </span>
                        <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                    </h5>
                </div>
               
            </div>

            <div class="card bg-dark">
                <div class="card-header collapsed" role="tab" id="headingThree">
                    <h5 class="mb-0">
                        <span>
                            <a href="../#" style="color: inherit; text-decoration: none;">CONTACT US</a>
                        </span>
                    </h5>
                </div>
            </div>

           
           
        </div>
    </div>
    
    <div class="pusher dimmed">  

        <!-- Site content !-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <button class="btn btn-dark open-side"><i class="fa fa-bars" aria-hidden="true"></i></button>
                <a class="navbar-brand" href="#"><span>F</span>oodzella</a>
            </div>
        </nav>