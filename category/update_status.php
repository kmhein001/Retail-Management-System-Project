<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../config/connect_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['generalid']) && isset($_POST['newstatus'])) {
    $id = $_POST['generalid'];
    $status = $_POST['newstatus'];

    // Validate inputs
    if (!in_array($status, ['Active', 'Inactive'])) {
        echo "Invalid status";
        exit;
    }

    // Prepare and execute SQL query
    $sql = "UPDATE Category SET Status = ? WHERE CategoryID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $status, $id);
        if ($stmt->execute()) {
            echo "Status updated successfully";
        } else {
            echo "Error updating status: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid request. Missing parameters.";
}
?>
