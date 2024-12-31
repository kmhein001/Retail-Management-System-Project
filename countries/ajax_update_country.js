document.addEventListener('DOMContentLoaded', function() {
    // Select all checkboxes with the class "status-toggle"
    document.querySelectorAll('.status-toggle').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const countryId = this.getAttribute('data-country-id');
            const newStatus = this.checked ? 'Active' : 'Inactive';

            // Send the status update to the server via AJAX
            fetch('./update_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `countryId=${countryId}&newStatus=${newStatus}`
            })
            .then(response => response.text())
            .then(result => {
                // Optionally display the result or show a success message
                alert(result);  // Display success/failure response
                if (result === 'Status updated successfully') {
                    // Optionally update UI to reflect changes
                    console.log('Update Successful');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error updating the status.');
            });
        });
    });
});
