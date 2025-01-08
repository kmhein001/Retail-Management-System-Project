<?php
include_once '../partials/header.php';
include_once 'product.php';

if (!isset($_GET['id'])) {
    header("Location: " . $H_Title_Link_1 . "?error=No ". $L_general ." ID provided.");
    exit();
}
$id = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM $F_SQL WHERE $SQL_1 = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    header("Location: " . $H_Title_Link_1 . "?error= ". $C_general . " not found.");
    exit();
}

$stmt->close();
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="<?= $C_general ?>"><?= $C_general ?></a></li>
<li class="breadcrumb-item"><a href="<?= $H_Title_Link_1 ?>" data-coreui-i18n="<?= $H_Title_1 ?>"><?= $H_Title_1 ?></a></li>
<li class="breadcrumb-item active"><a href="<?= $H_Title_Link_3 ?>" data-coreui-i18n="<?= $H_Title_3 ?>"><?= $H_Title_3 ?></a>
</li>
</ol>
</nav>
</div>
</header>
<div class="body flex-grow-1">
    <div class="container px-2">
        <div class="card mb-4 border border-secondary rounded">
            <div class="card-header d-flex align-items-center">
                <div class="row w-100 h-100">
                    <div class="col-md-6 col-12 d-flex justify-content-start align-items-center">
                        <div>
                            <h3 class="card-title fw-bold fs-4 my-4"><?= $H_Title_3 ?></h3>
                            <h5 class="text-muted fs-6 mb-4"><?= $H_Title_D_1 ?></h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 d-flex justify-content-end align-items-center mt-3 mt-md-0">
                        <a class="btn btn-primary d-flex align-items-center justify-content-center"
                            style="min-width: 200px; height: 60px; font-size: 16px; border-radius: 10px;"
                            href="<?= $H_Title_Link_1 ?>">
                            <svg class="icon me-2" style="width: 24px; height: 24px;">
                                <use xlink:href="<?= $V_C_I_S_free ?>#cil-list"></use>
                            </svg>
                            <span class="fs-5"><?= $B_Title_1 ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= $H_Title_Link_6 ?>" class="px-3 py-4" method="POST" enctype="multipart/form-data">

                    <div class="row g-4">
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="d-flex align-items-center justify-content-start" style="height: 100px;">
                                <label for="<?= $N_id ?>" class="form-label fw-bold fs-4 me-3 mt-3"><?= $SQL_Title_1_1 ?>:</label>
                                <div class="badge bg-info text-white fs-5" id="id_badge">
                                    <?php echo ($row[$SQL_1] ?? 'Auto-generated ID'); ?>
                                </div>
                                <input type="hidden" id="<?= $N_id ?>" name="<?= $N_id ?>" value="<?php echo $row[$SQL_1]; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_name ?>" class="form-label fw-bold fs-4"><?= $SQL_Title_2 ?></label>
                                <input type="text" class="form-control" style="height:60px" id="<?= $N_name ?>" name="<?= $N_name ?>" placeholder="Enter <?= $SQL_Title_2 ?>" value="<?php echo ($row[$SQL_2] ?? ''); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_sku ?>" class="form-label fw-bold fs-4"><?= $SQL_Title_4 ?></label>
                                <input type="text" class="form-control" style="height:60px" id="<?= $N_sku ?>" name="<?= $N_sku ?>" placeholder="Enter <?= $SQL_Title_4 ?>" value="<?php echo ($row[$SQL_4] ?? ''); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_bname ?>" class="form-label fw-bold fs-4"><?= $Title_with_1_2 ?></label>
                                <select class="form-control" style="height:60px" id="<?= $N_bname ?>" name="<?= $N_bname ?>">
                                    <option value=""><?= $Title_with_1_1 ?></option>
                                    <?php
                                    $stmt = $conn->prepare("SELECT $SQL_T_Table_1_1, $SQL_T_Table_1_2 FROM $SQL_T_Table_1 ORDER BY  $SQL_T_Table_1_2 ASC");
                                    if ($stmt) {
                                        $stmt->execute();
                                        $result_brands = $stmt->get_result();
                                        while ($brand = $result_brands->fetch_assoc()) {
                                            $selected = ($row[$SQL_5] === $brand[$SQL_T_Table_1_2]) ? 'selected' : '';
                                            echo '<option value="'. ($brand[$SQL_T_Table_1_1]) . '" ' . $selected . '>' . ($brand[$SQL_T_Table_1_2]) . '</option>';
                                        }
                                        $stmt->close();
                                    } else { 
                                        echo '<option value="">Error fetching'. $L_Title_other_1_1 .'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_cname ?>" class="form-label fw-bold fs-4"><?= $Title_with_2_2 ?></label>
                                <select class="form-control" style="height:60px" id="<?= $N_cname ?>" name="<?= $N_cname ?>">
                                    <option value=""><?= $Title_with_2_1 ?></option>
                                    <?php
                                    $stmt = $conn->prepare("SELECT $SQL_T_Table_2_1, $SQL_T_Table_2_2 FROM $SQL_T_Table_2 ORDER BY $SQL_T_Table_2_2 ASC");
                                    if ($stmt) {
                                        $stmt->execute();
                                        $result_category = $stmt->get_result();
                                        while ($category = $result_category->fetch_assoc()) {
                                            $selected = ($row[$SQL_6] === $category[$SQL_T_Table_2_2]) ? 'selected' : '';
                                            echo '<option value="' . ($category[$SQL_T_Table_2_1]) . '" ' . $selected . '>' . ($category[$SQL_T_Table_2_2]) . '</option>';
                                        }
                                        $stmt->close();
                                    } else {
                                        echo '<option value="">Error fetching '. $L_Title_other_2_1 .'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_sname ?>" class="form-label fw-bold fs-4"><?= $Title_with_3_2 ?></label>
                                <select class="form-control" style="height:60px" id="<?= $N_sname ?>" name="<?= $N_sname ?>">
                                    <option value=""><?= $Title_with_3_1 ?></option>
                                    <?php
                                    $stmt = $conn->prepare("SELECT $SQL_T_Table_3_1, $SQL_T_Table_3_2 FROM $SQL_T_Table_3 ORDER BY $SQL_T_Table_3_2 ASC");
                                    if ($stmt) {
                                        $stmt->execute();
                                        $result_subcategories = $stmt->get_result();
                                        while ($subcategory = $result_subcategories->fetch_assoc()) {
                                            $selected = ($row[$SQL_7] === $subcategory[$SQL_T_Table_3_2]) ? 'selected' : '';
                                            echo '<option value="' . ($subcategory[$SQL_T_Table_3_1]) . '" ' . $selected . '>' . ($subcategory[$SQL_T_Table_3_2]) . '</option>';
                                        }
                                        $stmt->close();
                                    } else {
                                        echo '<option value="">Error fetching '. $L_Title_other_3_1 .'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_price ?>" class="form-label fw-bold fs-4"><?= $SQL_Title_8 ?></label>
                                <div class="d-flex align-items-center">
                                    <input
                                        type="number"
                                        step="0.01"
                                        class="form-control me-2"
                                        id="<?= $N_price ?>"
                                        name="<?= $N_price ?>"
                                        placeholder="Enter <?= $SQL_Title_8 ?>"
                                        value="<?= ($row[$SQL_8] ?? '') ?>"
                                        required
                                        style="flex: 1; text-align: center; height:60px;">
                                    <div class="fs-4" style="color: #6c757d;">MMK</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4 d-flex">
                            <div class="col-8 mb-3 me-3">
                                <label for="<?= $N_qty ?>"  class="form-label fw-bold fs-4"><?= $SQL_Title_9 ?></label>
                                <input type="text" class="form-control" style="height:60px" id="<?= $N_qty ?>" name="<?= $N_qty ?>" placeholder="Ente <?= $SQL_Title_9 ?>" value="<?= ($row[$SQL_9] ?? '') ?>">
                            </div>

                            <div class="col-4 mb-3">
                                <label for="<?= $N_unit ?>" class="form-label fw-bold fs-4"><?= $Title_other_4 ?></label>
                                <select class="form-control" style="height:60px" id="<?= $N_unit ?>" name="<?= $N_unit ?>">
                                    <option value="">Select Unit</option>
                                    <?php
                                    // Fetch units securely
                                    $stmt = $conn->prepare("SELECT $SQL_T_Table_4_1, $SQL_T_Table_4_2 FROM $SQL_T_Table_4 ORDER BY $SQL_T_Table_4_2 ASC");
                                    if ($stmt) {
                                        $stmt->execute();
                                        $result_units = $stmt->get_result();
                                        while ($unit = $result_units->fetch_assoc()) {
                                            $selected = ($row[$SQL_10] === $unit[$SQL_T_Table_4_2]) ? 'selected' : '';
                                            echo '<option value="' . ($unit[$SQL_T_Table_4_1]) . '" ' . $selected . '>' . ($unit[$SQL_T_Table_4_2]) . '</option>';
                                        }
                                        $stmt->close();
                                    } else {
                                        echo '<option value="">Error fetching'. $L_Title_other_4_1 .'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_cby ?>"class="form-label fw-bold fs-4"><?= $SQL_Title_11 ?></label>
                                <input type="text" class="form-control" style="height:60px"
                                id="<?= $N_cby ?>" name="<?= $N_cby ?>" placeholder="Enter <?= $SQL_Title_11 ?>" value="<?= ($row[$SQL_11] ?? '') ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="form-check form-switch d-flex align-items-center justify-content-center ms-3 mt-2"
                                id="status-toggle"
                                style="height: 100px;display: none;">
                                <input class="form-check-input me-3"
                                    type="checkbox"
                                    id="<?= $N_status ?>"
                                    name="<?= $N_status ?>"
                                    value="Active" <?= (isset($row[$SQL_12]) && $row[$SQL_12] === 'Active') ? 'checked' : '' ?>
                                    style="width: 60px; height: 25px;">
                                <label for="<?= $N_status ?>"
                                    class="form-check-label fw-bold fs-4">
                                    Status
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="<?= $SQL_3 ?>" class="form-label fw-semibold fs-4"><?= $H_Title_6 ?></label>
                                <div class="image-upload">
                                    <?php
                                    $file_extension = strtolower(pathinfo($row[$SQL_2], PATHINFO_EXTENSION));
                                    $image_path = !empty($row[$SQL_3])
                                        ? (($file_extension === 'svg')
                                            ? "../assets/img/".$L_img."svg/" . $row[$SQL_2]
                                            : "../assets/img/".$L_img."png/" . $row[$SQL_2])
                                        : "../assets/img/".$L_img."default-placeholder.png";
                                    ?>
                                    <img src="<?= $image_path ?>"
                                        alt="<?= ($row[$SQL_2] ?? $SQL_3) ?>"
                                        style="width:300px; height: 300px;" />

                                    <input type="file" id="<?= $SQL_3 ?>" name="<?= $SQL_3 ?>"
                                        accept="image/png, image/svg+xml" class="form-control mt-4">

                                    <div class="mt-3 d-flex flex-column align-items-center justify-content-center border rounded p-3" style="height: 150px;">
                                        <svg class="icon mb-2" style="width: 50px; height: 50px;">
                                            <use xlink:href="<?= $V_C_I_S_free ?>#cil-cloud-upload"></use>
                                        </svg>
                                        <h6 class="text-muted fs-5">Drag and drop a file to upload</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-center gap-3">
                                <button type="submit" class="btn btn-outline-primary fs-5 px-5 py-3" style="border-radius: 6px;">
                                    Update
                                </button>
                                <a href="<?= $H_Title_Link_1 ?>" class="btn btn-outline-danger fs-5 px-5 py-3" style="border-radius: 6px;">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <?php
        include_once '../partials/footer.php';
        ?>