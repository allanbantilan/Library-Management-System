<?php
require('dbconn.php');

?>

<?php 
if ($_SESSION['RollNo']== 'admin' ) {
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
					<h1 class="recent-Articles">List of All the Books</h1>
				</div>
				<form class="form-horizontal row-fluid" action="books2.php" method="post">
                                        <div class="control-group">
                                            <!-- <label class="control-label" for="Search"><b>Search:</b></label> -->
                                            <div class="controls">
                                                <!-- <input type="text" id="Textbook" name="Textbook" placeholder="Enter Book Section , Book Name, or book Status" class="inputs" required>
                                                <button type="submit" name="submit"class="button-search">Search</button> -->
                                            </div>
                                        </div>
										</form>
										<br>	

										
                                     <form class="row2" action="lab.php" method="post">
                                        <div class="controls">
									
                                            <div class="controls">

                                               <select name = "Section" tabindex="1" value="SC" data-placeholder="" class="inputs" required style="float:left;">
                                               <?php echo $status?>"><?php echo $status ?>
                                                  <option value="" style="text-align: center;"></option>
                                                    <option value="General Reference">General Reference</option>
                                                    <option value="Reference">Reference</option>
                                                    <option value="Filipiniana">Filipiniana</option>
                                                    <option class="Periodical">Periodical</option>
                                                    <option value="Reserved Books"> Reserved Books</option>
                                                    <option value="Graduate Studies">Graduate Studies</option>
                                                    <option value="Special Collections">Special Collection</option>
                                                    <option value="Rare Book"> Rare Book</option>
                                                    <option value="Computer Internet Area">Computer Internet Area</option>
                                                </select>
										
									
                                                 <!-- <label class="control-label" for="Search"><b>Select Status:</b></label>  -->
                                            <div class="controls">
                                                <select name = "Status" tabindex="1" value="SC" data-placeholder="Select Status" class="inputs">
                                              <?php echo $status?>"><?php echo $status ?> </option>
                                                <option value="" style="text-align: center;"></option>
                                                    <option value="GOOD">GOOD</option>
                                                    <option value="DAMAGE">DAMAGED</option>
                                                    <option value="TORN PAGES">TORN PAGES</option>
                                                    
                                                </select>
                                                <button type="submit" name="submit"class="view2">Generate Report</button>
                                               
                                            </div>
                                        </div>
                                    </form>
                <div class="report-body">
                <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['Textbook'];

                                            $sql="select * from LMS.book where Section like '%$s%' OR Textbook like '%$s%' OR Status like '%$s%'";
                                        }
                                    else
                                        $sql="select * from LMS.book";

                                    $result=$conn->query($sql);
                                    $rowcount = mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?><div class="spacing">
                                      <form action="excel.php" method="post" style="float: left;">
                                    <input type="submit" name="export_excel" class="view2" value="Export All Books">
                                </form>
                                </div>

                                 <form action="delallb.php" method="post">
                                     
                                           
                        <table class="display" id = "list">
                                  <thead>
                                    <tr>
                                      <th>Book identification Number</th>
                                       <th>Section</th>
                                      <th>Book name</th>
                                      <th>Availability</th>
                                     
                                      <th>Actions</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {      
                              
                                $bookid=$row['BookId'];
                               
                                $section = $row['Section'];
                                $name=$row['Textbook'];
                                $avail=$row['Availability'];
                               
                            
                           
                            ?>
                                    <tr>
                                    <td><?php echo $bookid ?></td>
                                       <td><?php echo $section ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><b><?php echo $avail ?></b></td>
                                       
                                        <td class="aTable">
                                            <a href="bookDetails2.php?id=<?php echo $bookid; ?>" class="button">Details</a>
                                            <a href="editbookdetails.php?id=<?php echo $bookid; ?>" class="button2">Edit</a>

                                           <input type="hidden" name="bookid" value="<?php echo $bookid ?>">
                                               <input type="hidden" name="name" value="<?php echo $bookid ?>">
                                               <input type="hidden" name="item" value="all book">
                                               <input type="hidden" name="deletor" value="admin">
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