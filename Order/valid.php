<?php

session_start();

if($_SESSION['LOGIN'] == 'LOG IN'){
  
    $js_files = '<script src="../js/order.js"></script>';

  }
else{
    $js_files = '<script src="../js/RealOrder.js"></script>';
    
}

// if()

?>