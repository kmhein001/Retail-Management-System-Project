<?php
include_once '../partials/header.php';
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a>
</li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="Place">Product</a>
</li>
<li class="breadcrumb-item active"><a href="brand_list.php" data-coreui-i18n="Brand List">Brand list</a>
</li>
</ol>
</nav>
</div>
</header>
<div class="body flex-grow-1">
    <div class="container px-2">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
                    <!-- Card Title -->
                    <div>
                        <h3 class="card-title my-3 fs-4 fs-md-3">Brand List</h3>
                        <h5 class="text-muted my-3 fs-6 fs-md-5">Manage your Brand</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="example">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="col-md-6 col-12 mb-3 mb-md-0 d-flex justify-content-start">
                            <a class="btn btn-primary d-flex align-items-center justify-content-center align-middle"
                                style="width: 250px; height: 60px; font-size: 18px;" href="brand_add.php">
                                <svg class="icon me-4" style="width: 24px; height: 24px;">
                                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                                </svg>
                                <span>Add Brand</span>
                            </a>
                        </div>
                        <!-- Export Buttons Section -->
                        <div class="col-md-6 col-12 d-flex justify-content-end">
                            <ul class="list-unstyled d-flex flex-wrap align-items-center justify-content-end gap-3">
                                <!-- Copy Button -->
                                <li>
                                    <a id="exportCopy" class="btn btn-outline-primary d-flex align-items-center justify-content-center align-middle"
                                        style="width: 60px; height: 60px;">
                                        <svg class="icon" style="width: 24px; height: 24px;">
                                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-copy"></use>
                                        </svg>
                                    </a>
                                </li>
                                <!-- Export CSV Button -->
                                <li>
                                    <a id="exportCsv" class="btn btn-outline-primary d-flex align-items-center justify-content-center align-middle"
                                        style="width: 60px; height: 60px;">
                                        <svg class="icon" style="width: 24px; height: 24px;">
                                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                                        </svg>
                                    </a>
                                </li>
                                <!-- Export PDF Button -->
                                <li>
                                    <a id="exportPdf" class="btn btn-outline-primary d-flex align-items-center justify-content-center align-middle"
                                        style="width: 60px; height: 60px;">
                                        <svg class="icon" style="width: 24px; height: 24px;">
                                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                                        </svg>
                                    </a>
                                </li>
                                <!-- Export Excel Button -->
                                <li>
                                    <a id="exportExcel" class="btn btn-outline-primary d-flex align-items-center justify-content-center align-middle"
                                        style="width: 60px; height: 60px;">
                                        <svg class="icon" style="width: 24px; height: 24px;">
                                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-spreadsheet"></use>
                                        </svg>
                                    </a>
                                </li>
                                <!-- Print Button -->
                                <li>
                                    <a id="exportPrint" class="btn btn-outline-primary d-flex align-items-center justify-content-center align-middle"
                                        style="width: 60px; height: 60px;">
                                        <svg class="icon" style="width: 24px; height: 24px;">
                                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-print"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="table-toolbar d-flex justify-content-between align-items-center mb-3">
                            <!-- Custom Search Bar -->
                            <div class="input-group">
                                <input id="customSearch" type="text" class="form-control" placeholder="Search...">
                                <button id="searchButton" class="btn btn-primary" type="button">
                                    <svg class="icon">
                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-search"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <!-- Table container with default browser scroll -->
                        <div class="table-container table-responsive my-2">
                            <?php
                            $sql = "SELECT * FROM Brands";
                            $result = $conn->query($sql);
                            ?>
                            <form action="delete_multiple.php" method="POST" id="deleteForm">
                                <table id="General_Auto_Table" class="table table-striped table-bordered border-warning my-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center" id="checkboxColumn"><input type="checkbox" id="selectAllCheckbox"></th>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Brand Name</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Country Name</th>
                                            <th class="text-center">Created By</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center" >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <input type="checkbox" name="selected_ids[]" value="<?= $row["BrandID"] ?>" class="rowCheckbox">
                                                </td>
                                                <td class="align-middle text-center"><?= $row["BrandID"] ?></td>
                                                <td class="align-middle text-center"><?= $row["BrandName"] ?></td>
                                                <td class="align-middle text-center">
                                                    <?php
                                                    // Get the file extension
                                                    $file_extension = strtolower(pathinfo($row["ImageFile"], PATHINFO_EXTENSION));

                                                    // Determine the correct directory based on the file extension
                                                    if ($file_extension === 'svg') {
                                                        $image_path = "../assets/img/brand/svg/" . $row["ImageFile"];
                                                    } elseif ($file_extension === 'png') {
                                                        $image_path = "../assets/img/brand/png/" . $row["ImageFile"];
                                                    } else {
                                                        // Fallback image or error handling
                                                        $image_path = "../assets/img/brand/default.png"; // Use a default image if the type is unknown
                                                    }
                                                    ?>
                                                    <img src="<?= $image_path ?>"
                                                        alt="<?= isset($row['BrandName']) && !empty($row['BrandName']) ? $row['BrandName'] : $row['ImageFile'] ?>"
                                                        style="width: 100px; height: 80px;" />
                                                </td>
                                                <td class="align-middle text-center"><?= $row["CountryName"] ?></td>
                                                <td class="align-middle text-center"><?= $row["CreatedBy"] ?></td>
                                                <td class="align-middle text-center">
                                                    <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                                        <!-- Toggle the checkbox value dynamically based on the current status -->
                                                        <input class="form-check-input status-toggle"
                                                            type="checkbox" data-brand-id="<?= $row["BrandID"] ?>"
                                                            <?= ($row["Status"] == 'Active') ? 'checked' : '' ?>>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <div class="btn-group d-flex flex-column flex-sm-row justify-content-center">
                                                        <!-- Edit Icon -->
                                                        <a class="btn btn-outline-info me-2 mb-2 mb-sm-0" href="<?= $base_url ?>/brand/brand_edit.php?id=<?= $row['BrandID'] ?>">
                                                            <svg class="icon" style="width:30px;height:30px;">
                                                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                                                            </svg>
                                                        </a>
                                                        <!-- Delete Icon -->
                                                        <a href="brand_delete.php?id=<?= $row['BrandID'] ?>" class="btn btn-outline-danger mb-2 mb-sm-0" onclick="return confirm(\'Are you sure you want to delete this brand?\');">
                                                            <svg class="icon" style="width:30px;height:30px;">
                                                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <script src="ajax_update_status.js"></script>
                                </table>
                                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mt-3">
                                    <!-- Pagination Info -->
                                    <div class="mb-2 mb-md-0">
                                        <div id="General_Auto_Table_info" class="custom-info">
                                            <button class="btn btn-primary badge fs-5 py-2 px-3 w-auto">
                                                Showing 1 to 10 of 100 entries
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Dropdown and Bulk Update Button -->
                                    <div class="d-flex align-items-center gap-3">
                                        <select id="bulkStatusSelect" class="form-select" style="width: auto;">
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                        <button id="bulkUpdateButton" class="btn btn-primary">
                                            Update Status
                                        </button>
                                    </div>
                                    <!-- Delete Selected Countries Button -->
                                    <div>
                                        <button type="submit" name="delete_selected" class="btn btn-danger custom-delete-btn">
                                            <svg class="icon" style="width: 40px; height: 40px;">
                                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once '../partials/footer.php';
        ?>