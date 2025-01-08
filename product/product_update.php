<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include_once '../config/connect_db.php';
include_once 'product.php';

function sanitize_input($data)
{
    return (strip_tags(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = isset($_POST[$N_id]) ? (int)$_POST[$N_id] : 0;
    $name = isset($_POST[$N_name]) ? sanitize_input($_POST[$N_name]) : '';
    $sku = isset($_POST[$N_sku]) ? sanitize_input($_POST[$N_sku]) : '';
    $bname = isset($_POST[$N_bname]) ? (int)$_POST[$N_bname] : 0;
    $cname = isset($_POST[$N_cname]) ? (int)$_POST[$N_cname] : 0;
    $sname = isset($_POST[$N_sname]) ? (int)$_POST[$N_sname] : 0;
    $price = isset($_POST[$N_price]) ? sanitize_input($_POST[$N_price]) : '';
    $qty = isset($_POST[$N_qty]) ? (int)$_POST[$N_qty] : 0;
    $unit = isset($_POST[$N_unit]) ? (int)$_POST[$N_unit] : 0;
    $cby = isset($_POST[$N_cby]) ? sanitize_input($_POST[$N_cby]) : '';
    $status = isset($_POST[$N_status]) ? 'Active' : 'Inactive';

    if (empty($name) || empty($sku) || $bname === 0 || $cname === 0 || $sname === 0 || empty($price) || $unit === 0 || empty($cby)) {
        header("Location:".$H_Title_Link_1."?id=" . urlencode($id) . "&error=Please fill in all required fields.");
        exit();
    }

    $stmt = $conn->prepare("SELECT $SQL_T_Table_1_2 FROM $SQL_T_Table_1 WHERE $SQL_T_Table_1_1 = ?");
    if (!$stmt) {
        header("Location: ".$H_Title_Link_3."?id=" . urlencode($id) . "&error=Error preparing brand query.");
        exit();
    }
    $stmt->bind_param("i", $bname);
    $stmt->execute();
    $result_brand = $stmt->get_result();
    if ($result_brand->num_rows === 0) {
        $stmt->close();
        header("Location: ".$H_Title_Link_3."?id=" . urlencode($id) . "&error=Selected brand does not exist.");
        exit();
    }
    $Bbname = $result_brand->fetch_assoc()[$SQL_T_Table_1_2];
    $stmt->close();

    $stmt = $conn->prepare("SELECT $SQL_T_Table_2_2 FROM $SQL_T_Table_2 WHERE $SQL_T_Table_2_1 = ?");
    if (!$stmt) {
        header("Location: ".$H_Title_Link_3."?id=" . urlencode($id) . "&error=Error preparing category query.");
        exit();
    }
    $stmt->bind_param("i", $cname);
    $stmt->execute();
    $result_category = $stmt->get_result();
    if ($result_category->num_rows === 0) {
        $stmt->close();
        header("Location: ".$H_Title_Link_3."?id=" . urlencode($id) . "&error=Selected category does not exist.");
        exit();
    }
    $Ccname = $result_category->fetch_assoc()[$SQL_T_Table_2_2];
    $stmt->close();

    $stmt = $conn->prepare("SELECT $SQL_T_Table_3_2 FROM $SQL_T_Table_3 WHERE $SQL_T_Table_3_1 = ?");
    if (!$stmt) {
        header("Location: ".$H_Title_Link_3."?id=" . urlencode($id) . "&error=Error preparing subcategory query.");
        exit();
    }
    $stmt->bind_param("i", $sname);
    $stmt->execute();
    $result_subcategory = $stmt->get_result();
    if ($result_subcategory->num_rows === 0) {
        $stmt->close();
        header("Location: ".$H_Title_Link_3."?id=" . urlencode($id) . "&error=Selected subcategory does not exist.");
        exit();
    }
    $Ssname = $result_subcategory->fetch_assoc()[$SQL_T_Table_3_2];
    $stmt->close();

    $stmt = $conn->prepare("SELECT $SQL_T_Table_4_2 FROM $SQL_T_Table_4 WHERE $SQL_T_Table_4_1 = ?");
    if (!$stmt) {
        header("Location: ".$H_Title_Link_3."?id=" . urlencode($id) . "&error=Error preparing unit query.");
        exit();
    }
    $stmt->bind_param("i", $unit);
    $stmt->execute();
    $result_unit = $stmt->get_result();
    if ($result_unit->num_rows === 0) {
        $stmt->close();
        header("Location: ".$H_Title_Link_3."?id=" . urlencode($id) . "&error=Selected unit does not exist.");
        exit();
    }
    $Uunit = $result_unit->fetch_assoc()[$SQL_T_Table_4_2];
    $stmt->close();

    $img = null;

    if (isset($_FILES[$SQL_3]) && $_FILES[$SQL_3]['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES[$SQL_3];
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed_types = ['png', 'svg'];

        if (in_array($extension, $allowed_types)) {

            $original_name = basename($file['name']);
            $upload_path = ($extension === 'svg') ? '../assets/img/'.$L_img.'svg/' : '../assets/img/'.$L_img.'png/';
            $destination = $upload_path . $original_name;

            if (file_exists($destination)) {
                die("Error: A file with the name '$original_name' already exists.");
            }

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $img = $original_name;
            } else {
                die("Error: Failed to upload the file.");
            }
        } else {
            die("Error: Invalid file type. Only PNG and SVG are allowed.");
        }
    }

    $table_name = $F_SQL;     
    $column_id = $SQL_1;
    $column_name = $SQL_2;
    $column_img = $SQL_3;
    $column_sku = $SQL_4;
    $column_bname = $SQL_5;
    $column_cname = $SQL_6;
    $column_sname = $SQL_7;
    $column_price = $SQL_8;
    $column_qty = $SQL_9;
    $column_unit = $SQL_10;
    $column_cby = $SQL_11;
    $column_status = $SQL_12;

     if ($img) {
        $query = "UPDATE  $table_name SET 
                    $column_name = ?, 
                    $column_sku= ?, 
                    $column_bname = ?, 
                    $column_cname = ?, 
                    $column_sname = ?, 
                    $column_price = ?, 
                    $column_qty = ?, 
                    $column_unit = ?, 
                    $column_cby = ?, 
                    $column_status = ?, 
                    $column_img = ?
                  WHERE $column_id = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            header("Location: ".$H_Title_Link_3."?id=" . urlencode($id) . "&error=Error preparing update statement.");
            exit();
        }
        $stmt->bind_param("sssssssssssi", $name, $sku, $Bbname, $Ccname, $Ssname, $price, $qty, $Uunit, $cby, $status, $img, $id);
    } else {
        $query = "UPDATE  $table_name SET 
                    $column_name = ?, 
                    $column_sku= ?, 
                    $column_bname = ?, 
                    $column_cname = ?, 
                    $column_sname = ?, 
                    $column_price = ?, 
                    $column_qty = ?, 
                    $column_unit = ?, 
                    $column_cby = ?, 
                    $column_status = ?
                  WHERE $column_id = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            header("Location: ".$H_Title_Link_3."?id=" . urlencode($id) . "&error=Error preparing update statement.");
            exit();
        }
        $stmt->bind_param("ssssssssssi", $name, $sku, $Bbname, $Ccname, $Ssname, $price, $qty, $Uunit, $cby, $status, $id);
    }

    // Execute the query
    if ($stmt->execute()) {
        // Set a success flash message
        $_SESSION['flash_message'] = [
            'type' => 'success',
            'message' => $C_general.'updated successfully.'
        ];
        header("Location: ".$H_Title_Link_1);
        exit();
    } else {
        error_log("Error updating" .$L_general ."ID $id: " . $stmt->error);
        $_SESSION['flash_message'] = [
            'type' => 'danger',
            'message' => 'Failed to update the'.$L_general .'. Please try again later.'
        ];
        header("Location: ".$H_Title_Link_3."?id=" . urlencode($id));
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ".$H_Title_Link_1);
    exit();
}
?>
