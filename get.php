<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
Your name is: <input type="text" name="username" /><br/><br/>
Your secret is: <input type="password" name="secret" /><br/><br/>
<input type="submit" value="Go"/>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["username"]) && isset($_GET["secret"])) {
        echo "Your name is: ", $_GET['username'], "<br/>";
        echo "Your secret is: ", $_GET['secret'], "<br/>";
        echo "Your secret is open. Check the url and see the query-string";}
}

?>
