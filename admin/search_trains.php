<?php
include("./db_connect.php");

if (isset($_POST['searchQuery'])) {
    $searchQuery = $_POST['searchQuery'];
    $query = "SELECT train_name FROM train WHERE train_name LIKE '%$searchQuery%'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<p>' . $row['train_name'] . '</p>';
        }
    } else {
        echo '<p>No trains found</p>';
    }
} else {
    echo '<p>No search query provided</p>';
}

mysqli_close($conn);
?>
