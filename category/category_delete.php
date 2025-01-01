<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../config/connect_db.php';


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $id = (int)$_GET['id']; // Sanitize the ID

    // Fetch the image filename from the database
    $stmt = $conn->prepare("SELECT ImageFile FROM Category WHERE CategoryID = ?");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $img = $row['ImageFile'];

        // Delete the image file from the server
        if (!empty($img)) {
            $image_path_svg = "../assets/img/category/svg/" . $img;
            $image_path_png = "../assets/img/category/png/" . $img;

            // Check and delete the file in both possible locations
            if (file_exists($image_path_svg)) {
                unlink($image_path_svg);
            } elseif (file_exists($image_path_png)) {
                unlink($image_path_png);
            }
        }

        // Delete the record from the database
        $delete_stmt = $conn->prepare("DELETE FROM Category WHERE CategoryID = ?");
        if ($delete_stmt === false) {
            die("Error preparing delete statement: " . $conn->error);
        }

        $delete_stmt->bind_param("i", $id);
        if ($delete_stmt->execute()) {
            header("Location: category_list.php?success=category deleted successfully.");
            exit();
        } else {
            die("Error deleting record: ```php
" . $delete_stmt->error);
        }

        $delete_stmt->close();
    } else {
        header("Location: category_list.php?error=Record not found for ID: " . $id);
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: category_list.php?error=No ID provided.");
    exit();
}