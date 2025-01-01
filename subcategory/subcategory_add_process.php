<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection file
include_once '../config/connect_db.php'; // Change this to the actual path to your db connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $scode = $_POST['scode'];
    $ccode = $_POST['ccode'];
    $desc = $_POST['desc'];
    $cby = $_POST['cby'];
    $status = isset($_POST['status']) && $_POST['status'] == 'on' ? 'Active' : 'Inactive';

    $img = ''; 

    if (isset($_FILES['ImageFile']) && $_FILES['ImageFile']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['ImageFile'];
        $original_file_name = $file['name'];
        $file_extension = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));

        // Check for valid file types (SVG and PNG)
        if ($file_extension === 'svg') {
            $target_directory = '../assets/img/subcategory/svg/';
        } elseif ($file_extension === 'png') {
            $target_directory = '../assets/img/subcategory/png/';
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
        echo "<pre>";
print_r($_FILES);
echo "</pre>";
        exit();
        
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO Subcategory (SubcategoryName, SubcategoryCode, CategoryCode, ImageFile, Description, CreatedBy, Status)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo "Error preparing the SQL statement: " . $conn->error;
        exit();
    }

    // Bind parameters
    $stmt->bind_param("sssssss", $name, $scode, $ccode, $img, $desc, $cby, $status);

    // Execute the query
    if ($stmt->execute()) {
        echo "New subcategory record created successfully!";
        echo "<script>window.location.href = 'subcategory_list.php'</script>"; 
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}
?>