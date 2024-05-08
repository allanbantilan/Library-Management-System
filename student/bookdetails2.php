
<?php
include("dbconn.php");
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
	<title>Admin</title>

	
</head>

<body>

<?php 
	include('../student/includes/dasboard.php')
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
					<h1 class="recent-Articles">Book Details</h1>
				</div>
                <div class="background-body">


				<?php
                ini_set('display_errors', 0);
                            $x=$_GET['id'];
                    
                            $sql="select * from LMS.book where BookId='$x'";
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();    
                           
						
							?>
                            <div class="content_body"> 
                                <table class="list">
                                    <tr>
                                        <td><b>Book ID:</b></td>
                                        <td class="inputs2"><?php echo $row['BookId']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Section:</b></td>
                                        <td class="inputs2"><?php echo $row['Section']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Subject:</b></td>
                                        <td class="inputs2"><?php echo $row['Subject']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Textbook:</b></td>
                                        <td class="inputs2"><?php echo  $row['Textbook'].$name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Volume:</b></td>
                                        <td class="inputs2"><?php echo $row['Volume']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Copyright Year:</b></td>
                                        <td class="inputs2"><?php echo $row['Year']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Availability:</b></td>
                                        <td class="inputs2"><?php echo $row['Availability']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Author:</b></td>
                                        <td class="inputs2"><?php echo $row['Author']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>ISBN:</b></td>
                                        <td class="inputs2"><?php echo $row['ISBN']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Book Status:</b></td>
                                        <td class="inputs2"><?php echo $row['Status']; ?></td>
                                    </tr>
                                </table>
                            

                         	<!-- // $bookid=$row['BookId'];
                            //      $section=$row['Section'];
                            //       $subject=$row['Subject'];
                            //      $name=$row['Textbook'];
                            //     $vol=$row['Volume'];
                            //      $year=$row['Year'];
                            //      $avail=$row['Availability'];
                            //       $author=$row['Author'];
                            //       $isbn=$row['ISBN'];
                            //      $status=$row['Status'];  


                            //      echo "<b>Book ID:</b> ".$bookid."<br><br>";
                            //      echo "<b>Section:</b> ".$section."<br><br>";
                            //       echo "<b>Subject:</b> ".$subject."<br><br>";
                            //  echo "<b>Textbook:</b> ".$name."<br><br>";
                            //      echo "<b>Volume:</b> ".$vol."<br><br>";
                            //       echo "<b>Copyright Year:</b> ".$year."<br><br>";
                            //        echo "<b>Availability:</b> ".$avail."<br><br>";
                            //          echo "<b>Author:</b> ".$author."<br><br>";
                            //            echo "<b>ISBN:</b> ".$isbn."<br><br>";
                            //      echo "<b>Book Status:</b> ".$status."<br><br>"; -->

                                
                        
							
                            
                        <!-- <a hre f="addbook.php"class="btn btn-primary">Go Back</a>  --> 
                        <a href="books2.php" class="button">Go Back</a>
                        <br>
                        </div>
                        <!-- <form action="delete.php" method="post">
                        <!-- <button type="submit" name="delete"class="btn btn-primary" onclick="myFunction()">Delete
                            <script type="text/javascript">
                                function myFunction(){
                                    alert('Book deleted');


                                }
                            </script>
                        </button> -->


<!-- <button onclick="return myFunction2()" name="delete" type="submit" class="button2">Delete</button>  -->
<!-- <script>
function myFunction2() {
return confirm('Are you sure you want to delete this book?'); } 
</script>




                        <input type="hidden" name="deletor" value="admin">
                        <input type="hidden" name="item" value="<?php echo $name?>">
                        <input type="hidden" name="bookId" value="<?php echo $x?>"> 
                        </form> -->
                                                   
                               </div>
                           </div>
                            </div>
                    <!--/.span3-->
                    <!--/.span9-->
                
                    <!--/.span3-->
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





                          

</script>
</body>
</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>