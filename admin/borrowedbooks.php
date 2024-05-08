<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']== 'admin' && 'ADMIN' && 'Admin') {
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
  
      
                 

				<div class="report-header">
					<h1 class="recent-Articles">Currently Issued Books</h1>
				</div>
             
                <div class="">
                        <form class="form-horizontal row-fluid" action="current2.php" method="post">
                                        <div class="">
                                            <!-- <label class="control-label" for="Search"><b>Search:</b></label> -->
                                            <div class="controls">
                                                <!-- <input type="text" id="title" name="title" placeholder="Enter ID No of Student/Book Name/Book Id." class="inputs" required>
                                                <button type="submit" name="submit"class="button-search">Search</button> -->
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                        $sql="select record.BookId,id,RollNo,Textbook,Due_Date,Date_of_Issue,Date_of_Return,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where (Date_of_Issue and Date_of_Return is NULL and book.Bookid = record.BookId) and (RollNo='$s' or record.BookId='$s' or Textbook like '%$s%')";}


                                    else
                                    $sql="SELECT record.BookId, record.id, record.RollNo, Textbook, Due_Date, Date_of_Issue, Date_of_Return, record.Dues, Name 
                                    FROM LMS.record
                                    INNER JOIN LMS.book ON book.BookId = record.BookId
                                    INNER JOIN LMS.user ON user.RollNo = record.RollNo
                                    WHERE Date_of_Return IS NOT NULL";
                                 
                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><h2><b><i>No Results</i></b></h2>";
                                    else
                                    {

                                    
                                    ?><div class="spacing">
                                       <!-- <form class="row2" action="excel1.php" method="post">
                                       <div class="inline">
                                        <input type="date" name="dateStart" class="inputs">
                                        <input type="date" name="dateEnd" class="inputs">
										
                                         </div> -->
                                      <!-- <form action="excel1.php" method="post" style="float: left;">
                                    <input type="submit" name="export_excel" class="view2" value="Export to Excel">
                                </form> -->

                                <form action="dellall.php" method="post">
                                        <!-- <button type="submit" name="delete" class="btn btn-primary" onclick="myFunction2()">Delete All
                                              <script>
                                                    function myFunction2() {
                                                   return confirm('Are you sure you want to delete all book?');
                                                      }
                                                    
                                            </script>
                                        </button> -->
                                    
                                         <!-- <button onclick="return myFunction2()" name="delete" type="submit" class="view3">Delete All</button>
                                                    <script>
                                                    function myFunction2() {
                                                   return confirm('Are you sure you want to delete all Currently Issued Books even it is not return?');}
                                                 
                                                  </script> -->
</div>
  </form>   
                                  
                        <table class="display" id = "list">
                                  <thead>
                                    <tr>
                                      
                                      <th> ID</th> 
                                      <th>Borrower's ID</th> 
                                      <th>Borrower's Name</th> 
                                   
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Issue Date</th>
                                      <th>Due date</th>
                                        <th>Date of Return</th>
                                     <th>Dues</th>
                            
                                  
                                    </tr>
                                  </thead>
                                  <tbody>

                                <?php

                            

                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                               $id = $row ['id'];
                                $rollno=$row['RollNo'];
                                $borrowersname=$row['Name'];
                                $bookid=$row['BookId'];
                                $name=$row['Textbook'];
                                $issuedate=$row['Date_of_Issue'];
                                $duedate=$row['Due_Date'];
                                $return=$row['Date_of_Return'];
                                $dues=$row['Dues'];
                            
                            ?>

                                    <tr>
                                    <td><?php echo $id ?></td>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                     
                                      <td><?php echo $borrowersname ?></td>
                                      <td><?php echo $bookid ?></td>
                                        
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $issuedate ?></td>
                                      <td><?php echo $duedate ?></td>
                                      <td><?php echo $return ?></td>
                                   
                                      <td><?php echo $dues ?></td>
                             
                                    
                                            </form>
                                       
                                    
                                     
                                    </tr>
                            <?php }} ?>
                                    </tbody>
                                </table>
                    </div>

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