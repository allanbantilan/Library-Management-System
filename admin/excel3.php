<?php
include_once("connection.php");
$con = connection();
$output = '';
if(isset($_POST["export_payments"]))
{
$sql = "SELECT * FROM payments ORDER BY id DESC";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0 ) {
	
}
$output .='
<table class = "table" bordered = "2" style = "border: 2px;">
								 <thead>
                                    <tr>
                                    <th>Payment Id</th>
                                    <th>Borrower Id</th>
                                    <th>Book Id</th>
                                    <th>Book Name</th>
                                    <th>Dues</th>
                                    <th>Amount Payed</th>
                                    <th>Change</th>
                                    <th>Date</th>
                                     
                                    </tr>
                                  </thead>

';

while ($row = mysqli_fetch_array($result)) {
	$output .='
									 <tr>
                                      <td>'.$row["id"].'</td>
                                      <td>'.$row["RollNo"].'</td>
                                        <td>'.$row["BookId"].'</td>
                                        <td>'.$row["Textbook"].'</td>
                                        <td>'.$row["Dues"].'</td>
                                      <td>'.$row["Amount"].'</td>
                                        <td>'.$row["Sukli"].'</td>
                                        <td>'.$row["date_and_time"].'</td>
                                     
                                  			  </tr>

	';
}
$output .='</table>';
header("Content-Type: vnd.ms-excel");
header("Content-Disposition:attachment; filename=payments.xls");
echo $output;

}



?>
