<?php
require_once "config.php";
if(isset($_GET["tablename"]) && isset($_GET["password"]) && !empty(trim($_GET["password"])))
{
        $nameof=$_GET["tablename"];
        $pass=$_GET["password"];
        $sql="SELECT * FROM password WHERE name=? AND pass_word=?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name,$param_pass_word);

            // Set parameters
            $param_name=$nameof;
            $param_pass_word=$pass;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                   /*If result count is One it will go to $name in <ms_index></ms_index*/
                        
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
}
else {
echo "There is an Error";
}
 // Close statement
 mysqli_stmt_close($stmt);

 // Close connection
 mysqli_close($link);
?>
<a href='ms_index.php?tablename=<?php echo "$nameof";?> '>
<button>are YOU sure?</button>
</a>