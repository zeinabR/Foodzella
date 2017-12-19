<?php
 
    session_start();
    session_unset(); //Unset The Data
    
    session_destroy(); //Destroy The Seesion

    // $_SESSION['LOGIN'] = 'LOG IN';
    header("Location:../Login/Login.php");
    
    include '../init.php';

    include '../' . $tmpl . 'footer.php';

?>
