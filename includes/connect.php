<?php
$dbservername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "mm";

$conn = mysqli_connect($dbservername, $dbUsername, $dbPassword, $dbname);

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}
