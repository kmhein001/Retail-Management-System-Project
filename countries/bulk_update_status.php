<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../config/connect_db.php';

// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

// Validate the received data
if (isset($data['ids'], $data['status'])) {
    $ids = $data['ids']; // Array of selected CountryIDs
    $status = $data['status']; // New status (Active or Inactive)

    // Validate the status value
    if (!in_array($status, ['Active', 'Inactive'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid status value']);
        exit;
    }

    // Check database connection
    if (!$conn) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
        exit;
    }

    try {
        // Prepare the SQL statement
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "UPDATE NewCountries SET Status = ? WHERE CountryID IN ($placeholders)";
        
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare SQL statement: ' . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param(str_repeat('s', count($ids) + 1), $status, ...$ids);

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Bulk status updated successfully']);
        } else {
            throw new Exception('Execution failed: ' . $stmt->error);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        $stmt->close();
        $conn->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request data']);
}
?>