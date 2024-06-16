<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
         body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        small {
            color: red;
            display: block;
            margin-top: 5px;
        }
        button[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        </style>
</head>
<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">    
<header>
        <h1>LOGIN PAGE</h1>
    </header>
    <div>
        <label for="name">Name:</label>
        <input type="text" name="username" id="username" placeholder="Write Your username" value="<?php echo $_SESSION['username'] ?? '' ?>">
        <small><?php echo $errors['username'] ?? '' ?></small>
    </div>
  
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Input your password here" value="<?php echo $_SESSION['password'] ?? '' ?>">
        <small><?php echo $errors['password'] ?? '' ?></small>
    </div>
    <button type="submit">LOG IN</button>
</form>


