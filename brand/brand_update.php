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
    $ccode = trim($_POST['ccode']);
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
            $upload_path = ($extension === 'svg') ? '../assets/img/brand/svg/' : '../assets/img/brand/png/';
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

    $query = "UPDATE Brands SET BrandName = ?, CountryName = ?, CreatedBy = ?, Status = ?";
    if ($img) {
        $query .= ", ImageFile = ?";
    }
    $query .= " WHERE BrandID = ?";

    $stmt = $conn->prepare($query);
    if ($img) {
        $stmt->bind_param("sssssi", $name, $ccode, $cby, $status, $img, $id);
    } else {
        $stmt->bind_param("ssssi", $name, $ccode, $cby, $status, $id);
    }

    if ($stmt->execute()) {
        header("Location: brand_list.php?success=brand updated successfully.");
    } else {
        die("Error updating record: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: brand_list.php?success=brand updated successfully.");
    exit();
}
