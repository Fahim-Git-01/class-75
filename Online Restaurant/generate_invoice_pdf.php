<?php

require('fpdf.php');
include("connection/connect.php");
session_start();
$user_id = $_SESSION['user_id'];


$query = "SELECT f_name, l_name FROM users WHERE u_id = $user_id";
$result = $db->query($query);
$user = $result->fetch_assoc();

if ($user) {
    $client_name = $user['f_name'] . ' ' . $user['l_name'];
} else {
    $client_name = 'Guest';
}


$cartItems = $_SESSION["cart_item"];


$totalOrderPrice = 0;


class PDF extends FPDF
{

    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Invoice', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);


$pdf->Cell(0, 10, 'Client Name: ' . $client_name, 0, 1);
$pdf->Cell(0, 10, 'Date: ' . date('d-m-Y'), 0, 1);

$pdf->Ln(10);


$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, 'Title', 1);      
$pdf->Cell(30, 10, 'Quantity', 1);   
$pdf->Cell(30, 10, 'Price ()', 1);  
$pdf->Cell(40, 10, 'Total Price ()', 1);  
$pdf->Ln();

$pdf->SetFont('Arial', '', 12);
foreach ($cartItems as $item) {
    $itemTotal = $item['price'] * $item['quantity'];
    $totalOrderPrice += $itemTotal;


    $pdf->MultiCell(50, 10, $item['title'], 1);
    

    $pdf->SetXY($pdf->GetX() + 50, $pdf->GetY() - 10);  

    $pdf->Cell(30, 10, $item['quantity'], 1);
    $pdf->Cell(30, 10, number_format($item['price'], 2), 1);
    $pdf->Cell(40, 10, number_format($itemTotal, 2), 1);
    $pdf->Ln();
}


$pdf->Ln(10);
$pdf->Cell(0, 10, 'Total Order Price: ' . number_format($totalOrderPrice, 2), 0, 1);


$pdf->Output('I', 'invoice.pdf');

unset($_SESSION["cart_item"]);
unset($item["title"]);
unset($item["quantity"]);
unset($item["price"]);
mysqli_close($db);
?>