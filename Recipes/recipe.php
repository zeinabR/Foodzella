<?php

    // page title
    $pageTitle = 'Recipe';

    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/Recipes/recipe.css">';

    include '../init.php';
?>


       <!-- type your code here -->
       
       <div class="container">
           <p class="header" style="margin: auto">RECIPE NAME</p>
           <img src="images/syrian.jpg" class="recipe-image">
           <p class="subheader" style="margin: auto">Ingredients :</p>
           <p class="subheader" style="margin: auto">Preparation :</p>
<!--
           input(type="radio" name="heart" checked)
            input(type="radio" name="heart")           
-->  
                   <button type="button" class="btn btn-default" aria-label="Left Align">
                  <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
                </button>

                <button type="button" class="btn btn-default btn-lg">
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                </button>
         </div>





<?php 
    // $js_files = '<script src="../js/about/about.js"></script>';

    include '../' . $tmpl . 'footer.php';

?>       

  
