<?php

// session_start();

include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$Iname  = filter_var($_POST['Item'], FILTER_SANITIZE_STRING);
$Price  = filter_var($_POST['Price'], FILTER_SANITIZE_NUMBER_INT);


// $R= $_SESSION['RID'];

  $statt = $con->prepare("INSERT INTO item (Name, Price,Rest_ID) VALUES(:name, :Iprice, :Irestid)");
        $statt->execute(array(
            'name' => $Iname,
            'Iprice' => $Price,
            'Irestid' => $_SESSION['RID'],
            
            ));


            if(!$statt){
                $Errors[] = 'Failed to set items ';   
            }
    
            else
            
                {  
                  
                    echo '<div class="success text-success">
                    <i class="fa fa-check fa-2x"></i>
                    Welcome ';  echo '<strong>' . $_SESSION['Mname'] . '</strong>';
                    echo '</div>';  
                    $_SESSION['LOGIN'] = $_SESSION['Mname'];
                    $_SESSION['Cust'] = $ID[0];
                    header("refresh:2; url=http://localhost/dashboard/FOODZELLA/Home/index.php");                
                    exit();
                }   
            
            }
            ?>