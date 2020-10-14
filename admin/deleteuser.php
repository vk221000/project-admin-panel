<?php
if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
    include 'config.php';
    $sql="DELETE FROM `users` WHERE `id`=$id";
    if ($conn->query($sql)===true) {
        header('Location:manageusers.php');

    }

}
?>