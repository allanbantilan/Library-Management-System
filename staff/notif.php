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

    <title>History</title>
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

<div class="report-header">
					<h1 class="recent-Articles">History</h1>
				
				
                                            <div class="controls">

 
                                            </div>
                                        </div>
              
                <div class="report-body">
                <table class="table" id = "list">
                                  <thead>
                                    <tr>
                                      <th>Borrower's ID</th> 
                                   
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Issue Date</th>
                                      <th>Due date</th>
                                      <th>Dues</th>
                                      <!-- <th>Actions</th> -->
                                     
                                    </tr>
                                  </thead>
                                  <tbody>

                                <?php
                                $sql = "SELECT
                                record.BookId,
                                id,
                                RollNo,
                                Textbook,
                                Due_Date,
                                Date_of_Issue,
                                Date_of_Return,
                                Dues
                            FROM
                                LMS.record
                                INNER JOIN LMS.book ON book.BookId = record.BookId
                            WHERE
                                Date_of_Issue IS NOT NULL
                                AND Date_of_Return IS NULL
                                AND dues > 0";
                            // $sql="select record.BookId,id,RollNo,Textbook,Due_Date,Date_of_Issue,Date_of_Return,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where Date_of_Issue and Date_of_Return is NULL and book.Bookid = record.BookId";
                            $result=$conn->query($sql);
                             $rowcount=mysqli_num_rows($result);

                             if(!($rowcount))
                             echo "<br><h2><b><i>No Results</i></b></h2>";
                         else
                         

                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                               $id = $row ['id'];
                                $rollno=$row['RollNo'];
                                $bookid=$row['BookId'];
                                $name=$row['Textbook'];
                                $issuedate=$row['Date_of_Issue'];
                                $duedate=$row['Due_Date'];
                                $dues=$row['Dues'];
                          
                            ?>

                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $issuedate ?></td>
                                      <td><?php echo $duedate ?></td>     
                                      <td><?php if($dues > 0)
                                                  echo "<font color='red'>".$dues."</font>";
                                                else
                                                  echo "<font color='green'>0</font>";
                                              ?>
<!--                                            
                                            <td> 
                                              <center>
                                             <a href="payment.php" type="button" class="button">Pay</a>
                                            </center>  -->
                                            <!-- <center>  <form action="dele.php" method="post"><button type="submit" class="button">Pay Dues</button></form>  </center>             -->
                                                  </td>
                                            <!-- <td><center><form action="dele.php" method="post"><button type="submit" name="delete" class="button2">Delete</button><input type="hidden" name="M_Id" value="<?php echo $id ?>"></form></center></td> -->
                                    </tr>
                               <?php } ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span9-->
                </div>
            </div>
            </div>
</body>
</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>