<?php
include_once '../config/connect_db.php';
include_once 'product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_selected'])) {
    if (!empty($_POST['selected_ids'])) {
        $selected_ids = $_POST['selected_ids'];
        $placeholders = implode(',', array_fill(0, count($selected_ids), '?'));

        $stmt = $conn->prepare("SELECT $SQL_3 FROM $F_SQL WHERE $SQL_1 IN ($placeholders)");
        $stmt->bind_param(str_repeat('i', count($selected_ids)), ...$selected_ids);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $img = $row[$SQL_3];
            if (!empty($img)) {
                $image_path_svg = "../assets/img/".$L_img ."svg/" . $img;
                $image_path_png = "../assets/img/".$L_img ."png/" . $img;

                if (file_exists($image_path_svg)) {
                    unlink($image_path_svg);
                } elseif (file_exists($image_path_png)) {
                    unlink($image_path_png);
                }
            }
        }
        
        $delete_stmt = $conn->prepare("DELETE FROM $F_SQL WHERE $SQL_1 IN ($placeholders)");
        $delete_stmt->bind_param(str_repeat('i', count($selected_ids)), ...$selected_ids);

        if ($delete_stmt->execute()) {
            header("Location:".$H_Title_Link_1."?success=Selected countries deleted successfully.");
        } else {
            die("Error deleting records: " . $delete_stmt->error);
        }

        $delete_stmt->close();
    } else {
        header("Location:".$H_Title_Link_1."?error=No countries selected.");
    }
} else {
    header("Location:".$H_Title_Link_1);
}
?>