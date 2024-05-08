
<?php
include("developer.php");
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
					<a href="../admin/student2.php">	<h2 class="topic-heading">Manage Borrower</h2>
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
					<a href="../admin/borrowing.php"><h2 class="topic-heading">Borrowing</h2>
						<h2 class="topic">Manage</h2></a>	
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
						alt="comments">
				</div>

				<div class="box box4">
					<div class="text">
					<a href="../admin/payments.php"><h2 class="topic-heading">Payments</h2>
						<h2 class="topic">List</h2> </a>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
				</div>
			</div>

		
				<div class="report-header">
					<h1 class="recent-Articles">Most Borrowed Books</h1>
					<a href="../admin/books2.php"><button class="view">View Books</button></a>
				</div>

				<div class="report-body" >
					
					<table id="list" class="" onkeydown="handleKeyDown(event)">
					<!-- <form action="excel.php" method="post" style="float: left;" class="classform">
                                    <input type="submit" name="export_excel" class="view2" value="Export All Books to Excel">
                                </form> -->
                                    

                                 <form action="delallb.php" method="post">
                                     
					<thead >
                                    <tr>
                                      <th>Book Id</th>
                                       <th>Book Name</th>
                                      <th>Borrow Count</th>
                                  
               
                                      
                                    </tr>
					</thead >
					<tbody>
                                      <?php
                              $sql="SELECT COUNT(record.id) as borrowed_count , book.Textbook, book.BookId FROM `record` INNER JOIN book ON record.BookId = book.BookId GROUP BY record.BookId limit 6";
                              $result=$conn->query($sql);
                              while($row=$result->fetch_assoc())
                              {
                                  $bookid=$row['BookId'];
                                  $bookname=$row['Textbook'];
                                  $borrow=$row['borrowed_count'];
                                 
                              
                             
                              ?>
                                      <tr>
                                        <td><?php echo strtoupper($bookid) ?></td>
                                        <td><?php echo $bookname ?></td>
                                        <td><?php echo $borrow ?></td>
                                      
                                        <!-- <td class="aTable">
                                         
                                          
                                      </td> -->
                                      </tr>
                                 <?php } ?>
                                 </tbody>
					</table>
				

					</div>
				</div>
			</div>
		</div>
	</div>


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











