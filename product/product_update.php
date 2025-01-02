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
    $sku = trim($_POST['sku']);
    $bname = trim($_POST['bname']);
    $cname = trim($_POST['cname']);
    $sname = trim($_POST['sname']);
    $price = trim($_POST['price']);
    $qty = trim($_POST['qty']);
    $unit = trim($_POST['unit']);
    $cby = trim($_POST['cby']);
    $status = isset($_POST['status']) ? 'Active' : 'Inactive';

    $img = null;

    $sql_brand = "SELECT BrandName FROM Brands WHERE BrandID = '$bname'";
    $result_brand = $conn->query($sql_brand);
    $Bbname = $result_brand->fetch_assoc()['BrandName'];

    $sql_category = "SELECT CategoryName FROM Category WHERE CategoryID = '$cname'";
    $result_category = $conn->query($sql_category);
    $Ccname = $result_category->fetch_assoc()['CategoryName'];

    $sql_subcategory = "SELECT SubcategoryName FROM Subcategory WHERE SubcategoryID = '$sname'";
    $result_subcategory = $conn->query($sql_subcategory);
    $Ssname = $result_subcategory->fetch_assoc()['SubcategoryName'];

    $sql_unit = "SELECT ShortWord FROM MeasurementUnits WHERE UnitID = '$unit'";
    $result_unit = $conn->query($sql_unit);
    $Uunit = $result_unit->fetch_assoc()['ShortWord'];


    // Handle file upload if a file is provided
    if (isset($_FILES['ImageFile']) && $_FILES['ImageFile']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['ImageFile'];
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed_types = ['png', 'svg'];

        if (in_array($extension, $allowed_types)) {
            // Use the original file name
            $original_name = basename($file['name']);
            $upload_path = ($extension === 'svg') ? '../assets/img/product/svg/' : '../assets/img/product/png/';
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

    $query = "UPDATE Products SET 
            ProductName = ?, 
            SKU = ?, 
            BrandName = ?, 
            CategoryName = ?, 
            SubcategoryName = ?, 
            Price = ?, 
            Quantity = ?, 
            Unit = ?, 
            CreatedBy = ?, 
            Status = ?";
    if ($img) {
        $query .= ", ImageFile = ?";
    }
    $query .= " WHERE ProductID = ?";

    $stmt = $conn->prepare($query);
    if ($img) {
        $stmt->bind_param("sssssssssssi", $name, $sku, $Bbname, $Ccname, $Ssname, $price, $qty, $Uunit, $cby, $status, $img, $id);
    } else {
        $stmt->bind_param("ssssssssssi", $name, $sku, $Bbname, $Ccname, $Ssname, $price, $qty, $Uunit, $cby, $status, $id);
    }
    if ($stmt->execute()) {
        header("Location: product_list.php?success=brand updated successfully.");
    } else {
        die("Error updating record: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: product_list.php?success=brand updated successfully.");
    exit();
}
