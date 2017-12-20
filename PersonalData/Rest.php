<?php
session_start();
// page title
    $pageTitle = 'Restaurant Information';
    
    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/Data/data.css">';

    // include "validate.php "; 
    // $Login = 'LOG IN';
   
    
    include '../connect.php';

    $Cust=$_SESSION['Cust'];
    $stmt=$con->prepare("SELECT * FROM restaurant WHERE Mgr_ID=? LIMIT 1");
    $stmt->execute(array($Cust[0]));
    $R=$stmt->fetchAll();

    // $_SESSION['Rname']=$R[0][1];
    // $_SESSION['Rphone']=$R[0][3];
    // $_SESSION['Rcateg']=$R[0][0];
    $_SESSION['RitemNo']=$R[0][6];
    $_SESSION['MgrId']=$Cust[0];
    $_SESSION['RID']=$R[0][2];
    // $_SESSION['Rcity']=$Rcity;
    // $_SESSION['Rstreet']=$Rstreet;
    // $_SESSION['Rhours']=$Hours;
    // $_SESSION['Rservice']=$Services;
    // $_SESSION['Rtables']=$tables;


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Rname = filter_var($_POST['Rname'], FILTER_SANITIZE_STRING);
    $Rphone = filter_var($_POST['contactNo'], FILTER_SANITIZE_NUMBER_INT);
    $Category = filter_var($_POST['Category'], FILTER_SANITIZE_STRING);
    $ItemsNo = filter_var($_POST['ItemsNo'], FILTER_SANITIZE_NUMBER_INT);
    $Rcity = filter_var($_POST['Rcity'], FILTER_SANITIZE_STRING);
    $Rstreet = filter_var($_POST['Rstreet'], FILTER_SANITIZE_STRING);
    $Hours = filter_var($_POST['Hours'], FILTER_SANITIZE_NUMBER_INT);
    $Services = filter_var($_POST['Services'], FILTER_SANITIZE_STRING);
    $tables = filter_var($_POST['tables'], FILTER_SANITIZE_NUMBER_INT);
    // $ItemsNo = filter_var($_POST['ItemsNo'], FILTER_SANITIZE_NUMBER_INT);
    // $Rcity = filter_var($_POST['Rcity'], FILTER_SANITIZE_STRING);
    // $Rstreet = filter_var($_POST['Rstreet'], FILTER_SANITIZE_STRING);
    
    
    // $s = $con->prepare("SELECT Name FROM manager WHERE email = ? LIMIT 1");
    // $s->execute(array($Email));
    // $rowName1 = $s->fetch();
    // $c1 = $s->rowCount();

    // check unique phone no

    // $s = $con->prepare("SELECT Contact_No FROM restaurant");
    // $p = $s->fetchAll();
    

    // if (!in_array($Rphone,$p)) {
    
        $stmt = $con->prepare("UPDATE restaurant SET `Name`= ? , Contact_No=? , Category=? , RCity=? ,RStreet=? , Mgr_ID=? ,No_of_Items=? ,WorkHr=? ,Services=?, No_available_Tables=? WHERE Rest_ID=?");
        $stmt->execute(array(
            
            $Rname,
            $Rphone,
            $Category,
            $Rcity,
            $Rstreet,
            $Cust[0],
            $ItemsNo,
            $Hours,
            $Services,
            $tables,
            $R[2],
        ));

        if($stmt){

            // $stmt=$con->prepare("SELECT No_of_Items FROM restaurant WHERE Mgr_ID=? LIMIT 1");
            // $stmt->execute(array($Cust[0]));
            // $ITEMno=$stmt->fetch();
            $_SESSION['RitemNo']=$ItemsNo;
        
            header("Location:Item.php");
            
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>';
                echo '<strong>' . 'Falied to update your restaurant' . '</strong>';
                echo '</div>';
        }

        // header("Location: Item.php");
        // exit();
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

        //     $state1=$con->prepare("SELECT Mgr_ID FROM manager WHERE Email = ? LIMIT 1");
        //     $state1->execute(array($_SESSION['Email']));
        //     $ID=$state1->Fetch();
            
        //     $s = $con->prepare("SELECT Contact_No FROM restaurant");
        //     $conta[] = $s->fetch();

        //     if ($state1 ) {  
        //         $state = $con->prepare("INSERT INTO restaurant (Name, Contact_No, Category, No_of_Items ,RCity, RStreet,WorkHr,Services,No_available_Tables,Mgr_ID) VALUES(:Rname, :Rtel, :RCategory, :Ritems,:Rcity, :Rstreet,:workHr,:servies,:notables,:Mgrid)");
        //         $state->execute(array(
        //             'Rname' => $Rname,
        //             'Mgrid' => $ID[0],
        //             'RCategory' => $Category,
        //             'Rtel' => $Rphone,
        //             'Ritems' => $ItemsNo,
        //             'Rcity' => $Rcity,
        //             'Rstreet' => $Rstreet,
        //             'servies' =>$Services,
        //             'workHr' =>$Hours,
        //             'notables' =>$tables,
        //             ));
        
        //     }
        //     else {
        //         $Errors[] = 'Failed to Register Your Restaurant';
        //     }

        
        //     if ($state) {  

        //         $state1=$con->prepare("SELECT Rest_ID FROM restaurant WHERE Mgr_ID = ? LIMIT 1");
        //         $state1->execute(array($ID[0]));
        //         $ID=$state1->Fetch();

        //             // echo '<div class="success text-success">
        //             // <i class="fa fa-check fa-2x"></i>
        //             // Welcome ';  echo '<strong>' . $_SESSION['Name'] . '</strong>';
        //             // echo '</div>'; 
        //         if($state1){ 
                   
        //             $_SESSION['NoItems'] = $ItemsNo;
        //             $_SESSION['RID'] = $ID[0];
        //             header("Location: ItemForm.php");
        //             }

        //         }
                
                
                // if (isset($Errors)) {
                //     echo '<div class="error">';
                //     foreach ($Errors as $Error) {  
                //         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                //             <span aria-hidden="true">&times;</span>
                //         </button>';
                //             echo '<strong>' . $Error . '</strong>';
                //             echo '</div>';
                //     }
                //     echo '</div>';
                // }

        //     }   
        // }

    // else{
    //     $Errors[] = 'Restaurant Already Exists';
    // }
}

