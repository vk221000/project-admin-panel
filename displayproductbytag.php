<?php 
session_start();
if (isset($_GET['tag'])) {
    $tag=$_GET['tag'];
    $_SESSION['tag']=array();
    $_SESSION['tag'][0]=$tag;
    header('Location:product.php');
}
?>