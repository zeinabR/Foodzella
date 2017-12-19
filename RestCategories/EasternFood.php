<?php
session_start();
    // page title
    $pageTitle = 'Eastern Food';

    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/RestCateg/EasternFood.css">';

    include '../init.php';
    include '../connect.php';



    $stmt = $con->prepare("SELECT * FROM restaurant WHERE Category = ? ");
    $stmt ->execute(array('Eastern Food'));
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
            <a href="../Restaurants/EasternFood.php?cluster=' . $RequestText . ' " class="list-group-item " >
                <h4 class="list-group-item-heading " >' . $Rnames[$i][1] . '</h4>
                <p class="list-group-item-text">' . $Rnames[$i][5] . '</p>
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
