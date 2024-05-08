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
    <!-- <link rel="stylesheet"href="css/responsive.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	<title>Staff</title>

	
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
                <!-- <div class="inline">
      
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
                        </center> -->

                        <?php

                    $rollno = $_GET['id1'];
                    $bookid = $_GET['id2'];
                    $name = $_GET['id3'];
                    $dues = $_GET['id4'];

            //     ini_set('display_errors', 0);

                    
            //     $sql = "SELECT
            //     record.BookId,
            //     RollNo,
            //     Textbook,
            //     Dues
            // FROM
            //     LMS.record
            //     INNER JOIN LMS.book ON book.BookId = record.BookId
            // WHERE
            //     Date_of_Issue IS NOT NULL
            //     AND Date_of_Return IS NULL
            //     AND dues > 0
            //     AND record.BookId = '$bookid'";

            //                 while($row=$result->fetch_assoc())
            //                 {      
                              
                           
                               
            //                     $rollno = $row['RollNo'];
            //                     $name=$row['Textbook'];
            //                     $dues=$row['Dues'];
            //                 }
						
							?>

                     

				<div class="report-header">
					<h1 class="recent-Articles">Paying</h1>
				</div>
                <div class="content_body">
          <form action="savePayment.php" method="POST" id="paymentForm">
      <p>Borrower's ID</p>
      <input type="text" class="inputs"  name="rollno" readonly required value="<?php echo $rollno?>">
      <p>Book Id</p>
      <input type="text" class="inputs" name="bookid" readonly required value="<?php echo $bookid?>">
      <p>Book Name</p>
      <input type="text" class="inputs" name="bookname" readonly required value="<?php echo $name?>">
      <p>Dues</p>
      <input type="text" class="inputs" name="paydues" readonly required value="<?php echo $dues?>">
      <p>Amount Payed</p>
      <input type="text" name="amount"  id="amount" class="inputs" required oninput="calChange()" >                
      <p>Change</p>
      <input type="text" name="change" id="change" class="inputs" required  readonly  >  
      <button type="submit" class="button" id="saveButton" name="insert_pay" onclick="saveProcess()" style="display: none;">Save</button>
      
          </form>
          <button class="button2" onclick="calculateChange()">Calculate</button>
        <a href="payment.php" type="button" class="button">Back</a>
          <!-- <p style="color:red; position: absolute; top: 40px; right: 25%; padding:10px; width: 100px;;">***calculate first to proceed.***</p> -->
    <br>

            
                            </div>
                    <!--/.span3-->
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
 
<script>
   function calculateChange() {
    var dues = parseInt(<?php echo $dues ?>);
    var amountPaid = parseInt(document.getElementById("amount").value);
    
    if (amountPaid < dues) {
        // Display an error message or prevent the calculation
        alert("Amount paid cannot be less than the dues.");
        return;
    }

    var change = amountPaid - dues;
    document.getElementById("change").value = change;

    var saveButton = document.getElementById("saveButton");     
        if (change > 0) {
            saveButton.style.display = "block";
        } else {
            saveButton.style.display = "none";
        }
}



</script>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>