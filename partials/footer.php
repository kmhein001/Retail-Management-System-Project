
</div>
</div>
<footer class="footer px-4">
  <div><a href="https://coreui.io">CoreUI </a><a
      href="https://coreui.io/product/bootstrap-dashboard-template/">Bootstrap Admin Template</a> © 2024
    creativeLabs.</div>
  <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI PRO UI Components</a></div>
</footer>
</div>

<!-- CoreUI JS -->
<script src="../vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>

<!-- integration with CoreUI components & Utility functions for CoreUI framework -->
<script src="../vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
<script src="../vendors/@coreui/utils/js/index.js"></script>

<!-- JQuery -->
<script src="../js/jquery-3.7.1.min.js"></script>

<!-- DataTables Core -->
<script src="../vendors/datatables.net/js/dataTables.min.js"></script>

<!-- DataTables Buttons -->
<!-- <script src="../js/buttons.dataTables.js" ></script> -->
<script src="../js/dataTables.buttons.min.js" ></script>
<script src="../vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="../js/buttons.html5.min.js"></script>
<script src="../js/buttons.print.min.js"></script>

<!-- JSZip for Excel Export -->
<script src="../js/jszip.min.js"></script>

<!-- pdfMake for PDF Export -->
<script src="../js/pdfmake.min.js"></script>
<script src="../js/vfs_fonts.js"></script>

<!-- FixedColumns -->
 <script src="../js/dataTables.fixedColumns.min.js"></script>
 <script  src="../js/fixedColumns.dataTables.js" ></script>

<!-- lightweight and modern custom scrollbar -->
<script src="../vendors/simplebar/js/simplebar.min.js"></script>

<!-- translations language-->
<script src="../vendors/i18next-http-backend/js/i18nextHttpBackend.js"></script>
<script src="../vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js"></script>
<script src="../js/i18next.js"></script>

<!-- interactive and responsive charts. -->
<script src="../vendors/chart.js/js/chart.umd.js"></script>


<!-- custom js -->

<script src="../js/table-custom.js"></script>
<script src="../js/countries_code.js"></script>
<script src="../js/config.js"></script>
<script src="../js/color-modes.js"></script>
<script src="../js/main.js"></script>


<script>
  const header = document.querySelector('header.header');

  document.addEventListener('scroll', () => {
    if (header) {
      header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
    }
  });
</script>


</body>

</html>