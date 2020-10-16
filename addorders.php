<?php
session_start();
if (isset($_GET['checkout'])) {
    include 'admin/config.php';
    $total=0;
    $userid=101;
    $status="unpaid";
    $cartdata="";
    foreach ($_SESSION['cart'] as $key=>$val) {
        $cartdata.=$val['name'].'.';
        $total+=$val['quantity']*$val['price'];
    }
    $sql="INSERT INTO `orders` (`userid`,`cartdata`,`total`,`status`,`datetime`) VALUES ('$userid', '$cartdata', '$total', '$status', NOW())";
        if ($conn->query($sql)===true) {
            echo('thankyou for shopping with us!<br><br>');
            echo "<a href='product.php'>Go Back<a>";

        } 
	
	
}
?>