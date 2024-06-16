<?php

$servername = "localhost";
$username ="root";
$password = "";
$database = "information";

$conn = mysqli_connect($servername,$username,$password,$database);
 //getting request from user

 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    $name = $_POST['name'];
    $desc = $_POST['des'];
    $sql = "UPDATE `loginform` SET `About` = '$desc' WHERE `Name` = '$name'";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    echo "not deleted".mysqli_error($conn);
    else
    echo "deleted";
 }
?>