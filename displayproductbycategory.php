<?php
session_start();
if (isset($_GET['cat'])) {
    $category=$_GET['cat'];
    if ($category=='all') {
        unset($_SESSION['cat']);
        unset($_SESSION['tag']);
        unset($_SESSION['col']);
        header('Location:product.php');
    } else {
        $_SESSION['cat']=array();
        $_SESSION['cat'][0]=$category;
        header('Location:product.php');
    }
    
}
?>