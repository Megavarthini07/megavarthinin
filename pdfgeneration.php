<?php
require_once('./fpdf.php');
include("dbconnection.php");


if (isset($_POST['getQuery'])) {
    $encodedQuery = $_POST['getQuery'];
    $getQuery = base64_decode($encodedQuery);

    
    $result = mysqli_query($data, $getQuery);

 
    $pdf = new FPDF();
    $pdf->AddPage();

 
    $pdf->SetFont('times', '', 12);


    $colWidths = [20, 50, 20, 40, 40, 20];

    $header = ['ID', 'Name', 'Class', 'Subject', 'Test', 'Mark'];

 
    $pdf->SetFillColor(173, 216, 230);

    foreach ($header as $colIndex => $colTitle) {
        $pdf->Cell($colWidths[$colIndex], 10, $colTitle, 1, 0, 'C', 1);
    }
    $pdf->Ln(); 

   
    $fill = false;


    while ($row = mysqli_fetch_array($result)) {
        foreach ($colWidths as $colIndex => $colWidth) {
            $pdf->Cell($colWidth, 10, $row[$colIndex], 1, 0, 'C', $fill);
        }
        $pdf->Ln(); 
      
    }

   
    $pdf->Output('marks.pdf', 'D');
}
?>
