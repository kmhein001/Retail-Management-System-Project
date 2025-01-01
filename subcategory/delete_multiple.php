<?php
include_once '../config/connect_db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_selected'])) {
    if (!empty($_POST['selected_ids'])) {
        $selected_ids = $_POST['selected_ids'];
        $placeholders = implode(',', array_fill(0, count($selected_ids), '?'));

        // Fetch the image filenames for deletion
        $stmt = $conn->prepare("SELECT ImageFile FROM Subcategory WHERE SubcategoryID IN ($placeholders)");
        $stmt->bind_param(str_repeat('i', count($selected_ids)), ...$selected_ids);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $img = $row['ImageFile'];
            if (!empty($img)) {
                $image_path_svg = "../assets/img/subcategory/svg/" . $img;
                $image_path_png = "../assets/img/subcategory/png/" . $img;

                if (file_exists($image_path_svg)) {
                    unlink($image_path_svg);
                } elseif (file_exists($image_path_png)) {
                    unlink($image_path_png);
                }
            }
        }

        // Delete the records from the database
        $delete_stmt = $conn->prepare("DELETE FROM Subcategory WHERE SubcategoryID IN ($placeholders)");
        $delete_stmt->bind_param(str_repeat('i', count($selected_ids)), ...$selected_ids);

        if ($delete_stmt->execute()) {
            header("Location: subcategory_list.php?success=Selected countries deleted successfully.");
        } else {
            die("Error deleting records: " . $delete_stmt->error);
        }

        $delete_stmt->close();
    } else {
        header("Location: subcategory_list.php?error=No countries selected.");
    }
} else {
    header("Location: subcategory_list.php");
}
?>