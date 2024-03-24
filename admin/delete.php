<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["trainId"])) {
       
        $trainId = $_POST["trainId"];
        $sql = "DELETE FROM train WHERE train_id = ?";
        $stmt = $conn->prepare($sql);
        
        if($stmt) {
           
            $stmt->bind_param("i", $trainId);
            
           
            if ($stmt->execute()) {
                
                $stmt->close();
           
                $conn->close();
              
                header("Location: index.php");
                exit();
            } else {
                echo "Error deleting train: " . $stmt->error;
            }
        } else {
            echo "Error in preparing statement: " . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        echo "Train ID is required.";
    }
}
?>
