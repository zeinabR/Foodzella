<?php

session_start();
include '../connect.php';


$Text = urldecode($_REQUEST['cluster']);
$itemID = json_decode($Text,true);

$stmt= $con-> prepare("SELECT count(*) FROM item WHERE Rest_ID=? ");
$stmt->execute(array($_SESSION['RID']));
$ITEMcount=$stmt->fetch();

if($_SESSION['RitemNo'] < $ITEMcount){

$DelItem= $_SESSION['deleteItem'];

$stmt=$con->prepare(" DELETE FROM item WHERE Item_ID=?");
$stmt->execute(array($itemID));

    if($stmt){
        header('Location:Item.php');
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>';
            echo '<strong>' . 'Failed to delete item ' . '</strong>';
            echo '</div>';

    }
}

else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>';
        echo '<strong>' . 'Could not delete items,change Num of items first ' . '</strong>';
        echo '</div>';
}

?>