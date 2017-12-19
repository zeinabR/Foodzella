<?php
session_start();
    // page title
    $pageTitle = 'About';

    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/about/about.css">';

    include '../init.php';
?>


       <!-- type your code here -->
    <div class="container " id="about">
       <div class="about " id="vision">

            <div class=" row">
                <div class="col-md-5 content" id="vision">
                    <div id="first">
                        <h3 class="head text-center">VISION</h3>
                        <p class="text-center">
                            Make an easly communication among people and restaurants.                             
                            <br>Help people who love cooking, Make delicious food.
                        </p>
                    </div>
                </div>
                <div class="col-md-5 content" id="mission">
                    <div id="second">
                        <h3 class="head text-center">MISSION </h3>
                        <p class="text-center">Having variety of categories including restaurants and recipes that will be very useful for everyone.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="about">
            <div class=" row">
                <div class="col-md-11 content" id="desc">
                    <div id="first">
                        <h3 class="head ">DESCRIPTION</h3>
                        <p >
                        This website will be the link between people and restaurants. we offer many restaurants to find the suitable one for you then you can reserve a table or order a delivery from this restaurant. 
                        <br>Nevertheless, if you want to cook food in your home but you don’t know how to make it, our website can help you to have a good recipe according to your choice from our categories.
                        <br>And if you own a restaurant, you also have a place in our website where you can share your restaurant with others in easy way.
                        <br>Let people know if there are available tables in your restaurant and if it has a delivery service. Sign up to have an account and join us!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php 
    // $js_files = '<script src="../js/about/about.js"></script>';

    include '../' . $tmpl . 'footer.php';

?>       