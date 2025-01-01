<?php
include_once '../partials/header.php';
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a>
</li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="Place">Product</a>
</li>
<li class="breadcrumb-item"><a href="brand_list.php" data-coreui-i18n="brand ">brand list</a>
</li>
<li class="breadcrumb-item active"><a href="brand_edit.php" data-coreui-i18n="Edit brand">Edit brand</a>
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
                            <h3 class="card-title fw-bold fs-4 my-4">Edit brand</h3>
                            <h5 class="text-muted fs-6 mb-4">Manage your brand</h5>
                        </div>
                    </div>

          
                    <div class="col-md-6 col-12 d-flex justify-content-end align-items-center mt-3 mt-md-0">
                        <a class="btn btn-primary d-flex align-items-center justify-content-center"
                            style="min-width: 200px; height: 60px; font-size: 16px; border-radius: 10px;"
                            href="brand_list.php">
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
                    header("Location: brand_list.php");
                    exit();
                }


                $id = (int)$_GET['id']; // Sanitize ID


                $stmt = $conn->prepare("SELECT * FROM Brands WHERE BrandID = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    header("Location: brand_list.php");
                    exit();
                }

                $stmt->close();
                ?>
                <form action="./brand_update.php" class="px-3 py-4" method="POST" enctype="multipart/form-data">
                    
                    <div class="row g-4">
                       
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="d-flex align-items-center justify-content-start" style="height: 100px;">
                                <label for="id" class="form-label fw-bold fs-4 me-3 mt-3">Brand ID:</label>
                                <div class="badge bg-info text-white fs-5" id="id_badge">
                                    <?= htmlspecialchars($row['BrandID'] ?? 'Auto-generated ID') ?>
                                </div>
                                <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($row['BrandID'] ?? '') ?>">
                            </div>
                        </div>
                       
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold fs-4">Brand Name</label>
                                <input type="text" class="form-control" style="height:60px" id="name" name="name" placeholder="Enter Brand Name'" value="<?= htmlspecialchars($row['BrandName'] ?? '') ?>" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="ccode" class="form-label fw-bold fs-4">Country Name</label>
                                <input type="text" class="form-control" style="height:60px" id="ccode" name="ccode" placeholder="Enter Country Name" value="<?= htmlspecialchars($row['CountryName'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="cby" class="form-label fw-bold fs-4">Create By</label>
                                <input type="text" class="form-control" row-5 id="cby" name="cby" placeholder="Enter CreatedBy" value="<?= htmlspecialchars($row['CreatedBy'] ?? '') ?>">
                            </div>
                        </div>
                    </div>
                   
                    <div class="row g-4 my-4">
                        <div class="col-12">
                        <div class="form-check form-switch d-flex align-items-center justify-content-center ms-3 mt-2"
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

                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="flag_image" class="form-label fw-semibold fs-4">Product Image</label>
                                <div class="image-upload">
                                    <?php
                                    $file_extension = strtolower(pathinfo($row["ImageFile"], PATHINFO_EXTENSION));
                                    $image_path = !empty($row["ImageFile"])
                                        ? (($file_extension === 'svg')
                                            ? "../assets/img/brand/svg/" . $row["ImageFile"]
                                            : "../assets/img/brand/png/" . $row["ImageFile"])
                                        : "../assets/img/default-placeholder.png";
                                    ?>
                                    <img src="<?= $image_path ?>"
                                        alt="<?= htmlspecialchars($row['BrandName'] ?? 'ImageFile') ?>"
                                        style="width:300px; height: 300px;" />
                                    <!-- File Input for New Image -->
                                    <input type="file" id="img" name="img"
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

                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-center gap-3">
                                <button type="submit" class="btn btn-outline-primary fs-5 px-5 py-3" style="border-radius: 6px;">
                                    Update
                                </button>
                                <a href="brand_list.php" class="btn btn-outline-danger fs-5 px-5 py-3" style="border-radius: 6px;">
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