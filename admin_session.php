<?php

if(isset($_GET['password']) && $_GET['password']=='admin@123')
{
    session_start();
    $_SESSION['admin_password']='admin@123';
    header('Location: admin.php');
}
else {
    header('Location: index.php?msg=incorrect password');
}
?>
    