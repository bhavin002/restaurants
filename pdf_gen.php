<?php 

ob_start();
        
include('dbconf.php');
        
// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

$name = $_POST['fname'];
$lname = $_POST['lname'];
$mno = $_POST['phone_number'];
$email = $_POST['email'];

// Set some content to print
$html = <<<EOD
<h1 style="text-align:center;"><u>Bill Details</u></h1>
<label style="font-weight:bold;">Customer Name : - $name $lname</label><br><br>
<label style="font-weight:bold;">Customer Moblie Number : - $mno</label><br><br>
<label style="font-weight:bold;">Customer Email : - $email</label><br><br>
<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
    <tr style="background-color:green;color:white;">
        <td>SL no</td>
        <td>Name</td>
        <td>Roll No</td>
		<td>City</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Divyasundar</td>
		<td>001</td>
		<td>Pune</td>
    </tr>
	<tr>
        <td>1</td>
        <td>Milan</td>
		<td>002</td>
		<td>Pune</td>
    </tr>
	<tr>
        <td>1</td>
        <td>Hritika</td>
		<td>003</td>
		<td>Pune</td>
    </tr>
</table>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

ob_end_flush();
$pdf->Output('helo_world.pdf', 'I');
?>