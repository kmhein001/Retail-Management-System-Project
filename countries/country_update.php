<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once '../config/connect_db.php';

// Check CSRF token
if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    $id = (int)$_POST['country_id'];
    $name = trim($_POST['name']);
    $iso_code = trim($_POST['iso_code']);
    $isd_code = trim($_POST['isd_code']);
    $time_zone = trim($_POST['time_zone']);
    $status = isset($_POST['status']) ? 'Active' : 'Inactive';

    $flag_image = null;

    // Handle file upload if a file is provided
    if (isset($_FILES['flag_image']) && $_FILES['flag_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['flag_image'];
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed_types = ['png', 'svg'];

        if (in_array($extension, $allowed_types)) {
            // Use the original file name
            $original_name = basename($file['name']);
            $upload_path = ($extension === 'svg') ? '../assets/img/flag/svg/' : '../assets/img/flag/png/';
            $destination = $upload_path . $original_name;

            // Check if the file already exists
            if (file_exists($destination)) {
                die("Error: A file with the name '$original_name' already exists.");
            }

            // Move the uploaded file
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $flag_image = $original_name;
            } else {
                die("Error: Failed to upload the file.");
            }
        } else {
            die("Error: Invalid file type. Only PNG and SVG are allowed.");
        }
    }


    $query = "UPDATE NewCountries SET CountryName = ?, Iso_Code = ?, Isd_Code = ?, Time_Zone = ?, Status = ?";
    if ($flag_image) {
        $query .= ", Flag_Image = ?";
    }
    $query .= " WHERE CountryID = ?";

    $stmt = $conn->prepare($query);
    if ($flag_image) {
        $stmt->bind_param("ssssssi", $name, $iso_code, $isd_code, $time_zone, $status, $flag_image, $id);
    } else {
        $stmt->bind_param("sssssi", $name, $iso_code, $isd_code, $time_zone, $status, $id);
    }

    if ($stmt->execute()) {
        header("Location: country_list.php?success=Country updated successfully.");
    } else {
        die("Error updating record: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: country_list.php");
    exit();
}
