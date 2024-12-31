<?php
// Include database connection
include_once '../config/connect_db.php';

// Check if the request is POST and contains the necessary parameters
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['countryId']) && isset($_POST['newStatus'])) {
    $countryId = $_POST['countryId'];
    $newStatus = $_POST['newStatus'];

    // Validate inputs (to ensure only 'Active' or 'Inactive' values)
    if ($newStatus != 'Active' && $newStatus != 'Inactive') {
        echo "Invalid status";
        exit;
    }

    // Prepare SQL query to update the status
    $sql = "UPDATE NewCountries SET Status = ? WHERE CountryID = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $newStatus, $countryId);

        // Execute the query and check if successful
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
