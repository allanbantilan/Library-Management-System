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

  <style type="text/css" media="print">
  .no-print { display: none; }
    .sample{
      background-color: aquamarine;
    }
  </style>
  
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
      
            
                        
                        </div>
                        </div>
                       

				<div class="report-header" id="mainprint">
					<h1 class="recent-Articles">Payments List</h1>
				</div>  
                                   <div class="spacing">
                                    <form class="row2" action="excelpayment.php" method="post">
                                       <div class="inline">
                                    <p>Starting date</p>
                                        <input type="date" name="dateStart" class="inputs">
                                        <p>Ending date</p>
                                        <input type="date" name="dateEnd" class="inputs">
										
                                         </div>
                                         </div>
      <br>
                <!-- <form action="excel.php" method="post" style="float: left;" class="classform">
                                    <input type="submit" name="export_payments" class="view2" value="Export all to excel">
                                </form> -->
    <br>
    <!-- <button onclick="printdoc()">Print</button> -->
    <form action="excelpayment.php" method="post">
    <button name="print" class="view2">Print</button>
    </form>
    <div id="elementToPrint">

      <table class="display" id = "list">
                                    <thead>
                                      <tr>
                                        <th>Payment Id</th>
                                        <th>Processed By</th>
                                        <th>Borrower Id</th>
                                        <th>Book Id</th>
                                        <th>Book Name</th>
                                        <th>Dues</th>
                                        <th>Amount Payed</th>
                                        <th>Change</th>
                                        <th>Date</th>
                                        <!-- <th>Actions</th> -->
                                    
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                              $sql="select * from LMS.payments ORDER by id DESC";
                              $result=$conn->query($sql);
                              while($row=$result->fetch_assoc())
                              {
                                  $payid=$row['id'];
                              $process=$row['Processed_by'];
                                  $rollid=$row['RollNo'];
                                  $bookid=$row['BookId'];
                                  $textbook=$row['Textbook'];
                                  $dues=$row['Dues'];
                                  $amount=$row['Amount'];
                                  $change=$row['Sukli'];
                                  $date=$row['date_and_time'];
                              
                             
                              ?>
                                      <tr>
                                        <td><?php echo strtoupper($payid) ?></td>
                                        <td><?php echo $process ?></td>
                                        <td><?php echo $rollid ?></td>
                                        <td><b><?php echo $bookid ?></b></td>
                                        <td><?php echo $textbook ?></td>
                                        <td><?php echo $dues ?></td>
                                        <td><?php echo $amount ?></td>
                                        <td><?php echo $change ?></td>
                                        <td><?php echo $date ?></td>
                                        <!-- <td class="aTable">
                                         
                                          
                                      </td> -->
                                      </tr>
                                 <?php } ?>
                                 </tbody>
                                  </table>
    </div>
                            </div>
                    <!--/.span3-->
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
                       
<script>

function printdoc() {
  
  var element = document.getElementById('elementToPrint');
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = element.innerHTML;
  window.print();

  document.body.innerHTML = originalContents;
}

</script>
<script>
        $(document).ready(function () {
    $('#list').DataTable();
});
</script>



<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>