

    <!-- Sign up form -->

    <?php

session_start();
// page title
    $pageTitle = 'Information';
    
    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/Data/data.css">';

    // include "valid.php "; 
    // $Login = 'LOG IN';
    
    
    include '../connect.php';

    $Cust=$_SESSION['Cust'];
    $Gender=$_SESSION['Gender'];

   
if($Gender == 'manager'){
     $js_files = '<script src="../js/Gender.js"></script>';
}

    // $stmt=$con->prepare("SELECT * FROM $Gender WHERE ID=? LIMIT 1");
    // $stmt->execute(array($Cust[0]));
    // $r=$stmt->fetchAll();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
        $Phone = filter_var($_POST['Phone'], FILTER_SANITIZE_NUMBER_INT);
        $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
        $Pass = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
        $City = filter_var($_POST['City'], FILTER_SANITIZE_STRING);
        $Street = filter_var($_POST['Street'], FILTER_SANITIZE_STRING);

        $Errors;
        

    if (empty($Errors)) {
    
        // $Gender=$_SESSION['Gender'];
        // $Cust=$_SESSION['Cust'];
        $stmt = $con->prepare("UPDATE $Gender SET `Name`= ? , PhoneNo=? , Email=? , `Password`=? WHERE ID=?");
        $stmt->execute(array(
            
            $Name,
            $Phone,
            $Email,
            $Pass,
            $Cust[0],
        
        ));

        $stmt=$con->prepare("SELECT * FROM $Gender WHERE ID=? LIMIT 1");
        $stmt->execute(array($Cust[0]));
        $r=$stmt->fetchAll();

        $_SESSION['Cust']=$r[0];
        $Cust= $_SESSION['Cust'];
        $_SESSION['LOGIN'] =$Cust[1];

        if($stmt && ($Gender=='customer' || $Gender=='administrator')){

            echo '<div class="success text-success">
                <i class="fa fa-check fa-2x"></i>
                 ';  echo '<strong>' . 'Your Information Updated Successfully' . '</strong>';
                echo '</div>';
            header("refresh:2; url=http://localhost/dashboard/FOODZELLA/Home/index.php");

        }

        else if($stmt && $Gender=='manager' ){

            // echo '<div class="success text-success">
            // <i class="fa fa-check fa-2x"></i>
            //  ';  echo '<strong>' . 'Your Information Updated Successfully' . '</strong>';
            // echo '</div>';
            header("Location:Rest.php");

        }

        else{

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>';
                        echo '<strong>' . 'Failed To Update' . '</strong>';
                        echo '</div>';
        }
    }

}
include '../init.php';
            
   ?>


<div class="form ">
    <div class="overlay">
        <div class="strip">
            <form class="container" id="dropForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">

                <center><h1><b>Your Profile</b></h1></center><br>           

                        <div class=" form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" minlength="3" maxlength="50" id="namellabel"  name="Name"
                            
                            <?php
                                echo'
                                value=' . $Cust[1]  ;
                            
                            ?>
                              required>
                        </div>

                        <div class=" form-group">
                            <label for="Phone number">Phone number</label>
                            <input type="num" class="form-control"  minlength="8" maxlength="11" id="phonelabel" placeholder="Your phone number" name="Phone" 
                            
                            <?php
                    
                                echo'
                                value=' . $Cust[2]  ;
                            
                          
                            ?>

                             required>
                        </div>

                        <div class=" form-group">
                            <label for="Email">Email address</label>
                            <input type="email" class="form-control"  maxlength="50" id="emaillabel" placeholder="email@example.com" name="Email"
                            
                            <?php
                          
                                echo'
                                value=' . $Cust[3]  ;
                            
                         
                            ?>

                              required>
                        </div>

                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" minlength="8"  id="pass" placeholder="Password" name="Password" 
                            
                            <?php
                          
                                echo'
                                value=' . $Cust[4] ;
                            
                            
                            ?>

                             required>
                        </div>

                        <div class="form-group city">
                            <label for="City">City</label>
                            <input type="text" class="form-control " minlength="3"  id="citylabel" placeholder="cairo" name="City" 
                            
                            <?php
                            if($Gender == 'customer' || $Gender== 'manager'){
                                echo'
                                value=' . $Cust[5] ;
                            
                            }
                            ?>

                            >
                        </div>

                        <div class="form-group street">
                            <label for="street">Street</label>
                            <input type="text" class="form-control " minlength="3"  id="streetlabel" placeholder="Faisal" name="Street" 
                            
                            <?php
                            if($Gender == 'customer' || $Gender== 'manager'){
                                echo'
                                value=' . $Cust[6] ;
                            
                            }
                            ?>

                            >
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
    // $js_files = '<script src="../js/signup.js"></script>';
    
    include '../' . $tmpl . 'footer.php';

?>   

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                                                                            <!-- ???????????????     -->

  

