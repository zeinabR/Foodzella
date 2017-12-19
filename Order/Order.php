<?php
 
    session_start();
         $pageTitle = 'Order';
     
         // css files for this page
        $css_files = '<link rel="stylesheet" href="../css/Order/Order.css">';
     
     
        

        include '../connect.php';

      

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $Type = filter_var($_POST['Type'], FILTER_SANITIZE_STRING);
            $Iname = filter_var($_POST['Iname'], FILTER_SANITIZE_STRING);
            $Amount = filter_var($_POST['Amount'], FILTER_SANITIZE_NUMBER_INT);
            $Table = filter_var($_POST['table'], FILTER_SANITIZE_NUMBER_INT);
            $Cust=$_SESSION['Cust'];

            // date_default_timezone_set('Egypt');
            // $date = date('Y/m/D /h:m:s', time());
            
            $errors;
            if (!$Type) {
                $errors[] = 'Type Not Found';
            }
            if (!$Iname) {
                $errors[] = 'Iname Not Found';
            }

            $state = $con->prepare("INSERT INTO `order` (Rest_ID, Cust_ID, Type) VALUES(:Rid,:Cid,:Otype)");
            $state->execute(array(
                'Rid' => $_SESSION['ID'],
                'Cid' => $Cust[0],
                'Otype' => $Type,
                // 'date' => $date,
               
                ));
            
            if($state){

                $stat=$con->prepare("SELECT `Item_ID` FROM `item` WHERE `Name`=? AND Rest_ID=? LIMIT 1 ");
                $stat->execute(array($Iname, $_SESSION['ID']));
                $ItemID=$stat->fetch();

                $stmt=$con->prepare("SELECT `Order_ID` FROM `order` WHERE Rest_ID=? ORDER BY Order_ID DESC LIMIT 1 ");
                $stmt->execute(array($_SESSION['ID']));
                $OrderID=$stmt->fetch();

                if($stmt && $stat)
                {
                    $state = $con->prepare("INSERT INTO ordered_items(Item_ID, Order_ID ) VALUES(:Iid, :Oid)");
                    $state->execute(array(
                        'Iid' => $ItemID[0],
                        'Oid' => $OrderID[0],
                       
                       
                        )); 

                        if($state){
                            $state = $con->prepare("INSERT INTO `message`(`Text`, Order_ID ) VALUES(:text, :Oid)");
                            $state->execute(array(
                                'text' => $Cust[1] . ' requests an order of ' . $Iname,
                                'Oid' => $OrderID[0],
                               
                               
                                )); 
                            if($stat){

                            echo '<div class="success text-success">
                            <i class="fa fa-check fa-2x"></i>
                             ';  echo '<strong>' . 'Order Send Successfully' . '</strong>';
                            echo '</div>'; 

                           
                            header("refresh:2; url=http://localhost/dashboard/FOODZELLA/Home/index.php");
                            // exit();
                            }
                        }
                }

            }
            else{
                $errors[]='Failed to send order';
            }
            
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
                <h1 class="Title"> <?php echo $_SESSION['Name'] ; ?> </h1>
                    <form id="dropForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">

                    <div class=" form-group ">
                        <label for="Type">Type of Order</label>
                        <select class="custom-select" name="Type" required>
                            <option selected>Choose Type</option>
                            <option value="Table Reservation" class="Treserve">Table Reservation</option>
                            <option value="Delivery">Delivery</option>
                        </select>
                    </div>


                    <div class=" form-group ">
                        <label for="Item">Item's Name</label>
                        <select  class="custom-select"  name="Iname" required>
                        <option selected>Choose Item</option>

                        <?php 

                        $stmt=$con->prepare('SELECT * FROM item WHERE Rest_ID= ? ');
                        $stmt->execute(array($_SESSION['ID']));
                        $item= $stmt->fetchAll();
                        $row = $stmt->rowCount();

                        if($row>0){
                            for($i=0 ; $i<$row ; $i++)
                            {
                             echo '   
                                <option value="' . $item[$i][1] . '"> ' . $item[$i][1] . '</option>';
                               
                            }
                        }
                        ?>

                        </select> 
                    </div>

                    <div class=" form-group">
                            <label for="Amount">Amount</label>
                            <input type="num" class="Amount"  maxlength="50" id="Amount"  name="Amount" required>
                    </div>

                    <div class=" form-group reserve">
                            <label for="Table">No. of Tables</label>
                            <input type="num" class="Amount"  maxlength="5" id="table"  name="table" >
                    </div>
                 

                    <div id="DropdownForm">
                            <button type="submit " class="btn btn-outline-danger btn-sm btn-block submitbutton " name="Send">Send</button>
                    </div>
               
                    
                      
                    <!-- <div class=" form-group">
                            <label for="Amount">Date</label>
                            <input type="num" class="Amount"  maxlength="50" id="Amount"  name="Amount" required>
                    </div> -->
                    
                    <!-- <?php
                
                    ?> -->
                          
                        
                    </form>
                </div>
            </div>
        </div>
 

    <?php 
    $js_files = '<script src="../js/RealOrder.js"></script>';

    include '../' . $tmpl . 'footer.php';

?>   