<?php

$servername = "localhost";
$username ="root";
$password = "";
$database = "information";

$conn = mysqli_connect($servername,$username,$password,$database);
 //getting request from user

 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    $eml = $_POST['email'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $desc = $_POST['des'];
    $sql = "INSERT INTO `loginform` (`Name`,`Email`,`Password`,`About`) VALUES ('$name','$eml','$pass', '$desc')";
    
    $result = mysqli_query($conn, $sql);
    if(!$result)
    echo "not added".mysqli_error($conn);
    else
    echo "added";
 }
?>