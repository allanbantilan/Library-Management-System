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
			</div>                   <?php
                                  ini_set('display_errors', 0);
                                   $x=$_GET['id'];
                    
                                   $sql="select * from LMS.book where BookId='$x'";
                                   $result=$conn->query($sql);
                                   $row=$result->fetch_assoc();    
                                  
                                    ?>
                                      <?php
                                    $sql2 = "SELECT * FROM `user` WHERE Type = 'Student' AND Category = 'Student'";
                                    $result2 = $conn->query($sql2);
                                    $borrowers = [];

                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                            $borrowers[] = $row2;
                                        }
                                    }
                                    ?>

				<div class="report-header">
					<h1 class="recent-Articles">Lend Books</h1>
				</div>
                <div class="content_body">
        <form action="lending.php" method="POST" id="paymentForm">
      <p>Book Id</p>
      <input type="text" class="inputs" name="bookid" id="bookid" readonly required value="<?php echo $row['BookId']; ?>">


      <p>Book Name</p>
      <input type="text" class="inputs" name="bookname" id="bookname" readonly required value="<?php echo $row['Textbook']; ?>">
    
      <p>Borrowers ID</p>
      <select name="borrowerId" id="borrowerId" class="inputs">
    <?php foreach ($borrowers as $borrower) : ?>
        <option value="<?php echo $borrower['RollNo']; ?>"><?php echo $borrower['RollNo']; ?></option>
    <?php endforeach; ?>
    </select>
      <p>Borrowers Name</p>
      <input type="text" class="inputs" name="bname" id="borrowerName" readonly required >
               
     <button type="submit" class="button" name="lend_book">Lend</button>
          </form>
             
                                        </div>
                                    </form>
                            </div>
                        </div>

                        
                        
                    </div>
                </div>

                </div>
            </div>
  

        </div>
<?php





?>


  
    </body>
</html>
<script>
    // Get references to the select and input elements
    const BookIdSelect = document.getElementById('BookId');
    const BookNameInput = document.getElementById('bookname');

    // Listen for the change event on the select element
    BookIdSelect.addEventListener('change', function() {
        // Get the selected ID and find the corresponding name
        const selectedId = BookIdSelect.value;
        const selectedBooks = <?php echo json_encode($books); ?>.find(books => books.RollNo === selectedId);

        // Update the input field with the corresponding name
        BookNameInput.value = selectedBorrower ? selectedBorrower.Name : '';
    });
</script>
<script>
    // Get references to the select and input elements
    const borrowerIdSelect = document.getElementById('borrowerId');
    const borrowerNameInput = document.getElementById('borrowerName');

    // Listen for the change event on the select element
    borrowerIdSelect.addEventListener('change', function() {
        // Get the selected ID and find the corresponding name
        const selectedId = borrowerIdSelect.value;
        const selectedBorrower = <?php echo json_encode($borrowers); ?>.find(borrower => borrower.RollNo === selectedId);

        // Update the input field with the corresponding name
        borrowerNameInput.value = selectedBorrower ? selectedBorrower.Name : '';
    });
</script>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>

