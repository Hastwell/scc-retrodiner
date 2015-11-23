<?php
require 'includes/mkupc.php';

if(! isset($_GET["code"]) )
{
	die;
}

$upcCode = $_GET["code"];

if( preg_match( '/\d{12}/', $upcCode ) !== 1 ) $upcCode = "000000000000";

$upc = new \sunsoft\UPC_A_Barcode( $upcCode );
$img = $upc->get_barcode_symbol();
header("Content-Type: image/png");
echo $img;
