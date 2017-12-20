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
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // $state1 = $con->prepare("INSERT INTO manager(Name, Password, Phone_Num, Email ,City, Street) VALUES(:Sname, :Spass, :Stel, :Semail, :Scity, :Sstreet)");
        // $state1->execute(array(
        //     'Sname' =>  $_SESSION['Mname'],
        //     'Spass' =>  $_SESSION['Mpass'],
        //     'Stel' =>  $_SESSION['Mphone'],
        //     'Semail' =>  $_SESSION['Memail'],
        //     'Scity' =>  $_SESSION['Mcity'],
        //     'Sstreet' =>  $_SESSION['Mstreet'],
        //     ));

        // if(!$state1){
        //     $Errors[] = 'Failed to Register ';   
        // }

        // else{

        //     $state1=$con->prepare("SELECT * FROM manager WHERE Email = ? LIMIT 1");
        //     $state1->execute(array($_SESSION['Memail']));
        //     $ID=$state1->FetchAll();
            
        //     // $s = $con->prepare("SELECT Contact_No FROM restaurant");
        //     // $conta[] = $s->fetch();

        //     if ($state1 ) {  
        //         $state = $con->prepare("INSERT INTO restaurant (Name, Contact_No, Category, No_of_Items ,RCity, RStreet,WorkHr,Services,No_available_Tables,Mgr_ID) VALUES(:Rname, :Rtel, :RCategory, :Ritems,:Rcity, :Rstreet,:workHr,:servies,:notables,:Mgrid)");
        //         $state->execute(array(
        //             'Rname' => $_SESSION['Rname'],
        //             'Mgrid' => $ID[0][0],
        //             'RCategory' => $_SESSION['Rcateg'],
        //             'Rtel' => $_SESSION['Rphone'],
        //             'Ritems' => $_SESSION['RitemNo'],
        //             'Rcity' => $_SESSION['Rcity'],
        //             'Rstreet' =>$_SESSION['Rstreet'],
        //             'servies' =>$_SESSION['Rservice'],
        //             'workHr' =>$_SESSION['Rhours'],
        //             'notables' =>$_SESSION['Rtables'],
        //             ));
        
        //     }
        //     else {
        //         $Errors[] = 'Failed to Register Your Restaurant';
        //     }

        
        //     if ($state) {  

        //         $state1=$con->prepare("SELECT Rest_ID FROM restaurant WHERE Mgr_ID = ? LIMIT 1");
        //         $state1->execute(array($ID[0]));
        //         $RID=$state1->Fetch();

        //             // echo '<div class="success text-success">
        //             // <i class="fa fa-check fa-2x"></i>
        //             // Welcome ';  echo '<strong>' . $_SESSION['Name'] . '</strong>';
        //             // echo '</div>'; 
        //         // if($state1){ 
                   
        //         //     $_SESSION['NoItems'] = $ItemsNo;
        //             $_SESSION['RID'] = $RID[0];
        //         //     header("Location: ItemForm.php");
        //         //     }

        //         }
                
                
        //         if (isset($Errors)) {
        //             echo '<div class="error">';
        //             foreach ($Errors as $Error) {  
        //                 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                     <span aria-hidden="true">&times;</span>
        //                 </button>';
        //                     echo '<strong>' . $Error . '</strong>';
        //                     echo '</div>';
        //             }
        //             echo '</div>';
        //         }

        //     }





        $IN='Iname';
        $IP='Price';
        for($i=0 ; $i< $_SESSION['RitemNo'] ;$i++){
            // $j= $IN . $i;
            // $k = $IP . $i;   
        $Iname  = filter_var($_POST[$IN .$i], FILTER_SANITIZE_STRING);
        $Price  = filter_var($_POST[$IP . $i], FILTER_SANITIZE_NUMBER_INT);
    
  

        $statt = $con->prepare("UPDATE item SET Name=? ,Price=? ,Rest_ID=? where Item_ID=?");
        $statt->execute(array(
             $Iname,
            $Price,
            $_SESSION['RID'],
            $ITEM[$i][0],
            ));
        }

        if(!$statt){
            $Errors[] = 'Failed to update items ';   
        }

        else
        
            {  
              
                echo '<div class="success text-success">
                <i class="fa fa-check fa-2x"></i>
                 ';  echo '<strong>' . 'Your profile updated successfully' . '</strong>';
                echo '</div>';  
                // $_SESSION['LOGIN'] = $_SESSION['Mname'];
                // $_SESSION['Cust'] = $ID[0];
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
          $IN='Iname';
          $IP='Price';
            for($i=0 ; $i<$_SESSION['RitemNo'] ;$i++){


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
                          
                    <div id="button">
                        <button type="submit" class="btn btn-outline-warning btn-sm submitbutton" name="signup">Next</button>
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