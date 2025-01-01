<!-- sidebar left -->
<div class="sidebar sidebar-fixed border-end" id="sidebar">
    <!-- sidebar header brand -->
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <!-- sidebar header brand logo-->
            <a href="<?= $base_url ?>/index.php" class="custom-sidebar-brand d-flex align-items-center">
                <img src="../assets/brand/RMS_small.png" class="sidebar-brand-full" width="60" height="50" alt="RMS Logo">
                <div class="sidebar-brand-text">
                    <p class="sidebar-brand-title">RMS</p>
                    <p class="sidebar-brand-subtitle">Retail Management System</p>
                </div>
            </a>
            <!-- sidebar header brand logo-small -->
            <a href="<?= $base_url ?>/index.php">
                <img src="../assets/brand/RMS_small.png" class="sidebar-brand-narrow" width="50" height="50" alt="RMS Logo">
            </a>
        </div>
        <!-- symbol "X" close -->
        <button class="btn-close d-lg-none" type="button" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <!-- sidebar Section -->
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <!--Dashboard sidebar Section -->
        <li class="nav-item">
            <a class="nav-link" href="<?= $base_url ?>/index.php">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                </svg>
                <span data-coreui-i18n="Dashboard">Dashboard</span>
                <span class="badge bg-danger-gradient ms-auto">Admin</span>
            </a>
        </li>
        <!-- Product sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-inbox"></use>
                </svg>
                <span data-coreui-i18n="Product">Product</span>
                <span class="badge bg-warning-gradient ms-auto">PRO</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/product/product_list.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Product list">Product List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/product/product_add.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Product">Add Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/category/category_list.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-tags"></use>
                        </svg>
                        <span data-coreui-i18n="Category List">Category List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/category/category_add.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                        </svg>
                        <span data-coreui-i18n="Add Category">Add Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/subcategory/subcategory_list.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-applications"></use>
                        </svg>
                        <span data-coreui-i18n="Sub Category List">Sub Category List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/subcategory/subcategory_add.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-folder"></use>
                        </svg>
                        <span data-coreui-i18n="Add Sub Category">Add Sub Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/brand/brand_list.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-star"></use>
                        </svg>
                        <span data-coreui-i18n="Brand List">Brand List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/brand/brand_add.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Brand">Add Brand</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/importproduct.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                        </svg>
                        <span data-coreui-i18n="Import Products">Import Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/barcode.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-barcode"></use>
                        </svg>
                        <span data-coreui-i18n="Print Barcode">Print Barcode</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Sales Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-chart-line"></use>
                </svg>
                <span data-coreui-i18n="Sales">Sales</span>
                <span class="badge bg-success-gradient ms-auto">Manager</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/sale/sales_list.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Sales List">Sales List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/sale/pos.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cash"></use>
                        </svg>
                        <span data-coreui-i18n="POS">POS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/sale/pos.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="New Sales">New Sales</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/sale/salesreturnlists.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-history"></use>
                        </svg>
                        <span data-coreui-i18n="Sales Return List">Sales Return List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/sale/createsalesreturns.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-loop"></use>
                        </svg>
                        <span data-coreui-i18n="New Sales Return">New Sales Return</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Purchase Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cart"></use>
                </svg>
                <span data-coreui-i18n="Purchase">Purchase</span>
                <span class="badge bg-primary-gradient ms-auto">Expert</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/purchase/purchaselist.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Purchase List">Purchase List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/purchase/addpurchase.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Purchase">Add Purchase</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/purchase/importpurchase.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                        </svg>
                        <span data-coreui-i18n="Import Purchase">Import Purchase</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Expense Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-money"></use>
                </svg>
                <span data-coreui-i18n="Expense">Expense</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/expense/expenselist.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Expense List">Expense List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/expense/createexpense.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Expense">Add Expense</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/expense/expensecategory.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-tags"></use>
                        </svg>
                        <span data-coreui-i18n="Expense Category">Expense Category</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Quotation Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-paper-plane"></use>
                </svg>
                <span data-coreui-i18n="Quotation">Quotation</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/quotation/quotation_List.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Quotation List">Quotation List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/quotation/addquotation.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Quotation">Add Quotation</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Transfer Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-right"></use>
                </svg>
                <span data-coreui-i18n="Transfer">Transfer</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/transfer/transferlist.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Transfer List">Transfer List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/transfer_section/transfer/addtransfer.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Transfer">Add Transfer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/transfer_section/transfer/importtransfer.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                        </svg>
                        <span data-coreui-i18n="Import Transfer">Import Transfer</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Return Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-loop"></use>
                </svg>
                <span data-coreui-i18n="Return">Return</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/salesreturn/salesreturnlist.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Sales Return List">Sales Return List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/salesreturn/createsalesreturn.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Sales Return">Add Sales Return</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/salesreturn/purchasereturnlist.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Purchase Return List">Purchase Return List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/salesreturn/createpurchasereturn.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Purchase Return">Add Purchase Return</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- People Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                </svg>
                <span data-coreui-i18n="People">People</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/customer/customerlist.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg>
                        <span data-coreui-i18n="Customer List">Customer List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/customer/addcustomer.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Customer">Add Customer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/supplier/supplierlist.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg>
                        <span data-coreui-i18n="Supplier List">Supplier List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/supplier/addsupplier.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Supplier">Add Supplier</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/user/userlist.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg>
                        <span data-coreui-i18n="User List">User List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/user/adduser.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add User">Add User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/store/storelist.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-store"></use>
                        </svg>
                        <span data-coreui-i18n="Store List">Store List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/store/addstore.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="Add Store">Add Store</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Places Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-globe-alt"></use>
                </svg>
                <span data-coreui-i18n="Places">Places</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/countries/country_add.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-map"></use>
                        </svg>
                        <span data-coreui-i18n="New Country">New Country</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/countries/country_list.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Countries List">Countries List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/state/state_add.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-map"></use>
                        </svg>
                        <span data-coreui-i18n="Add State">Add State</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/state/state_list.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="State List">State List</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Report Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-clock"></use>
                </svg>
                <span data-coreui-i18n="Report">Report</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/purchaseorderreport.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Purchase Order Report">Purchase Order Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/inventoryreport.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Inventory Report">Inventory Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/salesreport.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-chart-line"></use>
                        </svg>
                        <span data-coreui-i18n="Sales Report">Sales Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/invoicereport.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                        </svg>
                        <span data-coreui-i18n="Invoice Report">Invoice Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/purchasereport.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cart"></use>
                        </svg>
                        <span data-coreui-i18n="Purchase Report">Purchase Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/supplierreport.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg>
                        <span data-coreui-i18n="Supplier Report">Supplier Report</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/customerreport.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg>
                        <span data-coreui-i18n="Customer Report">Customer Report</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Users Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                </svg>
                <span data-coreui-i18n="Users">Users</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/newuser.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        <span data-coreui-i18n="New User">New User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/userlists.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                        </svg>
                        <span data-coreui-i18n="Users List">Users List</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Settings Sidebar Section -->
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="javascript:void(0);" role="button">
                <svg class="nav-icon">
                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                </svg>
                <span data-coreui-i18n="Settings">Settings</span>
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/generalsettings.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                        </svg>
                        <span data-coreui-i18n="General Settings">General Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/emailsettings.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-paper-plane"></use>
                        </svg>
                        <span data-coreui-i18n="Email Settings">Email Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/paymentsettings.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                        </svg>
                        <span data-coreui-i18n="Payment Settings">Payment Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/currencysettings.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-dollar"></use>
                        </svg>
                        <span data-coreui-i18n="Currency Settings">Currency Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/grouppermissions.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                        </svg>
                        <span data-coreui-i18n="Group Permissions">Group Permissions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/taxrates.php">
                        <svg class="nav-icon">
                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
                        </svg>
                        <span data-coreui-i18n="Tax Rates">Tax Rates</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- sidebar-footer-toggler -->
    <div class="sidebar-footer border-top d-none d-lg-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>