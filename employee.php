<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
<?php
session_start();
if(isset($_GET['password']) &&  $_GET['password']=='emp@123')
{
    require_once 'config.php';
    $_SESSION['employee_password']= $_GET['password'];
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
exit();
}
else{
    $msg= "Incorret password";
    $url="index.php?msg=" .$msg;
    header('Location: ' . $url);
}
?>
</body>
</html>