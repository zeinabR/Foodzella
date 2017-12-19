

    <!-- Sign up form -->

    <?php

// session_start();
// page title
    $pageTitle = 'Information';
    
    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/signup/signup.css">';

    include "valid.php "; 
    // $Login = 'LOG IN';
    include '../init.php';
    
    // include '../connect.php';
    $Cust=$_SESSION['Cust'];

$stmt=$con->prepare("SELECT * FROM `administrator` WHERE ID=? LIMIT 1");
$stmt->execute(array($Cust[0]));
$r=$stmt->fetchAll();

if($stmt){
    $_POST['Name'] = $Cust[0];

}


            
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
    //     $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
    //     $Phone = filter_var($_POST['Phone'], FILTER_SANITIZE_NUMBER_INT);
    //     $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    //     $Pass = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
    //     $City = filter_var($_POST['City'], FILTER_SANITIZE_STRING);
    //     $Street = filter_var($_POST['Street'], FILTER_SANITIZE_STRING);
    //     $Manager = filter_var($_POST['Manager'], FILTER_SANITIZE_STRING);       
          
    //     // restaurant's info

    //     $Rname = filter_var($_POST['Rname'], FILTER_SANITIZE_STRING);
    //     $Rphone = filter_var($_POST['contactNo'], FILTER_SANITIZE_NUMBER_INT);
    //     $Category = filter_var($_POST['Category'], FILTER_SANITIZE_STRING);
    //     $ItemsNo = filter_var($_POST['ItemsNo'], FILTER_SANITIZE_NUMBER_INT);
    //     $Rcity = filter_var($_POST['Rcity'], FILTER_SANITIZE_STRING);
    //     $Rstreet = filter_var($_POST['Rstreet'], FILTER_SANITIZE_STRING);
    //     $Hours = filter_var($_POST['Hours'], FILTER_SANITIZE_NUMBER_INT);
    //     $Services = filter_var($_POST['Services'], FILTER_SANITIZE_STRING);
    //     $tables = filter_var($_POST['tables'], FILTER_SANITIZE_NUMBER_INT);
    //     $ItemsNo = filter_var($_POST['ItemsNo'], FILTER_SANITIZE_NUMBER_INT);
    //     $Rcity = filter_var($_POST['Rcity'], FILTER_SANITIZE_STRING);
    //     $Rstreet = filter_var($_POST['Rstreet'], FILTER_SANITIZE_STRING);
        
    //     $Errors;
    //     if (empty($Name)) {
    //         $Errors[] = 'Name Not Found';
    //     }
    //     if (empty($Phone)) {
    //         $Errors[] = 'Phone Not Found';
    //     }
    //     if (empty($Pass)) {
    //         $Errors[] = 'Password Not Found';
    //     }
    //     if (empty($City)) {
    //         $Errors[] = 'City Not Found';
    //     }
    //     if (empty($Street)) {
    //         $Errors[] = 'Street Not Found';
    //     }

    //     if (empty($Email)) {
    //         $Errors[] = 'Email Not Found';
    //     }
        

    // if (empty($Errors)) {
    
    //     // check not an admin
    //     $admin = $con->prepare("SELECT Name FROM administrator WHERE email = ? LIMIT 1");
    //     $admin->execute(array($Email));
    //     $Aname = $admin->fetch();
    //     $c2 = $admin->rowCount();
    //     if($c2 == 0){

    //         if($Manager == 'no'){

    //             // check unique email
    //             $stmt = $con->prepare("SELECT Name FROM customer WHERE email = ? LIMIT 1");
    //             $stmt->execute(array($Email));
    //             $rowName = $stmt->fetch();
    //             $c = $stmt->rowCount();

    //             // check unique phone no
    //             $stmt = $con->prepare("SELECT PhoneNo FROM customer");
    //             $phon[] = $stmt->fetch();

    //             if ($c == 0 && !in_array($Phone,$phon)) {
                
    //                     $state = $con->prepare("INSERT INTO customer(Name, Password, PhoneNo, Email ,City, Street) VALUES(:Sname, :Spass, :Stel, :Semail, :Scity, :Sstreet)");
    //                     $state->execute(array(
    //                         'Sname' => $Name,
    //                         'Spass' => $Pass,
    //                         'Stel' => $Phone,
    //                         'Semail' => $Email,
    //                         'Scity' => $City,
    //                         'Sstreet' => $Street,
    //                         ));
                    
    //                     if ($state) {  
    //                             echo '<div class="success text-success">
    //                             <i class="fa fa-check fa-2x"></i>
    //                             Welcome ';  echo '<strong>' . $Name . '</strong>';
    //                             echo '</div>';  
    //                             $Login = $Name;
    //                             header("Location:https://www.formget.com/app/");
    //                             // header("refresh:1; url=../index.php");
    //                         }
                            
    //                     else{
    //                         $Errors[] = 'Failed to Register ';
    //                     } 
    //                 }
                    
                
    //             else {
    //                 $Errors[] = 'You Are Registered Once';
    //             }
    //         }


    //         else  {

    //             $s = $con->prepare("SELECT Name FROM manager WHERE email = ? LIMIT 1");
    //             $s->execute(array($Email));
    //             $rowName1 = $s->fetch();
    //             $c1 = $s->rowCount();
            
    //             // check unique phone no

    //             $s = $con->prepare("SELECT Phone_Num FROM manager");
    //             $p[] = $s->fetch();
                

    //             if ($c1 == 0 && !in_array($Phone,$p)) {
                
    //                 $state1 = $con->prepare("INSERT INTO manager(Name, Password, Phone_Num, Email ,City, Street) VALUES(:Sname, :Spass, :Stel, :Semail, :Scity, :Sstreet)");
    //                 $state1->execute(array(
    //                     'Sname' => $Name,
    //                     'Spass' => $Pass,
    //                     'Stel' => $Phone,
    //                     'Semail' => $Email,
    //                     'Scity' => $City,
    //                     'Sstreet' => $Street,
    //                     ));

    //                 if(!$state1){
    //                     $Errors[] = 'Failed to Register ';   
    //                 }

    //                 else{

    //                     $state1=$con->prepare("SELECT Mgr_ID FROM manager WHERE Email = ? LIMIT 1");
    //                     $state1->execute(array($Email));
    //                     $ID=$state1->Fetch();
                        
    //                     $s = $con->prepare("SELECT Contact_No FROM restaurant");
    //                     $conta[] = $s->fetch();

    //                     if ($state1 && !in_array($Rphone,$conta)) {  
    //                         $state = $con->prepare("INSERT INTO restaurant (Name, Contact_No, Category, No_of_Items ,RCity, RStreet,WorkHr,Services,No_available_Tables,Mgr_ID) VALUES(:Rname, :Rtel, :RCategory, :Ritems,:Rcity, :Rstreet,:workHr,:servies,:notables,:Mgrid)");
    //                         $state->execute(array(
    //                             'Rname' => $Rname,
    //                             'Mgrid' => $ID[0],
    //                             'RCategory' => $Category,
    //                             'Rtel' => $Rphone,
    //                             'Ritems' => $ItemsNo,
    //                             'Rcity' => $Rcity,
    //                             'Rstreet' => $Rstreet,
    //                             'servies' =>$Services,
    //                             'workHr' =>$Hours,
    //                             'notables' =>$tables,
    //                             ));
                    
    //                     }
    //                     else {
    //                         $Errors[] = 'Failed to Register Your Restaurant';
    //                     }

                    
    //                     if ($state) {  
    //                             echo '<div class="success text-success">
    //                             <i class="fa fa-check fa-2x"></i>
    //                             Welcome ';  echo '<strong>' . $Name . '</strong>';
    //                             echo '</div>';  
    //                             $Login = $Name;
    //                         }
                            
    //                     }   
    //                 }

    //             else{
    //                 $Errors[] = 'You Are Registered Once';
    //             }
    //         }
    //     } 
    //     else{
    //         $Errors[] = 'Sorry You Are An Admin';
    //     }  
       
    // }
    
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
    // }
