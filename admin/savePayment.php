<?php 

require('dbconn.php');

$processed = 'admin







';
$datetime = date('Y-m-d H:i:s'); 
ini_set('display_errors', 0);
if (isset($_POST['insert_pay'])) {
    $rollno = $_POST['rollno'];
    $bookid = $_POST['bookid'];
    $bookname = $_POST['bookname'];
    $dues = $_POST['paydues'];
    $amountPaid = $_POST['amount'];
    $change = $_POST['change'];



    $insertQuery = "INSERT INTO LMS.payments (RollNo, Processed_by , BookId, Textbook, Dues, Amount, Sukli, date_and_time) 
                    VALUES ('$rollno', '$processed', '$bookid', '$bookname', '$dues', '$amountPaid', '$change', '$datetime')";

    if ($conn->query($insertQuery) === TRUE) {
        // Update the dues in the record table to 0
        $updateQuery = "UPDATE LMS.record SET dues = 0 WHERE RollNo = '$rollno' AND BookId = '$bookid'";
        $conn->query($updateQuery);

        echo "<script type='text/javascript'>alert('Payment Saved')</script>";
        header("Refresh: 0.01; url=current2.php", true, 303);
    } else {
        echo "<script type='text/javascript'>alert('Error')</script>";
        header("Refresh: 1; url=current2.php", true, 303);
    }
}

?>


