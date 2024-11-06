<?php
// $host = "localhost";
// $user = "root";
// $password = "";
// $database = "megameet";
// $port = "3307";

// $conn = new mysqli($host, $user, $password, $database);
// $conn = mysqli_connect('localhost','root','','megameet');
$host = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');
$database = getenv('DB_NAME');

$conn = new mysqli($host, $username, $password, $database);


?>