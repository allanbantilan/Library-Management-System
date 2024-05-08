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
    <!-- <link rel="stylesheet"href="css/responsive.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	<title>Staff</title>

	
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
				<div class="report-header">
					<h1 class="recent-Articles">Payments</h1>
				</div>
               
    <br>
    <table class="table" id = "list">
                                  <thead>
                                    <tr>
                                      <th>Borrower's ID</th>
                                      <th>Book Id</th>
                                      <th>Book Name</th>
                                      <th>Dues</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            // $sql="select return.BookId,return.RollNo,Textbook,datediff(curdate(),Due_Date) as x from LMS.return,LMS.book,
                            // LMS.record where Date_of_Return is NULL and return.BookId=book.BookId and return.BookId=record.BookId and return.RollNo=record.RollNo";

                            $sql = "SELECT
                            record.BookId,
                            RollNo,
                            Textbook,
                            Dues
                        FROM
                            LMS.record
                            INNER JOIN LMS.book ON book.BookId = record.BookId
                        WHERE
                            Date_of_Issue IS NOT NULL
                            AND Date_of_Return IS NULL
                            AND dues > 0";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $rollno=$row['RollNo'];
                                $name=$row['Textbook'];
                                $dues=$row['Dues'];

                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><b><?php echo $name ?></b></td>
                                      <td><?php 
                                      if($dues > 0)
                                          echo "<font color='red'> $dues </font>";
                                          else
                                          echo "<font color ='green'>0 </font>"; ?></td>
                                      <td><center>
                                      <?php
                                       
                                            echo "<button class='button2' id='payBtn' style='color:white'>Pay</button>"; // Disable the return button for books with dues
                                     
                                        
                                        ?>             
                                     
                                    </center></td>
                                    </tr>
                               <?php }?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span3-->
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>   
        <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Payment</h2>
    </div>
    <div class="modal-body">
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
        <input type="text" name="amount"  id="amount" class="inputs" required >                
        <p>Change</p>
        <input type="text" name="change" id="change" class="inputs" required  readonly  >  
        <button type="submit" class="button" name="insert_pay" onclick="saveProcess()">Save</button>
            </form>
            <button class="button-modal" onclick="calculateChange()">Calculate</button>
            <p style="color:red; position: absolute; top: 40px; right: 25%; padding:10px; width: 100px;;">***calculate first to proceed.***</p>
            <script>
    function saveProcess() {
      var amountPaid = parseInt(document.getElementById("amount").value);
        var change = document.getElementById("change").value;

        if (isNaN(amountPaid) || amountPaid === '') {
            alert("Please enter a valid amount paid.");
            return;
        }

        if (change === '' || change === null) {
            alert("Please calculate the change before saving.");
            return;
        }

        var form = document.getElementById("paymentForm");
        form.submit();
    }
</script>
    </div>
    </div>
    <div class="modal-footer">
        
    


    <script>
//     function saveProcess() {
//         // Get the form element
//         var form = document.getElementById("paymentForm");

//         // Validate the form or perform any necessary checks

//         // Submit the form
//         form.submit();               
//     }
// </script>
           
        <!-- <button type="button" class="button2" name='span' data-dismiss="modal">Close</button></h3> -->
    </div>
  </div>

</div>
<script>

// function calChange() {
//   var amountPaid = parseFloat(document.getElementById('amount').value);
//   var dues = parseFloat(document.getElementById('paydues').value);
  
//   if (!isNaN(amountPaid) && !isNaN(dues)) {
//     var change = amountPaid - dues;
//     document.getElementById('change').value = change.toFixed(2);
//   }
// }


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
    }
    // function calculateChange() {
       
    
    //     var dues = parseInt("<?php echo $dues ?>"); // Convert dues to an integer
    //     var amountPaid = parseInt(document.getElementById("amount").value); // Get the amount paid from the input

    //     // Calculate the change
    //     var change = dues - amountPaid;

    //     // Display the change in the input field
    //     document.getElementById("change").value = change;
    // }
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("payBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>