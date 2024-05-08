<?php 
require('dbconn.php');

ini_set('display_errors', 0);
if (isset($_POST['lend_book'])) {
    $bookid = $_POST['bookid'];
    $bookname = $_POST['bookname'];
    $rollno = $_POST['borrowerId'];
    $borrowername = $_POST['bname'];
}


$insertQuery = "INSERT INTO LMS.record (BookId, RollNo) VALUES ('$bookid', '$rollno')";

if ($conn->query($insertQuery) === TRUE) {
    $updateQuery1 = "UPDATE LMS.record SET Date_of_Issue = CURDATE(), Due_Date = DATE_ADD(CURDATE(), INTERVAL 7 DAY), Time = CURTIME(), Renewals_left = 1 WHERE BookId = '$bookid' AND RollNo = '$rollno'";
    $updateQuery2 = "UPDATE LMS.book SET Availability = Availability - 1 WHERE BookId = '$bookid'";

    if ($conn->query($updateQuery1) === TRUE && $conn->query($updateQuery2) === TRUE) {
        echo "<script type='text/javascript'>alert('Success')</script>";
        header("Refresh: 0.01; url=lend.php", true, 303);
    } else {
        echo "<script type='text/javascript'>alert('Error')</script>";
    header("Refresh: 1; url=lend.php", true, 303);
    }
} else {
    echo "Error: " . $insertQuery . "<br>" . $conn->error;
}


?>
