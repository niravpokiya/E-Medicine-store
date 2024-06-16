<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "information";
$conn = mysqli_connect($server,$user,$pass,$database);
$sql="SELECT * FROM `loginform`";
$res = mysqli_query($conn, $sql);
$num = mysqli_num_rows($res);
echo $num."<br>";
while($info = mysqli_fetch_assoc($res))
{
    echo "Name:".$info['Name']."\t \t ";
    echo $info['Email']."     ,     ";
    echo $info['Password']. "   ,     ";
    echo $info['About'];
    echo" <br>";
}
?>