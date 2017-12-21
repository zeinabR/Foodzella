<?php

// page title
session_start();
    $pageTitle = 'Foodzella';
    
    // // css files for this page
    // $css_files = '<link rel="stylesheet" href="../css/Data/data.css">';

   
   
    include '../connect.php';

            
    $stmt = $con->prepare("SELECT * FROM restaurant WHERE Category!= ?");
    $stmt ->execute(array('x'));
     $Rnames = $stmt->fetchAll();
     $c1 = $stmt->rowCount();

     $stmt = $con->prepare("SELECT * FROM customer WHERE Name!=?");
     $stmt ->execute(array('0'));
      $Cnames = $stmt->fetchAll();
      $c = $stmt->rowCount();

     if(isset($_POST['finish'])){
        echo '<div class="success text-success">
        <i class="fa fa-check fa-2x"></i>
         ';  echo '<strong>' . 'Your profile updated successfully' . '</strong>';
        echo '</div>';  

        header("refresh:2; url=http://localhost/dashboard/FOODZELLA/Home/index.php");                
        
     }

     for($i=0;$i<$c1;$i++)
     {     if(isset($_POST[$Rnames[$i][1]])) {

        $stmt=$con->prepare(" DELETE FROM restaurant WHERE Rest_ID=?");
        $stmt->execute(array($Rnames[$i][2]));


      
    }
}
     
 for($i=0;$i<$c;$i++)
{
 if(isset($_POST[$Cnames[$i][1]])){
    $stmt=$con->prepare(" DELETE FROM customer WHERE ID=?");
    $stmt->execute(array($Cnames[$i][0]));

}
}
    include '../init.php';
    ?>

     
     <div class="overlay">
     <form class="container" id="dropForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">

         <div class="list-group" style="margin-top:80px; " >
    <?php

        $stmt = $con->prepare("SELECT * FROM restaurant WHERE Category!= ?");
        $stmt ->execute(array('x'));
        $Rnames = $stmt->fetchAll();
        $c1 = $stmt->rowCount();

             if($c1 > 0){
                
                for($i=0;$i<$c1;$i++)
             {
                 
            //  <a href="../Restaurants/Dessert.php?cluster=' . $RequestText . ' " class="list-group-item " >
            echo'   
            <h4  style="padding:30px; " >' . $Rnames[$i][1] . '</h4>
            

            <button type="submit" name="'.$Rnames[$i][1].'" class="btn btn-outline-success " style="width:200px;"> Delete </button>';
            
             }
            }
    ?>
</div>

        <div class="list-group" style=" margin-top:80px; " >           
          <?php

        $stmt = $con->prepare("SELECT * FROM customer WHERE Name!=? ");
        $stmt ->execute(array('0'));
        $Cnames = $stmt->fetchAll();
        $c = $stmt->rowCount();

             if($c > 0){
                
                for($i=0;$i<$c;$i++)
             {
                 
            //  <a href="../Restaurants/Dessert.php?cluster=' . $RequestText . ' " class="list-group-item " >
            echo'   
            <h4  style="padding:30px" >' . $Cnames[$i][1] . '</h4>

            <button type="submit" name="'.$Cnames[$i][1].'" class="btn btn-outline-success " style="width:200px"> Delete </button>';
            
             }
            }
            ?>
        </div>

            <button type="submit" name="finish" class="btn btn-outline-info "  style="width:200px;margin:auto;margin-top:20px;margin-bottom:20px"> Finish </button>
         
             </div>
        </form>
     </div>
   

    <?php
      include '../' . $tmpl . 'footer.php';
      ?>

