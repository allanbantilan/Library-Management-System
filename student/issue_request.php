<?php
require('dbconn.php');

$id=$_GET['id'];

$roll=$_SESSION['RollNo'];

$sql="insert into LMS.record (RollNo,BookId,Time) values ('$roll','$id', curtime())";
$stmt ="SELECT COUNT(*) AS current_record FROM LMS.record WHERE Date_of_Return IS null AND RollNo = '$roll'";
$query = mysqli_query($conn, $stmt);
$row = mysqli_fetch_assoc($query);
$current_record = $row["current_record"];

if ($current_record <3) {
    if($conn->query($sql) === TRUE) 
    {
        echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
       header( "Refresh:0.01; url=books2.php", true, 303);
    }
}else {
    echo "<script type='text/javascript'>alert('You have reach the maximun limit of requests')</script>";
    header( "Refresh:0.01; url=books2.php", true, 303);
}





?>
