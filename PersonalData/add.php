<?php

session_start();
include '../connect.php';



$stmt= $con-> prepare("INSERT INTO item (Name, Price,Rest_ID) VALUES(:name, :Iprice, :Irestid)");
$statt->execute(array(
    'name' => $_SESSION['InameAdd'],
    'Iprice' => $_SESSION['PriceAdd'],
    'Irestid' => $_SESSION['RID'],
    
    ));


    if($stmt){
        header('Location:Item.php');
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>';
            echo '<strong>' . 'Failed to Add item ' . '</strong>';
            echo '</div>';

    }



?>