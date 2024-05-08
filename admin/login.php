<?php
require('dbconn.php');
?>
<?php






?>

<!DOCTYPE html>
<html>


<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Library Management </title>


		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>



			<link rel="stylesheet" href="../admin/bootstrap/css/css2/css.css">

		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">


</head>



<body>

			
<h1 class="head"></h1>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="student/index.php" method="post">
		<h1 class="create">Sign Up</h1>
				<input type="text" Name="Name" placeholder="Name" required>
				<input type="text" Name="Email" placeholder="Email" required>
				<input type="password" Name="Password" placeholder="Password" required>
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required>
				<input type="text" Name="RollNo" placeholder="ID Number" required="">
						
									<select  name="Category" id="Category">
										<option value="Student">Student</option>
									</select> 
									<select  name="Department" id="Category">
										<option value="BSBA">BSBA</option>
										<option value="BSIT">BSIT</option>
										<option value="BSED">BSED</option>
										<option value="BEED">BEED</option>			
								 </select> 
						
					
			
			<button name="signup">Sign Up</button>
		</form>
	</div>


	<div class="form-container sign-in-container">
		<form action="student/index.php" method="post">
	
			<h1>Sign in</h1>
				<input type="text" Name="RollNo" placeholder="ID number" required="">
				<input type="password" Name="Password" placeholder="Password" required="">	
			<button name="signin">Sign In</button>

		</form>
	</div>	




	<div class="overlay-container">
	
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>Please make your personal info accurate</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Student</h1>
				<p>If you don't have an account you should sign up first.</p>
				<button class="ghost" id="signUp">Sign Up</button>
	
				</div>
			</div>
		</div>
	
</div>

<footer>
	<p>
		Created by LCC BSIT College Students

	</p>
</footer>
		
<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>















	


<?php
ini_set('display_errors', 0);
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];
 $c=$_POST['Category'];

 $sql="select * from LMS.user where RollNo='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['RollNo']=$u;
   

if ($y=='Student') {
	echo header("Location:student/index.php");

}else{
	echo header('Location:staff/index.php');
}
//   if($y=='Admin')
//   echo header("Location:admin/index.php");
// elseif ($y == 'librarian') {
// echo header("Location:librarian/index.php");

// }if ($y =='student') {
// 	echo header("Location:student/index.php");
// }
//   elseif (condition) {
//   	 echo	header("Location:staff/index.php");
//   }
 
   
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect IDNo or Password')</script>";
}
   

}

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$category=$_POST['Category'];
	$department=$_POST['Department'];
	$type='Student';

	$sql="insert into LMS.user (Name,Type,Category,Department,RollNo,EmailId,MobNo,Password) values ('$name','$type','$category','$department','$rollno','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>

</body>
<!-- //Body -->

</html>
<?php 
// }
// else {
//     echo "<script type='text/javascript'>alert('System Expired')</script>";
// } 


?>