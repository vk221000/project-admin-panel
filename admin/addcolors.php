<?php
if(isset($_POST['submit'])){
	include 'config.php';
    $pdtid=$_POST['pdtid'];
    $colors=$_POST['colors'];
    $quantity=$_POST['quantity'];
	$sql="INSERT INTO `colors` (`pdtid`,`colors`,`quantity`) VALUES ('$pdtid', '$colors', '$quantity')";
	if ($conn->query($sql)===true) {
        header('Location:colors.php');

    } 
    echo $conn->error;
}
?>