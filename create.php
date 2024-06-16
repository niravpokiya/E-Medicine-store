<?php
// Include config file
require_once "config.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_name = trim($_POST["name"]);
    $name = $input_name;
    $no_of_leaves = trim($_POST["leaves"]);
    $leaves = $no_of_leaves;
    $no_of_halfleaves = trim($_POST["half_leaves"]);
    $half_leaves = $no_of_halfleaves;
    $input_salary = trim($_POST["annual_salary"]);
    $salary = $input_salary;

    // Prepare an insert statement
    $sql = "INSERT INTO employees (name, leaves,half_leaves,annual_salary ) VALUES (?, ?, ?,?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "siii", $param_name, $param_leaves, $param_half_leaves, $param_salary);

        // Set parameters
        $param_name = $name;
        $param_leaves = $leaves;
        $param_half_leaves = $half_leaves;
        $param_salary=$salary;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records created successfully. Redirect to landing page
            header("location: ms_index.php?tablename=employees");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }


    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="update.css">
</head>
         <body>
         <h2>Create Record</h2>

         <p>Please fill this form and submit to add employee record to the database.</p>
         <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

         <label>Name</label>
         <input type="text" name="name">
         <label>Leaves</label>
         <input type="text" name="leaves">
         <label>Half Leaves</label>
         <input type="text" name="half_leaves">
         <label>Salary</label>
         <input type="text" name="annual_salary">
         <input type="submit" value="Submit">
         <a href="index.php">Cancel</a>
</form>
</body>
</html>
