<?php
include("db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['update_emp_id']) && !empty($_POST['update_emp_name']) && !empty($_POST['update_emp_number'])) {
        $emp_id = $_POST['update_emp_id'];
        $emp_name = $_POST['update_emp_name'];
        $emp_number = $_POST['update_emp_number'];
        $email=$_POST['email'];

        $sql = "UPDATE employee SET emp_name='$emp_name', emp_number='$emp_number',email='$email' WHERE emp_id='$emp_id'";

        if ($conn->query($sql) === TRUE) {
            // echo "Employee Updated: ID - $emp_id, Name - $emp_name, Number - $emp_number";
            header("Location: index.php"); // Redirect to index.php after updating an employee
            exit();
        } else {
            echo "Error updating employee: " . $conn->error;
        }
    } else {
        // echo "One or more form fields are empty.";
    }

    $conn->close();
}

?>