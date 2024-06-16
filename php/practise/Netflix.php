<?php
$servername = "localhost";
$username = "root";
$pass = "";
$database = "emails";
$conn = mysqli_connect($servername, $username, $pass, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $sql = "INSERT INTO `emailstore`(`emails`) VALUES('$email')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Email inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
