<?php
require 'dbconn.php';


// Get the current date
$currentDate = date('Y-m-d');

// Calculate tomorrow's date
$tomorrowDate = date('Y-m-d', strtotime('+1 day'));

// Construct the SQL query
$sql = "SELECT record.Book_id, book.Textbook, record.due_date
        FROM LMS.record 
        INNER JOIN LMS.book ON record.Book_id = book.Book_id
        WHERE record.due_date = '$tomorrowDate'";

// Execute the query
$result = $conn->query($sql);

// Check if there are any books due tomorrow
if ($result->num_rows > 0) {
    // Loop through the results and display the alert
    while ($row = $result->fetch_assoc()) {
        $bookId = $row['Book_id'];
        $title = $row['Textbook'];

        // Show the alert
        echo "<script>alert('Book with ID $bookId, titled \"$title\", is due tomorrow!');</script>";
    }
}
?>