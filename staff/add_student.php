<?php 

require('dbconn.php');

if(isset($_POST['add_button']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$category=$_POST['Category'];
	$department=$_POST['Department'];
	$type='Student';

	$sql="INSERT into LMS.user (Name,Type,Category,Department,RollNo,EmailId,MobNo,Password) 
    values ('$name','$type','$category','$department','$rollno','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Successfully Added')</script>";
        header("Refresh: 0.01; url=index.php", true, 303);
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<script type='text/javascript'>alert('User Exist')</script>";
        header("Refresh: 0.01; url=index.php", true, 303);
}
}



?>