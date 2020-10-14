<?php
if(isset($_POST['submit'])){
	include 'config.php';
	$name=$_POST['name'];
	$sql="INSERT INTO `categories` (`name`) VALUES ('$name')";
	if ($conn->query($sql)===true) {
        header('Location:categories.php');

	} 
}
?>