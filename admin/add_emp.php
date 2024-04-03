<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['emp_id']) && !empty($_POST['emp_name']) && !empty($_POST['emp_number'])) {
        $emp_id = $_POST['emp_id'];
        $emp_name = $_POST['emp_name'];
        $emp_number = $_POST['emp_number'];
        $emp_mail=$_POST['email'];
        $emp_salary=$_POST['salary'];
        $emp_role=$_POST['role'];

        $sql = "INSERT INTO employee (emp_id, emp_name, emp_number,email,emp_salary,emp_role) VALUES ('$emp_id', '$emp_name', '$emp_number','$emp_mail','$emp_salary','$emp_role')";

        if ($conn->query($sql) === TRUE) {
         
            header("Location: index.php"); 
            exit();
        } else {
            echo "Error adding employee: " . $conn->error;
        }
    } else {
     
    }

    $conn->close();
}
?>