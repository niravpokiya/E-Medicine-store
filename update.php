<?php
// Include config file
require_once "config.php";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    $name = $input_name;

    $input_leaves = trim($_POST["leaves"]);
    $leaves = $input_leaves;
    $input_half_leaves = trim($_POST["half_leaves"]);
    $half_leaves = $input_half_leaves;

    $input_salary = trim($_POST["annual_salary"]);
    $salary = $input_salary;

    $sql = "UPDATE employees SET name=?, leaves=?, half_leaves=?,annual_salary=? WHERE id=?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "siiii", $param_name, $param_leaves,$param_half_leaves, $param_salary, $param_id);

        // Set parameters
        $param_name = $name;
        $param_leaves = $leaves;
        $param_half_leaves=$half_leaves;
        $param_salary = $salary;
        $param_id = $id;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records updated successfully. Redirect to landing page
            header("location: ms_index.php?tablename=employees");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        } 
    };

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $name = $row["name"];
                    $leaves = $row["leaves"];
                    $half_leaves=$row["half_leaves"];
                    $salary = $row["annual_salary"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <div class="container">
        <h2>Update Record</h2>
        <p>Please edit the input values and submit to update the record.</p>
        <form action="<?php echo basename($_SERVER['REQUEST_URI']);?>" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $name;?>">

            <label for="leaves">Leaves</label>
            <input type="number" name="leaves" id="leaves" value="<?php echo $leaves;?>">

            <label for="halfLeaves">Half Leaves</label>
            <input type="number" name="half_leaves" id="halfLeaves" value="<?php echo $half_leaves;?>">

            <label for="annualSalary">Salary</label>
            <input type="number" name="annual_salary" id="annualSalary" value="<?php echo $salary;?>">

            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <input type="submit" value="Submit">
            <a href="ms_index.php?tablename=employees">Cancel</a>
        </form>
    </div>
</body>
