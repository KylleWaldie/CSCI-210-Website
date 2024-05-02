<?php

include "fpdf/fpdf.php";
require_once 'DatabaseHandling/databaseConnect.inc.php';

$email = $_POST['email'];

class PDF extends FPDF {

    function Header() {
        $date = date("m-d-y");
        $invoiceNumber = rand(10000000, 99999999);

        $this->SetFont("Arial", "B", 14);
        $this->Image("photos/Company_Icon.jpg",10,10,10);
        $this->Cell(189, 11, "", 0,1);
        $this->Cell(130, 5, "KYLLE'S STORE", 0,0);
        $this->Cell(59, 5, "INVOICE", 0,1);

        $this->SetFont("Arial", "", 12);
        $this->Cell(130, 5, "[Street Address]", 0,0);
        $this->Cell(59, 5, "", 0,1);
        $this->Cell(130, 5, "Butte, MT, 59701", 0,0);
        $this->Cell(25, 5, "Date", 0,0);
        $this->Cell(34, 5, $date, 0,1);
        $this->Cell(130, 5, "Phone [111-222-3333]", 0,0);

        $this->Cell(25, 5, "Invoice #", 0,0);
        $this->Cell(34, 5, $invoiceNumber, 0,1);
        $this->Cell(189, 10, "", 0,1);
    }

    function Footer()
    {

        $this->SetY(-15);

        $this->SetFont('Arial','I',8);
  
        $this->Cell(0,10,'Page '.$this->PageNo().'/{pages}',0,0,'C');
    }
}

$pdf = new PDF("P", "mm", "A4");
$pdf->AliasNbPages('{pages}');
$pdf->AddPage();

//Get user info to output to  Bill to
$get_user_info = "SELECT * FROM customers WHERE customerEmail = :email";
$user = $conn->prepare($get_user_info);
$user->bindParam(":email", $email);
$user->execute();
$user_info = $user->fetch(PDO::FETCH_ASSOC);

$pdf->Cell(100, 5, "Bill to:", 0, 1);

$pdf->Cell(10, 5, "", 0,0);
$pdf->Cell(90, 5, $user_info["customerName"], 0,1);

$pdf->Cell(10, 5, "", 0,0);
$pdf->Cell(90, 5, $user_info["customerAddress"] . ". " . $user_info["customerCity"] . " " . $user_info["customerState"] . ", " . $user_info["customerZipcode"], 0,1);

$pdf->Cell(10, 5, "", 0,0);
$pdf->Cell(90, 5, $user_info["customerPhonenumber"], 0,1);

//Blank Line
$pdf->Cell(189, 10, "", 0,1);

$query = "SELECT * FROM cart;";
$stmt = $conn->prepare($query);
$stmt->execute();

$pdf->SetFont("Arial", "B", 12);
$pdf->SetFillColor(136, 171, 142);

$pdf->Cell(130, 5, "Description", 1,0,"", true);
$pdf->Cell(25, 5, "Tax", 1,0, "", true);
$pdf->Cell(34, 5, "Amount", 1,1, "", true);

$cart_total = 0;

//Selects all info from cart and matches it to the data id and outputs it into the table
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

    $sql = "SELECT * FROM products WHERE productID=".$result["product_id"];
    $all_product = $conn->prepare($sql);
    $all_product->execute();
    
    while($result2 = $all_product->fetch(PDO::FETCH_ASSOC)){
        
        $pdf->SetFont("Arial", "", 12);
        
        $pdf->Cell(130, 5, $result2['productName'], 1,0);
        $pdf->Cell(25, 5, "0", 1,0);
        $pdf->Cell(34, 5, $result2['productPrice'], 1,1, 'R');
        $cart_total += $result2["productPrice"];
    }
}

$pdf->Cell(130, 5, "", 0,0);
$pdf->Cell(25, 5, "Subtotal", 0,0);
$pdf->Cell(4, 5, "$", 1,0);
$pdf->Cell(30, 5, $cart_total, 1,1, 'R');
$pdf->Cell(130, 5, "", 0,0);
$pdf->Cell(25, 5, "Taxes", 0,0);
$pdf->Cell(4, 5, "$", 1,0);
$pdf->Cell(30, 5, "0", 1,1, 'R');
$pdf->Cell(130, 5, "", 0,0);
$pdf->Cell(25, 5, "Total Due", 0,0);
$pdf->Cell(4, 5, "$", 1,0);
$pdf->Cell(30, 5, $cart_total, 1,1, 'R');

//Deletes all info from cart 
$cart_delete_query = "DELETE FROM cart";
$cart_delete = $conn->prepare($cart_delete_query);
$cart_delete->execute();

$pdf->Output();