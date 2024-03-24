<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

    if (isset($_POST["trainId"]) && isset($_POST["trainName"]) && isset($_POST["source"]) && isset($_POST["destination"]) && isset($_POST["time"]) && isset($_POST["date"]) && isset($_POST["trainnumber"])) {
 
        $trainId = $_POST["trainId"];
        $trainName = $_POST["trainName"];
        $source = $_POST["source"];
        $destination = $_POST["destination"];
        $trainumber = $_POST['trainnumber'];
        $time = $_POST["time"];
        $date = $_POST["date"];
    
        $sql = "UPDATE train SET train_Name=?, source=?, destination=?, time=?, date=?, train_number=? WHERE train_id=?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            
            $stmt->bind_param("ssssssi", $trainName, $source, $destination, $time, $date, $trainumber, $trainId);
            
            if ($stmt->execute()) {
                
                $stmt->close();
                $conn->close();
               
                header("Location: index.php");
                exit(); 
            } else {
                echo "Error updating train information: " . $stmt->error;
            }
        } else {
            echo "Error in preparing statement: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}
?>
