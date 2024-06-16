<?php
require_once "config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['medicineid']; 
    if(trim($_GET['stock'])=='')
    {
        $quantity=1;
    }
    else{
    $quantity = $_GET['stock'];}
    $username = $_SESSION['username'];
    // for checking that it exists already in cart or not
    $check_query = "SELECT * FROM user WHERE username = ? AND Medicine_id = ?";
    $stmt_check = mysqli_prepare($link, $check_query);
    mysqli_stmt_bind_param($stmt_check, "ss", $username, $id);
    mysqli_stmt_execute($stmt_check);
    $query_result = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($query_result) === 0) {
        $select_query = "SELECT * FROM medicines WHERE Medicine_id = ?";
        $stmt_select = mysqli_prepare($link, $select_query);
        mysqli_stmt_bind_param($stmt_select, "s", $id);
        mysqli_stmt_execute($stmt_select);
        $result = mysqli_stmt_get_result($stmt_select);

        if ($row = mysqli_fetch_assoc($result)) {
            $medicine_name = $row['Medicine_name'];
            $price_cost = $row['selling_price'] * $quantity;

            $insert_query = "INSERT INTO user (username, Medicine_id, Medicine_Name, quantity, price_cost) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert = mysqli_prepare($link, $insert_query);
            mysqli_stmt_bind_param($stmt_insert, "sssdd", $username, $id, $medicine_name, $quantity, $price_cost);
            mysqli_stmt_execute($stmt_insert);

            $update_query = "UPDATE medicines SET in_stock = in_stock - ? WHERE Medicine_id = ?";
            $stmt_update = mysqli_prepare($link, $update_query);
            mysqli_stmt_bind_param($stmt_update, "ds", $quantity, $id);
            mysqli_stmt_execute($stmt_update);
        }
     } // if it exists in cart then add more quantity if user  requests too add
    else {
       
      $select_query = "SELECT * FROM medicines WHERE Medicine_id = ?";
      $stmt_select = mysqli_prepare($link, $select_query);
      mysqli_stmt_bind_param($stmt_select, "s", $id);
      mysqli_stmt_execute($stmt_select);
      $result = mysqli_stmt_get_result($stmt_select);
      $originalprice;
      if($row= mysqli_fetch_assoc($result))
        {
            $originalprice = $row['selling_price'];
        }
 

        $add_query = "UPDATE user SET quantity = quantity + ?, price_cost = price_cost + ?*?, date_time = current_timestamp() WHERE username = ? AND Medicine_id = ?";
        $stmt_add = mysqli_prepare($link, $add_query);
        mysqli_stmt_bind_param($stmt_add, "dddss", $quantity, $quantity, $originalprice, $username, $id);
        mysqli_stmt_execute($stmt_add);

        $update_query = "UPDATE medicines SET in_stock = in_stock - ? WHERE Medicine_id = ?";
            $stmt_update = mysqli_prepare($link, $update_query);
            mysqli_stmt_bind_param($stmt_update, "ds", $quantity, $id);
            mysqli_stmt_execute($stmt_update);
    }
    header('Location: medicine_cart.php');
}
?>
