<?php
require('dbconn.php');

$id=$_GET['id'];

$roll=$_SESSION['RollNo'];

$sql="insert into LMS.return (RollNo,BookId) values ('$roll','$id')";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
header( "Refresh:0.01; url=current2.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header( "Refresh:0.01; url=current2.php", true, 303);

}


// require('dbconn.php');

// $id = $_GET['id'];
// $roll = $_SESSION['RollNo'];

// // Check if the book has already been returned by the user
// $checkQuery = "SELECT * FROM LMS.return WHERE RollNo = '$roll' AND BookId = '$id'";
// $checkResult = $conn->query($checkQuery);

// if ($checkResult->num_rows > 0) {
//     // Book has already been returned
//     echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
//     header("Location: current2.php");
//     exit(); // Exit the script to prevent further execution
// }

// // Insert the return request into the database
// $insertQuery = "INSERT INTO LMS.return (RollNo, BookId) VALUES ('$roll', '$id')";

// if ($conn->query($insertQuery) === TRUE) {
//     // Request sent successfully
//     echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
//     header("Location: current2.php");
//     exit(); // Exit the script to prevent further execution
// } else {
//     // Error occurred while inserting the request
//     echo "<script type='text/javascript'>alert('Error Occurred.')</script>";
//     header("Location: current2.php");
//     exit(); // Exit the script to prevent further execution
// }



?>