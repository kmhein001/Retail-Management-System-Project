<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../config/connect_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['countryId']) && isset($_POST['newStatus'])) {
    $countryId = $_POST['countryId'];
    $newStatus = $_POST['newStatus'];

    // Validate inputs
    if (!in_array($newStatus, ['Active', 'Inactive'])) {
        echo "Invalid status";
        exit;
    }

    // Prepare and execute SQL query
    $sql = "UPDATE NewCountries SET Status = ? WHERE CountryID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $newStatus, $countryId);
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
