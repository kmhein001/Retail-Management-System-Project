<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../partials/header.php';
include_once 'product.php';
// Function to fetch data securely
function fetchData($conn, $query)
{
    $stmt = $conn->prepare($query);
    $data = [];
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        while ($item = $result->fetch_assoc()) {
            $data[] = $item;
        }
        $stmt->close();
    }
    return $data;
}

// Fetch Brands
$brands = fetchData($conn, "SELECT $SQL_T_Table_1_1, $SQL_T_Table_1_2 FROM $SQL_T_Table_1 ORDER BY $SQL_T_Table_1_2 ASC");

// Fetch Categories
$categories = fetchData($conn, "SELECT $SQL_T_Table_2_1, $SQL_T_Table_2_2 FROM $SQL_T_Table_2 ORDER BY $SQL_T_Table_2_2 ASC");

// Fetch Subcategories
$subcategories = fetchData($conn, "SELECT $SQL_T_Table_3_1, $SQL_T_Table_3_2 FROM $SQL_T_Table_3 ORDER BY $SQL_T_Table_3_2 ASC");

// Fetch Units
$units = fetchData($conn, "SELECT $SQL_T_Table_4_1, $SQL_T_Table_4_2 FROM $SQL_T_Table_4 ORDER BY $SQL_T_Table_4_2 ASC");
?>


<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a>
</li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="Place">Place</a>
</li>
<li class="breadcrumb-item"><a href="<?= $H_Title_Link_1 ?>" data-coreui-i18n="<?= $H_Title_1 ?>"><?= $H_Title_1 ?></a>
</li>
<li class="breadcrumb-item active"><a href="<?= $H_Title_Link_2 ?>" data-coreui-i18n="<?= $H_Title_2 ?>"><?= $H_Title_2 ?></a>
</li>
</ol>
</nav>
</div>
</header>
<div class="body flex-grow-1">
    <div class="container px-2">
        <div class="card mb-4 border border-secondary rounded">
            <!-- Card Header -->
            <div class="card-header d-flex align-items-center">
                <div class="row w-100 h-100">
                    <!-- Card Title -->
                    <div class="col-md-6 col-12 d-flex justify-content-start align-items-center">
                        <div>
                            <h3 class="card-title fw-bold fs-4 my-4"><?= $H_Title_2 ?></h3>
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
            <!-- Card Body -->
             
            <div class="card-body">
                <form action="<?= $H_Title_Link_7 ?>" class="px-3 py-4" method="POST" enctype="multipart/form-data">

                    <div class="row g-4">
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_name ?>" class="form-label fw-bold fs-4"><?= $SQL_Title_2 ?></label>
                                <input type="text" class="form-control" style="height:60px" id="<?= $N_name ?>" name="<?= $N_name ?>" placeholder="Enter <?= $SQL_Title_2 ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_sku ?>" class="form-label fw-bold fs-4"><?= $SQL_Title_4 ?></label>
                                <input type="text" class="form-control" style="height:60px" id="<?= $N_sku ?>" name="<?= $N_sku ?>" placeholder="Enter <?= $SQL_Title_4 ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_bname ?>" class="form-label fw-bold fs-4"><?= $Title_with_1_2 ?></label>
                                <select class="form-control" style="height:60px" id="<?= $N_bname ?>" name="<?= $N_bname ?>">
                                    <option value=""><?= $Title_with_1_1 ?></option>
                                    <?php foreach ($brands as $brand): ?>
                                        <option value="<?= $brand[$SQL_T_Table_1_1] ?>"><?= $brand[$SQL_T_Table_1_2] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_cname ?>" class="form-label fw-bold fs-4"><?= $Title_with_2_2 ?></label>
                                <select class="form-control" style="height:60px" id="<?= $N_cname ?>" name="<?= $N_cname ?>">
                                    <option value=""><?= $Title_with_2_1 ?></option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category[$SQL_T_Table_2_1] ?>"><?= $category[$SQL_T_Table_2_2] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_sname ?>" class="form-label fw-bold fs-4"><?= $Title_with_3_2 ?></label>
                                <select class="form-control" style="height:60px" id="<?= $N_sname ?>" name="<?= $N_sname ?>">
                                    <option value=""><?= $Title_with_3_1 ?></option>
                                    <?php foreach ($subcategories as $subcategory): ?>
                                        <option value="<?= $subcategory[$SQL_T_Table_3_1] ?>"><?= $subcategory[$SQL_T_Table_3_2] ?></option>
                                    <?php endforeach; ?>
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
                                        required
                                        style="flex: 1; text-align: center; height:60px;">
                                    <div class="fs-4" style="color: #6c757d;">MMK</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4 d-flex">
                            <div class="col-8 mb-3 me-3">
                                <label for="<?= $N_qty ?>" class="form-label fw-bold fs-4"><?= $SQL_Title_9 ?></label>
                                <input type="text" class="form-control" style="height:60px" id="<?= $N_qty ?>" name="<?= $N_qty ?>" placeholder="Ente <?= $SQL_Title_9 ?>">
                            </div>

                            <div class="col-4 mb-3">
                                <label for="<?= $N_unit ?>" class="form-label fw-bold fs-4"><?= $Title_other_4 ?></label>
                                <select class="form-control" style="height:60px" id="<?= $N_unit ?>" name="<?= $N_unit ?>">
                                    <option value=""><?= $Title_with_4_1 ?></option>
                                    <?php foreach ($units as $unit): ?>
                                        <option value="<?= $unit[$SQL_T_Table_4_1] ?>"><?= $unit[$SQL_T_Table_4_2] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="<?= $N_cby ?>" class="form-label fw-bold fs-4"><?= $SQL_Title_11 ?></label>
                                <input type="text" class="form-control" style="height:60px"
                                    id="<?= $N_cby ?>" name="<?= $N_cby ?>" placeholder="Enter <?= $SQL_Title_11 ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="form-check form-switch d-flex align-items-center justify-content-start" id="status-toggle" style="display: none;">
                                <input class="form-check-input me-3" type="checkbox" id="<?= $N_status ?>" name="<?= $N_status ?>"
                                    style="width: 60px; height: 25px;"
                                    value="Active">
                                <label for="<?= $N_status ?>" class="form-check-label fw-bold fs-4"><?= $SQL_Title_12 ?></label>
                            </div>
                        </div>
                    </div>
                    <!-- Image Upload -->
                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <label for="<?=  $SQL_3 ?>" class="form-label fw-semibold fs-4"><?= $H_Title_6 ?></label>
                            <div class="image-upload">
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

                    <!-- Submit and Cancel Buttons -->
                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-center gap-3">
                                <button type="submit" class="btn btn-outline-primary fs-5 px-5 py-3" style="border-radius: 6px;">
                                    Submit
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