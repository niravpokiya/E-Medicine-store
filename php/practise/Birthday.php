<?php
$birthday = strtotime("2006-09-28");
$today = time();
$diff = $today - $birthday;
$days = floor($diff / (60 * 60 * 24));
echo "Number of days until your birthday: $days days";
?>
    