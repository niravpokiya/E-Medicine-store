<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM logindetails where Username = ? and Password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the username and password combination is correct
    if ($result->num_rows > 0) {
        // Username and password combination is correct, redirect to index.php
        header("location: index.php");
        exit();
    } else {
        // Username and password combination is incorrect, redirect to signin.php with error message
        header("location: signin.php");
        echo "Username or password is incorrect.";
       
    }

    // Close the statement
    $stmt->close();
    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="signin.php" method="post">
        <label for="Username">Username :</label>
        <input type="text" id="Username" name="Username" required>
        <label for="Password">Password :</label>
        <input type="password" name="Password" id="Password" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
