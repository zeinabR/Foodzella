<?php
session_start();
// page title
    $pageTitle = 'SignUp';
    
    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/signup/signup.css">';

    
    include '../connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Rname = filter_var($_POST['Rname'], FILTER_SANITIZE_STRING);
    $Rphone = filter_var($_POST['contactNo'], FILTER_SANITIZE_NUMBER_INT);
    $Category = filter_var($_POST['Category'], FILTER_SANITIZE_STRING);
    $Rcity = filter_var($_POST['Rcity'], FILTER_SANITIZE_STRING);
    $Rstreet = filter_var($_POST['Rstreet'], FILTER_SANITIZE_STRING);
    $Hours = filter_var($_POST['Hours'], FILTER_SANITIZE_NUMBER_INT);
    $Services = filter_var($_POST['Services'], FILTER_SANITIZE_STRING);
    $tables = filter_var($_POST['tables'], FILTER_SANITIZE_NUMBER_INT);
   
    if (empty($Rname)) {
        $Errors[] = 'Restaurant Name Not Found';
    }
    if (empty($Rphone)) {
        $Errors[] = ' Restaurant Phone Not Found';
    }
    if (empty($Category)) {
        $Errors[] = 'Restaurant Category Not Found';
    }
    if (empty($Rcity)) {
        $Errors[] = 'Restaurant City Not Found';
    }
    if (empty($Rstreet)) {
        $Errors[] = 'Restaurant Street Not Found';
    }

    if (empty($Services)) {
        $Errors[] = 'Restaurant Services Not Found';
    }

    if (empty($tables)) {
        $Errors[] = 'Restaurant tables Not Found';
    }
   


    // to have access on variables
    $_SESSION['Rname']=$Rname;
    $_SESSION['Rphone']=$Rphone;
    $_SESSION['Rcateg']=$Category;
    $_SESSION['RitemNo']=$ItemsNo;
    $_SESSION['Rcity']=$Rcity;
    $_SESSION['Rstreet']=$Rstreet;
    $_SESSION['Rhours']=$Hours;
    $_SESSION['Rservice']=$Services;
    $_SESSION['Rtables']=$tables;

    if(empty($Errors)){
        // check unique phone no
        $Cust=$_SESSION['Cust'];
        $s = $con->prepare("SELECT * FROM restaurant WHERE Mgr_ID=? limit 1");
        $s->execute(array($Cust[0]));
        $p = $s->fetchAll();
        $_SESSION['RID']=$p[0];

        if (!in_array($Rphone,$p)) {
        
            header("Location: ItemForm.php");          
                    
        }

        else{
            $Errors[] = 'Restaurant Already Exists';
        }
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

                    <!-- <div class="form-group ">
                        <label for="items">No. of Items</label>
                        <input type="number" class="form-control" minlength="8"  id="items" placeholder="Items' No." name="ItemsNo" required >
                    </div> -->

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

                </div>
            </form>    
        </div>
    </div>
</div>
                        <!-- end restaurant's information -->
                            
    
                  




<!-- set footer -->

<?php 

include '../' . $tmpl . 'footer.php';

?>   