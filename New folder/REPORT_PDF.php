<?php  

	if (isset($_POST['DATE']))
	$DATE=$_POST['DATE'];

	function fetch_data()  
	{  
        global $DATE;
		$output = '';  
		$conn = mysqli_connect("localhost", "root", "", "infirmary_management");  
	$sql= "SELECT medicine, medq FROM opd_register WHERE entryDate='$DATE' ORDER BY medicine"; 
		$result = mysqli_query($conn, $sql);  

		 $row = mysqli_fetch_array($result);
	    $medName=$row['medicine'];
	    $medQty=$row['medq'];
        
		while($row = mysqli_fetch_array($result))
		{
			if($row['medicine']==$medName)
				$medQty=$medQty+$row['medq'];
			else{
			$output .= '<tr>
	    <td align="center">'.$medName.'</td>
		<td align="center">'.$medQty.'</td></tr>';
				$medName=$row['medicine'];
				$medQty=$row['medq'];
			}
		}
	return $output; 
	} 

	if(isset($_POST["Generatereportpdf"]))  
	{  
		global $DATE;
		$TITLE="MEDICINE REPORT (".$DATE.")";
		require_once('TCPDF-master/tcpdf.php');  
		$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
		$obj_pdf->SetCreator(PDF_CREATOR);  
		$obj_pdf->SetTitle($TITLE);  
		$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
		$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
		$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
		$obj_pdf->SetDefaultMonospacedFont('helvetica');  
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
		$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
		$obj_pdf->setPrintHeader(false);  
		$obj_pdf->setPrintFooter(false);  
		$obj_pdf->SetAutoPageBreak(TRUE, 10);  
		$obj_pdf->SetFont('helvetica', '', 11);  
		$obj_pdf->AddPage();  
		$content = '';  
		$content .= 'DATE: '.$DATE.'
		<h4 align="center">MEDICINE REPORT</h4><br> 
		<table border="1" cellspacing="0" cellpadding="3">  
		<tr>  
		<th align="center" width="70%">MEDICINE NAME</th> 
		<th align="center" width="30%">TOTAL USED</th>  
		</tr> ';  

		$content .= fetch_data();  
		$content .= '</table>';  
		$obj_pdf->writeHTML($content);  
		$obj_pdf->Output('file.pdf', 'I');  
	}  
?>  
