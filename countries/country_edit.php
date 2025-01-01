<?php
include_once '../partials/header.php';
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a>
</li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="Place">Place</a>
</li>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/countries/country_list.php" data-coreui-i18n="Country List">Country List</a>
</li>
<li class="breadcrumb-item active"><a href="<?= $base_url ?>/countries/country_edit.php" data-coreui-i18n="Country Add">Edit Country</a>
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
                            <h3 class="card-title fw-bold fs-4 my-4">Edit Country</h3>
                            <h5 class="text-muted fs-6 mb-4">Manage your Country</h5>
                        </div>
                    </div>

                    <!-- Back to Country List Button Section -->
                    <div class="col-md-6 col-12 d-flex justify-content-end align-items-center mt-3 mt-md-0">
                        <a class="btn btn-primary d-flex align-items-center justify-content-center"
                            style="min-width: 200px; height: 60px; font-size: 16px; border-radius: 10px;"
                            href="<?= $base_url ?>/countries/country_list.php">
                            <svg class="icon me-2" style="width: 24px; height: 24px;">
                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                            </svg>
                            <span class="fs-5">Back to List</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <?php
              
                // Check if ID is provided in the URL
                if (!isset($_GET['id'])) {
                    header("Location: country_list.php");
                    exit();
                }

                $id = (int)$_GET['id']; // Sanitize ID


                // Fetch country details
                $stmt = $conn->prepare("SELECT * FROM NewCountries WHERE CountryID = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    header("Location: country_list.php");
                    exit();
                }

                $stmt->close();
                ?>
                <form action="./country_update.php" class="px-3 py-4" method="POST" enctype="multipart/form-data">
                    <!-- Form fields for country details -->
                    <div class="row g-4">
                        <!-- Country ID -->
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="d-flex align-items-center justify-content-start" style="height: 100px;">
                                <label for="country_id" class="form-label fw-bold fs-4 me-3 mt-3">Country ID:</label>
                                <div class="badge bg-info text-white fs-5" id="country_id_badge">
                                    <?= htmlspecialchars($row['CountryID'] ?? 'Auto-generated ID') ?>
                                </div>
                                <input type="hidden" id="country_id" name="country_id" value="<?= htmlspecialchars($row['CountryID'] ?? '') ?>">
                            </div>
                        </div>
                        <!-- Country Name -->
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold fs-4">Country Name</label>
                                <input type="text" class="form-control" style="height:60px" id="name" name="name" placeholder="Enter country name" value="<?= htmlspecialchars($row['CountryName'] ?? '') ?>" required>
                            </div>
                        </div>

                        <!-- ISO Code -->
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="iso_code" class="form-label fw-bold fs-4">ISO Code</label>
                                <input type="text" class="form-control" style="height:60px" id="iso_code" name="iso_code" placeholder="Enter ISO Code" value="<?= htmlspecialchars($row['Iso_Code'] ?? '') ?>">
                            </div>
                        </div>

                        <!-- ISD Code -->
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="isd_code" class="form-label fw-bold fs-4">ISD Code</label>
                                <input type="text" class="form-control" style="height:60px" id="isd_code" name="isd_code" placeholder="Enter ISD Code" value="<?= htmlspecialchars($row['Isd_Code'] ?? '') ?>">
                            </div>
                        </div>

                        <!-- Time Zone -->
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="time_zone" class="form-label fw-bold fs-4">Time Zone</label>
                                <input type="text" class="form-control" style="height:60px" id="time_zone" name="time_zone" placeholder="Enter Time Zone" value="<?= htmlspecialchars($row['Time_Zone'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <!-- Wrapper to control visibility -->
                            <div class="form-check form-switch d-flex align-items-center justify-content-start ms-3 mt-2"
                                id="status-toggle"
                                style="height: 100px;">
                                <input class="form-check-input me-3"
                                    type="checkbox"
                                    id="status"
                                    name="status"
                                    value="Active" <?= (isset($row['Status']) && $row['Status'] === 'Active') ? 'checked' : '' ?>
                                    style="width: 60px; height: 25px;">
                                <label for="status"
                                    class="form-check-label fw-bold fs-4">
                                    Status
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Image Upload -->
                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="flag_image" class="form-label fw-semibold fs-4">Product Image</label>
                                <div class="image-upload">
                                    <?php
                                    $file_extension = strtolower(pathinfo($row["Flag_Image"], PATHINFO_EXTENSION));
                                    $image_path = !empty($row["Flag_Image"])
                                        ? (($file_extension === 'svg')
                                            ? "../assets/img/flag/svg/" . $row["Flag_Image"]
                                            : "../assets/img/flag/png/" . $row["Flag_Image"])
                                        : "../assets/img/default-placeholder.png";
                                    ?>
                                    <img src="<?= $image_path ?>"
                                        alt="<?= htmlspecialchars($row['CountryName'] ?? 'Flag Image') ?>"
                                        style="widht:300px; height: 300px;" />
                                    <!-- File Input for New Image -->
                                    <input type="file" id="flag_image" name="flag_image"
                                        accept="image/png, image/svg+xml" class="form-control mt-4">

                                    <!-- Drag-and-Drop Placeholder -->
                                    <div class="mt-3 d-flex flex-column align-items-center justify-content-center border rounded p-3" style="height: 150px;">
                                        <svg class="icon mb-2" style="width: 50px; height: 50px;">
                                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cloud-upload"></use>
                                        </svg>
                                        <h6 class="text-muted fs-5">Drag and drop a file to upload</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-center gap-3">
                                <button type="submit" class="btn btn-outline-primary fs-5 px-5 py-3" style="border-radius: 6px;">
                                    Update
                                </button>
                                <a href="<?= $base_url ?>/countries/country_list.php" class="btn btn-outline-danger fs-5 px-5 py-3" style="border-radius: 6px;">
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