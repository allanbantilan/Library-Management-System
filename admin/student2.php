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
					<h1 class="recent-Articles">List of Borrowers</h1>
				</div>
                <div class="report-body">
                <div class="span9">
                        <form class="form-horizontal row-fluid" action="student2.php" method="post">
                                        <div class="control-group">
                                            <!-- <label class="control-label" for="Search"><b>Search:</b></label> -->
                                            <div class="controls">
                                                <!-- <input type="text" id="title" name="title" placeholder="Enter Name/ID No of Student" class="inputs" required>
                                                <button type="submit" name="submit"class="view">Search</button> -->
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                            $sql="select * from LMS.user where (RollNo='$s' or Name like '%$s%') and Type<>'ADMIN'";
                                        }
                                    else
                                        $sql="select * from LMS.user where Type<>'ADMIN'";

                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                        <table class="display" id = "list">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>ID No.</th>
                                      <th>Email id</th>                                      
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                    <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {

                                $email=$row['EmailId'];
                                $name=$row['Name'];
                                $rollno=$row['RollNo'];
                            ?>
                                    <tr>
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $rollno ?></td>
                                      <td><?php echo $email ?></td>                                      
                                        <td class="aTable">
                              
                                            <a href="studentdetails2.php?id=<?php echo $rollno; ?>" class="button">Details</a>
                                            <!-- <a href="remove_student.php?id=<?php echo $rollno; ?>" class="button2">Remove</a>
                        -->
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
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; </b>All rights reserved.
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