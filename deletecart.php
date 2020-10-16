<?php
session_start();
if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
    foreach ($_SESSION['cart'] as $key=>$val) {
        if ($val['id']==$id) {
            unset($_SESSION['cart'][$key]);
        }
    }
    array_values($_SESSION['cart']);
    header('Location:cart.php');
   

}
?>