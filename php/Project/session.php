<?php

//by varifying user login info
session_start();
$_SESSION['username'] = "Nirav";
$_SESSION['fav'] ="this is fav...";
echo  "your information is stored successfully."
 ?>