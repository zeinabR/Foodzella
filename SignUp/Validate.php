<?php

// page title
    // $pageTitle = 'SignUp';
    
    // // css files for this page
    // $css_files = '<link rel="stylesheet" href="../css/signup/signup.css">';

    // include '../init.php';
    session_start();
    include '../connect.php';

            
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
        $Phone = filter_var($_POST['Phone'], FILTER_SANITIZE_NUMBER_INT);
        $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
        $Pass = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
        $hashedPass = sha1($password);
        $City = filter_var($_POST['City'], FILTER_SANITIZE_STRING);
        $Street = filter_var($_POST['Street'], FILTER_SANITIZE_STRING);
        $Manager = filter_var($_POST['Manager'], FILTER_SANITIZE_STRING);       
          
     
        $Errors;
        if (empty($Name)) {
            $Errors[] = 'Name Not Found';
        }
        if (empty($Phone)) {
            $Errors[] = 'Phone Not Found';
        }
        if (empty($Pass)) {
            $Errors[] = 'Password Not Found';
        }
        if (empty($City)) {
            $Errors[] = 'City Not Found';
        }
        if (empty($Street)) {
            $Errors[] = 'Street Not Found';
        }

        if (empty($Email)) {
            $Errors[] = 'Email Not Found';
        }
        

    if (empty($Errors)) {
    
        // check not an admin
        $admin = $con->prepare("SELECT Name FROM administrator WHERE email = ? LIMIT 1");
        $admin->execute(array($Email));
        $Aname = $admin->fetch();
        $c2 = $admin->rowCount();
        if($c2 == 0){

            if($Manager == 'no'){

                // check unique email
                $stmt = $con->prepare("SELECT Name FROM customer WHERE email = ? LIMIT 1");
                $stmt->execute(array($Email));
                $rowName = $stmt->fetch();
                $c = $stmt->rowCount();

                // check unique phone no
                $stmt = $con->prepare("SELECT PhoneNo FROM customer");
                $phon = $stmt->fetchAll();

                if ($c == 0 && !in_array($Phone,$phon)) {
                
                        $state = $con->prepare("INSERT INTO customer(Name, Password, PhoneNo, Email ,City, Street) VALUES(:Sname, :Spass, :Stel, :Semail, :Scity, :Sstreet)");
                        $state->execute(array(
                            'Sname' => $Name,
                            'Spass' => $Pass,
                            'Stel' => $Phone,
                            'Semail' => $Email,
                            'Scity' => $City,
                            'Sstreet' => $Street,
                            ));
                    
                        if ($state) {  
                            $stmt = $con->prepare("SELECT * FROM customer WHERE Email=? LIMIT 1");
                            $stmt->execute(array($Email));
                            $Cust = $stmt->fetchAll();  

                                echo '<div class="success text-success">
                                <i class="fa fa-check fa-2x"></i>
                                Welcome ';  echo '<strong>' . $Name . '</strong>';
                                echo '</div>';  

                                $_SESSION['LOGIN'] = $Name;
                                $_SESSION['Cust'] = $Cust[0];
                                $_SESSION['Gender']='customer';
                                header("refresh:2; url=http://localhost/dashboard/FOODZELLA/Home/index.php");
                            }
                            
                        else{
                            $Errors[] = 'Failed to Register ';
                        } 
                    }
                    
                
                else {
                    $Errors[] = 'You Are Registered Once';
                }
            }


            else  {
               
                
                $s = $con->prepare("SELECT Name FROM manager WHERE email = ? LIMIT 1");
                $s->execute(array($Email));
                $rowName1 = $s->fetch();
                $c1 = $s->rowCount();
            
                // check unique phone no

                $s = $con->prepare("SELECT Phone_Num FROM manager");
                $p[] = $s->fetch();
                

                if ($c1 == 0) {
                    $_SESSION['Mname'] = $Name;
                    $_SESSION['Mpass']= $Pass;
                    $_SESSION['Mphone'] = $Phone;
                    $_SESSION['Memail'] = $Email;
                    $_SESSION['Mcity'] = $City;
                    $_SESSION['Mstreet'] = $Street;
                    $_SESSION['Gender']= 'manager';
                    header("Location: RestForm.php");
                 
                         
                    }

                else{
                    $Errors[] = 'You Are Registered Once';
                }
            }
        } 
        else{
            $_SESSION['Gender']='administrator';
            $Errors[] = 'Sorry You Are An Admin';
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
?>
