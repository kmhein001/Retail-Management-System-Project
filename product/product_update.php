<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once '../config/connect_db.php';

// Function to sanitize input data
function sanitize_input($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $name = isset($_POST['name']) ? sanitize_input($_POST['name']) : '';
    $sku = isset($_POST['sku']) ? sanitize_input($_POST['sku']) : '';
    $bname = isset($_POST['bname']) ? (int)$_POST['bname'] : 0;
    $cname = isset($_POST['cname']) ? (int)$_POST['cname'] : 0;
    $sname = isset($_POST['sname']) ? (int)$_POST['sname'] : 0;
    $price = isset($_POST['price']) ? sanitize_input($_POST['price']) : '';
    $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 0;
    $unit = isset($_POST['unit']) ? (int)$_POST['unit'] : 0;
    $cby = isset($_POST['cby']) ? sanitize_input($_POST['cby']) : '';
    $status = isset($_POST['status']) ? 'Active' : 'Inactive';

    // Validate required fields
    if (empty($name) || empty($sku) || $bname === 0 || $cname === 0 || $sname === 0 || empty($price) || $unit === 0 || empty($cby)) {
        header("Location: product_edit.php?id=" . urlencode($id) . "&error=Please fill in all required fields.");
        exit();
    }

    // Fetch related names securely using prepared statements
    // Fetch BrandName
    $stmt = $conn->prepare("SELECT BrandName FROM Brands WHERE BrandID = ?");
    if (!$stmt) {
        header("Location: product_edit.php?id=" . urlencode($id) . "&error=Error preparing brand query.");
        exit();
    }
    $stmt->bind_param("i", $bname);
    $stmt->execute();
    $result_brand = $stmt->get_result();
    if ($result_brand->num_rows === 0) {
        $stmt->close();
        header("Location: product_edit.php?id=" . urlencode($id) . "&error=Selected brand does not exist.");
        exit();
    }
    $Bbname = $result_brand->fetch_assoc()['BrandName'];
    $stmt->close();

    // Fetch CategoryName
    $stmt = $conn->prepare("SELECT CategoryName FROM Category WHERE CategoryID = ?");
    if (!$stmt) {
        header("Location: product_edit.php?id=" . urlencode($id) . "&error=Error preparing category query.");
        exit();
    }
    $stmt->bind_param("i", $cname);
    $stmt->execute();
    $result_category = $stmt->get_result();
    if ($result_category->num_rows === 0) {
        $stmt->close();
        header("Location: product_edit.php?id=" . urlencode($id) . "&error=Selected category does not exist.");
        exit();
    }
    $Ccname = $result_category->fetch_assoc()['CategoryName'];
    $stmt->close();

    // Fetch SubcategoryName
    $stmt = $conn->prepare("SELECT SubcategoryName FROM Subcategory WHERE SubcategoryID = ?");
    if (!$stmt) {
        header("Location: product_edit.php?id=" . urlencode($id) . "&error=Error preparing subcategory query.");
        exit();
    }
    $stmt->bind_param("i", $sname);
    $stmt->execute();
    $result_subcategory = $stmt->get_result();
    if ($result_subcategory->num_rows === 0) {
        $stmt->close();
        header("Location: product_edit.php?id=" . urlencode($id) . "&error=Selected subcategory does not exist.");
        exit();
    }
    $Ssname = $result_subcategory->fetch_assoc()['SubcategoryName'];
    $stmt->close();

    // Fetch Unit ShortWord
    $stmt = $conn->prepare("SELECT ShortWord FROM MeasurementUnits WHERE UnitID = ?");
    if (!$stmt) {
        header("Location: product_edit.php?id=" . urlencode($id) . "&error=Error preparing unit query.");
        exit();
    }
    $stmt->bind_param("i", $unit);
    $stmt->execute();
    $result_unit = $stmt->get_result();
    if ($result_unit->num_rows === 0) {
        $stmt->close();
        header("Location: product_edit.php?id=" . urlencode($id) . "&error=Selected unit does not exist.");
        exit();
    }
    $Uunit = $result_unit->fetch_assoc()['ShortWord'];
    $stmt->close();

    $img = null;
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

     // Prepare SQL query
     if ($img) {
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
                    Status = ?, 
                    ImageFile = ?
                  WHERE ProductID = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            header("Location: product_edit.php?id=" . urlencode($id) . "&error=Error preparing update statement.");
            exit();
        }
        $stmt->bind_param("sssssssssssi", $name, $sku, $Bbname, $Ccname, $Ssname, $price, $qty, $Uunit, $cby, $status, $img, $id);
    } else {
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
                    Status = ?
                  WHERE ProductID = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            header("Location: product_edit.php?id=" . urlencode($id) . "&error=Error preparing update statement.");
            exit();
        }
        $stmt->bind_param("ssssssssssi", $name, $sku, $Bbname, $Ccname, $Ssname, $price, $qty, $Uunit, $cby, $status, $id);
    }

    // Execute the query
    if ($stmt->execute()) {
        // Set a success flash message
        $_SESSION['flash_message'] = [
            'type' => 'success',
            'message' => 'Product updated successfully.'
        ];
        header("Location: product_list.php");
        exit();
    } else {
        // Log the error internally and set an error flash message
        error_log("Error updating product ID $id: " . $stmt->error);
        $_SESSION['flash_message'] = [
            'type' => 'danger',
            'message' => 'Failed to update the product. Please try again later.'
        ];
        header("Location: product_edit.php?id=" . urlencode($id));
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // If not a POST request, redirect back to the product list
    header("Location: product_list.php");
    exit();
}
?>
