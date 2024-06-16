<?php
echo "Let's try to eshtablish Connection with Mysqli database <br>";
$servername="localhost";
$username="root";
$password="";
//connecting with database
$conn = Mysqli_connect($servername,$username,"");
if(!$conn)
{
    die("sorry we can't connect you done something unexpected check your code again");
}
else
echo "connection is eshtablished";
?>