
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
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <header>
        <h1>SIGNUP PAGE</h1>
        <h4>Please remember your name and password entered</h4>
    </header>
    <div>
        <label for="name">Name:</label>
        <input type="text" name="username" id="username" placeholder="Full Name" value="<?php echo $inputs['name'] ?? '' ?>">
        <small><?php echo $errors['name'] ?? '' ?></small>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="text" name="user_id" id="user_id" placeholder="Email Address" value="<?php echo $inputs['email'] ?? '' ?>">
        <small><?php echo $errors['email'] ?? '' ?></small>
    </div>
    <div>
        <label for="email">Password:</label>
        <input type="text" name="password" id="password" placeholder="Email Address" value="<?php echo $inputs['email'] ?? '' ?>">
   </div>
    <button type="submit">SIGN UP</button>
</form>
<body>
    <!-- Your PHP form goes here -->
</body>
</html>