<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['emp_id']) && !empty($_POST['emp_name']) && !empty($_POST['emp_number'])) {
        $emp_id = $_POST['emp_id'];
        $emp_name = $_POST['emp_name'];
        $emp_number = $_POST['emp_number'];
        $emp_mail=$_POST['email'];

        $sql = "INSERT INTO employee (emp_id, emp_name, emp_number,email) VALUES ('$emp_id', '$emp_name', '$emp_number','$emp_mail')";

        if ($conn->query($sql) === TRUE) {
            // echo "New Employee Added: ID - $emp_id, Name - $emp_name, Number - $emp_number";
            header("Location: index.php"); // Redirect to index.php after adding an employee
            exit();
        } else {
            echo "Error adding employee: " . $conn->error;
        }
    } else {
        // echo "One or more form fields are empty.";
    }

    $conn->close();
}
?>