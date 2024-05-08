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
    <link rel="stylesheet"href="css/responsive.css">
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

            <div class="report-header">
					<h1 class="recent-Articles">Currently Borrowed Books</h1>
				</div>

                <div class="span9">
                        <form class="form-horizontal row-fluid" action="current2.php" method="post">
                        <div class="">
                                            <label class="control-label" for="Search"><b>Search:</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Enter ID No of Student/Book Name/Book Id." class="inputs" required>
                                                <button type="submit" name="submit"class="button-search">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                        $sql="select record.BookId,id,RollNo,Textbook,Due_Date,Date_of_Issue,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where (Date_of_Issue and Date_of_Return  and book.Bookid = record.BookId) and (RollNo='$s' or record.BookId='$s' or Textbook like '%$s%')";
                                        }
                                    else
                                        $sql="select record.BookId,id,RollNo,Textbook,Date_of_Return,Date_of_Issue,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where Date_of_Issue and Date_of_Return and book.Bookid = record.BookId";
                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                                    <div class="spacing">
                                      <form action="excel2.php" method="post" style="float: left;">
                                    <input type="submit" name="export_excel" class="view2" value="Export to Excel">
                                </form>

                                <form action="dellall.php" method="post">
                                        <button onclick="return myFunction2()" name="delete" type="submit" class="view3">Delete All</button>
                                                    <script>
                                                    function myFunction2() {
                                                   return confirm('Are you sure you want to delete all the records?');}
                                                    </script>
                                        </div>
                                     
                                          
                        <table class="table" id = "list">
                                  <thead>
                                    <tr>
                                      <th>Borrower's ID</th> 
                                    
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Issue Date</th>
                                      <th>Return date</th>
                                      <th>Dues</th>
                                      <th>Delete</th>
                                     
                                    </tr>
                                  </thead>
                                  
                                  <tbody>
                               
                                <?php

                            

                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                               $id = $row ['id'];
                                $rollno=$row['RollNo'];
                                $bookid=$row['BookId'];
                                $name=$row['Textbook'];
                                $issuedate=$row['Date_of_Issue'];
                                $duedate=$row['Date_of_Return'];
                                $dues=$row['x'];
                                 $dues=$row['x'];
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
                                              </form>

                                        <td class="aTable"><form action="delcu.php" method="post" >
                                           <button onclick="return myFunction2()" name="delete" type="submit" class="button2">Delete</button>
                                                    <script>
                                                    function myFunction2() {
                                                   return confirm('Are you sure you want to delete this records?');}
                                                    </script>
                                    
                                            </form>
                                       
                                     </td>
                                     
                                    </tr>
                            <?php }} ?>
                                    </tbody>
                                </table>
                    </div>

                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>