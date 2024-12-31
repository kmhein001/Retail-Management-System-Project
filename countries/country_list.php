<?php
include_once '../partials/header.php';
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a>
</li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="Place">Place</a>
</li>
<li class="breadcrumb-item active"><a href="<?= $base_url ?>/countries/country_list.php" data-coreui-i18n="Country List">Country list</a>
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
                        <h3 class="card-title my-3 fs-4 fs-md-3">Country List</h3>
                        <h5 class="text-muted my-3 fs-6 fs-md-5">Manage your Country</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="example">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Add Country Button Section -->
                        <div class="col-md-6 col-12 mb-3 mb-md-0 d-flex justify-content-start">
                            <a class="btn btn-primary d-flex align-items-center justify-content-center align-middle"
                                style="width: 200px; height: 60px; font-size: 18px;" href="<?= $base_url ?>/countries/country_add.php">
                                <svg class="icon me-2" style="width: 24px; height: 24px;">
                                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                                </svg>
                                <span>Add Country</span>
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
                            $sql = "SELECT * FROM NewCountries";
                            $result = $conn->query($sql);
                            ?>
                            <table id="General_Auto_Table" class="table table-striped table-bordered border-warning my-4">
                                <thead>
                                    <tr>
                                        <th class="text-center" id="checkboxColumn"><input type="checkbox" id="selectAllCheckbox"></th>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Country Name</th>
                                        <th class="text-center">Countries Iso Code</th>
                                        <th class="text-center">Flag Image</th>
                                        <th class="text-center">Countries Isd Code</th>
                                        <th class="text-center">Time Zone</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" id="actionsColumn">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td class="align-middle text-center">
                                                <input type="checkbox" class="rowCheckbox">
                                            </td>
                                            <td class="align-middle text-center"><?= $row["CountryID"] ?></td>
                                            <td class="align-middle text-center"><?= $row["CountryName"] ?></td>
                                            <td class="align-middle text-center"><?= $row["Countries_Iso_Code"] ?></td>
                                            <td class="align-middle text-center">
                                                <?php
                                                // Get the file extension
                                                $file_extension = strtolower(pathinfo($row["Flag_Image"], PATHINFO_EXTENSION));

                                                // Determine the correct directory based on the file extension
                                                if ($file_extension === 'svg') {
                                                    $image_path = "../assets/img/flag/svg/" . $row["Flag_Image"];
                                                } elseif ($file_extension === 'png') {
                                                    $image_path = "../assets/img/flag/png/" . $row["Flag_Image"];
                                                } else {
                                                    // Fallback image or error handling
                                                    $image_path = "../assets/img/flag/default.png"; // Use a default image if the type is unknown
                                                }
                                                ?>
                                                <img src="<?= $image_path ?>"
                                                    alt="<?= isset($row['CountryName']) && !empty($row['CountryName']) ? $row['CountryName'] : $row['Flag_Image'] ?>"
                                                    style="max-width: 100%; height: auto;" />
                                            </td>
                                            <td class="align-middle text-center"><?= $row["Countries_Isd_Code"] ?></td>
                                            <td class="align-middle text-center"><?= $row["Time_Zone"] ?></td>
                                            <td class="align-middle text-center">
                                                <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                                    <!-- Toggle the checkbox value dynamically based on the current status -->
                                                    <input class="form-check-input status-toggle"
                                                        type="checkbox" data-country-id="<?= $row["CountryID"] ?>"
                                                        <?= ($row["Status"] == 'Active') ? 'checked' : '' ?>>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group d-flex flex-column flex-sm-row justify-content-center">
                                                    <!-- Magnifying Glass Icon (View) -->
                                                    <a class="btn btn-outline-success me-2 mb-2 mb-sm-0" href="#">
                                                        <svg class="icon" style="width:30px;height:30px;">
                                                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                                                        </svg>
                                                    </a>
                                                    <!-- Edit Icon -->
                                                    <a class="btn btn-outline-info me-2 mb-2 mb-sm-0" href="<?= $base_url ?>/countries/country_edit.php">
                                                        <svg class="icon" style="width:30px;height:30px;">
                                                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                                                        </svg>
                                                    </a>
                                                    <!-- Delete Icon -->
                                                    <a class="btn btn-outline-danger mb-2 mb-sm-0" href="<?= $base_url ?>/countries/country_delete.php">
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
                                <script src="ajax_update_country.js"></script>
                            </table>
                            <div id="General_Auto_Table_info" class="custom-info d-flex justify-content-start mt-1">
                                <button class="btn btn-primary badge fs-5 py-2 px-3 w-auto">
                                    <!-- Pagination info will be updated here -->
                                    Showing 1 to 10 of 100 entries
                                </button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once '../partials/footer.php';
        ?>