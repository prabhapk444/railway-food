<?php
include("db_connect.php");

$sql = "SELECT SUM(price) AS price FROM orders";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_amount = $row['price'];

    $commission = $total_amount * 0.30;

    $final_amount = $total_amount - $commission;

    $formatted_total_amount = "₹" . number_format($total_amount, 2);
    $formatted_commission = "₹" . number_format($commission, 2);
    $formatted_final_amount = "₹" . number_format($final_amount, 2);
    echo "<div style='font-family: Times New Roman, sans-serif; background-color: #f4f4f4; padding: 20px; border-radius: 5px;'>";
    echo "<h3 style='color: #333;'>Total Amount: <span style='font-weight: bold; color: #f00;'>$formatted_total_amount</span></h3>";
    echo "<h3 style='color: #333;'>Commission 30%: <span style='font-weight: bold; color: #f00;'>$formatted_commission</span></h3>";
    echo "</div>";
} else {
    echo "<p style='color: #f00;'>No orders found.</p>";
}

$conn->close();
?>
