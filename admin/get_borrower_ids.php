<?php
require ('dbconn.php');


// Fetch the borrower IDs from the database
$sql = "SELECT RollNo, Name FROM user";
$result = $conn->query($sql);

// Output the options
while ($row = $result->fetch_assoc()) {
  echo "<option value='" . $row['RollNo'] . "'>" . $row['RollNo'] . "</option>";
}

// Close the database connection
$conn->close();
?>
