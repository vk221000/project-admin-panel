<?php
if (isset($_POST['submit'])) {
	include 'config.php';
	$categoryid=$_POST['categoryid'];
	$name=$_POST['productname'];
	$price=$_POST['price'];
	$shortdescription=$_POST['shortdescription'];
	$longdescription=$_POST['longdescription'];
	$category=$_POST['dropdown'];
	$color=$_POST['dropdown1'];
	$tags='';
	if(!empty($_POST['fashion'])) {
		$tags=$_POST['fashion'];
	}
	if(!empty($_POST['ecommerce'])) {
		$tags=$_POST['ecommerce'];
	}
	if(!empty($_POST['shop'])) {
		$tags=$_POST['shop'];
	}
	if(!empty($_POST['handbag'])) {
		$tags=$_POST['handbag'];
	}
	if(!empty($_POST['laptop'])) {
		$tags=$_POST['laptop'];
	}
	if(!empty($_POST['handbag'])) {
		$tags=$_POST['handbag'];
	}
	if(!empty($_POST['headphone'])) {
		$tags=$_POST['headphone'];
	}
	if ($tags=="") {
		$tags="ecommerce";
	}
	$sql="INSERT INTO `products` (`name`,`price`,`short_description`,`long_description`,`category_id`, `category`, `tags`, `color`) VALUES ('$name', '$price', '$shortdescription', '$longdescription', '$categoryid', '$category', '$tags', '$color')";
	if ($conn->query($sql)===true) {
        header('Location:manageproducts.php');

	} 
}

?>