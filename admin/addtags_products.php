<?php
if(isset($_POST['submit'])){
	include 'config.php';
    $pdtid=$_POST['pdtid'];
    $tagid=$_POST['tagid'];
    
	$sql="INSERT INTO `products_tags` (`pdtid`,`tagid`) VALUES ('$pdtid','$tagid')";
	if ($conn->query($sql)===true) {
        header('Location:tags_products.php');

	} 
}
?>