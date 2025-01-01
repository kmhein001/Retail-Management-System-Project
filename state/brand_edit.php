<?php
include_once '../partials/header.php';
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a>
</li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="Product">Product</a>
</li>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/brand/brand_list.php" data-coreui-i18n="Brand">Brand list</a>
</li>
<li class="breadcrumb-item active"><a href="<?= $base_url ?>/brand/brand_add.php" data-coreui-i18n="Add Brand">Add Brand</a>
</li>
</ol>
</nav>
</div>
</header>
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <!-- Card Header -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="card-title my-3">Edit Brand</h3>
                    <h5 class="text-muted my-3">Modify brand details</h5>
                </div>
                <a href="<?= $base_url ?>/brand/brand_list.php" class="btn btn-primary d-flex align-items-center justify-content-center fs-4" style="width:200px;height:60px;">
                    <svg class="icon me-2" style="width:30px;height:30px;">
                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                    </svg>
                    Back to List
                </a>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="row g-3">
                    <!-- No. Input -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="brandNo" class="form-label fw-semibold">No.</label>
                            <input type="number" id="brandNo" class="form-control" placeholder="Enter brand number">
                        </div>
                    </div>

                    <!-- Brand Name Input -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="brandName" class="form-label fw-semibold">Brand Name</label>
                            <input type="text" id="brandName" class="form-control" placeholder="Enter brand name">
                        </div>
                    </div>

                    <!-- Country Dropdown -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="brandCountry" class="form-label fw-semibold">Country</label>
                            <select id="brandCountry" class="form-select">
                                <option value="" selected disabled>Select a country</option>
                                <!-- Options populated dynamically via JavaScript -->
                            </select>
                        </div>
                    </div>

                    <!-- Description Input -->
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="brandDescription" class="form-label fw-semibold">Description</label>
                            <textarea id="brandDescription" class="form-control" rows="4" placeholder="Enter description"></textarea>
                        </div>
                    </div>

                    <!-- Image Upload with Display -->
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="productImage" class="form-label fw-semibold">Product Image</label>
                            <div class="image-upload">
                                <input type="file" id="productImage" class="form-control">
                                <div class="mt-2 d-flex flex-column align-items-center border rounded p-3">
                                    <svg class="icon mb-2" style="width: 50px; height: 50px;">
                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cloud-upload"></use>
                                    </svg>
                                    <h6 class="text-muted">Drag and drop a file to upload</h6>
                                </div>
                                <!-- Image Display -->
                                <div class="mt-3 text-center">
                                    <img id="imagePreview" src="../assets/img/default-image.png" alt="Image Preview" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center justify-content-center gap-3">
                            <a href="javascript:void(0);" class="btn btn-outline-success d-flex align-items-center justify-content-center fs-4"
                                style="width: 200px; height: 50px;">Submit</a>
                            <a href="brandlist.html" class="btn btn-outline-danger d-flex align-items-center justify-content-center fs-4"
                                style="width: 200px; height: 50px;">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once '../partials/footer.php';
        ?>