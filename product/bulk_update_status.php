<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../config/connect_db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['ids'], $data['status'])) {
    $ids = $data['ids']; 
    $status = $data['status'];

    if (!in_array($status, ['Active', 'Inactive'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid status value']);
        exit;
    }

    if (!$conn) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
        exit;
    }

    try {

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "UPDATE Products SET Status = ? WHERE ProductID IN ($placeholders)";
        
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare SQL statement: ' . $conn->error);
        }

        $stmt->bind_param(str_repeat('s', count($ids) + 1), $status, ...$ids);

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