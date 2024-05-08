<?php

require('dbconn.php');




if (isset($_POST['delete'])) {
    $M_Id = $_POST['M_Id'];
    $sql2 = "DELETE FROM LMS.message WHERE M_Id = '$M_Id'";
    $result = $conn->query($sql2);
  
    if ($result) {
        echo "<script type='text/javascript'>alert('Deleted Sucessfully)</script>";
header( "Refresh:0.01; url=message2.php", true, 303);
    } else {
		echo "<script type='text/javascript'>alert('Error')</script>";
		header( "Refresh:0.01; url=message2.php", true, 303);
    }
}
?>