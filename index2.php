<?php
require('dbconn.php');
?>
<?php



include 'private/validity1.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weqwe</title>
    <link rel="stylesheet" href="css/styles.css">
 
</head>
<body>
    
<div class="signupFrm">
    <div class="wrapper">
    <form action="" class="form">
      <h1 class="title">Sign up</h1>

      <div class="inputContainer">
        <input type="text" class="input" placeholder="a">
        <label for="" class="label">Name</label>
      </div>

      <div class="inputContainer">
        <input type="text" class="input" placeholder="a">
        <label for="" class="label">Email</label>
      </div>

      <div class="inputContainer">
        <input type="text" class="input" placeholder="a">
        <label for="" class="label">Password</label>
      </div>

      <div class="inputContainer">
        <input type="text" class="input" placeholder="a">
        <label for="" class="label">Phone Number</label>
      </div>
      <div class="inputContainer">
        <input type="text" class="input" placeholder="a">
        <label for="" class="label">Id Number</label>
      </div>

      
      <select name="Category" id="Category" style="background-color: dimgray; "> <br>
					<option value="Student">Student</option>
					<option value="Faculty">Faculty</option>
					<option value="Staff">Staff</option>
					
				</select> 
				<select name="Department" id="Category" style="background-color: dimgray;">
					<option value="BSBA">BSBA</option>
					<option value="BSIT">BSIT</option>
					<option value="BSED">BSED</option>
					 <option value="BEED">BEED</option>
         

      <input type="submit" class="submitBtn" name="signin" value="Sign up">
    </form>
    </div>
  </div>


  </body>
</html>