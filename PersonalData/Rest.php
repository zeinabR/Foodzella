<?php
session_start();
// page title
    $pageTitle = 'SignUp';
    
    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/signup/signup.css">';

    // include "validate.php "; 
    // $Login = 'LOG IN';
   
    
    include '../connect.php';

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
    
    $_SESSION['Rname']=$Rname;
    $_SESSION['Rphone']=$Rphone;
    $_SESSION['Rcateg']=$Category;
    $_SESSION['RitemNo']=$ItemsNo;
    $_SESSION['Rcity']=$Rcity;
    $_SESSION['Rstreet']=$Rstreet;
    $_SESSION['Rhours']=$Hours;
    $_SESSION['Rservice']=$Services;
    $_SESSION['Rtables']=$tables;

    // $s = $con->prepare("SELECT Name FROM manager WHERE email = ? LIMIT 1");
    // $s->execute(array($Email));
    // $rowName1 = $s->fetch();
    // $c1 = $s->rowCount();

    // check unique phone no

    $s = $con->prepare("SELECT Contact_No FROM restaurany");
    $p = $s->fetchAll();
    

    if (!in_array($Rphone,$p)) {
    
        header("Location: ItemForm.php");
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

        //     }   
        }

    else{
        $Errors[] = 'Restaurant Already Exists';
    }
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
                                    <input type="text" class="form-control"  maxlength="50" id="name" placeholder="Restaurant's Name" name="Rname" required >
                                </div>
    
                                <div class=" form-group ">
                                    <label for="Phone number">Contact number</label>
                                    <input type="num" class="form-control"  minlength="8" maxlength="11" id="phone" placeholder="Restaurant's phone number" name="contactNo" required >
                                </div>
    
                                <div class=" form-group ">
                                    <label for="Ctegory">Category</label>
                                    <select class="custom-select"  name="Category" required >
                                        <option selected>Choose Restaurant's Cateory</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Fast Food">Fast Food</option>
                                        <option value="Eastern Food">Eastern Food</option>
                                        <option value="Healthy food">Healthy food</option>
                                        <option value="Pizza">Pizza</option>
                                        <option value="Syrian Food">Syrian Food</option>
                                </select>                
                                </div>
    
                                <div class="form-group ">
                                    <label for="items">No. of Items</label>
                                    <input type="number" class="form-control" minlength="8"  id="items" placeholder="Items' No." name="ItemsNo" required >
                                </div>
    
                                <div class="form-group ">
                                    <label for="City">Restaurant's City</label>
                                    <input type="text" class="form-control" minlength="3"  id="city" placeholder="City" name="Rcity" required>
                                </div>
    
                                <div class="form-group">
                                    <label for="street">Restaurant's Street</label>
                                    <input type="text" class="form-control" minlength="3"  id="street" placeholder="Street" name="Rstreet" required>
                                </div>
    
                                <div class="form-group ">
                                    <label for="hours">Work Hours</label>
                                    <input type="number" class="form-control" id="hours" placeholder="Hours" name="Hours" value="12" required>
                                </div>
    
                                <div class=" form-group ">
                                    <label for="services">Services</label>
                                    <select class="custom-select"  name="Services" required>
                                    <option selected>Choose Service</option>
                                    <option value="Table ">Table Reservation</option>
                                    <option value="Delivery">Delivery</option>
                                    <option value="Both">Both</option>
                                    </select>   
                                </div>
    
    
                                <div class="form-group ">
                                    <label for="tables">No. of Tables</label>
                                    <input type="number" class="form-control" minlength="4" id="table" placeholder="Tables" name="tables" required>
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