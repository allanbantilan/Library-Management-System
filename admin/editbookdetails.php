<?php
require('dbconn.php');

?>

<?php 
if ($_SESSION['RollNo']) {
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
					<h1 class="recent-Articles">Edit Details</h1>
				</div>
                <div class="content_body">
                    
                <div class="span9">
                        <div class="module">
                      
                            <div class="module-body">

                                <?php
                                    $bookid = $_GET['id'];
                                    $sql = "select * from LMS.book where Bookid='$bookid'";
                                    
                                    $result=$conn->query($sql);
                                    $row=$result->fetch_assoc();
                                   
                                $section=$row['Section'];
                           
                                 $subject=$row['Subject'];
                                $name=$row['Textbook'];
                                $vol=$row['Volume'];
                                $year=$row['Year'];
                                $avail=$row['Availability'];
                                 $author=$row['Author'];
                                  $isbn=$row['ISBN'];
                                $status=$row['Status']; 
                            

                                ?>
                               

                                    <br >
                                    <form class="form-horizontal row-fluid" action="edit_book_details.php?id=<?php echo $bookid ?>" method="post">
                                           
                                      <div class="control-group">

                                      <label class="control-label" for="Section"><b>Book Section:</b></label>
                                            <div class="controls">
                                                <select name = "Section" tabindex="1" value="SC" data-placeholder="" class="inputs" required>
                                                  <!--   <option value="<?php echo $status?>"><?php echo $status ?> </option> -->
                                                  <option value=""></option>
                                                    <option value="General Reference"<?php echo($row['Section']=="General Reference")? 'selected':''; ?>>General Reference</option>

                                                    <option value="Reference"<?php echo($row['Section']=="Reference")? 'selected':''; ?>>Reference</option>

                                                    <option value="Filipiniana" <?php echo($row['Section']=="Filipiniana")? 'selected':''; ?>>Filipiniana</option>

                                                    <option class="Periodical" <?php echo($row['Section']=="Periodical")? 'selected':''; ?>>Periodical</option>

                                                    <option value="Reserved Books"<?php echo($row['Section']=="Reserved Books")? 'selected':''; ?>> Reserved Books</option>

                                                    <option value="Graduate Studies" <?php echo($row['Section']=="Graduate Studies")? 'selected':''; ?>>Graduate Studies</option>

                                                    <option value="Special Collections" <?php echo($row['Section']=="Special Collections")? 'selected':''; ?>>Special Collection</option>

                                                    <option value="Rare Book"  <?php echo($row['Section']=="Rare Book")? 'selected':''; ?>> Rare Book</option>

                                                    <option value="Computer Internet Area"  <?php echo($row['Section']=="Computer Internet Area")? 'selected':''; ?>>Computer Internet Area</option>
                                                    
                                                </select>
                                            </div>
                                    </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Subject"><b>Subject</b></label>
                                            <div class="controls">
                                                <input type="text" id="Subject" name="Subject" placeholder="Subject" class="inputs" required value="<?php echo $subject?>">
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label" for="book"><b>Textbook</b></label>
                                            <div class="controls">
                                                <input type="text" id="book" name="book" placeholder="Textbook" class="inputs" required value="<?php echo $name?>">
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="Copyright"><b>Copyright Year</b></label>
                                            <div class="controls">
                                                <input type="text" id="Copyright" name="Copyright" placeholder="Copyright" class="inputs" required value="<?php echo $year?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Title"><b>Volume</b></label>
                                            <div class="controls">
                                                <input type="text" id="Title" name="Title" placeholder="Volumes" class="inputs" required value="<?php echo $vol?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Availability"><b>Number of Copies</b></label>
                                            <div class="controls">
                                                <input type="text" id="availability" name="availability" placeholder="Number of Copies" class="inputs" required value="<?php echo $avail?>">
                                            </div >
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Author"><b>Author</b></label>
                                            <div class="controls">
                                                <input type="text" id="Author" name="Author" placeholder="Author" class="inputs" required value="<?php echo $author?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ISBN"><b>ISBN</b></label>
                                            <div class="controls">
                                                <input type="text" id="ISBN" name="ISBN" placeholder="ISBN" class="inputs" required value="<?php echo $isbn?>">
                                            </div >
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label" for="status"><b>Book Status:</b></label>
                                            <div class="controls">
                                               
                                              <select name = "status" tabindex="1" value="SC" data-placeholder="Select Status" class="inputs">
                                                  <!--   <option value="<?php echo $status?>"><?php echo $status ?> </option> -->
                                                  <option value=""></option>

                                                    <option value="GOOD" <?php echo($row['Status']=="GOOD")? 'selected':''; ?>>GOOD</option>

                                                    <option value="DAMAGE" <?php echo($row['Status']=="DAMAGE")? 'selected':''; ?>>DAMAGE</option>

                                                    <option value="DILAPIDATED" <?php echo($row['Status']=="DILAPIDATED")? 'selected':''; ?>>DILAPIDATED</option>
                                                    
                                                </select>
                                            </div>
                                    </div>


                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="view2">Update Details</button> 
                                            </div>
                                        </div>                             
                                    </form> 
                                    <div class="space">   
                                    <a href="../admin/books2.php"> <button type="submit" name="submit"class="view3">Back</button> </a>  
                                    </div>   
                                    </div>   
                                    </div>          
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>

           
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>


<?php
if(isset($_POST['submit']))
{
     $bookid = $_GET['id'];
   $Section = $_POST['Section'];
$Subject = $_POST['Subject'];
$book = $_POST['book'];
$Copyright = $_POST['Copyright'];
$Title = $_POST['Title'];
$availability = $_POST['availability'];
$Author = $_POST['Author'];
$ISBN = $_POST['ISBN'];
$status = $_POST['status'];


 // $sql1 = "INSERT INTO `book`( `Section`, `Subject`, `Textbook`, `Volume`, `Year`, `Availability`, `Author`, `ISBN`, `Status`) VALUES ('$Section','$Subject','$book','$Copyright','$Title','$availability','$Author','$ISBN','$status')";

echo $sql1="update LMS.book set `Section`='$Section',`Subject`='$subject',`Textbook`='$book',`Volume`='$Title',`Year`='$Copyright',`Availability`='$availability',`Author`='$Author',`ISBN`='$ISBN',`Status`='$status' WHERE BookId='$bookid'";

// $conn->query($sql1) or die($conn->error);

if($conn->query($sql1) == TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=books2.php", true, 303);
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