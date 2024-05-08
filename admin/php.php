<?php
require('dbconn.php');

// Fetch the selected borrower ID
$borrowerId = $_POST['borrowerId'];

// Fetch the selected book ID
$bookId = $_POST['bookId'];

// Query to fetch the borrower's name based on the ID
$borrowerQuery = "SELECT Name FROM user WHERE RollNo = '$borrowerId'";
$resultBorrower = $conn->query($borrowerQuery);
$borrowerName = $resultBorrower->fetch_assoc()['Name'];

// Query to fetch the book's name based on the ID
$bookQuery = "SELECT BookName FROM books WHERE BookID = '$bookId'";
$resultBook = $conn->query($bookQuery);
$bookName = $resultBook->fetch_assoc()['BookName'];

// Output the borrower's name and book's name
echo json_encode(['borrowerName' => $borrowerName, 'bookName' => $bookName]);
?>