include '../init.php';
?>
    <!-- restaurant's information -->
<div class="form ">
    <div class="overlay">
        <div class="strip">
            <form class="container" id="dropForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">

                            <div class="restaurantt">
                                <div class=" form-group ">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control"  maxlength="50" id="name" placeholder="Restaurant's Name" name="Rname" 
                                    
                                    <?php
                                    echo 'value=' . $R[0]['Name'];
                                    ?>
                                    
                                    required >
                                </div>
    
                                <div class=" form-group ">
                                    <label for="Phone number">Contact number</label>
                                    <input type="num" class="form-control"  minlength="8" maxlength="11" id="phone" placeholder="Restaurant's phone number" name="contactNo" 
                                    
                                    <?php
                                    echo 'value=' . $R[0][3];
                                    ?>
                                    
                                    required >
                                </div>
    
                                <div class=" form-group ">
                                    <label for="Ctegory">Category</label>
                                    <select class="custom-select"  name="Category" required >
                                        <option selected>  
                                        <?php
                                        echo  $R[0][0];
                                        ?>
                                        </option>
                                        <?php
                                        if($R[0][0] != 'Dessert'){
                                            echo '                                     
                                            <option value="Dessert">Dessert</option> ' ;                                          
                                        }
                                        if($R[0][0] != 'Fast Food'){
                                            echo'
                                        <option value="Fast Food">Fast Food</option>';
                                        }
                                        if($R[0][0] != 'Eastern Food'){
                                            echo'
                                        <option value="Eastern Food">Eastern Food</option>';
                                        }
                                        if($R[0][0] != 'Healthy Food'){
                                            echo'
                                        <option value="Healthy food">Healthy food</option>';
                                        }
                                        if($R[0][0] != 'Pizza'){
                                            echo'
                                        <option value="Pizza">Pizza</option>';
                                        }
                                        if($R[0][0] != 'Syrian Food'){
                                            echo'
                                        <option value="Syrian Food">Syrian Food</option>';
                                        }
                                        ?>
                                </select>                
                                </div>
    
                                <div class="form-group ">
                                    <label for="items">No. of Items</label>
                                    <input type="number" class="form-control" minlength="8"  id="items" placeholder="Items' No." name="ItemsNo"
                                    
                                    <?php
                                    echo 'value=' . $R[0][6];
                                    ?>

                                    required >
                                </div>
    
                                <div class="form-group ">
                                    <label for="City">Restaurant's City</label>
                                    <input type="text" class="form-control" minlength="3"  id="city" placeholder="City" name="Rcity" 
                                    
                                    <?php
                                    echo 'value=' . $R[0][4];
                                    ?>
                                    
                                    required>
                                </div>
    
                                <div class="form-group">
                                    <label for="street">Restaurant's Street</label>
                                    <input type="text" class="form-control" minlength="3"  id="street" placeholder="Street" name="Rstreet" 
                                    
                                    <?php
                                    echo 'value=' . $R[0][5];
                                    ?>
                                    
                                    required>
                                </div>
    
                                <div class="form-group ">
                                    <label for="hours">Work Hours</label>
                                    <input type="number" class="form-control" id="hours" placeholder="Hours" name="Hours" 
                                    
                                    
                                    <?php
                                    echo 'value=' . $R[0][8];
                                    ?>
                                    
                                    required>
                                </div>
    
                                <div class=" form-group ">
                                    <label for="services">Services</label>
                                    <select class="custom-select"  name="Services" required>
                                    <option selected>

                                    <?php
                                    echo $R[0][9];
                                    ?>

                                    </option>

                                    <?php
                                    if($R[0][9] != 'Table'){
                                        echo'
                                    <option value="Table ">Table Reservation</option>';
                                    }
                                    if($R[0][9] != 'Delivery'){
                                        echo'
                                    <option value="Delivery">Delivery</option>';
                                    }
                                    if($R[0][9] != 'Both'){
                                        echo'
                                    <option value="Both">Both</option>';
                                    }
                                    ?>
                                    </select>   
                                </div>
    
    
                                <div class="form-group ">
                                    <label for="tables">No. of Tables</label>
                                    <input type="number" class="form-control" minlength="4" id="table" placeholder="Tables" name="tables"
                                    
                                    <?php
                                    echo 'value=' . $R[0][10];
                                    ?>
                                    
                                    required>
                                </div>
    
    
                                <div class="blockquote-footer form-group">
                                    You should complete all fields
                                </div>

                                <div id="button">
                                    <button type="submit" class="btn btn-outline-warning btn-sm submitbutton" name="signup">Next</button>
                                </div>

                                <!-- <div class="form-group restaurantt">
                                    <label for="tables">Logo</label>
                                    <label class="custom-file">
                                        <input type="file" id="file2" class="custom-file-input " name="Logo" required>
                                        <span class="custom-file-control"></span>
                                    </label>
                                </div> -->
                            </div>
                </form>    
            </div>
        </div>
    </div>
                        <!-- end restaurant's information -->
                            
    
                  









<?php 
// $js_files = '<script src="../js/signup.js"></script>';

include '../' . $tmpl . 'footer.php';

?>   