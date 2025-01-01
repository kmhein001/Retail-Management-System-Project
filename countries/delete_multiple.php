<?php
include_once '../config/connect_db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_selected'])) {
    if (!empty($_POST['selected_ids'])) {
        $selected_ids = $_POST['selected_ids'];
        $placeholders = implode(',', array_fill(0, count($selected_ids), '?'));

        // Fetch the image filenames for deletion
        $stmt = $conn->prepare("SELECT Flag_Image FROM NewCountries WHERE CountryID IN ($placeholders)");
        $stmt->bind_param(str_repeat('i', count($selected_ids)), ...$selected_ids);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $flag_image = $row['Flag_Image'];
            if (!empty($flag_image)) {
                $image_path_svg = "../assets/img/flag/svg/" . $flag_image;
                $image_path_png = "../assets/img/flag/png/" . $flag_image;

                if (file_exists($image_path_svg)) {
                    unlink($image_path_svg);
                } elseif (file_exists($image_path_png)) {
                    unlink($image_path_png);
                }
            }
        }

        // Delete the records from the database
        $delete_stmt = $conn->prepare("DELETE FROM NewCountries WHERE CountryID IN ($placeholders)");
        $delete_stmt->bind_param(str_repeat('i', count($selected_ids)), ...$selected_ids);

        if ($delete_stmt->execute()) {
            header("Location: country_list.php?success=Selected countries deleted successfully.");
        } else {
            die("Error deleting records: " . $delete_stmt->error);
        }

        $delete_stmt->close();
    } else {
        header("Location: country_list.php?error=No countries selected.");
    }
} else {
    header("Location: country_list.php");
}
?>