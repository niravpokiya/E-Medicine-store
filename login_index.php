<?php
$errors = [];
$inputs = [];
session_start();
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {
    // show the form
    require('login_get.php');
} elseif ($request_method === 'POST') {
    // handle the form submission
    require('login_post.php');
    // show the form if the error exists
    if (count($errors) > 0) {
        require('login_get.php');
    }
    
}
