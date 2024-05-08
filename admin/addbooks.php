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
			</div>

          

				<div class="report-header">
					<h1 class="recent-Articles">Add Books</h1>
				</div>
                <div class="content_body">
           
                <form class="" action="addbooks.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Section"><b>Book Section:</b></label>
                                            <div class="controls">
                                                <select name = "Section" tabindex="1" value="SC" data-placeholder="Book Section" class="inputs" required>
                                                  <!--   <option value="<?php echo $status?>"><?php echo $status ?> </option> -->
                                                  <option value=""></option>
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
                                            </div>
                                    </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Subject"><b>Subject</b></label>
                                            <div class="controls">
                                                <input type="text" id="Subject" name="Subject" placeholder="Subject" class="inputs" required>
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label" for="book"><b>Textbook</b></label>
                                            <div class="controls">
                                                <input type="text" id="book" name="book" placeholder="Textbook" class="inputs" required>
                                            </div>
                                        </div>
                                          <div class="control-group">
                                            <label class="control-label" for="Title"><b>Volume</b></label>
                                            <div class="controls">
                                                <input type="text" id="Title" name="Title" placeholder="Volumes" class="inputs" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Copyright"><b>Copyright Year</b></label>
                                            <div class="controls">
                                                <input type="text" id="Copyright" name="Copyright" placeholder="Copyright" class="inputs" required>
                                            </div>
                                        </div>
                                      
                                        <div class="control-group">
                                            <label class="control-label" for="Availability"><b>Number of Copies</b></label>
                                            <div class="controls">
                                                <input type="text" id="availability" name="availability" placeholder="Number of Copies" class="inputs" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Author"><b>Author</b></label>
                                            <div class="controls">
                                                <input type="text" id="Author" name="Author" placeholder="Author" class="inputs" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ISBN"><b>ISBN</b></label>
                                            <div class="controls">
                                                <input type="text" id="ISBN" name="ISBN" placeholder="ISBN" class="inputs" required>
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label" for="status"><b>Book Status:</b></label>
                                            <div class="controls">
                                                 <select name = "status" tabindex="1" value="SC" data-placeholder="Select Status" class="inputs" required>
                                                  <!--   <option value="<?php echo $status?>"><?php echo $status ?> </option> -->
                                                  <option value=""></option>
                                                    <option value="GOOD">GOOD</option>
                                                    <option value="DAMAGE">DAMAGE</option>
                                                    <option value="TORN PAGES">TORN PAGES</option>
                                                </select>
                                                
                                            </div>
                                    </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="button">Add Book</button>
                                            </div>
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
if(isset($_POST['submit']))
{

$Section = $_POST['Section'];
$Subject = $_POST['Subject'];
$book = $_POST['book'];
$Title = $_POST['Title'];
$Copyright = $_POST['Copyright'];

$availability = $_POST['availability'];
$Author = $_POST['Author'];
$ISBN = $_POST['ISBN'];
$status = $_POST['status'];


 $sql1 = "INSERT INTO `book`( `Section`, `Subject`, `Textbook`, `Volume`, `Year`, `Availability`, `Author`, `ISBN`, `Status`) VALUES ('$Section','$Subject','$book','$Title','$Copyright','$availability','$Author','$ISBN','$status')";

if($conn->query($sql1) === TRUE){
$sql2="select max(BookId) as x from LMS.book";
$result=$conn->query($sql2);
$row=$result->fetch_assoc();


echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
    
}
?>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>

