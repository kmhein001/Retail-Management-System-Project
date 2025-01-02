<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once '../config/connect_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $sku = $_POST['sku'];
    $bname = $_POST['bname'];
    $cname = $_POST['cname'];
    $sname = $_POST['sname'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $unit = $_POST['unit'];
    $cby = $_POST['cby'];
    $status = isset($_POST['status']) && $_POST['status'] == 'on' ? 'Active' : 'Inactive';
    $img = '';

    if (isset($_FILES['ImageFile']) && $_FILES['ImageFile']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['ImageFile'];
        $original_file_name = $file['name'];
        $file_extension = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));

        // Check for valid file types (SVG and PNG)
        if ($file_extension === 'svg') {
            $target_directory = '../assets/img/product/svg/';
        } elseif ($file_extension === 'png') {
            $target_directory = '../assets/img/product/png/';
        } else {
            echo "Invalid file type. Only PNG and SVG files are allowed.";
            exit();
        }

        // Set the target file path using the original file name
        $target_file = $target_directory . $original_file_name;

        // Validate the MIME type of the file
        $allowed_mime_types = ['image/png', 'image/svg+xml'];
        $mime_type = mime_content_type($file['tmp_name']);

        if (in_array($mime_type, $allowed_mime_types)) {

            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                $img = $original_file_name;
            } else {
                echo "Error uploading the image. Please check the directory permissions.";
                exit();
            }
        } else {
            echo "Invalid image file. Only PNG and SVG files are allowed.";
            exit();
        }
    } else {
        switch ($_FILES['ImageFile']['error']) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "File is too large. Please upload a smaller file.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No file was uploaded.";
                break;
            default:
                echo "Error uploading the file. Error code: " . $_FILES['ImageFile']['error'];
                break;
        }
        exit();
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO Products (ProductName, SKU, BrandName, CategoryName, SubcategoryName, Price, Quantity, Unit, CreatedBy, Status, ImageFile)
                            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo "Error preparing the SQL statement: " . $conn->error;
        exit();
    }

    // Bind parameters
    $stmt->bind_param("sssssssss",  $name, $sku, $bname, $cname, $sname, $price, $qty, $unit, $cby, $status, $img);

    // Execute the query
    if ($stmt->execute()) {
        echo "New brand record created successfully!";
        echo "<script>window.location.href = 'brand_list.php'</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}
