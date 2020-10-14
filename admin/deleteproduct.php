<?php
if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
    include 'config.php';
    $sql="DELETE FROM `products` WHERE `id`=$id";
    if ($conn->query($sql)===true) {
        header('Location:manageproducts.php');

    }

}
?>