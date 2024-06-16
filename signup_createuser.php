<?php 
require_once "config.php";
$username=trim($_GET['username']);
$password=trim($_GET['password']);
$user_id=trim($_GET['user_id']);

$sql = "SELECT * FROM user_signup WHERE user_id=? OR username=?";
if($stmt1 = mysqli_prepare($link, $sql))
{
    mysqli_stmt_bind_param($stmt1, "ss", $param1_user_id, $param1_username);
    $param1_username=$username;
    $param1_user_id=$user_id;
    if (mysqli_stmt_execute($stmt1)) {
        $result = mysqli_stmt_get_result($stmt1);
    }
    if(mysqli_num_rows($result)!=0)
    {
        echo "ALREADY SOMEONE CREATED IT";
        echo "<br>Please go to the signup .<a href=signup_index.php>lick here to go SIGNUP PAE</a>";
    }

}
if(mysqli_num_rows($result) == 0)
{
    $sql1="INSERT INTO user_signup (user_id,username,password) VALUES(?,?,?)";
if ($stmt = mysqli_prepare($link, $sql1)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sss", $param_user_id, $param_username, $param_password);

    // Set parameters
    $param_username=$username;
    $param_password=$password;
    $param_user_id =$user_id ;
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Records created successfully. Redirect to landing page
        header("location: medicine_cart.php?tablename=medicine");
        exit();
    } else {
        echo "Something went wrong. Please try again later.";
    }
}
}
?>