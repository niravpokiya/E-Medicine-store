<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Your name is: <input type="text" name="username" /><br/><br/>
Your secret is: <input type="password" name="secret" /><br/><br/>
<input type="submit" value="Go"/>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["secret"])) {
        echo "Your name is: ", $_POST['username'], "<br/>";
        echo "Your secret is: ", $_POST['secret'], "<br/>";
        echo "Your secret isn't open, yet. Check the url and see the query-string";}
}

?>