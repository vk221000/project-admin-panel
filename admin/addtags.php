<?php
if(isset($_POST['submit'])){
	include 'config.php';
	$name=$_POST['name'];
	$sql="INSERT INTO `tags` (`name`) VALUES ('$name')";
	if ($conn->query($sql)===true) {
        header('Location:tags.php');

	} 
}
?>