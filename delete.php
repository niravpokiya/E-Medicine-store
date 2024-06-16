<?php
// Process delete operation after confirmation
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Include config file
    require_once "config.php";

    // Prepare a delete statement
    $sql = "DELETE FROM employees WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_POST["id"]);

        // Attempt to execu te the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records deleted successfully. Redirect to landing page
            header("location: ms_index.php?tablename=employees");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter
    if (empty(trim($_GET["id"]))) {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

       .container {
            width: 80%;
            margin: 2rem auto;
            background-color: #fff;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            margin-top: 0;
        }

        form {
            margin-top: 1rem;
        }

        form input[type="submit"] {
            padding: 0.5rem;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        form a {
            padding: 0.5rem;
            background-color: #e3342f;
            color: #fff;
            text-decoration: none;
            border-radius: 0.25rem;
            transition: background-color 0.3s;
        }

        form a:hover {
            background-color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delete Record</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]);?>"/>
            <p>Are you sure you want to delete this record?</p>
            <br/>
            <p>
                <input type="submit" value="Yes">
                <a href="ms_index.php?tablename=employees">No</a>
            </p>
        </form>
    </div>
</body>
</html>
