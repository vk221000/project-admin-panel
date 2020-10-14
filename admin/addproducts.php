<?php
if (isset($_POST['submit'])) {
	include 'config.php';
	$categoryid=$_POST['categoryid'];
	$name=$_POST['productname'];
	$price=$_POST['price'];
	$shortdescription=$_POST['shortdescription'];
	$longdescription=$_POST['longdescription'];
	$sql="INSERT INTO `products` (`name`,`price`,`short_description`,`long_description`,`category_id`) VALUES ('$name', '$price', '$shortdescription', '$longdescription', '$categoryid')";
	if ($conn->query($sql)===true) {
        header('Location:manageproducts.php');

	} 
}

?>