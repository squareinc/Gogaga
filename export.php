<?php
set_time_limit(0);
include "config.php";
if(!empty($_FILES["excel_file"]))
{
	
	$file_array =explode(".", $_FILES["excel_file"]["name"]);
	if($file_array[1] == "xls")
	{
			include "PHPExcel-1.8/Classes/PHPExcel.php";
			

		$object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);
		$count =1;
		foreach ($object->getWorksheetIterator() as $worksheet) 
		{
			if($count ==100)
				break;

			$highestRow = $worksheet->getHighestRow();
			for($row=2;$row<=$highestRow;$row++)
			{
				

				$a0 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(0,$row)->getValue());
				
				$a1 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(1,$row)->getValue());
				
				$a2 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(2,$row)->getValue());

				$a3 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(3,$row)->getValue());
				$a4 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(4,$row)->getValue());
				$a5 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(5,$row)->getValue());

				$a6 =mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(6,$row)->getValue());
				
				$a7 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(7,$row)->getValue());
				$a8 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(8,$row)->getValue());
				$a9 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(9,$row)->getValue());
				$a10 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(10,$row)->getValue());
				$a11 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(11,$row)->getValue());
				$a12 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(12,$row)->getValue());

				$a13 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(13,$row)->getValue());
				$a14 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(14,$row)->getValue());
				$a15 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(15,$row)->getValue());
				$a16 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(16,$row)->getValue());
				$a17 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(17,$row)->getValue());
				$a18 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(18,$row)->getValue());
				$a19 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(19,$row)->getValue());
				$a20 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(20,$row)->getValue());
				$a21 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(21,$row)->getValue());
				$a22 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(22,$row)->getValue());
				$a23 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(23,$row)->getValue());
				$a24 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(24,$row)->getValue());
				$a25 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(25,$row)->getValue());
				$a26 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(26,$row)->getValue());
				$a27 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(27,$row)->getValue());
				$a28 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(28,$row)->getValue());
				$a29 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(29,$row)->getValue());
				$a30 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(30,$row)->getValue());
				$a31 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(31,$row)->getValue());
				$a32 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(32,$row)->getValue());
				$a33 = mysqli_real_escape_string($conn,
					$worksheet->getCellByColumnandRow(33,$row)->getValue());
				
				//echo "$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33<br>";

				$sql ="INSERT INTO salespartner (
									salpartnercode,
									mail,
									feepaid,
									reccom,
									actcom,
									date,
									holipartnername,
									dstopr,
									stopr,
									salpartnername,
									fathername,
									panno,
									dob,
									marstat,
									resaddr,
									phone,
									persmail,
									tradename,
									typeorg,
									typetrad,
									tradaddr,
									no_of_yrtrade,
									ofc_phn,
									ofc_mailid,
									bankinfo,
									bankaccno,
									ifsc,
									busloc,
									mobno,
									email,
									profrefname,
									profmob,
									profmailid
								
						)
						VALUES(
							'".$a1."','".$a2."','".$a3."','".$a4."','".$a5."','".$a6."','".$a7."','".$a8."','".$a9."','".$a10."',
							'".$a11."','".$a12."','".$a13."','".$a14."','".$a15."','".$a16."','".$a17."','".$a18."','".$a19."','".$a20."',
							'".$a21."','".$a22."','".$a23."','".$a24."','".$a25."','".$a26."','".$a27."','".$a28."','".$a29."','".$a30."',
							'".$a31."','".$a32."','".$a33."'
							)
					";
				if(($conn->query($sql))== true)
				{
					echo "Done";
				}
				else
					echo "not done";

				


			}



			$count++;
		}			
		

	}

	else
	{

		echo "<label class='text-danger'>Invalid File</label>";



	}








}







?>