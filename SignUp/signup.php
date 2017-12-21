

    <!-- Sign up form -->

<?php


// page title
    $pageTitle = 'SignUp';
    
    // css files for this page
    $css_files = '<link rel="stylesheet" href="../css/signup/signup.css">';

    include "validate.php "; 
    include '../init.php';
    
   
?>

<!-- /////////////////////////////////////////////////////////////////////////////////////// -->


<div class="form ">
    <div class="overlay">
        <div class="strip">
            <form class="container" id="dropForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">

                <center><h1><b>Join Us</b></h1></center><br>           

                <div class=" form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="namellabel" placeholder="Your Name" name="Name" required pattern=".{3,}[A-Z,a-z]" >
                </div>

                <div class=" form-group">
                    <label for="Phone number">Phone number</label>
                    <input type="num" class="form-control" id="phonelabel" placeholder="Your phone number" name="Phone" required pattern=".{8,}[0,9]">
                </div>

                <div class=" form-group">
                    <label for="Email">Email address</label>
                    <input type="email" class="form-control"  maxlength="50" id="emaillabel" placeholder="email@example.com" name="Email" required>
                </div>

                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" minlength="8"  id="pass" placeholder="Password" name="Password" required pattern=".{8,}">
                </div>

                <div class="form-group">
                    <label for="City">City</label>
                    <input type="text" class="form-control" minlength="3"  id="citylabel" placeholder="Your City" name="City" required>
                </div>

                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="text" class="form-control" minlength="3"  id="streetlabel" placeholder="Your Street" name="Street" required>
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
                
                <div class="blockquote-footer form-group">
                    You should complete all fields
                </div>

                <div id="button">
                    <button type="submit" class="btn btn-outline-warning btn-sm submitbtn" name="signup">Next</button>
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

  

