<?php
include_once '../partials/header.php';
include_once 'product.php';
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a> </li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="<?= $C_general ?>"><?= $C_general ?></a></li>
<li class="breadcrumb-item active"><a href="<?= $H_Title_Link_5 ?>" data-coreui-i18n="<?= $H_Title_5 ?>"><?= $H_Title_5 ?></a></li>
</ol>
</nav>
</div>
</header>
<div class="body flex-grow-1">
    <div class="container px-2">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
                    <div>
                        <h3 class="card-title my-3 fs-4 fs-md-3"><?= $C_general . "Details" ?></h3>
                        <h5 class="text-muted my-3 fs-6 fs-md-5"><?= "Full details of a" . $L_general ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container px-2 py-4">
                    <div class="row">
                        <!-- Product Details Section -->
                        <div class="col-lg-8 col-sm-12">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-primary text-white d-flex align-items-center">
                                    <h4 class="mb-0">Product Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="bar-code-view">
                                            <img src="assets/img/barcode1.png" alt="Barcode" class="img-fluid" style="max-width: 200px;">
                                        </div>
                                        <a href="#" class="btn btn-primary d-flex align-items-center" title="Print" style="height: 40px;">
                                            <img src="assets/img/icons/printer.svg" alt="Print" class="me-2" style="width: 24px;">
                                            Print
                                        </a>
                                    </div>
                                    <div class="productdetails">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Product:</strong>
                                                <span>Macbook Pro</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Brand:</strong>
                                                <span>None</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Category:</strong>
                                                <span>Computers</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Sub Category:</strong>
                                                <span>None</span>
                                            </li>
                                          
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Unit:</strong>
                                                <span>Piece</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>SKU:</strong>
                                                <span>PT0001</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Minimum Qty:</strong>
                                                <span>5</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Quantity:</strong>
                                                <span>50</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Tax:</strong>
                                                <span>0.00%</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Discount Type:</strong>
                                                <span>Percentage</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Price:</strong>
                                                <span>$1500.00</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong>Status:</strong>
                                                <span>Active</span>
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Description:</strong>
                                                <p class="mb-0 mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Images Slider Section -->
                        <div class="col-lg-4 col-sm-12">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-secondary text-white d-flex align-items-center">
                                    <h4 class="mb-0">Product Images</h4>
                                </div>
                                <div class="card-body">
                                    <div class="slider-product-details">
                                        <div class="owl-carousel owl-theme product-slide">
                                            <div class="slider-product text-center">
                                                <img src="assets/img/product/product69.jpg" alt="Product Image" class="img-fluid rounded mb-2">
                                                <h5 class="mb-1">macbookpro.jpg</h5>
                                                <small class="text-muted">581kb</small>
                                            </div>
                                            <div class="slider-product text-center">
                                                <img src="assets/img/product/product69.jpg" alt="Product Image" class="img-fluid rounded mb-2">
                                                <h5 class="mb-1">macbookpro.jpg</h5>
                                                <small class="text-muted">581kb</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php
        include_once '../partials/footer.php';
        ?>