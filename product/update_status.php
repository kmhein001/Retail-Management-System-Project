<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../config/connect_db.php';
include_once 'product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['generalid']) && isset($_POST['newstatus'])) {
    $id = $_POST['generalid'];
    $status = $_POST['newstatus'];

    if (!in_array($status, ['Active', 'Inactive'])) {
        echo "Invalid status";
        exit;
    }

    $table_name = $F_SQL;     
    $column_id = $SQL_1; 

    $sql = "UPDATE $table_name SET Status = ? WHERE $column_id = ?";
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
