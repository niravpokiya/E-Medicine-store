<?php
   $servername = "localhost";
   $username = "root";
   $pass = "";
   $database = "usersinfo";

   $conn = mysqli_connect($servername, $username, $pass, $database);
   if(!$conn)
   echo "There is something issue with server try again later.";
?>