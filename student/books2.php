<?php
require('dbconn.php');

?>

<?php 
if ($_SESSION['RollNo'] ) {
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
	<title>Books</title>

	
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

				<div class="report-header">
					<h1 class="recent-Articles">List of All the Books</h1>
                </div>
				<form class="form-horizontal row-fluid" action="books2.php" method="post" >
                                        <div class="content_body">
                                            <!-- <label class="control-label" for="Search"><b>Search:</b></label> -->
                                            <!-- <div class="controls">
                                                <input type="text" id="Textbook" name="Textbook" placeholder="Enter Book Section , Book Name, or book Status" class="inputs" required>
                                                <button type="submit" name="submit"class="button-search">Search</button>
                                            </div> -->
                                        </div>
										</form>
									

										
                                   
                <div class="report-body">
                <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['Textbook'];

                                            $sql="select * from LMS.book where Section like '%$s%' OR Textbook like '%$s%'";
                                    // $sql = "select * from LMS.book where BookId = '$s' or Textbook like '%s%' ";
                                     // $name=$row['Textbook'];
                                 // $rs = $conn->query($sql);
                                        }
                                    else
                                        $sql="select * from LMS.book";

                                    $result=$conn->query($sql);
                                    $rowcount = mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                        <table class="display" id = "list">
                                  <thead>
                                    <tr>
                                      <th>Book id</th>
                                       <th>Section</th>
                                      <th>Book name</th>
                                      <th>Availability</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            
                  
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
                                     
                                      <td><b><?php 
                                           if($avail > 0)
                                              echo "<font color=\"green\">AVAILABLE</font>";
                                            else
                                            	echo "<font color=\"red\">NOT AVAILABLE</font>";

                                                 ?>
                                                 	
                                                 </b></td>
                                      <td class="aTable"><a href="bookdetails2.php?id=<?php echo $bookid; ?>" class="button2">Details</a>
                                      	<?php
                                      	if($avail > 0)
                                      		echo "<a href=\"issue_request.php?id=".$bookid."\" class=\"button\">Request</a>";
                                        ?>
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