<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
     <h1>Information Of Employees</h1>
<?php
// Include config file
require_once "config.php";

if(isset($_GET["tablename"]) && $_GET["tablename"]=="employees"){
    $sql = "SELECT * FROM employees";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
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
mysqli_close($link);
?>
</body>
</html>
 