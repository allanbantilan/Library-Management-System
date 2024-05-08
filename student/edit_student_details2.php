<?php
ob_start();
require('dbconn.php'); 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/settings.css">
	<link rel="stylesheet" href="css/css.css">
    <title>Edit Admin</title>
</head>
<body>
    <?php
    include('../admin/includes/dasboard.php')
    ?>
				
			</nav>
		</div>
		<div class="main">
<div class="">
             
                    </div>
           
                    
                    <div class="report-header">
					<h1 class="recent-Articles">Update Details</h1>
				</div>
                            <div class="content_body">


                                <?php
                                $rollno = $_SESSION['RollNo'];
                                $sql="select * from LMS.user where RollNo='$rollno'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();

                                $name=$row['Name'];
                                $category=$row['Category'];
                                 $department=$row['Department'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];
                                $pswd=$row['Password'];
                                ?>    
                            
                            <form class="form-horizontal row-fluid" action="edit_student_details2.php?id=<?php echo $rollno ?>" method="post">

                                    <div class="control-group">
                                        <label class="control-label" for="Name"><b>Name:</b></label>
                                        <div class="controls">
                                            <input type="text" id="Name" name="Name" value= "<?php echo $name?>" class="inputs" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                            <label class="control-label" for="Category"><b>Category:</b></label>
                                            <div class="controls">
                                                <select name = "Category" tabindex="1" value="SC" data-placeholder="Select Category" class="inputs">
                                                    <option value="<?php echo $category?>"><?php echo $category ?> </option>
                                                    <option value="Student">Student</option>      
                                                </select>

                                            </div>
                                    </div>
                                    <div class="control-group">
                                            <label class="control-label" for="Department"><b>Department:</b></label>
                                            <div class="controls">
                                                <select name = "Department" tabindex="1" value="SC" data-placeholder="Select Category" class="inputs">
                                                    <option value="<?php echo $department?>"><?php echo $department ?> </option>
                                                    <option value="Compstud">BEED</option>
                                                    <option value="Education">BSED</option>
                                                    <option value="Agriculture">BSBA</option>
                                                    <option value="Agriculture">BSIT</option>
                                                    
                                                </select>
                                                
                                            </div>
                                    </div>

                            <div class="control-group">
                                <label class="control-label" for="EmailId"><b>Email Id:</b></label>
                                <div class="controls">
                                    <input type="text" id="EmailId" name="EmailId" value= "<?php echo $email?>" class="inputs" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="MobNo"><b>Mobile Number:</b></label>
                                <div class="controls">
                                    <input type="text" id="MobNo" name="MobNo" value= "<?php echo $mobno?>" class="inputs" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="Password"><b>New Password:</b></label>
                                <div class="controls">
                                    <input type="text" id="Password" name="Password"  value= "<?php echo $pswd?>" class="inputs" required>
                                </div>
                            </div>   

                            <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" name="submit"class="view2"><center>Update Details</center></button>
                                    </div>
                                </div>                                                                     

                            </form>
                            
                            </div>
                            </div> 	
                            </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>

<?php
if(isset($_POST['submit']))
{
    $rollno = $_GET['id'];
    $name=$_POST['Name'];
    $email=$_POST['EmailId'];
    $mobno=$_POST['MobNo'];
    $pswd=$_POST['Password'];

$sql1="update LMS.user set Name='$name', EmailId='$email', MobNo='$mobno', Password='$pswd' where RollNo='$rollno'";



if($conn->query($sql1) === TRUE){
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=index.php", true, 303);
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
}
?>
      
    </body>

</html>


