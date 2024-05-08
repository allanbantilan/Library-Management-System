<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo'] == false) {
    echo header("Location: nicetry.php");
}
$rollno = $_SESSION['RollNo'];
                                $sql="select * from LMS.user where RollNo='$rollno'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();
                                
                                $type = $row['Type'];

if ($type == 'Student') {
    

echo header("Location:../student/index.php");

}

 if ($type =$row['Type'] !== 'librarian') {


    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/settings.css">

    <title>Staff</title>
</head>
<body>
   
	<?php 
	include('../staff/includes/dasboard.php')
	?>
				
			</nav>
		</div>
		<div class="main">
	

<div class="searchbar2">
	<input type="text"
		name=""
		id=""
		placeholder="Search">
	<div class="searchbtn">
	<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
			class="icn srchicn"
			alt="search-button">
	</div>
</div>

<div class="control">

        <div class="card-container">
       
        <span class="pro">STAFF</span>
	<img class="round" src="../admin/images/profile2.png" alt="user" />
                                 <?php
                                $rollno = $_SESSION['RollNo'];
                                $sql="select * from LMS.user where RollNo='$rollno'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();


                                 $id=$row['RollNo'];

                                $name=$row['Name'];
                                $category=$row['Category'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];
                                ?>    
	<h3><?php echo $name ?></h3>
	<p><b>Email Address: </b><?php echo $email ?></p>
	<p><b>Mobile number: </b><?php echo $mobno ?></p>
	<div class="buttons">
		
		
	    </div>

	</div>

</div>
<div class="arrange">
<a href="../staff/edit_staff_details.php"><button class="view2">Edit Details</button></a>
<button class="view2" id="addBtn">Add Student</button>
</div>

<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
	<span class="close">&times;</span>
	<h2>Add Student</h2>
  </div>
  <div class="modal-body">
	  <div class="content_body">
		  <form action="add_student.php" method="POST">
				<p>Name</p>
		 		<input type="text" Name="Name" placeholder="Name" required class="inputs">
				 <p>Email Address</p>
				<input type="text" Name="Email" placeholder="Email" required class="inputs">
				<p>Password</p>
				<input type="password" Name="Password" placeholder="Password" required class="inputs">
				<p>Phone Number</p>
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required class="inputs">
				<p>Roll No.</p>
				<input type="text" Name="RollNo" placeholder="ID Number" required="" class="inputs">
								
				
				
	
								<p>Type</p>
									<select  name="Category" id="Category" class="inputs">
										<option value="BSBA" disabled selected></option>
										<option value="Student">Student</option>
										<option value="Student">Teacher</option>
	
									</select> 
								<p>Department</p>
									<select  name="Department" id="Category" class="inputs">	
									<option value="BSBA" disabled selected></option>			
										<option value="BSBA">BSBA</option>
										<option value="BSIT">BSIT</option>
										<option value="BSED">BSED</option>
										<option value="BEED">BEED</option>			
								 </select> 

								 <button type="submit" class="button" name="add_button">Add</button>
		  </form>
		
	
  </div>
  </div>
  <div class="modal-footer">
	  
		<script>
  
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("addBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

		</script>
		 
	  <!-- <button type="button" class="button2" name='span' data-dismiss="modal">Close</button></h3> -->
  </div>
</div>

    
<!-- 
			<div class="searchbar2">
				<input type="text"
					name=""
					id=""
					placeholder="Search">
				<div class="searchbtn">
				<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
						class="icn srchicn"
						alt="search-button">
				</div>
			</div>

			<div class="box-container">

				<div class="box box1">
					<div class="text">	
					<a href="../admin/student2.php">	<h2 class="topic-heading">Edit Details</h2>
						<h2 class="topic">View All</h2>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
						alt="Views"></a>
				</div>

				<div class="box box2">
					<div class="text">
						<a href="../admin/addbooks.php"><h2 class="topic-heading">Add Books</h2>
						<h2 class="topic">Add</h2></a>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png"
						alt="likes">
				</div>

				<div class="box box3">
					<div class="text">
					<a href="../admin/message2.php"><h2 class="topic-heading">Messages</h2>
						<h2 class="topic">Comments</h2></a>	
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
						alt="comments">
				</div>

				<div class="box box4">
					<div class="text">
					<a href="../admin/issue_request2.php"><h2 class="topic-heading">Request</h2>
						<h2 class="topic">List</h2> </a>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
				</div>
			</div> -->

		

</body>
</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>