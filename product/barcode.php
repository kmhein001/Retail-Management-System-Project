<script>   
    document.addEventListener("DOMContentLoaded", function() {
    <?php
    $result->data_seek(0);
    while ($row = $result->fetch_assoc()) {
    ?>
        JsBarcode("#barcode_<?= $row[$SQL_1] ?>", "<?= $row[$SQL_4] ?>", {
            format: "CODE128",
            width: 1,
            height: 50,
            displayValue: true
        });
    <?php } ?>
});
</script>