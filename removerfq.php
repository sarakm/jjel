<?php
session_start();
$item = $_POST['item'];
unset($_SESSION['rfq'][$item]);

header("Location: rfqcart.php");
?>