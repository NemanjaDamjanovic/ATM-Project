<!-- File's which are included to current file. -->
<?php include '../configuration/database.php'; ?>

<?php
// Start a session.
session_start();

// Wrap $_SESSION['id'] into variable.
$user_id = $_SESSION['id'];

// SELECT user full name from table for specific user by his user_id.
$query = "SELECT user_full_name FROM users WHERE user_id = '$user_id'";
// Execute the query.
$result = mysqli_query($connect, $query);
// Fetches a result row from a query result as an associative array.
$row = mysqli_fetch_assoc($result);
// Retrieve exact value from query, stored in variable.
$user_fullname = $row['user_full_name'];

// SELECT all from table for specific user by his user_id.
$query = "SELECT * FROM withdraw_history WHERE user_id = '$user_id'";
// Execute the query.
$result = mysqli_query($connect, $query);
// Fetches a result row from a query result as an associative array.
$row = mysqli_fetch_array($result);

// Include TCPDF library
include 'library/tcpdf.php';
// Instatiate class TCPDF (make an object)
$pdf = new TCPDF('P', 'mm', 'A4');
// Add page
$pdf->AddPage();
// Remove header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// Add content
// Head of table
$pdf->SetFont('Helvetica', '', 14);
$pdf->Cell(190, 10, "UniATM's report", 1, 1, "C");
// Content of table
$pdf->SetFont('Helvetica', '', 8);
$pdf->Cell(190, 5, "Transaction History", 1, 1, "C");

$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(20, 5, "User ID", 1);
$pdf->Cell(170, 5, ": $user_id", 1);
$pdf->Ln();

$pdf->Cell(20, 5, "Name", 1);
$pdf->Cell(170, 5, " : $user_fullname",1);
$pdf->Ln();
$pdf->Ln(2);

// Make table

$html = "
    <table>
        <tr>
            <th>Transaction amount</th>        
            <th>Date of transaction</th>        
        </tr>
    "
;

while($row = mysqli_fetch_array($result)) {
    $html .= "
          <tr>
              <td>{$row['user_last_transaction']}</td>
              <td>{$row['transaction_date']}</td>
          </tr>
    ";
  }
$html .= "</table>

    <style>
        table {
            border-collapse:collapse;
        }
        th, td {
            border:1px solid #888;
        }
        table tr th {
            background-color:#888;
            color: #fff;
            font-weight:bold;
        }
    </style>
";

// Write HTML cell
$pdf->writeHTMLCell(192, 0, 9, '', $html, 0);
// Output
$pdf->Output('Transaction History.pdf', 'D');

?>

<!-- File's which are included to current file. -->
<?php include '../includes/footer.php'; ?>