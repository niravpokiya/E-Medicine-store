<?php
const NAME_REQUIRED = 'Please enter your username';
const NAME_NOT_EXIST='This username does not exist please signup or check the username.';
const PASSWORD_REQUIRED='Please enter a password';
const PASSWORD_INCORRECT='Password is in correct';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION['username'] = $_POST["username"];
    $_SESSION['password'] = $_POST["password"];

    if(empty($_SESSION['username'])) {
        $errors['username'] = NAME_REQUIRED;
    } else {
        $name = $_SESSION['username'];
        require_once "config.php";
        $sql = "SELECT * FROM user_signup WHERE username=?";
        if($stmt1 = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt1, "s", $param1_username);
            $param1_username = $name;

            if(mysqli_stmt_execute($stmt1)) {
                $result = mysqli_stmt_get_result($stmt1);
                if(mysqli_num_rows($result) == 0) {
                    $errors['username'] = NAME_NOT_EXIST;
                } else {
                    if(empty($_SESSION['password'])) {
                        $errors['password'] = PASSWORD_REQUIRED;
                    } else {
                        // Compare the password entered in the form with the one stored in the database
                        $password = $_SESSION['password'];
                        $row = mysqli_fetch_assoc($result);
                        if($password != $row['password']) {
                            $errors['password'] = PASSWORD_INCORRECT;
                        }
                    }
                }
            } else {
                // Handle query execution error
                $errors['username'] = "Error executing query: " . mysqli_stmt_error($stmt1);
            }
        } else {
            // Handle prepare statement error
            $errors['username'] = "Error preparing statement: " . mysqli_error($link);
        }
    }
 }
 
   if(count($errors) === 0)
   {
    header('Location: medicine_cart.php?tablename=medicines');
   }
?>
