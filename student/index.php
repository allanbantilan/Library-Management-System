<?php
require('dbconn.php');
?>
<?php 
if ($_SESSION['RollNo']) {
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../staff/css/css.css">
    <link rel="stylesheet" href="css/settings.css">

    <title>Student</title>
</head>
<body>
   
	<?php 
	include('../student/includes/dasboard.php')
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
       
        <span class="pro">STUDENT</span>
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
<a href="../student/edit_student_details2.php"><button class="view2">Edit Details</button></a>
</div>
s
    
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