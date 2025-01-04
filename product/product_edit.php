<?php
include_once '../partials/header.php';
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a>
</li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="Product">Product</a>
</li>
<li class="breadcrumb-item"><a href="product_list.php" data-coreui-i18n="Product List">Product list</a>
</li>
<li class="breadcrumb-item active"><a href="product_edit.php" data-coreui-i18n="Edit Product">Edit Product</a>
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
                            <h3 class="card-title fw-bold fs-4 my-4">Edit Product</h3>
                            <h5 class="text-muted fs-6 mb-4">Manage your Product</h5>
                        </div>
                    </div>


                    <div class="col-md-6 col-12 d-flex justify-content-end align-items-center mt-3 mt-md-0">
                        <a class="btn btn-primary d-flex align-items-center justify-content-center"
                            style="min-width: 200px; height: 60px; font-size: 16px; border-radius: 10px;"
                            href="product_list.php">
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

                if (!isset($_GET['id'])) {
                    header("Location: product_list.php");
                    exit();
                }
                $id = (int)$_GET['id'];

                $stmt = $conn->prepare("SELECT * FROM Products WHERE ProductID = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    header("Location: product_list.php");
                    exit();
                }

                $stmt->close();
                ?>
                <form action="product_update.php" class="px-3 py-4" method="POST" enctype="multipart/form-data">

                    <div class="row g-4">

                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="d-flex align-items-center justify-content-start" style="height: 100px;">
                                <label for="id" class="form-label fw-bold fs-4 me-3 mt-3">Product ID:</label>
                                <div class="badge bg-info text-white fs-5" id="id_badge">
                                    <?= htmlspecialchars($row['ProductID'] ?? 'Auto-generated ID') ?>
                                </div>
                                <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($row['ProductID'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold fs-4">Product Name</label>
                                <input type="text" class="form-control" style="height:60px" id="name" name="name" placeholder="Enter Product Name" value="<?= htmlspecialchars($row['ProductName'] ?? '') ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="sku" class="form-label fw-bold fs-4">SKU</label>
                                <input type="text" class="form-control" style="height:60px" id="sku" name="sku" placeholder="Enter SKU" value="<?= htmlspecialchars($row['SKU'] ?? '') ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="bname" class="form-label fw-bold fs-4">Brand Name</label>
                                <select class="form-control" style="height:60px" id="bname" name="bname">
                                    <option value="">Select Brand</option>
                                    <?php
                                    // Fetch brands securely
                                    $stmt = $conn->prepare("SELECT BrandID, BrandName FROM Brands ORDER BY BrandName ASC");
                                    if ($stmt) {
                                        $stmt->execute();
                                        $result_brands = $stmt->get_result();
                                        while ($brand = $result_brands->fetch_assoc()) {
                                            $selected = ($row['BrandName'] === $brand['BrandName']) ? 'selected' : '';
                                            echo '<option value="' . htmlspecialchars($brand['BrandID']) . '" ' . $selected . '>' . htmlspecialchars($brand['BrandName']) . '</option>';
                                        }
                                        $stmt->close();
                                    } else {
                                        echo '<option value="">Error fetching brands</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="cname" class="form-label fw-bold fs-4">Category Name</label>
                                <select class="form-control" style="height:60px" id="cname" name="cname">
                                    <option value="">Select Category</option>
                                    <?php
                                    // Fetch categories securely
                                    $stmt = $conn->prepare("SELECT CategoryID, CategoryName FROM Category ORDER BY CategoryName ASC");
                                    if ($stmt) {
                                        $stmt->execute();
                                        $result_category = $stmt->get_result();
                                        while ($category = $result_category->fetch_assoc()) {
                                            $selected = ($row['CategoryName'] === $category['CategoryName']) ? 'selected' : '';
                                            echo '<option value="' . htmlspecialchars($category['CategoryID']) . '" ' . $selected . '>' . htmlspecialchars($category['CategoryName']) . '</option>';
                                        }
                                        $stmt->close();
                                    } else {
                                        echo '<option value="">Error fetching categories</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="sname" class="form-label fw-bold fs-4">Subcategory Name</label>
                                <select class="form-control" style="height:60px" id="sname" name="sname">
                                    <option value="">Select Subcategory</option>
                                    <?php
                                    // Fetch subcategories securely
                                    $stmt = $conn->prepare("SELECT SubcategoryID, SubcategoryName FROM Subcategory ORDER BY SubcategoryName ASC");
                                    if ($stmt) {
                                        $stmt->execute();
                                        $result_subcategories = $stmt->get_result();
                                        while ($subcategory = $result_subcategories->fetch_assoc()) {
                                            $selected = ($row['SubcategoryName'] === $subcategory['SubcategoryName']) ? 'selected' : '';
                                            echo '<option value="' . htmlspecialchars($subcategory['SubcategoryID']) . '" ' . $selected . '>' . htmlspecialchars($subcategory['SubcategoryName']) . '</option>';
                                        }
                                        $stmt->close();
                                    } else {
                                        echo '<option value="">Error fetching subcategories</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="price" class="form-label fw-bold fs-4">Price  </label>
                                    <div class="d-flex align-items-center">
                                        <input
                                            type="number"
                                            step="0.01"
                                            class="form-control me-2"
                                            id="price"
                                            name="price"
                                            placeholder="Enter Price"
                                            value="<?= htmlspecialchars($row['Price'] ?? '') ?>"
                                            required
                                            style="flex: 1; text-align: center; height:60px;">
                                        <div class="fs-4"style="color: #6c757d;">MMK</div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4 d-flex">
                            <div class="col-8 mb-3 me-3">
                                <label for="qty" class="form-label fw-bold fs-4">Quantity</label>
                                <input type="text" class="form-control" style="height:60px" id="qty" name="qty" placeholder="Enter Quantity" value="<?= htmlspecialchars($row['Quantity'] ?? '') ?>">
                            </div>

                            <div class="col-4 mb-3">
                                <label for="unit" class="form-label fw-bold fs-4">Unit</label>
                                <select class="form-control" style="height:60px" id="unit" name="unit">
                                    <option value="">Select Unit</option>
                                    <?php
                                    // Fetch units securely
                                    $stmt = $conn->prepare("SELECT UnitID, ShortWord FROM MeasurementUnits ORDER BY ShortWord ASC");
                                    if ($stmt) {
                                        $stmt->execute();
                                        $result_units = $stmt->get_result();
                                        while ($unit = $result_units->fetch_assoc()) {
                                            $selected = ($row['Unit'] === $unit['ShortWord']) ? 'selected' : '';
                                            echo '<option value="' . htmlspecialchars($unit['UnitID']) . '" ' . $selected . '>' . htmlspecialchars($unit['ShortWord']) . '</option>';
                                        }
                                        $stmt->close();
                                    } else {
                                        echo '<option value="">Error fetching units</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="cby" class="form-label fw-bold fs-4">Create By</label>
                                <input type="text" class="form-control" style="height:60px" row-5 id="cby" name="cby" placeholder="Enter CreatedBy" value="<?= htmlspecialchars($row['CreatedBy'] ?? '') ?>">
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
                                <label for="img" class="form-label fw-semibold fs-4">Product Image</label>
                                <div class="image-upload">
                                    <?php
                                    $file_extension = strtolower(pathinfo($row["ImageFile"], PATHINFO_EXTENSION));
                                    $image_path = !empty($row["ImageFile"])
                                        ? (($file_extension === 'svg')
                                            ? "../assets/img/product/svg/" . $row["ImageFile"]
                                            : "../assets/img/product/png/" . $row["ImageFile"])
                                        : "../assets/img/default-placeholder.png";
                                    ?>
                                    <img src="<?= $image_path ?>"
                                        alt="<?= htmlspecialchars($row['ProductName'] ?? 'ImageFile') ?>"
                                        style="width:300px; height: 300px;" />

                                    <input type="file" id="img" name="img"
                                        accept="image/png, image/svg+xml" class="form-control mt-4">

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
                                <a href="product_list.php" class="btn btn-outline-danger fs-5 px-5 py-3" style="border-radius: 6px;">
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