<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "mini-project";

$connect = mysqli_connect($host, $user, $pass, $database);

if($connect->connect_error) {
    die("Connection failed : " . $connect->connect_error);
}
?>