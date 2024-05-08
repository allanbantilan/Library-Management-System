<?php
require ('dbconn.php');

// Get the selected borrower ID
$borrowerId = $_GET['borrowerId'];



// Fetch the borrower name from the database based on the ID
$sql = "SELECT Name FROM user WHERE RollNo = '$borrowerId'";
$result = $conn->query($sql);

// Output the borrower name
if ($row = $result->fetch_assoc()) {
  echo "document.getElementById('borrowerNameInput').value = '" . $row['Name'] . "';";
}

// Close the database connection
$conn->close();
?>
