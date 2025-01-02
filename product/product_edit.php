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

                // Check if ID is provided in the URL
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
                        <?php
                        $sql_brands = "SELECT BrandID, BrandName FROM Brands ORDER BY BrandName";
                        $result_brands = $conn->query($sql_brands);

                        if ($result_brands->num_rows > 0) {
                            $brands = $result_brands->fetch_all(MYSQLI_ASSOC);
                        } else {
                            $brands = [];
                        }
                        ?>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="bname" class="form-label fw-bold fs-4">Brand Name</label>
                                <select class="form-control" style="height:60px" id="bname" name="bname">
                                    <option value="">Select Brand</option>
                                    <?php foreach ($brands as $brand): ?>
                                        <option value="<?= htmlspecialchars($brand['BrandID']) ?>"
                                            <?= isset($row['BrandID']) && $row['BrandID'] == $brand['BrandID'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($brand['BrandName']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php
                        $sql_category = "SELECT CategoryID, CategoryName FROM Category ORDER BY Category";
                        $result_category = $conn->query($sql_category);

                        if ($result_category->num_rows > 0) {
                            $categories = $result_category->fetch_all(MYSQLI_ASSOC);
                        } else {
                            $categories = [];

                            var_dump($categories);
                            var_dump($row);
                        }
                        ?>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="cname" class="form-label fw-bold fs-4">Category Name</label>
                                <select class="form-control" style="height:60px" id="cname" name="cname">
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= htmlspecialchars($category['CategoryID']) ?>"
                                            <?= isset($row['CategoryName']) && $row['CategoryName'] == $category['CategoryName'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($category['CategoryName']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php
                        $sql_subcategories = "SELECT SubcategoryID, SubcategoryName FROM Subcategory ORDER BY SubcategoryName";
                        $result_subcategories = $conn->query($sql_subcategories);

                        if ($result_subcategories->num_rows > 0) {
                            $subcategories = $result_subcategories->fetch_all(MYSQLI_ASSOC); // Store all subcategories in an array
                        } else {
                            $subcategories = [];
                            var_dump($subcategories);
                            var_dump($row);
                        }
                        ?>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="sname" class="form-label fw-bold fs-4">Subcategory Name</label>
                                <select class="form-control" style="height:60px" id="sname" name="sname">
                                    <option value="">Select Subcategory</option>
                                    <?php foreach ($subcategories as $subcategory): ?>
                                        <option value="<?= htmlspecialchars($subcategory['SubcategoryID']) ?>"
                                            <?= isset($row['SubcategoryID']) && $row['SubcategoryID'] == $subcategory['SubcategoryID'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($subcategory['SubcategoryName']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-4">
                            <div class="mb-3">
                                <label for="price" class="form-label fw-bold fs-4">Price</label>
                                <input type="text" class="form-control" style="height:60px" row-5 id="price" name="price" placeholder="Enter Price MMK" value="<?= htmlspecialchars($row['Price'] ?? '') ?>">
                            </div>
                        </div>
                        <?php
                        $sql_units = "SELECT UnitID, ShortWord FROM MeasurementUnits ORDER BY ShortWord";
                        $result_units = $conn->query($sql_units);

                        if ($result_units->num_rows > 0) {
                            $units = $result_units->fetch_all(MYSQLI_ASSOC); // Store all units in an array
                        } else {
                            $units = [];
                        }
                        ?>
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
                                    foreach ($units as $unit):
                                    ?>
                                        <option value="<?= htmlspecialchars($unit['UnitID']) ?>"
                                            <?= isset($row['UnitID']) && $row['UnitID'] == $unit['UnitID'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($unit['ShortWord']) ?>
                                        </option>
                                    <?php endforeach; ?>
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