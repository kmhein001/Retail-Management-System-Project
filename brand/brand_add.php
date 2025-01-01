<?php
include_once '../partials/header.php';
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a>
</li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="Place">Place</a>
</li>
<li class="breadcrumb-item"><a href="brand_list.php" data-coreui-i18n="Brand List">Brand list</a>
</li>
<li class="breadcrumb-item active"><a href="brand_add.php" data-coreui-i18n="Brand Add">Add Brand</a>
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
                            <h3 class="card-title fw-bold fs-4 my-4">Add Brand</h3>
                            <h5 class="text-muted fs-6 mb-4">Manage your Brand</h5>
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
                <form action="brand_add_process.php" class="px-3 py-4" method="POST" enctype="multipart/form-data">
                  
                    <div class="row g-4">
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold fs-4">Brand Name</label>
                                <input type="text" class="form-control" style="height:60px" id="name" name="name" placeholder="Enter Brand Name'" value="<?= htmlspecialchars($row['BrandName'] ?? '') ?>" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="ccode" class="form-label fw-bold fs-4">Country Name</label>
                                <input type="text" class="form-control" style="height:60px" id="ccode" name="ccode" placeholder="Enter Country Name" value="<?= htmlspecialchars($row['Country Name'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="cby" class="form-label fw-bold fs-4">Create By</label>
                                <input type="text" class="form-control" style="height:60px" id="cby" name="cby" placeholder="Enter CreatedBy" value="<?= htmlspecialchars($row['CreatedBy'] ?? '') ?>">
                            </div>
                        </div>

                       
                    </div>
                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="form-check form-switch d-flex align-items-center justify-content-start" id="status-toggle" style="display: none;">
                                <input class="form-check-input me-3" type="checkbox" id="status" name="status"
                                    style="width: 60px; height: 25px;" data-brand-id="<?= $row["BrandID"] ?>"
                                    <?= ($row["Status"] == 'Active') ? 'checked' : '' ?>>
                                <label for="status" class="form-check-label fw-bold fs-4">Status</label>
                            </div>
                        </div>
                    </div>
                    <!-- Image Upload -->
                    <div class="row g-4 my-4">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="img" class="form-label fw-semibold fs-4">Image</label>
                                <div class="image-upload">
                                    <input type="file" id="ImageFile" name="ImageFile" accept="image/png, image/svg+xml" class="form-control fs-">
                                    <div class="mt-4 d-flex flex-column align-items-center justify-content-center border rounded p-3" style="height: 300px;">
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
                                    Submit
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