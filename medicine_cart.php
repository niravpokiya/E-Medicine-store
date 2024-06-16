<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicines</title>
    <link rel="stylesheet" href="medicine_cart.css">
</head>
<body>
    <div class="header">
        <h1>Available Medicines</h1>
    <?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        echo "<h4 style='color:red;'>Please login or sign in to continue</h4>"."<br>";
        echo "<a class='login' href='login_index.php'> Login </a><br>";
        echo "<a href='signup_index.php'> Sign up </a>";
        exit();
    }
    
?>
        <Button onclick="Cart()">Show Your Cart </Button>
</div>
    <!-- $_GET["tablename"]=="medicine" && isset($_GET["tablename"]) -->
<label for="Search">Search  </label>
<input type="text" id="Search" onkeyup="Search()" placeholder="Search...">
 
<form action="logout.php">
   <button type="submit">Log out</button>
</form>
<?php
require_once "config.php"; 
if(isset($_SESSION['username'])){
    $sql = "SELECT * FROM medicines";
    echo "<br>";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table id = "Medicines">';
        echo "<thead>";
        echo " ";
        echo "<th>Medicine Id</th>";
        echo "<th>Medicine Name</th>";
        echo "<th>Disease</th>";
        echo "<th id='type'>Type</th>";
        echo "<th>Price </th>";
        echo "<th>In Stock</th>";
        echo "<th width=320>Buy Now </th>";
        echo " ";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td class='medicine_id'>" . $row['Medicine_id'] . "</td>";
            echo "<td class='medicine_name'>" . $row['Medicine_name'] . "</td>";
            echo "<td class='disease'>" . $row['Diseases'] . "</td>";
            echo "<td class='type'>" . $row['Type'] . "</td>";
            echo "<td class='selling_price'>" . $row['selling_price'] . "</td>";
            echo "<td class='instock'>" . $row['in_stock'] . "</td>";
            echo "<td>";
            if($row['in_stock'] > 0){
            echo "<form action='User_Purchased.php' method='GET'>";
            echo "<input type='hidden' name='user' value='" . $_SESSION['username']."'>";
            echo "<input type='hidden' name='medicineid' value='" . $row['Medicine_id'] . "'>";
            echo "Quantity : <input type='number' min='1' max='".$row['in_stock']."' name = 'stock'>";
            echo "      ";
            echo "<button type='submit' >Add to Cart</button>"; 
            echo "</form>";
               
            }
            else{
                echo "<button type='submit' disabled>Add to Cart</button>";
               echo "<h4 style='color : red;'>out of stock!</h4>";
            }
            $id = $row['Medicine_id'];
            $username = $_SESSION['username'];
            $query_inner = "SELECT * FROM user WHERE username = ? AND Medicine_id = ?";
            $stmt_inner = mysqli_prepare($link, $query_inner);
            mysqli_stmt_bind_param($stmt_inner, "sd", $username, $id);
            mysqli_stmt_execute($stmt_inner);
            $result_inner = mysqli_stmt_get_result($stmt_inner);
            $num  = mysqli_num_rows($result_inner);
            if ($num) {
                echo "<small style='color:green;'> Already added to cart </small>";
            }
           
            echo "&nbsp;";
            echo "</td>";
            echo "</tr>";
        }
        echo "<tr><td colspan=9>";
        echo "<a href=''><button disabled></button></a>";
        echo "</td></tr>";
        echo "</tbody>";
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo '<em>No records were found.</em>';
    }
}  else {
    echo "Oops! Something went wrong. Please try again later.";
}
}
?>
<script src = "medicine_cart.js"></script>
</body>
</html>