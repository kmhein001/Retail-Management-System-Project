<?php
include_once '../partials/header.php';
include_once 'product.php';
?>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a> </li>
<li class="breadcrumb-item"><a href="javascript:void(0);" data-coreui-i18n="<?= $C_general ?>"><?= $C_general ?></a></li>
<li class="breadcrumb-item active"><a href="<?= $H_Title_Link_1 ?>" data-coreui-i18n="<?= $H_Title_1 ?>"><?= $H_Title_1 ?></a></li>
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
                        <h3 class="card-title my-3 fs-4 fs-md-3"><?= $H_Title_1 ?></h3>
                        <h5 class="text-muted my-3 fs-6 fs-md-5"><?= $H_Title_D_1 ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="example">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="col-md-6 col-12 mb-3 mb-md-0 d-flex justify-content-start">
                            <a class="btn btn-primary d-flex align-items-center justify-content-center align-middle"
                                style="width: 250px; height: 60px; font-size: 18px;"
                                href="<?= $H_Title_Link_2 ?>">
                                <svg class="icon me-4" style="width: 24px; height: 24px;">
                                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                                </svg>
                                <span><?= $H_Title_2 ?></span>
                            </a>
                        </div>
                        <?php
                        include_once '../partials/export_table.php';
                        ?>
                    </div>
                </div>
                <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <?php
                        include_once '../partials/search_bar_table.php';
                        ?>
                        <div class="table-container table-responsive my-2">
                            <?php
                            $sql = "SELECT * FROM $F_SQL";
                            $result = $conn->query($sql);
                            if (!$result) {
                                die("Error fetching data: " . $conn->error);
                            }
                            ?>
                            <form action="delete_multiple.php" method="POST" id="deleteForm">
                                <table id="General_Auto_Table" class="table table-striped table-bordered border-warning my-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center" id="checkboxColumn"><input type="checkbox" id="selectAllCheckbox"></th>
                                            <th class="text-center"><?= $SQL_Title_1 ?></th>
                                            <th class="text-center"><?= $SQL_Title_2 ?></th>
                                            <th class="text-center"><?= $SQL_Title_3 ?></th>
                                            <th class="text-center"><?= $SQL_Title_4 ?></th>
                                            <th class="text-center"><?= $SQL_Title_4_1 ?></th>
                                            <th class="text-center"><?= $SQL_Title_5 ?></th>
                                            <th class="text-center"><?= $SQL_Title_6 ?></th>
                                            <th class="text-center"><?= $SQL_Title_7 ?></th>
                                            <th class="text-center"><?= $SQL_Title_8 ?></th>
                                            <th class="text-center"><?= $SQL_Title_9 ?></th>
                                            <th class="text-center"><?= $SQL_Title_10 ?></th>
                                            <th class="text-center"><?= $SQL_Title_11 ?></th>
                                            <th class="text-center"><?= $SQL_Title_12 ?></th>
                                            <th class="text-center"><?= $Title_13 ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <input type="checkbox" name="selected_ids[]" value="<?= $row[$SQL_1] ?>" class="rowCheckbox">
                                                </td>
                                                <td class="align-middle text-center"><?= $row[$SQL_1] ?></td>
                                                <td class="align-middle text-center"><?= $row[$SQL_2] ?></td>
                                                <td class="align-middle text-center">
                                                    <?php
                                                    $file_extension = strtolower(pathinfo($row[$SQL_3], PATHINFO_EXTENSION));
                                                    if ($file_extension === 'svg') {
                                                        $image_path = "../assets/img/" . $L_img . "svg/" . $row[$SQL_3];
                                                    } elseif ($file_extension === 'png') {
                                                        $image_path = "../assets/img/" . $L_img . "png/" . $row[$SQL_3];
                                                    } else {
                                                        $image_path = "../assets/img/" . $L_img . "default.png";
                                                    }
                                                    ?>
                                                    <img src="<?= $image_path ?>"
                                                        alt="<?= isset($row[$SQL_2]) && !empty($row[$SQL_2]) ? $row[$SQL_2] : $row[$SQL_3] ?>"
                                                        style="width: 60px; height: 60px;" />
                                                </td>
                                                <td class="align-middle text-center"><?= $row[$SQL_4] ?></td>
                                                <td class="align-middle text-center">
                                                    <svg id="barcode_<?= $row[$SQL_1] ?>"></svg>
                                                </td>
                                                <td class="align-middle text-center"><?= $row[$SQL_5] ?></td>
                                                <td class="align-middle text-center"><?= $row[$SQL_6] ?></td>
                                                <td class="align-middle text-center"><?= $row[$SQL_7] ?></td>
                                                <td class="align-middle text-center"><?= $row[$SQL_8] ?></td>
                                                <td class="align-middle text-center"><?= $row[$SQL_9] ?></td>
                                                <td class="align-middle text-center"><?= $row[$SQL_10] ?></td>
                                                <td class="align-middle text-center"><?= $row[$SQL_11] ?></td>
                                                <td class="align-middle text-center">
                                                    <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                                        <input class="form-check-input status-toggle"
                                                            type="checkbox" data-general-id="<?= $row[$SQL_1] ?>"
                                                            <?= ($row[$SQL_12] == 'Active') ? 'checked' : '' ?>>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <div class="btn-group d-flex flex-column flex-sm-row justify-content-center">
                                                        <!-- Magnifying Glass Icon (View) -->
                                                        <a href="<?= $H_Title_Link_5 ?>?id=<?= $row[$SQL_1] ?>"
                                                            class="btn btn-outline-success me-2 mb-2 mb-sm-0">
                                                            <svg class="icon" style="width:30px;height:30px;">
                                                                <use xlink:href="<?= $V_C_I_S_free ?>#cil-magnifying-glass"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="<?= $H_Title_Link_3 ?>?id=<?= $row[$SQL_1] ?>"
                                                            class="btn btn-outline-info me-2 mb-2 mb-sm-0">
                                                            <svg class="icon" style="width:30px;height:30px;">
                                                                <use xlink:href="<?= $V_C_I_S_free ?>#cil-description"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="<?= $H_Title_Link_4 ?>?id=<?= $row[$SQL_1] ?>"
                                                            class="btn btn-outline-danger mb-2 mb-sm-0"
                                                            onclick="return confirm(\'Are you sure you want to delete this <?= $C_general ?>?\');">
                                                            <svg class="icon" style="width:30px;height:30px;">
                                                                <use xlink:href="<?= $V_C_I_S_free ?>#cil-trash"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                include_once '../partials/bottom_table.php';
                                ?>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once '../partials/footer.php';
        ?>