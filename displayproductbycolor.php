<?php
session_start();
if (isset($_GET['col'])) {
    $col=$_GET['col'];
    $_SESSION['col']=array();
    $_SESSION['col'][0]=$col;
    header('Location:product.php');  
}
?>