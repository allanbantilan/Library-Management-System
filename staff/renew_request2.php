<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']== 'staff' && 'STAFF' && 'Staff') {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta user-scalable=no>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport" content="user-scalable=no, width=device-width" />
	<link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet"href="css/responsive.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	<title>Admin</title>

	
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

            <div class="span9">
                <div class="inline">
      
                    <center>
                        <form action="issue_request2.php">
                            <input type="submit" value="Issue Request" class="view2"/>
                        </form>
                        <form action="renew_request2.php">
                            <input type="submit" value="Renew Request" class="view2"/>
                        </form>
                        <form action="return_request2.php">
                            <input type="submit" value="Return Request" class="view2">
                        </form>
                        </div>
                        </div>
                        </center>

				<div class="report-header">
					<h1 class="recent-Articles">Renew Request</h1>
				</div>
             
      
      
    <br>
    <table class="table" id = "list">
                                  <thead>
                                    <tr>
                                      <th>Borrower's ID</th>
                                      <th>Book Id</th>
                                      <th>Book Name</th>
                                      <th>Renewals Left</th>
                                      <th>Actions</th>
                                  
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php

                                            // $sql = "SELECT
                                            // record.BookId,
                                            // id,
                                            // RollNo,
                                            // Textbook,
                                            // Due_Date,
                                            // Date_of_Issue,
                                            // Date_of_Return,
                                            // Dues
                                            // FROM
                                            // LMS.record
                                            // INNER JOIN LMS.book ON book.BookId = record.BookId
                                            // WHERE
                                            // Date_of_Issue IS NOT NULL
                                            // AND Date_of_Return IS NULL
                                            // AND dues > 0";

                            // $sql="select * from LMS.record,LMS.book,LMS.renew where Date_of_Return is NULL and renew.BookId=book.BookId and renew.RollNo=record.RollNo and renew.BookId=record.BookId";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $rollno=$row['RollNo'];
                                $name=$row['Textbook'];
                                $renewals=$row['Renewals_left'];
                            
                           
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><b><?php echo $name ?></b></td>
                                      <td><?php echo $renewals ?></td>
                                      <td class="aTable">
                                        <?php
                                        if($renewals > 0)
                                        {echo "<a href=\"acceptrenewal.php?id1=".$bookid."&id2=".$rollno."\" class=\"button\">Accept</a>";}
                                         ?>
                                        <a href="rejectrenewal.php?id1=<?php echo $bookid; ?>&id2=<?php echo $rollno; ?>" class="button2">Reject</a>
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
            <!--/.container-->
        </div>
                       





<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>