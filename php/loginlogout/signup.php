<?php
require_once "connection.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST['Email'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO logindetails (`Email`, `Username`, `Password`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $username, $password);
    
    // Execute the statement
    $stmt->execute();
    header("location: index.php");
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
    <form action="signup.php" method="post">
        <label for="Email">Email:</label>
        <input type="email" name="Email" id="Email" required>
        <label for="Username">Username :</label>
        <input type="text" id="Username" name="Username" required>
        <label for="Password">Password :</label>
        <input type="password" name="Password" id="Password" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>