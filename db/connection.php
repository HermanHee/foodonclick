<?php
$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="foodonclickdb";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}