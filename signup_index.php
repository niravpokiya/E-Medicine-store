<?php

require('signup_header.php');

$errors = [];
$inputs = [];

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {
    // show the form
    require('signup_get.php');
} elseif ($request_method === 'POST') {
    // handle the form submission
    require('signup_post.php');
    // show the form if the error exists
    if (count($errors) > 0) {
        require('signup_get.php');
    }
    
}

require('signup_footer.php');