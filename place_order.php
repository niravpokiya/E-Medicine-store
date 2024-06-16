<?php
session_start();
require_once "config.php";
$username = $_SESSION['username'];

$sql = "SELECT * FROM user where username = ?";
$prepare = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($prepare, "s", $username);
mysqli_stmt_execute($prepare);
$result = mysqli_stmt_get_result($prepare);
//fetching the array
while($row = mysqli_fetch_assoc($result))
{
    $medicine_id = $row['Medicine_id'];
    $medicine_name = $row['Medicine_Name'];
    $cost = $row['price_cost'];
    $quantity = $row['quantity'];

    $insert_query = "INSERT INTO orders (username, medicine_id, medicine_name, quantity, Cost) values (? , ? , ? , ? , ?)";
    $insert_prepare  = mysqli_prepare($link, $insert_query);
    mysqli_stmt_bind_param($insert_prepare, "sdsdd", $username, $medicine_id, $medicine_name, $quantity, $cost);
    mysqli_stmt_execute($insert_prepare);
}
$delete = "DELETE from user where username=?";
$start = mysqli_prepare($link, $delete);
mysqli_stmt_bind_param($start, "s", $username);
mysqli_stmt_execute($start);
header('Location: medicine_cart.php');
?>