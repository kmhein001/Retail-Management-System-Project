document.addEventListener('DOMContentLoaded', function () {
    try {
        // Get the index for the checkbox and actions columns dynamically
        const checkboxColumnIndex = $('#checkboxColumn').index();
        const actionsColumnIndex = $('#actionsColumn').index();

        // Initialize DataTable with export buttons and configurations
        const table = $('#General_Auto_Table').DataTable({
            dom: "Brtip",
            buttons: [
                { extend: 'copy', text: 'Copy' },
                { extend: 'csv', text: 'CSV' },
                { extend: 'excel', text: 'Excel' },
                { extend: 'pdf', text: 'PDF' },
                { extend: 'print', text: 'Print me!' }
            ],
            autoWidth: true,  // Allow automatic column width adjustment
            responsive: true, // Enable responsive design for table
            scrollX: true,   // Enable horizontal scrolling
            scrollY: 550,    // Set a specific vertical scroll height
            paging: false,    // Enable pagination
            scrollCollapse: true,  // Allow scrolling to collapse when fewer records are displayed
            searching: true,
            ordering: true,
            info: false, // Enable the DataTable info feature
            columnDefs: [
                { width: '5%', targets: checkboxColumnIndex }, // Set fixed width for checkbox column
                { targets: checkboxColumnIndex, orderable: false }, // Disable sorting for checkbox column
                { targets: actionsColumnIndex, orderable: false }, // Disable sorting for actions column
                { targets: '_all', orderable: true } // Enable sorting for all other columns
            ],
        });

        const customInfoButton = $('#General_Auto_Table_info button');
if (!customInfoButton.length) {
    console.error('Pagination info button not found.');
    return;
}

// Dynamically update the custom info badge using DataTable draw event
table.on('draw', function () {
    const info = table.page.info(); // Get pagination info

    if (info.recordsTotal === info.recordsDisplay) {
        customInfoButton.text(`Showing ${info.start + 1} to ${info.end} of ${info.recordsTotal} entries`);
    } else {
        customInfoButton.text(`Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries (filtered from ${info.recordsTotal} total entries)`);
    }
});

// Trigger the initial info update
const info = table.page.info();
if (info.recordsTotal === info.recordsDisplay) {
    customInfoButton.text(`Showing ${info.start + 1} to ${info.end} of ${info.recordsTotal} entries`);
} else {
    customInfoButton.text(`Showing ${info.start + 1} to ${info.end} of ${info.recordsDisplay} entries (filtered from ${info.recordsTotal} total entries)`);
}

        // Custom search functionality
        $('#customSearch').on('keyup', function () {
            table.search(this.value).draw(); // Use the DataTable's search API
        });

        // Hide DataTables-generated export buttons
        $('.dt-buttons').hide(); // Hide the auto-generated export buttons

        // Handle "Select All" functionality
        const selectAllCheckbox = document.getElementById('selectAllCheckbox');
        const rowCheckboxes = document.querySelectorAll('.rowCheckbox');

        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', () => {
                rowCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            rowCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    selectAllCheckbox.checked = Array.from(rowCheckboxes).every(cb => cb.checked);
                });
            });
        }

        // Export button handlers for custom export buttons
        const exportButtonIds = [
            { id: 'exportCopy', buttonType: 'copy' },
            { id: 'exportCsv', buttonType: 'csv' },
            { id: 'exportExcel', buttonType: 'excel' },
            { id: 'exportPdf', buttonType: 'pdf' },
            { id: 'exportPrint', buttonType: 'print' }
        ];

        exportButtonIds.forEach(({ id, buttonType }) => {
            const buttonElement = document.getElementById(id);
            if (buttonElement) {
                buttonElement.addEventListener('click', () => {
                    // Corrected selector for DataTable button
                    table.button(`.buttons-${buttonType}`).trigger(); // Fixed template literal
                });
            } else {
                console.warn(`Button with ID '${id}' not found.`);
            }
        });

    } catch (error) {
        console.error('Error initializing DataTable or setting up buttons:', error);
    }
});
