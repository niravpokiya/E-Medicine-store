<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
<?php
// Include config file
require_once "config.php";
session_start();
if(!isset($_SESSION['admin_password']))
{
    echo "<h1 style='margin:50px;'>PLEASE ENTER  PASSWORD TO LOGIN INTO ADMIN</h1>";
   
    echo " <form action='admin_session.php' method='get' class='form_admin'>";
    echo "<input type='password' name='admin_password'>";
    echo "<div class='buttontotherow'><button type='submit'>LOGIN</button><div>";
    echo"</form>";
}
else
{
    echo "<form action='logout.php' method='get'><button type=submit class=''>LOGOUT</button></form>";
if(isset($_GET["tablename"]) && $_GET["tablename"]=="employees"){
    echo"<div class='buttontotherow'>";
    echo"<div><form action='admin.php' method=get>"; 
    echo "<input type='text' value='cart' name='tablename' id='tablename' hidden>";
    echo"<button type='submit'>&#8592;View Medicine Cart</button>";
    echo"</form></div>";
    echo"<div><form action='admin.php' method=get>"; 
    echo "<input type='text' value='orders' name='tablename' id='tablename' hidden>";
    echo"<button type='submit'>View Orders&#8594;</button>";
    echo"</form></div></div>";
    $sql = "SELECT * FROM employees";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo " <h1>Information Of Employees</h1>";
        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Name</th>";
        echo "<th>Absent Days</th>";
        echo "<th>Leaves</th>";
        echo "<th>Half Leaves</th>";
        echo "<th>Remaining Leaves</th>";
        echo "<th>Annual salary</th>";
        echo "<th>Loss Of pay</th>";
        echo "<th width=320>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['absent_days'] . "</td>";
            echo "<td>" . $row['leaves'] . "</td>";
            echo "<td>" . $row['half_leaves'] . "</td>";
            echo "<td>" . $row['Remaining_leaves'] . "</td>";
            echo "<td>" . $row['annual_salary'] . "</td>";
            echo "<td>" . $row['loss_of_pay'] . "</td>";
            echo "<td>";
            echo "<a href='read.php?id=" . $row['id'] ."'>View Record </a>";
            echo "&nbsp;";
            echo "<a href='update.php?id=" . $row['id'] . "'>Update Record </a>";
            echo "&nbsp;";
            echo "<a href='delete.php?id=" . $row['id'] . "'>Delete Record </a>";
            echo "&nbsp;";
            echo "</td>";
            echo "</tr>";
        }
        echo "<tr><td colspan=9>";
        echo "<a href='create.php' id='create'>Create Record</a>";
        echo "</td></tr>";
        echo "</tbody>";
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo '<em>No records were found.</em>';
    }
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

}
else if(isset($_GET["tablename"]) && $_GET["tablename"]=="orders"){
    echo"<div class='buttontotherow'>";
    echo"<div><form action='admin.php' method=get>"; 
    echo "<input type='text' value='employees' name='tablename' id='tablename' hidden>";
    echo"<button type='submit'>&#8592;View The Employees</button>";
    echo"</form></div>";
    echo"<div><form action='admin.php' method=get>"; 
    echo "<input type='text' value='cart' name='tablename' id='tablename' hidden>";
    echo"<button type='submit'>View Medicine Cart&#8594;</button>";
    echo"</form></div></div>";
    $sql = "SELECT * FROM orders";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo" <h1>Orders</h1>";
        echo '<table>';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Order Number</th>";
        echo "<th>User Name </th>";
        echo "<th>Medicine ID </th>";
        echo "<th>Medicine Name </th>";
        echo "<th>Quantity</th>";
        echo "<th>Cost </th>";
        echo "<th>Date and Time</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['order_no'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['medicine_id'] . "</td>";
            echo "<td>" . $row['medicine_name'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['Cost'] . "</td>";
            echo "<td>" . $row['datetime'] . "</td>";
            // echo "<td>";
            // echo "<a href='read.php?id=" . $row['id'] ."'>View Record </a>";
            // echo "&nbsp;";
            // echo "<a href='update.php?id=" . $row['id'] . "'>Update Record </a>";
            // echo "&nbsp;";
            // echo "<a href='delete.php?id=" . $row['id'] . "'>Delete Record </a>";
            // echo "&nbsp;";
            // echo "</td>";
            echo "</tr>";
        }
        echo "<tr><td colspan=9>";
        // echo "<a href='create.php' id='create'>Create Record</a>";
        echo "</td></tr>";
        echo "</tbody>";
        echo "</table>";
 
        // Free result set
        mysqli_free_result($result);
    } else {
        echo '<em>No records were found.</em>';
    }
} else {
    echo "Oops! Something went wrong. Please try again later.";
}
}
else if(isset($_GET["tablename"]) && $_GET["tablename"]=="cart"){
    if(1){
        echo"<div class='buttontotherow'>";
        echo"<div><form action='admin.php' method=get>"; 
        echo "<input type='text' value='orders' name='tablename' id='tablename' hidden>";
        echo"<button type='submit'>&#8592;View Orders</button>";
        echo"</form></div>";
        echo"<div><form action='admin.php' method=get>"; 
        echo "<input type='text' value='employees' name='tablename' id='tablename' hidden>";
        echo"<button type='submit'>View the Employee    s&#8594;</button>";
        echo"</form></div></div>";
        $sql = "SELECT * FROM medicines";
        echo "<br>";
       // echo "<small id='small'>default it sets quantity to 1</small>";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table id = "Medicines">';
            echo "<thead>";
            echo " ";
            echo "<th>Medicine Id</th>";
            echo "<th>Medicine Name</th>";
            echo "<th>Disease</th>";
            echo "<th>Price </th>";
            echo "<th>Total Stock</th>";
            echo "<th>In Stock</th>";
            echo "<th>Update</th>";
            echo " ";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td class='medicine_id'>" . $row['Medicine_id'] . "</td>";
                echo "<td class='medicine_name'>" . $row['Medicine_name'] . "</td>";
                echo "<td class='disease'>" . $row['Diseases'] . "</td>";
                echo "<td class='selling_price'>" . $row['selling_price'] . "</td>";
                echo "<td class='selling_price'>" . $row['total_stock'] . "</td>";
                echo "<td class='instock'>" . $row['in_stock'] . "</td>";
                echo "<td>";
                echo "<a href='update_stock.php?id=" . $row['Medicine_id'] . "'>Update or View Medicine</a>";
                echo "&nbsp;";
                echo "</td>";
                echo "</tr>";
            }
            echo "<tr><td colspan=9>";
            echo "<a href='create_medicine.php?tablename=medicine'>Create Record</a>";
            echo "</td></tr>";
            echo "</tbody>";
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else {
            echo '<em>No records were found.</em>';
        }
    }  else {
        echo "Oops! Something went wrong. Please try again later.";
    }
  
}
}
else
    {

    echo"<div class='buttontotherow' id='all'>";
    echo"<div><form action='admin.php' method=get>"; 
    echo "<input type='text' value='employees' name='tablename' id='tablename' hidden>";
    echo"<button type='submit'>View The Employees</button>";
    echo"</form></div>";
    echo"<div><form action='admin.php' method=get>"; 
    echo "<input type='text' value='orders' name='tablename' id='tablename' hidden>";
    echo"<button type='submit'>View Orders</button>";
    echo"</form></div>";
    echo"<div><form action='admin.php' method=get>"; 
    echo "<input type='text' value='cart' name='tablename' id='tablename' hidden>";
    echo"<button type='submit'>View Medicine Cart</button>";
    echo"</form></div></div>";
exit();

}

// $url_order='admin.php?tablename=orders';
mysqli_close($link);
}
?>

</body>
</html>
 