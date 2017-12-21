<?php
session_start();
// page title
    $pageTitle = 'Items Information';
    
    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/Data/data.css">';

    // include "validate.php "; 
    // $Login = 'LOG IN';
   
    
    include '../connect.php';

    $state1=$con->prepare("SELECT * FROM item WHERE Rest_ID = ? ");
    $state1->execute(array($_SESSION['RID']));
    $ITEM=$state1->FetchAll();
    $c=$state1->rowCount();

   

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['add'])) {

            $InameAdd  = filter_var($_POST['ItemN'], FILTER_SANITIZE_STRING);
            $PriceAdd  = filter_var($_POST['ItemP'], FILTER_SANITIZE_NUMBER_INT);
                

            $statt= $con-> prepare("INSERT INTO item (Name, Price,Rest_ID) VALUES(:name, :Iprice, :Irestid)");
            $statt->execute(array(
                'name' => $InameAdd,
                'Iprice' => $PriceAdd,
                'Irestid' => $_SESSION['RID'],
                
                ));

               
                if(!$statt){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>';
                        echo '<strong>' . 'Failed to Add item ' . '</strong>';
                        echo '</div>';
            
                }

                
        }
       
        if(isset($_POST['signup'])) {
        

        $IN='Iname';
        $IP='Price';
        for($i=0 ; $i< $c;$i++){
            // $j= $IN . $i;
            // $k = $IP . $i;   
        $Iname  = filter_var($_POST[$IN .$i], FILTER_SANITIZE_STRING);
        $Price  = filter_var($_POST[$IP . $i], FILTER_SANITIZE_NUMBER_INT);
    
       
        $state = $con->prepare("UPDATE item SET `Name`=? ,Price=? ,Rest_ID=? WHERE Item_ID=?");
        $state->execute(array(
             $Iname,
            $Price,
            $_SESSION['RID'],
            $ITEM[$i][0],
            ));
        }

        if(!$state){
            $Errors[] = 'Failed to update items ';   
        }

        else
        
            {  
              
                echo '<div class="success text-success">
                <i class="fa fa-check fa-2x"></i>
                 ';  echo '<strong>' . 'Your profile updated successfully' . '</strong>';
                echo '</div>';  
               
                header("refresh:2; url=http://localhost/dashboard/FOODZELLA/Home/index.php");                
                // exit();
            }   
        



    if (isset($Errors)) {
        echo '<div class="error">';
        foreach ($Errors as $Error) {  
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>';
                echo '<strong>' . $Error . '</strong>';
                echo '</div>';
        }
        echo '</div>';
    }

} 


// else{
// $Errors[] = 'Sorry You Are An Admin';
// }  
// }

include '../init.php';
?>
    <!-- restaurant's information -->
<div class="form ">
    <div class="overlay">
        <div class="strip">
            <form class="container" id="dropForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
                <div class="">
            <?php 

$state1=$con->prepare("SELECT * FROM item WHERE Rest_ID = ? ");
$state1->execute(array($_SESSION['RID']));
$ITEM=$state1->FetchAll();
$c=$state1->rowCount();


          $IN='Iname';
          $IP='Price';
            for($i=0 ; $i<$c ;$i++){


                $Mixed = $ITEM[$i];
                $Text = json_encode($Mixed);
                $RequestText = urlencode($Text);
                
                // $_SESSION['deleteItem']=$ITEM[$i];
               $j= $IN . $i;
               $k = $IP . $i;
                echo '
               
                    <div class=" form-group form-group-inline">
                        <label for="Name">Item Name </label>
                        <input type="text" class="form-control' . $ITEM[$i][1] . ' "  maxlength="50" id="name " placeholder="Item Name" name=' . $j ; 
                        if($ITEM){
                            echo '
                        value=' . $ITEM[$i][1];
                        }
                        echo
                        ' required>
                   
                        <label for="Price">Item Price</label>
                        <input type="num" class="form-control' . $ITEM[$i][1] . ' "  maxlength="3" id="price" placeholder="Item Price" name=' . $k ;
                        if($ITEM){
                            echo'
                        value=' . $ITEM[$i][2];
                        }
                        echo 
                        ' required>

                        <button class=" ' . $ITEM[$i][1] . ' btn btn-outline-success" ><a href="delete.php?cluster='.$ITEM[$i][0].'"> Delete </a></button>
                    </div>';
                    // $j++;
                }
            ?>
                     <div class="form-group-inline" > 
                        <label for="Name">Item Name </label>
                        <input type="text" class="form-control "  maxlength="50" id="name " placeholder="Item Name" name="ItemN" >
                   
                        <label for="Price">Item Price</label>
                        <input type="num" class="form-control "  maxlength="3" id="price" placeholder="Item Price" name="ItemP" >

                    </div>

                    <button type="submit" class="btn btn-outline-success ADD" name="add">Add</button>
      
                    <div id="button">
                        <button type="submit" class="btn btn-outline-warning btn-sm submitbutton" name="signup">finish</button>
                    </div>

                </div>
            </form>    
        </div>
    </div>
</div>
                        <!-- end restaurant's information -->
                            
    
                  









<?php 
$js_files = '<script src="../js/data.js"></script>';

include '../' . $tmpl . 'footer.php';

?>   