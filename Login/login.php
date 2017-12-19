 
 
  <!-- login form -->

  <?php
 
    session_start();
         $pageTitle = 'Login';
         $_SESSION['LOGIN'] ="LOG IN";
         // css files for this page
        $css_files = '<link rel="stylesheet" href="../css/Login/login.css">';
     
        // $Login = 'LOG IN';
        

        include '../connect.php';
    
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
                            $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
                            $pass = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
                            
                            $errors;
                            if (!$email) {
                                $errors[] = 'Email Not Found';
                            }
                            if (!$pass) {
                                $errors[] = 'Password Not Found';
                            }
                        
                    

                if (empty($errors)) {
                    
                    $stmt = $con->prepare("SELECT * FROM administrator WHERE Email = ? AND Password = ? LIMIT 1");
                    $stmt->execute(array($email,$pass));
                    $row1 = $stmt->fetchAll();
                    //$count1 = $stmt->rowCount();
                
                        if (!$row1) {

                            $stmt = $con->prepare("SELECT * FROM customer WHERE Email = ? AND Password =? LIMIT 1");
                            $stmt->execute(array($email,$pass));
                            $row2 = $stmt->fetchAll();
                           // $count2 = $stmt->rowCount();
                            
                            if(!$row2)
                            {
                                $stmt = $con->prepare("SELECT * FROM manager WHERE Email = ? AND Password = ?LIMIT 1");
                                $stmt->execute(array($email,$pass));
                                $row3 = $stmt->fetchAll();
                               // $count3 = $stmt->rowCount();

                                if(!$row3)
                                     $errors[] = 'Email Or Password Is Incorrect';
                                
                                else if($row3){
                                    echo '<div class="success text-success">
                                    <i class="fa fa-check fa-2x"></i>
                                    Welcome ';  echo '<strong>' . $row3[0][1] . '</strong>';
                                    echo '</div>';  
                                   $_SESSION['LOGIN'] =$row3[0][1];
                                   $_SESSION['Cust'] = $row3[0];
                                   $_SESSION['Gender']='manager';
                                   header("refresh:2; url=http://localhost/dashboard/FOODZELLA/Home/index.php");
                                //    exit();
                                }     
                               
                                    // else{
                                    //     $errors[] = 'Password Is Incorrect';
                                    // }
                            }

                            else if($row2){
                                echo '<div class="success text-success">
                                <i class="fa fa-check fa-2x"></i>
                                Welcome ';  echo '<strong>' . $row2[0][1] . '</strong>';
                                echo '</div>'; 
                                $_SESSION['LOGIN'] =$row2[0][1];
                                $_SESSION['Cust'] = $row2[0];
                                $_SESSION['Gender']='customer';
                                header("refresh:2; url=http://localhost/dashboard/FOODZELLA/Home/index.php");
                                // exit();
                            }
                                // else{
                                //     $errors[] = 'Password Is Incorrect';
                                // }
                        
                        }

                        else if($row1){
                            echo '<div class="success text-success">
                            <i class="fa fa-check fa-2x"></i>
                            Welcome ';  echo '<strong>' . $row1[0][1] . '</strong>';
                            echo '</div>'; 
                            $_SESSION['LOGIN'] =$row1[0][1];
                            $_SESSION['Cust'] = $row1[0];
                            $_SESSION['Gender']='administrator';
                            header("refresh:2; url=http://localhost/dashboard/FOODZELLA/Home/index.php");
                            // exit();
                        }
                            // else {
                            //     $errors[] = 'Password Is Incorrect';
                            // }
                
                           
                        
                       
                    }
                    // else if($error){
                    //     // echo '<div class="error">';
                    //     foreach ($errors as $error) {  
                    //         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    //             <span aria-hidden="true">&times;</span>
                    //         </button>';
                    //             echo '<strong>' . $error . '</strong>';
                    //             echo '</div>';
                    //     }
                    //     // echo '</div>';
                    // }    
                    if (isset($errors)) {
                        echo '<div class="error">';
                        foreach ($errors as $error) {  
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>';
                                echo '<strong>' . $error . '</strong>';
                                echo '</div>';
                        }
                        echo '</div>';
                    }

                
                }
                
                include '../init.php';
                ?>
        <div  class=" form">
            <div class=" overlay"  aria-labelledby="navbarDropdownForm" >
                <div class="strip">   
                    <form id="dropForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
                        <div class=" form-group">
                            <label for="DropdownFormEmail1">Email address</label>
                            <input type="email" class="form-control"  maxlength="70" id="EmailDropdownForm1" placeholder="email@example.com" name="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="DropdownFormPassword1">Password</label>
                            <input type="password" class="form-control" minlength="8"  id="PassDropdownForm1" placeholder="Password" name="Password" required>
                        </div>
                        <!-- <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Remember me
                            </label>
                        </div> -->
                        <!-- <div class="blockquote-footer">
                            You should complete all fields
                        </div> -->
                        <div id="DropdownForm">
                            <button type="submit " class="btn btn-outline-danger btn-sm btn-block submitbutton " href="javascript:%20check_empty()" name="login">Sign in</button>
                        </div>
                    
                        <hr>
                        <div id="DropdownForm" class="form-a">
                            <a  href="../SignUp/signup.php">New around here? Sign up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                
<!-- <div id="abc">   
    <div id="popupContact">
 Contact Us Form 
        <form action="#" id="form" method="post" name="form">
        <img id="close" src="../images/b-close.png" onclick ="div_hide()">
        <h2>Contact Us</h2>
        <hr>
        <input id="name" name="name" placeholder="Name" type="text">
        <input id="email" name="email" placeholder="Email" type="text">
        <textarea id="msg" name="message" placeholder="Message"></textarea>
        <a href="javascript:%20check_empty()" id="submit">Send</a>
        </form>
    </div>
 Popup Div Ends Here 
</div>
 Display Popup Button 
<h1>Click Button To Popup Form Using Javascript</h1>
<button id="popup" onclick="div_show()">Popup</button> -->

<?php 
    // $js_files = '<script src="../js/login.js"></script>';

    include '../' . $tmpl . 'footer.php';

?>       