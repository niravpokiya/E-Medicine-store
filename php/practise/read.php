<?php
// Include config file
require_once "config.php";

// Attempt select query execution
$sql = "SELECT * FROM table2 WHERE salary>1000000";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table border = "1" bgcolor="cyan">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Position</th>";
        echo "<th>Salary</th>";
        echo "<th>Skills</th>";
        echo "<th>Employee ID</th>";
        echo "<th>Hiring Date</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Position'] . "</td>";
            echo "<td>" . $row['salary'] . "</td>";
            echo "<td>" . $row['skills'] . "</td>";
            echo "<td>" . $row['employee ID'] . "</td>";
            echo "<td>" . $row['Hiring Date'] . "</td>";
            echo "</tr>";
        }
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

// Close connection
mysqli_close($link);

?>
