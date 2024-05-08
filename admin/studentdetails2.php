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
					<h1 class="recent-Articles">Student Details</h1>
				</div>
                <div class="report-body">
               

                <?php
                            $rno=$_GET['id'];
                            $sql="select * from LMS.user where RollNo='$rno'";
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();    
                            ?>

								<table class="list">
                                    <tr>
                                        <td><b>Name:</b></td>
                                        <td class="inputs2"><?php echo $row['Name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Category:</b></td>
                                        <td class="inputs2"><?php echo $row['Category']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Department:</b></td>
                                        <td class="inputs2"><?php echo $row['Department']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Password:</b></td>
                                        <td class="inputs2"><?php echo $row['Password']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Emai Address:</b></td>
                                        <td class="inputs2"><?php echo $row['EmailId']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mobile Number:</b></td>
                                        <td class="inputs2"><?php echo $row['MobNo']; ?></td>
                                    </tr>  
                                </table>

                                <!-- $name=$row['Name'];
                                $category=$row['Category'];
                                 $department=$row['Department'];
                                  // $psw=$row['Password'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];



                                   echo "<b><u>ID No:</u></b> ".$rno."<br><br>";
                                     // echo "<b><u>Password:</u></b> ".$psw."<br><br>";
                                echo "<b><u>Name:</u></b> ".$name."<br><br>";
                                echo "<b><u>Category:</u></b> ".$category."<br><br>";
                                 echo "<b><u>Department:</u></b> ".$department."<br><br>";
                             
                               
                                echo "<b><u>Email Id:</u></b> ".$email."<br><br>";
                                echo "<b><u>Mobile No:</u></b> ".$mobno."<br><br>";  -->
             
                                <form action="studentdetails2.php" method="post">
							
                                </form>
<!-- <script>
function myFunction2() {                           
return confirm('Delete Student?'); } 
</script> -->
                        <a href="student2.php" class="button">Go Back</a> 

                        <form action="delstu.php" method="post"> 
            
                        <button  name="delete" type="submit" class="button2">Delete </button>


                         <input type="hidden" name="RollNo" value="<?php echo $rno?>"> 
                          </form>
                                               
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
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; </b>All rights reserved.
            </div>
        </div>
        

 

<?php

// if (isset($_POST['delete '])) {
//     $rno=$_GET['id'];
//     $sql="DELETE * from LMS.user where RollNo='$rno'";
//     echo "<script type='text/javascript'>alert('Success')</script>";
// header( "Refresh:1; url=studentdetails2.php", true, 303);
// }
// else
// {
// 	// echo "<script type='text/javascript'>alert('Error')</script>";
//     // header( "Refresh:1; url=studentdetails2.php", true, 303);
// }


?>




<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>