document.addEventListener("DOMContentLoaded", function () {
  // Individual status toggle functionality
  document.querySelectorAll(".status-toggle").forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
      const countryId = this.getAttribute("data-country-id");
      const newStatus = this.checked ? "Active" : "Inactive";

      // Send the status update to the server via AJAX
      fetch("./update_status.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `countryId=${countryId}&newStatus=${newStatus}`,
      })
        .then((response) => response.text())
        .then((result) => {
          alert(result); // Display success/failure response
          if (result === "Status updated successfully") {
            console.log("Update Successful");
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("There was an error updating the status.");
        });
    });
  });

  const bulkUpdateButton = document.getElementById("bulkUpdateButton");
  if (bulkUpdateButton) {
    bulkUpdateButton.addEventListener("click", function () {
      console.log("Bulk Update Button Clicked"); // Debugging

      // Get all checkboxes with the class 'rowCheckbox'
      const rowCheckboxes = document.querySelectorAll(".rowCheckbox");
      console.log("Row Checkboxes:", rowCheckboxes); // Debugging

      // Get the selected rows (checked checkboxes)
      const selectedRows = Array.from(rowCheckboxes)
        .filter((checkbox) => checkbox.checked)
        .map((checkbox) => checkbox.value);

      console.log("Selected Rows:", selectedRows); // Debugging

      // Get the new status from the dropdown
      const newStatus = document.getElementById("bulkStatusSelect").value;
      console.log("New Status:", newStatus); // Debugging

      // Validate the new status
      if (!newStatus) {
        alert("Please select a status to update.");
        return;
      }

      // Validate if any rows are selected
      if (selectedRows.length === 0) {
        alert("Please select rows to update.");
        return;
      }

      // Log the data being sent to the server
      console.log(
        "Data to be sent:",
        JSON.stringify({ ids: selectedRows, status: newStatus })
      ); // Debugging

      // Send the bulk update request to the server
      fetch("bulk_update_status.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ ids: selectedRows, status: newStatus }),
      })
        .then((response) => response.json())
        .then((result) => {
          console.log("Server Response:", result); // Debugging

          // Display PHP response as an alert
          alert(result.message);

          if (result.success) {
            location.reload(); // Reload to reflect changes
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("An error occurred during the update.");
        });
    });
  } else {
    console.error("Bulk Update Button not found");
  }
});
