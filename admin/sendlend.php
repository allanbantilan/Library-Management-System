<?php
require('dbconn.php');

ini_set('display_errors', 1);
if (isset($_POST['lend_book'])) {
    $bookid = $_POST['bookid'];
    $bookname = $_POST['bookname'];
    $borrowerID = $_POST['borrowerId'];
    $borrowerName = $_POST['bname'];


    $sql="insert into LMS.record (RollNo,BorrowerName, BookId,BookName,Time) values ('$borrowerID','$borrowerName','$bookid','$bookname', curtime())";
    $stmt ="SELECT COUNT(*) AS current_record FROM LMS.record WHERE Date_of_Return IS null AND RollNo = '$borrowerID'";
    $query = mysqli_query($conn, $stmt);
    $row = mysqli_fetch_assoc($query);
    $current_record = $row["current_record"];
    
if ($current_record <3) {
        if($conn->query($sql) === TRUE) 
        {
            echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
           header( "Refresh:0.01; url=index.php", true, 303);
        }
    }else {
        echo "<script type='text/javascript'>alert('You have reach the maximun limit of requests')</script>";
        header( "Refresh:0.01; url=index.php", true, 303);
    }
    

}

?>