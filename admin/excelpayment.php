<?php
include_once("connection.php");
$con = connection();
$output = '';
$dateStart = $_POST['dateStart'];
$dateEnd = $_POST['dateEnd'];
if(isset($_POST["print"]))
{
 // $sql ="SELECT * FROM record ORDER BY BookId DESC";
 // $sql="select record.BookId,RollNo,Title,Due_Date,Date_of_Issue,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where (Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId) and (RollNo='$s' or record.BookId='$s' or Title like '%$s%')";

$sql = "select * from payments WHERE date_and_time BETWEEN '$dateStart' AND '$dateEnd'";


$output .="
    <table class='table' bordered='2'>
                                     <thead>
                                        <tr>
                                    
                
                                          <th>Payment Id</th>
                                          <th>Processed By</th>
                                          <th>Borrower Id</th>
                                          <th>Book Id</th>
                                          <th>Book Name</th>
                                          <th>Dues</th>
                                          <th>Amount Payed</th>
                                          <th>Change</th>
                                          <th>Date</th>
                                        
                            </tr>
                                      </thead>
    
    ";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0 ) {
    
    
     // $output .='
    // $row = mysqli_fetch_assoc($result);
    while ($row = mysqli_fetch_assoc($result)) {
            $output .= 
            "<tr>
        <td>".$row['id']."</td>
        <td>".$row['Processed_by']."</td>
        <td>".$row['RollNo']."</td>
        <td>".$row['BookId']."</td>
        <td>".$row['Textbook']."</td>
        <td>".$row['Dues']."</td>
        <td>".$row['Amount']."</td>
        <td>".$row['Sukli']."</td>
        <td>".$row['date_and_time']."</td>
        </tr>";
    }
   




    //                                  <tr>
    //                                   <td>'.$row["id "].'</td>
    //                                   <td>'.$row["Processed_by"].'</td>
    //                                     <td>'.$row["RollNo"].'</td>
    //                                     <td>'.$row["BookId"].'</td>
    //                                     <td>'.$row["Textbook"].'</td>
    //                                     <td>'.$row["Dues"].'</td>
    //                                     <td>'.$row["Amount"].'</td>
    //                                     <td>'.$row["Sukli"].'</td>
    //                                     <td>'.$row["date_and_time"].'</td>


                                       
    //                                             </tr>

    // ';
    // while ($row = mysqli_fetch_assoc($result)) {
    //     // print_r($row);  
    // }
    $output .='</table>';
    header("Content-Type: Payments");
    header("Content-Disposition:attachment; filename=Payments.xls");
    echo $output;
}

}



?>