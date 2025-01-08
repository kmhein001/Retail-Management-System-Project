<?php
include_once 'barcode.php';
?>
<script src="ajax_update_status.js"></script>
<div class="d-flex flex-column flex-md-row align-items-center justify-content-between mt-3">

    <div class="mb-2 mb-md-0">
        <div id="General_Auto_Table_info" class="custom-info">
            <button class="btn btn-primary badge fs-5 py-2 px-3 w-auto">
            </button>
        </div>
    </div>

    <div class="d-flex align-items-center gap-3">
        <select id="bulkStatusSelect" class="form-select" style="width: auto;">
            <option value="">Select Status</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
        <button id="bulkUpdateButton" class="btn btn-primary">
            Update Status
        </button>
    </div>

    <div>
        <button type="submit" name="delete_selected" class="btn btn-danger custom-delete-btn">
            <svg class="icon" style="width: 40px; height: 40px;">
                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
            </svg>
        </button>
    </div>
</div>