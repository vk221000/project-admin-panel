<?php
if(isset($_POST['submit'])){
	include 'config.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$sql="INSERT INTO `users` (`username`,`password`,`email`,`dob`,`address`) VALUES ('$username', '$password', '$email', '$dob', '$address')";
	if ($conn->query($sql)===true) {
        header('Location:manageusers.php');

	} 
}
?>