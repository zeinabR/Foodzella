<?php

// page title
    // $pageTitle = 'SignUp';
    
    // // css files for this page
    // $css_files = '<link rel="stylesheet" href="../css/signup/signup.css">';

    // include '../init.php';
    session_start();
    include '../connect.php';

            
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
    //     $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
    //     $Phone = filter_var($_POST['Phone'], FILTER_SANITIZE_NUMBER_INT);
    //     $Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    //     $Pass = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
    //     $City = filter_var($_POST['City'], FILTER_SANITIZE_STRING);
    //     $Street = filter_var($_POST['Street'], FILTER_SANITIZE_STRING);
    //     $Manager = filter_var($_POST['Manager'], FILTER_SANITIZE_STRING);       
          
    //     // restaurant's info

    //     // $Rname = filter_var($_POST['Rname'], FILTER_SANITIZE_STRING);
    //     // $Rphone = filter_var($_POST['contactNo'], FILTER_SANITIZE_NUMBER_INT);
    //     // $Category = filter_var($_POST['Category'], FILTER_SANITIZE_STRING);
    //     // $ItemsNo = filter_var($_POST['ItemsNo'], FILTER_SANITIZE_NUMBER_INT);
    //     // $Rcity = filter_var($_POST['Rcity'], FILTER_SANITIZE_STRING);
    //     // $Rstreet = filter_var($_POST['Rstreet'], FILTER_SANITIZE_STRING);
    //     // $Hours = filter_var($_POST['Hours'], FILTER_SANITIZE_NUMBER_INT);
    //     // $Services = filter_var($_POST['Services'], FILTER_SANITIZE_STRING);
    //     // $tables = filter_var($_POST['tables'], FILTER_SANITIZE_NUMBER_INT);
    //     // $ItemsNo = filter_var($_POST['ItemsNo'], FILTER_SANITIZE_NUMBER_INT);
    //     // $Rcity = filter_var($_POST['Rcity'], FILTER_SANITIZE_STRING);
    //     // $Rstreet = filter_var($_POST['Rstreet'], FILTER_SANITIZE_STRING);
        
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
    //             $phon = $stmt->fetchAll();

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
    //                         $stmt = $con->prepare("SELECT * FROM customer WHERE Email=? LIMIT 1");
    //                         $stmt->execute(array($Email));
    //                         $Cust = $stmt->fetchAll();  

    //                             echo '<div class="success text-success">
    //                             <i class="fa fa-check fa-2x"></i>
    //                             Welcome ';  echo '<strong>' . $Name . '</strong>';
    //                             echo '</div>';  

    //                             $_SESSION['LOGIN'] = $Name;
    //                             $_SESSION['Cust'] = $Cust[0];
    //                             $_SESSION['Gender']='Customer';
    //                             header("refresh:2; url=http://localhost/dashboard/FOODZELLA/Home/index.php");
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
                

    //             if ($c1 == 0) {
    //                 $_SESSION['Mname'] = $Name;
    //                 $_SESSION['Mpass']= $Pass;
    //                 $_SESSION['Mphone'] = $Phone;
    //                 $_SESSION['Memail'] = $Email;
    //                 $_SESSION['Mcity'] = $City;
    //                 $_SESSION['Mstreet'] = $Street;
    //                 $_SESSION['Gender']= 'Manager';
    //                 header("Location: RestForm.php");
    //                 // exit();
                   
                     
    //                     // $state1=$con->prepare("SELECT Mgr_ID FROM manager WHERE Email = ? LIMIT 1");
    //                     // $state1->execute(array($Email));
    //                     // $ID=$state1->Fetch();
                        
    //                     // $s = $con->prepare("SELECT Contact_No FROM restaurant");
    //                     // $conta[] = $s->fetch();

    //     //                 if ($state1 && !in_array($Rphone,$conta)) {  
    //     //                     $state = $con->prepare("INSERT INTO restaurant (Name, Contact_No, Category, No_of_Items ,RCity, RStreet,WorkHr,Services,No_available_Tables,Mgr_ID) VALUES(:Rname, :Rtel, :RCategory, :Ritems,:Rcity, :Rstreet,:workHr,:servies,:notables,:Mgrid)");
    //     //                     $state->execute(array(
    //     //                         'Rname' => $Rname,
    //     //                         'Mgrid' => $ID[0],
    //     //                         'RCategory' => $Category,
    //     //                         'Rtel' => $Rphone,
    //     //                         'Ritems' => $ItemsNo,
    //     //                         'Rcity' => $Rcity,
    //     //                         'Rstreet' => $Rstreet,
    //     //                         'servies' =>$Services,
    //     //                         'workHr' =>$Hours,
    //     //                         'notables' =>$tables,
    //     //                         ));
                    
    //     //                 }
    //     //                 else {
    //     //                     $Errors[] = 'Failed to Register Your Restaurant';
    //     //                 }

                    
    //     //                 if ($state) {  
    //     //                         echo '<div class="success text-success">
    //     //                         <i class="fa fa-check fa-2x"></i>
    //     //                         Welcome ';  echo '<strong>' . $Name . '</strong>';
    //     //                         echo '</div>';  
    //     //                         $Login = $Name;
    //     //                     }
                            
                         
    //                 }

    //             else{
    //                 $Errors[] = 'You Are Registered Once';
    //             }
    //         }
    //     } 
    //     else{
    //         $_SESSION['Gender']='Admin';
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
