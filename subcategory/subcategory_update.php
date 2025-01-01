<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once '../config/connect_db.php';

// Check CSRF token
if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $id = (int)$_POST['id'];
    $name = trim($_POST['name']);
    $scode = trim($_POST['scode']);
    $ccode = trim($_POST['ccode']);
    $desc = trim($_POST['desc']);
    $cby = trim($_POST['cby']);
    $status = isset($_POST['status']) ? 'Active' : 'Inactive';

    $img= null;

    // Handle file upload if a file is provided
    if (isset($_FILES['ImageFile']) && $_FILES['ImageFile']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['ImageFile'];
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed_types = ['png', 'svg'];

        if (in_array($extension, $allowed_types)) {
            // Use the original file name
            $original_name = basename($file['name']);
            $upload_path = ($extension === 'svg') ? '../assets/img/subcategory/svg/' : '../assets/img/subcategory/png/';
            $destination = $upload_path . $original_name;

            // Check if the file already exists
            if (file_exists($destination)) {
                die("Error: A file with the name '$original_name' already exists.");
            }

            // Move the uploaded file
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $img = $original_name;
            } else {
                die("Error: Failed to upload the file.");
            }
        } else {
            die("Error: Invalid file type. Only PNG and SVG are allowed.");
        }
    }

    $query = "UPDATE Subcategory SET SubcategoryName = ?, SubcategoryCode = ?, CategoryCode = ?, Description = ?, CreatedBy = ?, Status = ?";
    if ($img) {
        $query .= ", ImageFile = ?";
    }
    $query .= " WHERE SubcategoryID = ?";

    $stmt = $conn->prepare($query);
    if ($img) {
        $stmt->bind_param("sssssssi", $name, $scode, $ccode, $desc, $cby, $status, $img, $id);
    } else {
        $stmt->bind_param("ssssssi", $name, $scode, $ccode, $desc, $cby, $status, $id);
    }

    if ($stmt->execute()) {
        header("Location: subcategory_list.php?success=subcategory updated successfully.");
    } else {
        die("Error updating record: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: subcategory_list.php?success=Subcategory updated successfully.");
    exit();
}
