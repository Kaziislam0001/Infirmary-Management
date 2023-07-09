<?php

function deleteoldrecords($dbconn,$tbname)
	{
			$TodaysDate=date("Y-m-d");

			$TodaysDate=date_create($TodaysDate);
            date_sub($TodaysDate,date_interval_create_from_date_string("730 days"));
            $Date=date_format($TodaysDate,"Y-m-d");
            //echo $Date;
			$select="SELECT slno,entryDate FROM $tbname WHERE entryDate<='$Date' ";
			$Q_select=mysqli_query($dbconn,$select);
            $c=0;
			while ($TBvalue = mysqli_fetch_assoc($Q_select)) 
			//the fetch function converts the query into an array
				{
					$Slno=$TBvalue['slno'];
						$Q_delete="DELETE FROM $tbname WHERE slno='$Slno'";
						$autoDel=mysqli_query($dbconn,$Q_delete);
						if($autoDel)
							$c=1;
				}
				
				if ($c==1)
					return 1;// this indicated the deletion has been successful
				else
					return 0;
				//the else part telling that no entry was automatically deleted is not excuted because most of the time the an old entry will not be present but still the user will get a message when ever the user clickc on the home button. So thats why an error message is not displayed			
	}

function generalreport($dbconn,$Date)
	{
		$Q_totalUT="SELECT COUNT(slno) AS totalUT FROM urine_test_register WHERE entryDate='$Date'";
		$resultUT=mysqli_fetch_assoc(mysqli_query($dbconn,$Q_totalUT));

		$Q_totalOPD="SELECT COUNT(slno) AS totalOPD FROM opd_register WHERE entryDate='$Date'";
		$resultOPD=mysqli_fetch_assoc(mysqli_query($dbconn,$Q_totalOPD));

		$Q_staffOPD="SELECT COUNT(slno) AS totalOPDstaff FROM opd_register WHERE entryDate='$Date' AND grade='NA'";
		$resultstaffOPD=mysqli_fetch_assoc(mysqli_query($dbconn,$Q_staffOPD));
	    $totalstudentOPD=$resultOPD['totalOPD']-$resultstaffOPD['totalOPDstaff'];
	    
	    $genreport = array('Total UT' => $resultUT['totalUT'],
	    	'Total staffOPD' => $resultstaffOPD['totalOPDstaff'],
	    	'Total studentOPD' => $totalstudentOPD);
	  return $genreport;
	}


function medicinereport($dbconn,$Date)
	{
		//medicine is given only for opd so the query is from opd_register
	$Q_medicine= "SELECT medicine, medq FROM opd_register WHERE entryDate='$Date' ORDER BY medicine"; 		
		$result= mysqli_query($dbconn,$Q_medicine);
	    echo "<center><table class='Table' style='width: 500px;height: 150px;'>";
	    echo "<th class='th'>MEDICINE NAME</th>";
	    echo "<th class='th'>TOTAL USED</th>";

	    $row = mysqli_fetch_array($result);
	    $medName=$row['medicine'];
	    $medQty=$row['medq'];
        
	    $x=1;
		while($row = mysqli_fetch_array($result)){
			if($row['medicine']==$medName)
				$medQty=$medQty+$row['medq'];
			else{
                if($x%4==0)
						echo'<tr class="row A">';
				    if($x%4==1)
						echo'<tr class="row B">';
				    if($x%4==2)
						echo'<tr class="row C">';
				    if($x%4==3)
						echo'<tr class="row D">';
			echo "<td style='padding: 7px 0px'>".$medName."</td>";
			echo "<td style='padding: 7px 0px'>".$medQty."</td></tr>";
		    $x++;

				$medName=$row['medicine'];
				$medQty=$row['medq'];
			}
		}
		echo "</table></center>";
	}



function displayTB($dbconn,$URL,$Query,$A)
{
	    //the variable $A will be send to know if the function is called for urine test or for OPD
        //this script defines a function that validates if the used wants to delete a particular entry
		 echo "
			<script>
				function deleteValidation()
				{
					var con=confirm('Are you sure you want to delete?');

			        if(con==true)
						return true;
			        else
						return false;
				}
			</script>";
		
			$Execute = mysqli_query($dbconn,$Query);
		$x=1;//this variable gives the number of rows
		while ($TBvalue = mysqli_fetch_assoc($Execute)){
	    $slno=$TBvalue['slno'];
			    if($x%4==0)
					echo'<tr class="row A">';
			    if($x%4==1)
					echo'<tr class="row B">';
			    if($x%4==2)
					echo'<tr class="row C">';
			    if($x%4==3)
					echo'<tr class="row D">';
		echo "<td>".$x."</td>";
		foreach ($TBvalue as $index => $value ) {
            //I do not want to print the slno so if the index is slno the continue statement will execute and start the loop from the next iteration
			if ($index=='slno') 
                continue;
	      	 echo "<td >".$value."</td >";
	      	}

		echo "<form action='".$A."_TBEditForm.php' method='post'><td style='background: white;'>";
        //the values
		foreach ($TBvalue as $index => $value) {
			echo "<input type='hidden' name='".strtoupper($index)."' value='".$value."'>";
		}
		//$URL contains the page from where the user is calling the function
		echo "<input type='hidden' name='URL' value='".$URL."'>";
		echo "<button class='fas fa-pen-alt btnEdit' name='Edit' type='submit'></button>";
		echo "</form></td>";

	   echo "<form action='".$A."_TBDelete.php' method='post'>
	   <td  style='background: white;'><button class='fas fa-trash-alt btnDelete' name='Delete' onclick='return deleteValidation()' type='submit'></button>";
	   echo "<input type='hidden' name='Slno' value='".$slno."'>";
	   echo "<input type='hidden' name='URL' value='".$URL."'></form></td></tr>";
		$x++;
		    }
		     echo "</table>";
}


//$FieldNames is an array of the field name of the specified table, where the first index contains the name and the two afer that holds the date range the user wants to view the table of
	//$Input is an array that contains the values of the input the user has made for the search
    //Also note that the field names and input values have to correspond to each other  
     // when the ToDate field is not entered the value of to date is set to the value of FromDate
function SearchQuery($dbconn,$tbname,$FieldNames,$Input)
{
	
    if($Input[2]=='')
    	$Input[2]=$Input[1];

    $search="SELECT * FROM $tbname WHERE name LIKE '%".$Input[0]."%' AND entryDate BETWEEN '".$Input[1]."' AND '".$Input[2]."' AND ";
	 //note that $FieldNames and $Input have the same size
	 $length=count($FieldNames);
	      for($i=3;$i<$length;$i++)
	      {
               if ($Input[$i]!='')
               {
               //if the any element is not empty that means the user wants to search something that was input in that field
                    $search.=$FieldNames[$i]."='".$Input[$i]."' AND ";
                }                           
	      } 
	        $search=rtrim($search," AND ");
	        // this truncates the last AND which is not required for the query
	        $search=$search."ORDER BY entryTime DESC";

    return $search;
}




?>