<?php
if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
    include 'config.php';
    $sql="DELETE FROM `orders` WHERE `id`=$id";
    if ($conn->query($sql)===true) {
        header('Location:orders.php');

    }

}
?>