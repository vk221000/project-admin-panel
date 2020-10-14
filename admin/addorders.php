<?php
if(isset($_POST['submit'])){
	include 'config.php';
	$userid=$_POST['userid'];
	$cartdata=$_POST['cartdata'];
	$total=$_POST['total'];
	$status=$_POST['status'];
	$sql="INSERT INTO `orders` (`userid`,`cartdata`,`total`,`status`,`datetime`) VALUES ('$userid', '$cartdata', '$total', '$status', NOW())";
	if ($conn->query($sql)===true) {
        header('Location:orders.php');

	} 
}
?>