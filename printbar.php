<?php
/*
Function to print Barcodes 2 Columns 
label on Zebra Printer GK420t or for
some Zebra  Printer Type compatible 
with ZPL II.

Author: Ary Herijanto
Email : aherijanto@gmail.com

*/



function printBCode($barcode,$name,$price,$qtyPrint){

//Print at Col1
$printOne="^XA\n";
$printOne.="^FWR\n";
$printOne.="^FO5,20\n";
$printOne.="^ADN10,8\n";
$printOne.="^FD".$name."^FS\n";
$printOne.="^FO10,50^A0,32,25^FDUTAMA^FS\n";
$printOne.="^ADN18,10\n";
$printOne.="^FO80,40\n";
$printOne.="^FDRp.".number_format($price)."^FS\n";
$printOne.="^FO80,70\n";
$printOne.="^BY1,2,9\n";
$printOne.="^BCN,70,N,N,N\n";
$printOne.="^FO80,70\n";
$printOne.="^FD".$barcode."^FS\n";
$printOne.="^FO80,150\n";
$printOne.="^ADN,18,10\n";
$printOne.="^FD".$barcode."^FS\n";



//Print at Col2
$printTwo="^FWR\n";
$printTwo.="^FO340,20\n";
$printTwo.="^ADN10,8\n";
$printTwo.="^FD".$name."^FS\n";
$printTwo.="^FO340,50^A0,32,25^FDUTAMA^FS\n";
$printTwo.="^ADN18,10\n";
$printTwo.="^FO400,40\n";
$printTwo.="^FDRp.".number_format($price)."^FS\n";
$printTwo.="^FO400,70\n";
$printTwo.="^BY1,2,9\n";
$printTwo.="^BCN,70,N,N,N\n";
$printTwo.="^FO420,70\n";
$printTwo.="^FD".$barcode."^FS\n";
$printTwo.="^FO400,150\n";
$printTwo.="^ADN,18,10\n";
$printTwo.="^FD".$barcode."^FS\n";
$printTwo.="^XZ\n";


//Print at Col1 and Col2 (in one line contains 2 cols)
$printCat="^XA\n";
$printCat.="^FWR\n";
$printCat.="^FO5,20\n";
$printCat.="^ADN10,8\n";
$printCat.="^FD".$name."^FS\n";
$printCat.="^FO10,50^A0,32,25^FDUTAMA^FS\n";
$printCat.="^ADN18,10\n";
$printCat.="^FO80,40\n";
$printCat.="^FDRp.".number_format($price)."^FS\n";
$printCat.="^FO80,70\n";
$printCat.="^BY1,2,9\n";
$printCat.="^BCN,70,N,N,N\n";
$printCat.="^FO80,70\n";
$printCat.="^FD".$barcode."^FS\n";
$printCat.="^FO80,150\n";
$printCat.="^ADN,18,10\n";
$printCat.="^FD".$barcode."^FS\n";
$printCat.="^FO340,20\n";
$printCat.="^ADN10,8\n";
$printCat.="^FD".$name."^FS\n";
$printCat.="^FO340,50^A0,32,25^FDUTAMA^FS\n";
$printCat.="^ADN18,10\n";
$printCat.="^FO400,40\n";
$printCat.="^FDRp.".number_format($price)."^FS\n";
$printCat.="^FO400,70\n";
$printCat.="^BY1,2,9\n";
$printCat.="^BCN,70,N,N,N\n";
$printCat.="^FO420,70\n";
$printCat.="^FD".$barcode."^FS\n";
$printCat.="^FO400,150\n";
$printCat.="^ADN,18,10\n";
$printCat.="^FD".$barcode."^FS\n";
$printCat.="^XZ\n";

if (isset($_SESSION['lastcol'])){
		$lastCol=$_SESSION['lastcol'];
}else{
	$lastCol=1;
}

$wantPrn=$qtyPrint;
$sisa=$wantPrn;
$alreadyPRN=0;


while ( $alreadyPRN < $wantPrn) {
	

	switch ($lastCol) {
		case 1:
			if ($sisa>= 2){
				$myfile = fopen("utama.zpl", "a+") or die("Unable to open file!");
				$zplFile="utama.zpl";
				fwrite($myfile, $printCat);
				fclose($myfile);

				$alreadyPRN=$alreadyPRN+2;
				$lastCol=1;
				$_SESSION['lastcol']=$lastCol;
			}else {
				$myfile = fopen("utama.zpl", "a+") or die("Unable to open file!");
				$zplFile="utama.zpl";
				fwrite($myfile, $printOne);
				fclose($myfile);

				$alreadyPRN++;
				$lastCol=2;
				$_SESSION['lastcol']=$lastCol;
			}

			
			$sisa=$sisa-2;
			
			break;
		
		case 2:
				$myfile = fopen("utama.zpl", "a+") or die("Unable to open file!");
				$zplFile="utama.zpl";
				fwrite($myfile, $printTwo);
				fclose($myfile);

				$alreadyPRN++;
				$sisa=$wantPrn-1;
				
				$lastCol=1;
				$_SESSION['lastcol']=$lastCol;
				
			break;
		
	}
	
}
}
?>



