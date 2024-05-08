
<?php
include("dbconn.php");
?>
<?php 
if ($_SESSION['RollNo'] == 'admin' ) {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta user-scalable=no>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport" content="user-scalable=no, width=device-width" />
	<link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/datatables/jquery.css">
   <script src="css/datatables/jquery.js"></script>
   <script src="css/datatables/jtable.js"></script>
	<title>Admin</title>

	
</head>

<body>

	<?php 
	include('../admin/includes/dasboard.php')
	?>
				

				</div>
			</nav>
		</div>
		<div class="main" class="report-header hide-on-print">

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
					<a href="../admin/lend.php">	<h2 class="topic-heading" type="button" id="borrowBtn">Lend Books</h2>
						<h2 class="topic">List</h2></a>	
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
						alt="Views"></a>
				</div>

				<!-- <div class="box box2">
					<div class="text">
						<a href="../admin/addbooks.php"><h2 class="topic-heading">Add Books</h2>
						<h2 class="topic">Add</h2></a>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png"
						alt="likes">
				</div> -->

			<!-- <div class="box box3">
				<div class="text">
				<a href="../index.php"><h2 class="topic-heading">Borrowing</h2>
					<h2 class="topic">Manage</h2></a>	
				</div>

				<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
					alt="comments">
			</div> -->
<!-- 
				<div class="box box4">
					<div class="text">
					<a href="../admin/payments.php"><h2 class="topic-heading">Payments</h2>
						<h2 class="topic">List</h2> </a>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
				</div> -->
			</div>

		
				<div class="report-header">
					<h1 class="recent-Articles">Recent Borrowed Books</h1>
					<!-- <a href="../admin/books2.php"><button class="view">View Books</button></a> -->
				</div>

				<div class="report-body" >
					
					<table id="display" class="" onkeydown="handleKeyDown(event)">

								<?php 
                                      $sql="select record.BookId, user.Name ,id, record.RollNo, Textbook,Due_Date,Date_of_Issue,Date_of_Return, Dues
									   from LMS.record,LMS.book, LMS.user where Date_of_Issue and Date_of_Return is NULL and book.Bookid = record.BookId AND user.RollNo = record.RollNo";
                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><h2><b><i>No Results</i></b></h2>";    
                                        ?>

								<table class="display" id = "list">
                                  <thead>
                                    <tr>
                                      <th>Borrower's ID</th> 
                                      <th>Borrower's Name</th> 
                                   
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Issue Date</th>
                                      <th>Due date</th>
                                     
                                    </tr>
                                  </thead>
                                  <tbody>

                                <?php

                            

                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                               $id = $row ['id'];
                               $bname = $row ['Name'];
                                $rollno=$row['RollNo'];
                                $bookid=$row['BookId'];
                                $name=$row['Textbook'];
                                $issuedate=$row['Date_of_Issue'];
                                $return = $row['Date_of_Return'];
                                $duedate=$row['Due_Date'];
                                // $dues=$row['Dues'];
                            
                            ?>

                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                     
                                      <td><?php echo $bname ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $issuedate ?></td>
                                      <td><?php echo $duedate ?></td>
                                            </form>
                                       
                                    
                                     
                                    </tr>
                            <?php } ?>
                                 </tbody>
					</table>
				

					</div>
				</div>
			</div>
		</div>
	</div>







	</script>
<script>
        $(document).ready(function () {
    $('#list').DataTable();
});
</script>	



<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("borrowBtn");

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


	<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>

<!-- <script>
        $(document).ready(function () {
    $('#list').DataTable();
});
</script> -->
<script>
function handleKeyDown(event) {
  if (event.ctrlKey && event.keyCode === 80) { // Ctrl + P
    event.preventDefault(); // Prevent the default printing behavior

    // Hide unnecessary elements
    var elementsToHide = document.getElementsByClassName('hide-on-print');
    for (var i = 0; i < elementsToHide.length; i++) {
      elementsToHide[i].style.display = 'none';
    }

    // Print the page
    window.print();

    // Restore the visibility of hidden elements after printing
    for (var i = 0; i < elementsToHide.length; i++) {
      elementsToHide[i].style.display = '';
    }
  }
}
</script>


	<script>
let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");

menuicn.addEventListener("click",()=>
{
	nav.classList.toggle("navclose");
})
</script>
</body>
</html>











