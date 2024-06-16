<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Insert.php" method="POST">
        <label for="name">name</label>
        <input type="text" name="name" id="name">
        <label for="email">email</label>
        <input type="email" name="email" id="email">
        <label for="pass">password : </label>
        <input type="password" name="pass" id="pass">
        <label for="des">Enter description</label>
         <textarea name="des" id="des" cols="30" rows="10" placeholder="Enter about yourself"></textarea>
         <input type="submit" value="submit">
    </form>
    <h4>for updating your name from our website</h4>
    <form action="Delete.php" method ="POST">
    <label for="name">name</label>
        <input type="text" name="name" id="name">
        <label for="des">Enter description</label>
        <textarea name="des" id="des" cols="30" rows="10" placeholder="Enter about yourself"></textarea>
        <input type="submit" value="submit">
    </form>
</body>
</html>