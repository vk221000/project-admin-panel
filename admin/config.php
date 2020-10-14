<?php
$servername = 'localhost';
$user       = 'root';
$password   = "";
$dbname     = 'phpmyadmin';
$conn       = new mysqli($servername, $user, $password, $dbname);
if ($conn->connect_error) {
    die('connection failed' . $conn->connect_error);
}
?>