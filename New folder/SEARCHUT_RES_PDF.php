
<?php  

	if (isset($_POST['Query']))
	$Query=$_POST['Query'];
    
	$DATE=date("Y-m-d");

	function fetch_data()  
	{  
        global $Query;
		$output = '';  
		$conn = mysqli_connect("localhost", "root", "", "infirmary_management");  	 
		$result = mysqli_query($conn, $Query);  
		$x=1;
		while($row = mysqli_fetch_array($result))  
		{       
			$output .= '<tr>  
			<td align="center">'.$x.'</td>
			<td>'.$row["name"].'</td>  
			<td align="center">'.$row["age"].'</td>  
			<td align="center">'.$row["grade"].'</td> 
			<td align="center">'.$row["gender"].'</td> 
			<td align="center">'.$row["testresult"].'</td>
			<td align="center">'.$row["entryDate"].'</td>
			<td align="center">'.$row["entryTime"].'</td>  
			</tr>  
			';  
			$x++;
		}  
	return $output; 
	} 

	if(isset($_POST["Generatepdf"]))  
	{  
		$TITLE= $_POST['PdfTitle']." (". date("Y-m-d").")";
		$HEADING= $_POST['Heading'];
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
		$content .= '<h4>'.$HEADING.'</h4>'.' 
		<h4 align="center">URINE TEST ENTRIES </h4><br/> 
		<table border="1" cellspacing="0" cellpadding="3">  
		<tr>  
		<th align="center" width="5%">NO</th> 
		<th align="center" width="30%">NAME</th>  
		<th align="center" width="8%">AGE</th>  
		<th align="center" width="12%">GRADE</th>  
		<th align="center" width="8%">SEX</th>  
		<th align="center" width="10S%">RESULT</th>
		<th align="center" width="13%">DATE</th> 
        <th align="center" width="10%">TIME</th> 
		</tr> ';  

		$content .= fetch_data();  
		$content .= '</table>';  
		$obj_pdf->writeHTML($content);  
		$obj_pdf->Output('file.pdf', 'I');  
	}  
?>  
