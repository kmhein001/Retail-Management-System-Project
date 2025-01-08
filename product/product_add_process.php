<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include_once '../config/connect_db.php';
include_once 'product.php'; // Ensure this file defines necessary variables like $N_name, $N_sku, etc.

// Function to sanitize input
function sanitize_input($data)
{
    return strip_tags(trim($data));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize and assign variables
    $name = isset($_POST[$N_name]) ? sanitize_input($_POST[$N_name]) : '';
    $sku = isset($_POST[$N_sku]) ? sanitize_input($_POST[$N_sku]) : '';
    $bname = isset($_POST[$N_bname]) ? (int)$_POST[$N_bname] : 0; // BrandID as integer
    $cname = isset($_POST[$N_cname]) ? (int)$_POST[$N_cname] : 0; // CategoryID as integer
    $sname = isset($_POST[$N_sname]) ? (int)$_POST[$N_sname] : 0; // SubcategoryID as integer
    $price = isset($_POST[$N_price]) ? floatval($_POST[$N_price]) : 0.0;
    $qty = isset($_POST[$N_qty]) ? (int)$_POST[$N_qty] : 0;
    $unit = isset($_POST[$N_unit]) ? (int)$_POST[$N_unit] : 0; // UnitID as integer
    $cby = isset($_POST[$N_cby]) ? sanitize_input($_POST[$N_cby]) : '';
    $status = isset($_POST[$N_status]) ? 'Active' : 'Inactive';


    // Validate required fields
    if (empty($name) || empty($sku) || $bname === 0 || $cname === 0 || $sname === 0 || $price <= 0 || $unit === 0 || empty($cby)) {
        header("Location: " . $H_Title_Link_2 . "?error=Please fill in all required fields.");
        exit();
    }

    // Validate foreign keys (Brand, Category, Subcategory, Unit)
    // Brand
    $stmt = $conn->prepare("SELECT BrandName FROM Brands WHERE BrandID = ?");
    if (!$stmt) {
        header("Location: " . $H_Title_Link_2 . "?error=Error preparing brand query.");
        exit();
    }
    $stmt->bind_param("i", $bname);
    $stmt->execute();
    $result_brand = $stmt->get_result();
    if ($result_brand->num_rows === 0) {
        $stmt->close();
        header("Location: " . $H_Title_Link_2 . "?error=Selected brand does not exist.");
        exit();
    }
    $Bbname = $result_brand->fetch_assoc()['BrandName'];
    $stmt->close();

    // Category
    $stmt = $conn->prepare("SELECT CategoryName FROM Category WHERE CategoryID = ?");
    if (!$stmt) {
        header("Location: " . $H_Title_Link_2 . "?error=Error preparing category query.");
        exit();
    }
    $stmt->bind_param("i", $cname);
    $stmt->execute();
    $result_category = $stmt->get_result();
    if ($result_category->num_rows === 0) {
        $stmt->close();
        header("Location: " . $H_Title_Link_2 . "?error=Selected category does not exist.");
        exit();
    }
    $Ccname = $result_category->fetch_assoc()['CategoryName'];
    $stmt->close();

    // Subcategory
    $stmt = $conn->prepare("SELECT SubcategoryName FROM Subcategory WHERE SubcategoryID = ?");
    if (!$stmt) {
        header("Location: " . $H_Title_Link_2 . "?error=Error preparing subcategory query.");
        exit();
    }
    $stmt->bind_param("i", $sname);
    $stmt->execute();
    $result_subcategory = $stmt->get_result();
    if ($result_subcategory->num_rows === 0) {
        $stmt->close();
        header("Location: " . $H_Title_Link_2 . "?error=Selected subcategory does not exist.");
        exit();
    }
    $Ssname = $result_subcategory->fetch_assoc()['SubcategoryName'];
    $stmt->close();

    // Unit
    $stmt = $conn->prepare("SELECT ShortWord FROM MeasurementUnits WHERE UnitID = ?");
    if (!$stmt) {
        header("Location: " . $H_Title_Link_2 . "?error=Error preparing unit query.");
        exit();
    }
    $stmt->bind_param("i", $unit);
    $stmt->execute();
    $result_unit = $stmt->get_result();
    if ($result_unit->num_rows === 0) {
        $stmt->close();
        header("Location: " . $H_Title_Link_2 . "?error=Selected unit does not exist.");
        exit();
    }
    $Uunit = $result_unit->fetch_assoc()['ShortWord'];
    $stmt->close();

    // Handle Image Upload
    $img = 'default-placeholder.png'; // Default image placeholder
    if (isset($_FILES[$SQL_3]) && $_FILES[$SQL_3]['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES[$SQL_3];
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed_types = ['png', 'svg'];

        if (in_array($extension, $allowed_types)) {
            $upload_dir = ($extension === 'svg') ? '../assets/img/' . $L_img . 'svg/' : '../assets/img/' . $L_img . 'png/';

            $file_name = basename($file['name']); // Use original file name
            $file_path = $upload_dir . $file_name;

            if (file_exists($file_path)) {
                unlink($file_path); // Delete existing file if it exists
            }

            if (move_uploaded_file($file['tmp_name'], $file_path)) {
                $img = $file_name;
            } else {
                echo "Error uploading image: " . $_FILES[$SQL_3]['error'];
                exit();
            }
        } else {
            echo "Invalid file type. Only PNG and SVG are allowed.";
            exit();
        }
    } elseif (isset($_FILES[$SQL_3]) && $_FILES[$SQL_3]['error'] !== UPLOAD_ERR_NO_FILE) {
        echo "Image upload error: " . $_FILES[$SQL_3]['error'];
        exit();
    }

    // Prepare the INSERT statement
    $table_name = $F_SQL;
    $column_name = $SQL_2;          // ProductName
    $column_sku = $SQL_4;           // SKU
    $column_bname = $SQL_5;         // BrandName
    $column_cname = $SQL_6;         // CategoryName
    $column_sname = $SQL_7;         // SubcategoryName
    $column_price = $SQL_8;         // Price
    $column_qty = $SQL_9;           // Quantity
    $column_unit = $SQL_10;         // Unit
    $column_cby = $SQL_11;          // CreatedBy
    $column_status = $SQL_12;       // Status
    $column_img = $SQL_3;           // ImageFile

    // Prepare the INSERT statement
    $query = "INSERT INTO $table_name ($column_name, $column_sku, $column_bname, $column_cname, $column_sname, $column_price, $column_qty, $column_unit, $column_cby, $column_status, $column_img)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        header("Location: " . $H_Title_Link_2 . "?error=Database error: " . urlencode($conn->error));
        exit();
    }

    $stmt->bind_param(
        "sssssdissss",
        $name,
        $sku,
        $Bbname,
        $Ccname,
        $Ssname,
        $price,
        $qty,
        $Uunit,
        $cby,
        $status,
        $img
    );

    if ($stmt->execute()) {
        $_SESSION['flash_message'] = [
            'type' => 'success',
            'message' => 'Product added successfully.'
        ];
        header("Location: " . $H_Title_Link_1);
        exit();
    } else {
        error_log("Error adding product: " . $stmt->error);
        header("Location: " . $H_Title_Link_2 . "?error=Failed to add the product. Please try again.");
        exit();
    }

    $stmt->close();
    $conn->close();
}
