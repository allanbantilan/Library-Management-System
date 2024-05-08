<?php
require('dbconn.php');

?>

<?php 
if ($_SESSION['RollNo']== 'staff' ) {
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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	<title>Staff</title>

	
</head>

<body>

<?php 
	include('../staff/includes/dasboard.php')
	?>

				</div>
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

            <div class="inline">
      
      <center>
          <form action="issue_request2.php">
              <input type="submit" value="Issue Request" class="view2"/>
          </form>
          <!-- <form action="renew_request2.php">
              <input type="submit" value="Renew Request" class="view2"/>
          </form> -->
          <form action="return_request2.php">
              <input type="submit" value="Return Request" class="view2">
          </form>
          </div>

				<div class="report-header">
					<h1 class="recent-Articles">Issue Request</h1>
				</div>
               
    <br>
                        <table class="display" id = "list">
                                  <thead>
                                    <tr>
                                      <th>Borrower's ID</th>
                                      <th>Book Id</th>
                                      <th>Book Name</th>
                                      <th>Availabilty</th>
                                      <th>Actions</th>
                              
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            $sql="select * from LMS.record,LMS.book where Date_of_Issue is NULL and record.BookId=book.BookId order by Time";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $id = $row['id'];
                                $bookid=$row['BookId'];
                                $rollno=$row['RollNo'];
                                $name=$row['Textbook'];
                                $avail=$row['Availability'];
                            
                                
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><b><?php echo $name ?></b></td>
                                      <td><?php echo $avail ?></td>
                                      <td class="aTable">
                                        <?php
                                        if($avail > 0)
                                        {echo "<a href=\"accept.php?id1=".$bookid."&id2=".$rollno."\" class=\"button\">Accept</a>";}
                                         ?>
                                        <a href="reject.php?id1=<?php echo $id ?>&id2=<?php echo $id ?>" class="button2">Reject</a>
                                   </td>
                                    </tr>
                               <?php } ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span3-->
                    <!--/.span9-->
                </div>
            </div>




            <script>
        $(document).ready(function () {
    $('#list').DataTable();
});
</script>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>