?>

<!-- /////////////////////////////////////////////////////////////////////////////////////// -->

<!-- <figure class="page-head-image">

<div style="text-align: center;">
        <img src="../images/eating.jpg" class="img-responsive" alt="eating" width="304" height="236" > 
</div>
</figure> -->
<div class="form ">
    <div class="overlay">
        <div class="strip">
            <form class="container" id="dropForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">

                <center><h1><b>Your Profile</b></h1></center><br>           

                        <div class=" form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" id="namellabel"  name="Name" required>
                        </div>

                        <div class=" form-group">
                            <label for="Phone number">Phone number</label>
                            <input type="num" class="form-control"  minlength="8" maxlength="11" id="phonelabel" placeholder="Your phone number" name="Phone" required>
                        </div>

                        <div class=" form-group">
                            <label for="Email">Email address</label>
                            <input type="email" class="form-control"  maxlength="50" id="emaillabel" placeholder="email@example.com" name="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" minlength="8"  id="pass" placeholder="Password" name="Password" required>
                        </div>

                        <div class="form-group">
                            <label for="City">City</label>
                            <input type="text" class="form-control" minlength="3"  id="citylabel" placeholder="cairo" name="City" required>
                        </div>

                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" minlength="3"  id="streetlabel" placeholder="Faisal" name="Street" required>
                        </div>

                        <div class="custom-controls-stacked form-group">
                        <div for="radios">Do You Manage a Restaurant?</div><br>
                                <label class="custom-control custom-radio">
                                    <input id="radio1" name="Manager" type="radio" class="custom-control-input" value="yes" required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Yes</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radio2" name="Manager" type="radio" class="custom-control-input" value="no" required checked>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">No</span>
                                </label>
                        </div>
                        
                    <!-- restaurant's information

                        <div class="restaurantt">
                            <div class=" form-group restaurantt">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control"  maxlength="50" id="name" placeholder="Restaurant's Name" name="Rname" >
                            </div>

                            <div class=" form-group restaurantt">
                                <label for="Phone number">Contact number</label>
                                <input type="num" class="form-control"  minlength="8" maxlength="11" id="phone" placeholder="Restaurant's phone number" name="contactNo" >
                            </div>

                            <div class=" form-group restaurantt">
                                <label for="Ctegory">Category</label>
                                <select class="custom-select"  name="Category" >
                                    <option selected>Choose Restaurant's Cateory</option>
                                    <option value="1">Dessert</option>
                                    <option value="2">Fast Food</option>
                                    <option value="3">Eastern Food</option>
                                    <option value="4">Healthy food</option>
                                    <option value="5">Pizza</option>
                                    <option value="6">Syrian Food</option>
                            </select>                
                            </div>

                            <div class="form-group restaurantt">
                                <label for="items">No. of Items</label>
                                <input type="number" class="form-control" minlength="8"  id="items" placeholder="Items' No." name="ItemsNo" >
                            </div>

                            <div class="form-group restaurantt">
                                <label for="City">Restaurant's City</label>
                                <input type="text" class="form-control" minlength="3"  id="city" placeholder="City" name="Rcity" >
                            </div>

                            <div class="form-group restaurantt">
                                <label for="street">Restaurant's Street</label>
                                <input type="text" class="form-control" minlength="3"  id="street" placeholder="Street" name="Rstreet" >
                            </div>

                            <div class="form-group restaurantt">
                                <label for="hours">Work Hours</label>
                                <input type="number" class="form-control" id="hours" placeholder="Hours" name="Hours" value="12" >
                            </div>

                            <div class=" form-group restaurantt">
                                <label for="services">Services</label>
                                <select class="custom-select"  name="Services" >
                                <option selected>Choose Service</option>
                                <option value="Table">Table Reservation</option>
                                <option value="Delivery">Delivery</option>
                                <option value="Both">Both</option>
                                </select>   
                            </div>


                            <div class="form-group restaurantt">
                                <label for="tables">No. of Tables</label>
                                <input type="number" class="form-control" minlength="4" id="table" placeholder="Tables" name="tables" >
                            </div>

                            <div class="form-group restaurantt">
                                <label for="tables">No. of Items</label>
                                <input type="number" class="form-control" minlength="4" id="Items" placeholder="Items" name="Items" >
                            </div>

                             <div class="form-group restaurantt">
                                <label for="tables">Logo</label>
                                <label class="custom-file">
                                    <input type="file" id="file2" class="custom-file-input " name="Logo" required>
                                    <span class="custom-file-control"></span>
                                </label>
                            </div> 
                        </div> -->

                    <!-- end restaurant's information -->
                        

                        <div class="blockquote-footer form-group">
                            You should complete all fields
                        </div>

                        <div id="button">
                            <button type="submit" class="btn btn-outline-warning btn-sm submitbutton" name="signup">Next</button>
                        </div>

              

            </form>
        </div>
    </div>
</div>

<!-- end sign up form -->


       <!-- type your code here -->


<?php 
    $js_files = '<script src="../js/signup.js"></script>';
    
    include '../' . $tmpl . 'footer.php';

?>   

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                                                                            <!-- ???????????????     -->

  

