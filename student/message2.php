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
    <link rel="stylesheet" href="css/datatables/jquery.css">
   <script src="css/datatables/jquery.js"></script>
   <script src="css/datatables/jtable.js"></script>
    <title>Notifications</title>
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
					<h1 class="recent-Articles">Notifications</h1>
				
				
                                            <div class="controls">

 
                                            </div>
                                        </div>
              
                <div class="report-body">
                <table class="display" id = "list">
                                  <thead>
                                    <tr>

                                      <th>Msg Id</th>
                                      <th>Message</th>
                                      <th>Date</th>
                                      <th>Time</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $rollno=$_SESSION['RollNo'];
                            $sql="select * from LMS.message where RollNo='$rollno' order by Date DESC,Time DESC";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                
                                 $mid=$row['M_Id'];
                                 $rcv=$row['Sender'];
                                $msg=$row['Msg'];
                                $date=$row['Date'];
                                $time=$row['Time'];
                            
                           
                            ?>
                                    <tr>

                                      <td><?php echo $mid ?></td>
                                      <td><?php echo $msg ?></td>
                                      <td><?php echo $date ?></td>
                                      <td><?php echo $time ?></td>
                                      <td><center><form action="dele.php" method="post"><button type="submit" name="delete" class="button2">Delete</button><input type="hidden" name="M_Id" value="<?php echo $mid ?>"></form></center></td>
                                    </tr>
                               <?php } ?>
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

</body>
</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>