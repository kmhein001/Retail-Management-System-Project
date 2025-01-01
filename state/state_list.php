<?php
include_once '../partials/header.php';
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a>
</li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="Place">Place</a>
</li>
<li class="breadcrumb-item active"><a href="<?= $base_url ?>/state/state_list.php" data-coreui-i18n="State">State list</a>
</li>
</ol>
</nav>
</div>
</header>
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-header">
                <div>
                    <h3 class="card-title my-3">State List</h3>
                    <h5 class="text-muted my-3">Manage your State</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="example">
                    <div class=" d-flex justify-content-between align-items-center">
                    <div class="wordset">
                        <ul class="list-unstyled d-flex align-items-center">
                            <!-- Copy to Clipboard -->
                            <li class="me-2">
                                <a id="exportCopy" class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                                    style="width:60px;height:60px;" data-coreui-toggle="tooltip"
                                    data-coreui-placement="top" title="Copy to Clipboard">
                                    <svg class="icon" style="width:20px;height:20px;">
                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-copy"></use>
                                    </svg>
                                </a>
                            </li>
                            <!-- Export as CSV -->
                            <li class="me-2">
                                <a id="exportCsv" class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                                    style="width:60px;height:60px;" data-coreui-toggle="tooltip"
                                    data-coreui-placement="top" title="Export as CSV">
                                    <svg class="icon" style="width:20px;height:20px;">
                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                                    </svg>
                                </a>
                            </li>
                            <!-- Export as PDF -->
                            <li class="me-2">
                                <a id="exportPdf" class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                                    style="width:60px;height:60px;" data-coreui-toggle="tooltip"
                                    data-coreui-placement="top" title="Export as PDF">
                                    <svg class="icon" style="width:20px;height:20px;">
                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                                    </svg>
                                </a>
                            </li>
                            <!-- Export as Excel -->
                            <li class="me-2">
                                <a id="exportExcel" class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                                    style="width:60px;height:60px;" data-coreui-toggle="tooltip"
                                    data-coreui-placement="top" title="Export as Excel">
                                    <svg class="icon" style="width:20px;height:20px;">
                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-spreadsheet"></use>
                                    </svg>
                                </a>
                            </li>
                            <!-- Print Table -->
                            <li class="me-2">
                                <a id="exportPrint" class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                                    style="width:60px;height:60px;" data-coreui-toggle="tooltip"
                                    data-coreui-placement="top" title="Print Table">
                                    <svg class="icon" style="width:20px;height:20px;">
                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-print"></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <a class="btn btn-primary d-flex align-items-center justify-content-center fs-4"
                            style="width:200px;height:60px;" href="<?= $base_url ?>/state/state_add.php">
                            <svg class="icon me-2" style="width:30px;height:30px;">
                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                            </svg>
                            <span data-coreui-i18n="Add State">Add State</span>
                        </a>
                    </div>
                    </div>
                    <div class="tab-content rounded-bottom">
                        <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                            <!-- Table container with default browser scroll -->
                            <div class="table-container my-2">
                                <table id="General_Auto_Table" class="table table-striped table-bordered border-warning mt-4" style="margin-bo">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><input type="checkbox" id="selectAllCheckbox"></th>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">State Name</th>
                                            <th class="text-center">Country Name</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example Row -->
                                        <tr>
                                            <td class="align-middle text-center">
                                                <input type="checkbox" class="rowCheckbox">
                                            </td>
                                            <td class="align-middle text-center">1</td>
                                            <td class="align-middle text-center">Apple</td>
                                            <td class="align-middle text-start">A well-known State for electronic devices.</td>
                                            <td class="align-middle text-center">
                                                <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                                    <input class="form-check-input" type="checkbox" id="user2" checked>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a class="btn btn-outline-success me-2" href="#">
                                                    <svg class="icon" style="width:30px;height:30px;">
                                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                                                    </svg>
                                                </a>
                                                <a class="btn btn-outline-info me-2" href="<?= $base_url ?>/state/state_edit.php">
                                                    <svg class="icon" style="width:30px;height:30px;">
                                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                                                    </svg>
                                                </a>
                                                <a class="btn btn-outline-danger" href="<?= $base_url ?>/state/state_delete.php">
                                                    <svg class="icon" style="width:30px;height:30px;">
                                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

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