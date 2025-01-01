<?php
include_once '../partials/header.php';
?>

<li class="breadcrumb-item"><a href="<?= $base_url ?>/index.php" data-coreui-i18n="Dashboard">Dashboard</a></li>
<li class="breadcrumb-item"><a href="<?= $base_url ?>/state/state_list.php" data-coreui-i18n="State List">State List</a></li>
<li class="breadcrumb-item active"><a href="<?= $base_url ?>/state/state_add.php" data-coreui-i18n="Add State">Add State</a></li>
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
                    <h3 class="card-title my-3">Add New State</h3>
                    <h5 class="text-muted my-3">Create a new state entry</h5>
                </div>
                <a href="<?= $base_url ?>/state/state_list.php" class="btn btn-primary d-flex align-items-center justify-content-center fs-4" style="width:200px;height:60px;">
                    <svg class="icon me-2" style="width:30px;height:30px;">
                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                    </svg>
                    Back to List
                </a>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <form action="state_add_process.php" method="POST">
                    <div class="row g-3">
                        <!-- State Name Input -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="mb-3">
                                <label for="stateName" class="form-label fw-semibold">State Name</label>
                                <input type="text" id="stateName" name="state_name" class="form-control" placeholder="Enter state name" required>
                            </div>
                        </div>

                        <!-- Country Dropdown -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="mb-3">
                                <label for="GCountryN" class="form-label fw-semibold">Country</label>
                                <select id="GCountryN" class="form-select" required>
                                    <option value="" selected disabled>Select a country</option>
                                    <!-- Add more options dynamically if needed -->
                                </select>
                            </div>
                        </div>

                        <!-- Submit and Cancel Buttons -->
                        <div class="col-lg-12">
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <button type="submit" class="btn btn-outline-success d-flex align-items-center justify-content-center fs-4" style="width: 200px; height: 50px;">Submit</button>
                                <a href="<?= $base_url ?>/state/state_list.php" class="btn btn-outline-danger d-flex align-items-center justify-content-center fs-4" style="width: 200px; height: 50px;">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php
include_once '../partials/footer.php';
?>
