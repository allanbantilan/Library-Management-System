<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>


<head>

	<title>Library Management </title>

	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	

<link rel="stylesheet" href="css/login.css" type="text/css" media="all">

	
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">


</head>

<body>


<h1 class="head"></h1>
<div class="container" id="container">
<div class="addadmin">
		<form action="addstaff2.php" method="post" class="content_body">
	
			<h1>Add Staff</h1>
            <input type="text" Name="Name" placeholder="Name" required>
				<input type="text" Name="Email" placeholder="Email" required>
				<input type="password" Name="Password" placeholder="Password" required>
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required>
				<input type="text" Name="RollNo" placeholder="ID Number" required="">
                <select name="Category" id="Category">
                    <option value="Staff">Staff</option>
                </select>
			<button name="signup" class="button2">Add</button>
		
		</form>
		<a href="../admin/settings.php">  <button name="signup" class="button3">Back</button></a> 
		</div>
	</div>	



	

<?php
ini_set('display_errors', 0);
if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$category=$_POST['Category'];
	$type=$_POST['type'];

	$sql="insert into LMS.user (Name,Type,Category,RollNo,EmailId,MobNo,Password) values ('$name','$type','$category','$rollno','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
echo header("Location: settings.php");
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}





?>

</body>
<!-- //Body -->

</html>
