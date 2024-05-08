<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo'] == false) {

 echo header("Location:nicetry.php");
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
	<title>Admin</title>

	
</head>

<body>

<?php 
    include('../admin/includes/dasboard.php')
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
                        <!-- <form action="renew_request2.php">
                            <input type="submit" value="Renew Request" class="view2"/>
                        </form> -->
                        <form action="return_request2.php">
                            <input type="submit" value="Return Request" class="view2">
                        </form>
                        </div>
                        </div>
                        </center>
				<div class="report-header">
					<h1 class="recent-Articles">Return Request</h1>
				</div>
               
    <br>
    <table class="display" id = "list">
                                  <thead>
                                    <tr>
                                    <th>Borrower's ID</th>
                                      <th>Book Id</th>
                                      <th>Book Name</th>
                                      <th>Date of Issue</th>
                                      <th>Due Date</th>
                                      <th>Days Pass</th>
                                      <th>Dues</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            // $sql="select return.BookId,return.RollNo,Textbook,datediff(curdate(),Due_Date) as x from LMS.return,LMS.book,LMS.record where Date_of_Return is NULL and return.BookId=book.BookId and return.BookId=record.BookId and return.RollNo=record.RollNo";

                            $sql = "SELECT return.BookId, return.RollNo, Textbook, record.Dues,record.Date_of_Issue,  record.Due_Date, GREATEST(DATEDIFF(NOW(), record.Due_Date), 0) as x
                            FROM LMS.return, LMS.book, LMS.record
                            WHERE Date_of_Return IS NULL
                                AND return.BookId = book.BookId
                                AND return.BookId = record.BookId
                                AND return.RollNo = record.RollNo";

                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $rollno=$row['RollNo'];
                                $name=$row['Textbook'];
                                $dateofissue=$row['Date_of_Issue'];
                                $duedate=$row['Due_Date'];
                                $dayspast=$row['x'];
                                $dues=$row['Dues'];
                                
                            
                           
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><b><?php echo $name ?></b></td>
                                      <td><?php echo $dateofissue ?></td>
                                      <td><?php echo $duedate ?></td>
                                      <td><?php
                                       if ($dayspast == $dues) {
                                          
                                            echo 0;
                                           
                                       } 
                                       else
                                       echo $dayspast;
                                       
                                       ?></td>
                                      <td><?php 
                                      if($dues > 0)
                                          echo "<font color='red'> $dues </font>";
                                          else
                                          echo "<font color ='green'>0 </font>"; ?></td>
                                      <td><center>
                                      <?php
                                        if ($dues > 0) {
                                            echo "<a href='../admin/payment.php'class='button2' style='color:white'>Pending"; // Disable the return button for books with dues
                                        } else {
                                            echo "<a href='acceptreturn.php?id1=$bookid&id2=$rollno&id3=$dues' class='button'>Accept";
                                        }
                                        ?>             
                                     
                                    </center></td>
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

        <script>
        $(document).ready(function () {
    $('#list').DataTable();
});
</script>




<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>