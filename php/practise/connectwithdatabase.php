<?php
// echo "Let's try to eshtablish Connection with Mysqli database <br>";
$servername="localhost";
$username="root";
$password="";
$database = "nirav2";
//connecting with database
$conn = Mysqli_connect($servername,$username,"",$database);
if(!$conn)
{
    die("sorry we can't connect you done something unexpected check your code again");
}
else
echo "connection is eshtablished";
// $sql = "CREATE DATABASE nirav2";
// $result = mysqli_query($conn,$sql);
// if($result)
// echo "database was created successfully";
$sql = "CREATE TABLE `nirav2`.`table3` (`name` VARCHAR(200) NOT NULL)";
?>