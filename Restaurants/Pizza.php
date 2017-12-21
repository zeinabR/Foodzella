<?php

    // session_start();
    // page title
    // $stmt = $con->prepare("SELECT Name FROM restaurant WHERE Rest_ID = ? LIMIT 1");
    // $stmt->execute(1);
    // $row1 = $stmt->fetch();

    $Text = urldecode($_REQUEST['cluster']);
    $Mixed = json_decode($Text,true);

    // $Rarray = $_SESSION['Rest'];
    $pageTitle = $Mixed[1];

    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/Restaurants/Pizza.css"> <link rel="stylesheet" href="../css/Restaurants/menu.css"> ';

    include '../connect.php';
    
    include '../Order/valid.php';
    include '../init.php';

?>
   
       

    <header class="intro " id="Rest-section">
        <div class="overlay ">
            <div class="container" id="Intro">    
                
                <h1 class="Title"> <?php echo $Mixed[1] ; ?> </h1>
                <div class="content">
                    <p><i class="fa fa-2x fa-phone"> </i> Contact Number :  <?php echo $Mixed[3]; ?> </p>
                    <hr>
                    <p><i class="fa fa-2x fa-spinner fa-spin"></i>  Open :  <?php echo $Mixed[8]; ?>  hours</p>
                    <hr>
                    <p><i class="fa fa-2x fa-map-marker"> </i> Location :  <?php echo $Mixed[4] . ' , ' . $Mixed[5]; ?> </p>
                    <hr>
                    <p><i class="fa fa-2x fa-cutlery"></i>  Category :  <?php echo $Mixed[0]; ?> </p>
                    <hr>
                    <p><i class="fa fa-2x fa-star-o"></i>  Rates : 
                        
                         <?php 
                          $stmt = $con->prepare("SELECT Order_ID FROM `order` WHERE Rest_ID = ? ");
                          $stmt->execute(array($Mixed[2]));
                          $c = $stmt->fetchAll();
                          $count = $stmt->rowCount();
                          if($count <10)
                         echo 'GOOD'; 
                         else if($count >10 && $count<20){
                            echo 'VERY GOOD'; 
                         }
                         else if($count>20){
                            echo 'EXCELLANT';
                         }
                         
                         ?> </p>
                        <hr>
                    <p><i class="fa fa-2x fa-check-circle-o"></i>  Service :  
                    <?php 
                        if($Mixed[9] == 'Both'){
                            echo 'Table Reservation and Delivery </p>';
                            echo '<hr> 
                            <p><i class="fa fa-2x fa-registered"></i>  Num of Tables : ' . $Mixed[10] . ' tables </p>';     
                            
                        }
                            else{
                                echo $Mixed[9] . '</p>' ; 
                            }
                            $_SESSION['ID'] = $Mixed[2];
                            $_SESSION['Name'] = $Mixed[1];
                            
                    ?> 
                 </div>
                 
                 
                 <ul class="list-group">

                    <?php 

                    $stmt=$con->prepare('SELECT * FROM item WHERE Rest_ID= ? ');
                    $stmt->execute(array($_SESSION['ID']));
                    $item= $stmt->fetchAll();
                    $row = $stmt->rowCount();

                    if($row>0){
                        for($i=0 ; $i<$row ; $i++)
                        {
                           
                        echo '
                        <li class="list-group-item d-flex justify-content-between align-items-center">'
                          . $item[$i][1] . 
                           ' <span class="badge badge-primary badge-pill">' . $item[$i][2] . ' L.E</span>
                        </li>';                        
                        }
                    }

                    ?>
                    </ul>



                    <div class="button">
                        <h4>Make an Order</h4>
                        <button class="btn btn-outline-success order" > Order Now</button>
                        
                </div>
               
                <div class="clear"></div>            

            </div>
                
        </div>

    </div>


<?php
    // $js_files = '<script src="../js/restaurants/restaurants.js"></script>';

    include '../' . $tmpl . 'footer.php';

?>       