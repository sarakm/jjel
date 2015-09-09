<?php
session_start();

$to = "riacoder@gmail.com";
$subject = "Website Inquiry";
$subject2 = "A copy of RFQ from jjelectronicscomponents.com";
$headers = "From: info@jjelectronicscomponents.com\r\n";

$companyname 	= $_GET['companyname'];
$contactname 	= $_GET['contactname'];
$address 	= $_GET['address'];
$city 		= $_GET['city'];
$postal 	= $_GET['postal'];
$phone 		= $_GET['phone'];
$email 		= $_GET['email'];
$sendme 	= $_GET['sendme'];
$comments 	= $_GET['comments'];

$message = 	"Company name: $companyname\n";
$message .= 	"Contact name: $contactname\n";
$message .= 	"Address: $address\n";
$message .= 	"City: $city\n";
$message .= 	"Postal: $postal\n";
$message .= 	"Phone: $phone\n";
$message .=	"Email: $email\n\n";
$message .=	"Comments: $comments\n\n";
$message .= "SKU\t\t\tPart#\t\t\tQty\t\t\tPrice\t\t\tSubtotal\n";
$message .= "============================================================\n";
$total = 0;

	if ($_SESSION['rfq'])
	{
		foreach ($_SESSION['rfq'] as $key => $val)
		{
			$subtotal = ($_SESSION['rfq'][$key]['qty'] * $_SESSION['rfq'][$key]['price']);
			$message .= $_SESSION['rfq'][$key]['sku']."\t\t\t".$_SESSION['rfq'][$key]['partno']."\t\t\t".$_SESSION['rfq'][$key]['qty']."\t\t\t$".$_SESSION['rfq'][$key]['price']."\t\t\t$".$subtotal."\n";
			$total += $subtotal;
		}
	}
	
$message .= "Total: $$total\n";
	
	
	@mail($to, $subject, $message, $headers);

	if ($sendme)
		@mail($email, $subject2, $message, $headers);
	
header("Location: rfqcart.php");

?>