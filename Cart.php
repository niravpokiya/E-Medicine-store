<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="medicine_cart.css">
</head>
<body>
    <h1>Your Cart Details</h1>
    <?php
        require_once "config.php";
        session_start();
    if(!isset($_SESSION['username']))
    {
        echo "<h4 style='color:red;'>Please login or sign in to continue</h4>"."<br>";
        echo "<a class='login' href='login_index.php'> Login </a><br>";
        echo "<a href='signup_index.php'> Sign up </a>";
        exit();
    }
        $username = $_SESSION['username'];
        $query= "SELECT * FROM user where username = ?";
        $checking = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($checking, "s", $username);
        mysqli_stmt_execute($checking);
        $result = mysqli_stmt_get_result($checking);
        if($result)
        {
                echo '<table id = "Medicines">';
                echo "<thead>";
                echo " ";
            echo "<th>Serial No</th>";
            echo "<th>Username</th>";
            echo "<th>Medicine id</th>";
            echo "<th>Medicine Name</th>";
            echo "<th>Quantity</th>";
            echo "<th width=320>Cost</th>";
            echo "<th width=320>Date And time</th>";
            echo "<th>Remove From Cart ";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td class='medicine_id'>" . $row['sr.no'] . "</td>";
                echo "<td class='medicine_name'>" . $row['username'] . "</td>";
                echo "<td class='medicine_id'>" . $row['Medicine_id'] . "</td>";
                echo "<td class='selling_price'>" . $row['Medicine_Name'] . "</td>";
                echo "<td class='instock'>" . $row['quantity'] . "</td>";
                echo "<td class='price_cost'>" . $row['price_cost'] . "</td>";
                echo "<td class='date_time'>" . $row['date_time'] . "</td>";
                $url="delete_from_cart.php?id=" . $row['Medicine_id'] . "&username=" . $row['username'] . "&quantity=" . $row['quantity'] . "&sr_num=" . $row['sr.no'] ;
                echo "<td class='remove_from_cart'><a href='". $url . "'><button>Remove From cart</button></a>";
                echo "</td>";
                echo "&nbsp;";
                echo "</tr>";
            }
            echo "</td></tr>";
            echo "</tbody>";
            echo "</table>";
        }
        $total = "SELECT SUM(price_cost) as sum from user where username = ?";
        $res = mysqli_prepare($link, $total);
        mysqli_stmt_bind_param($res, "s", $username);
        mysqli_stmt_execute($res);
        $result = mysqli_stmt_get_result($res);
        $result = mysqli_fetch_assoc($result);
   ?>
   
   <div class="total-bill">
     <?php echo $result['sum']??'0';
     if(!isset($result['sum'])) {exit();} ?>
</div>
     
     <form action="Place_order.php">
         <button value = "submit" onclick="alert('your order is placed successfully')">Place Order</button>
     </form>
</h1>
</body>
</html>