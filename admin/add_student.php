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
		<form action="add_student.php" method="post" class="content_body">
	
			<h1>Add Student</h1>
            <input type="text" Name="Name" placeholder="Name" required>
				<input type="text" Name="Email" placeholder="Email" required>
				<input type="password" Name="Password" placeholder="Password" required>
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required>
				<input type="text" Name="RollNo" placeholder="ID Number" required="">
                <select name="Category" id="Category">
                                         <option value="Student">Student</option>	
                </select>
                <select  name="Department" id="Category" class="inputs">	
									<option value="BSBA" disabled selected>Department</option>			
										<option value="BSBA">BSBA</option>
										<option value="BSIT">BSIT</option>
										<option value="BSED">BSED</option>
										<option value="BEED">BEED</option>			
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
    $type='Student';

	$sql="insert into LMS.user (Name,Type,Category,RollNo,EmailId,MobNo,Password) values ('$name','$type','$category','$rollno','$email','$mobno','$password')";

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

</body>
<!-- //Body -->

</html>
