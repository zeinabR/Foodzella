<?php
session_start();

    // page title
    $pageTitle = 'Fast Food';

    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/RecipCategories/FastFood.css">';

    include '../init.php';
    include '../connect.php';



    $stmt = $con->prepare("SELECT * FROM recipe WHERE Category = ? ");
    $stmt ->execute(array('Fast Food'));
     $Rnames = $stmt->fetchAll();
     $c1 = $stmt->rowCount();


echo'

<div class="restcateg">
    <div class="overlay">
        <div class="list-group" >';
            
            if($c1 > 0){
               
                for($i=0 ; $i<$c1 ; $i++)
            {
                $Mixed = $Rnames[$i];
                $Text = json_encode($Mixed);
                $RequestText = urlencode($Text);

                echo'
            <a href="../Restaurants/FastFood.php?cluster=' . $RequestText . ' " class="list-group-item " >
                <h4 class="list-group-item-heading " >' . $Rnames[$i][0] . '</h4>
            </a>';
            }
           
        echo'
            </div>
    </div>
</div>';}
?>




<?php 
    // $js_files = '<script src="../js/restaurants/restaurants.js"></script>';

    include '../' . $tmpl . 'footer.php';

?>       
