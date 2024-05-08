<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
 $RollNo = $_POST['RollNo'];
$sql2 = "DELETE FROM `user` WHERE RollNo = '$RollNo'";
$con->query($sql2) or die($con->error);
                                
echo "<script type='text/javascript'>alert('Deleted Succesfully')</script>";
header( "Refresh:1; url=student2.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=student2.php", true, 303);
}
?>