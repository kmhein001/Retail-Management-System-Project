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
    $iso_code = $_POST['iso_code'];
    $isd_code = $_POST['isd_code'];
    $time_zone = $_POST['time_zone'];
    $flag_image = ''; // Default value for flag image

    // Determine the status based on the toggle
    $status = isset($_POST['status']) && $_POST['status'] == 'on' ? 'Active' : 'Inactive';

    // File upload handling
    if (isset($_FILES['flag_image']) && $_FILES['flag_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['flag_image'];
        $original_file_name = $file['name']; // Store the original file name
        $file_extension = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));

        // Check for valid file types (SVG and PNG)
        if ($file_extension === 'svg') {
            $target_directory = '../assets/img/flag/svg/';
        } elseif ($file_extension === 'png') {
            $target_directory = '../assets/img/flag/png/';
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
            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                $flag_image = $original_file_name; // Store the original file name for the database
            } else {
                echo "Error uploading the image. Please check the directory permissions.";
                exit();
            }
        } else {
            echo "Invalid image file. Only PNG and SVG files are allowed.";
            exit();
        }
    } else {
        // Handle file upload errors
        switch ($_FILES['flag_image']['error']) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "File is too large. Please upload a smaller file.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No file was uploaded.";
                break;
            default:
                echo "Error uploading the file. Error code: " . $_FILES['flag_image']['error'];
                break;
        }
        exit();
    }

    // Use a prepared statement to insert data into the NewCountries table (prevents SQL injection)
    $stmt = $conn->prepare("INSERT INTO NewCountries (CountryName, Iso_Code, Flag_Image, Isd_Code, Time_Zone, Status)
                            VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        echo "Error preparing the SQL statement: " . $conn->error;
        exit();
    }

    // Bind parameters
    $stmt->bind_param('ssssss', $name, $iso_code, $flag_image, $isd_code, $time_zone, $status);

    // Execute the query
    if ($stmt->execute()) {
        echo "New country record created successfully!";
        echo "<script>window.location.href = 'country_list.php'</script>"; // Redirect to country list
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}
?>