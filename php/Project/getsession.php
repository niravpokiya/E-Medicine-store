<?php
session_start();
  if(isset($_SESSION['username'])){
 echo "your username is". $_SESSION['username']."<br>";}
 else{
    echo "please login to continue...";
 }
?>