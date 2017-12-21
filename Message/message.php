<?php
  session_start();
    // page title
    $pageTitle = 'Messages';

    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/RestCateg/Dessert.css">';

    include '../init.php';
    include '../connect.php';

  
    $Cust=$_SESSION['Cust'];
    $stmt = $con->prepare("SELECT * FROM restaurant WHERE Mgr_ID = ? LIMIT 1");
    $stmt ->execute(array($Cust[0]));
     $R = $stmt->fetch();
     $c1 = $stmt->rowCount();
    
     $stmt = $con->prepare("SELECT * FROM `order` WHERE Rest_ID = ? ");
     $stmt ->execute(array($R[2]));
      $order = $stmt->fetchAll();
      $c1 = $stmt->rowCount();
     




echo'

<div class="restcateg">
    <div class="overlay">
        <div class="list-group" >';
            
            if($c1 > 0){
               
                for($i=0 ; $i<$c1 ; $i++)
            {
           
            $stmt = $con->prepare("SELECT * FROM message WHERE Order_ID = ? LIMIT 1");
            $stmt ->execute(array($order[$i][0]));
             $R = $stmt->fetch();   
              
            // <a href="../Restaurants/Dessert.php?cluster=' . $RequestText . ' " class="list-group-item " >
            echo'  
            <h4 class="list-group-item-heading " >' . $R[1] . '</h4>';
                // <p class="list-group-item-text">' . $R[1] . '</p>';
           
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
