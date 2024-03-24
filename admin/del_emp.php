<?php
include("db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["emp_id"])) {
        $Id = $_POST["emp_id"];
        $sql = "DELETE FROM employee WHERE emp_id = '$Id'";

        if ($conn->query($sql) === TRUE) {
            echo "Employee Deleted: ID - $Id";
            header("Location: index.php"); // Redirect to index.php after deleting an employee
            exit();
        } else {
            echo "Error deleting employee: " . $conn->error;
        }
    } else {
        // echo "Employee ID is empty.";/
    }

    $conn->close();
}

?>