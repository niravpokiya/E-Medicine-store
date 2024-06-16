<?php
require_once "config.php";
session_start();
$username=$_SESSION['username'];
$num=$_GET['sr_num'];
$medicine_id=$_GET['id'];
$quantity=$_GET['quantity'];

$sql="SELECT quantity FROM medicines WHERE medicine=?";


$add_quantity="UPDATE medicines SET in_stock=in_stock + ? WHERE Medicine_id=?";
$stmt_update = mysqli_prepare($link, $add_quantity);
            mysqli_stmt_bind_param($stmt_update, "ii", $quantity, $medicine_id);
            mysqli_stmt_execute($stmt_update);


$delete_user = "DELETE FROM user WHERE username=? AND `sr.no`=?";
            $stmt_delete = mysqli_prepare($link, $delete_user);
            mysqli_stmt_bind_param($stmt_delete, "si", $username, $num);
            mysqli_stmt_execute($stmt_delete);
            $url="Cart.php?username_from_delete=" .$username;
            header("Location: Cart.php");
            


           
?>