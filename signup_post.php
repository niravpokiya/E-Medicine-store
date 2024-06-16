
<?php

const NAME_REQUIRED = 'Please enter your name';
const EMAIL_REQUIRED = 'Please enter your email';
const EMAIL_INVALID = 'Please enter a valid email';
const PASSWORD_REQUIRED='Please enter a password';

// sanitize and validate name
$name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$inputs['name'] = $name;

if ($name) {
    $name = trim($name);
    if ($name === '') {
        $errors['name'] = NAME_REQUIRED;
    }
} else {
    $errors['name'] = NAME_REQUIRED;
}


// sanitize & validate email
$email = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
if ($email) {
    // validate email
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        $errors['email'] = EMAIL_INVALID;
    }
} else {
    $errors['email'] = EMAIL_REQUIRED;
}
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_EMAIL);
$inputs['password'] = $password;
if ($password) {
   
} else {
    $errors['password'] = PASSWORD_REQUIRED;
}
?>

<?php if (count($errors) === 0) {

    $url= 'signup_createuser.php?username='.$inputs['name'].'&user_id='.$inputs['email'].'&password='.$inputs['password'];
    header('Location: '. $url);

}

    ?>
    
