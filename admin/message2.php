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
					<h1 class="recent-Articles">Send a Message</h1>
				</div>
               
    <br>
                 
<div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                          
                            </div>
                            <div class="content_body">

                                 

                                    <form class="isdog-gamay" action="message2.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Rollno"><b>Receiver ID No:</b></label>
                                            <div class="controls">
                                                <input type="text" id="RollNo" name="RollNo" placeholder="Id No" class="inputs" required >
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label" for="Sender"><b>Sender's Name:</b></label>
                                            <div class="controls">
                                                <input type="text" id="Sender" name="Sender" placeholder="Input your name" class="inputs" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Message"><b>Message:</b></label>
                                            <div class="controls">
                                                <input type="text" id="Message" name="Message" placeholder="Enter Message" class="inputs" required>
                                            </div>
                                      
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="view2">Add Message</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        
                        
                    </div><!--/.content-->
                </div>
                    <!--/.span9-->
                </div>




<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>