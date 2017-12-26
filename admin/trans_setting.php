<?php
include "../config.php";

if(isset($_POST["transubmit"]))
{
$Transaction_date = $_POST["tran_year"]."-".$_POST["tran_mon"]."-".$_POST["tran_date"];
$msg=1;
				/*
				 $date = date("d-m-Y");
                 $datetran = date_create("$Transaction_date");
                 $datetran =date_format($datetran,"d-m-Y");
                 $days =  strtotime($datetran) - strtotime($date);
                 $days= (int)$days/86400;
                 if($days>=0)
                 	$msg=1;
                 else
                 	$msg =0;
                 */
if($msg==1)
{
$Transaction_particulars = $_POST["trans_part"];
$Transaction_type = $_POST["transtype"];
$GHRN_number =$_POST["ghrnnumber"];
  $GHRN_number = trim($GHRN_number);
  $GHRN_number = stripslashes($GHRN_number);
  $GHRN_number = htmlspecialchars($GHRN_number);

$tamt = $_POST["amount"];
$typetran = $_POST["tran1"];
$Credit ="";
$Debit = "";


echo "<div style='font-family:Arial;position:fixed;top:40px;left:40%;padding:5px;'>";



	 $sql= "SELECT Balance,Transaction_number FROM transactions WHERE Transaction_number = (SELECT MAX(Transaction_number) FROM transactions)";
     $res = $conn->query($sql);
     if ($res->num_rows) 
    	{
    		if($row = $res->fetch_assoc()) 
                          {

                             $current_tn =(int)$row["Transaction_number"];
                             $Balance =(float)$row["Balance"];
                             
                          }

        }       
$Transaction_number =$current_tn +1;

if($typetran == "credit")
	{
		$Credit = $tamt;
		$Balance = $Balance +$Credit;
	}	
	elseif ($typetran == "debit")
	{	$Debit = $tamt; 
		$Balance = $Balance - $Debit;
	}
	else
	{
		//
	}
		


	$sql ="INSERT INTO transactions (Transaction_number,Transaction_date,GHRN_number,Transaction_particulars,Transaction_type,Credit,Debit,Balance)
	 	   VALUES(".$Transaction_number.",'".$Transaction_date."','".$GHRN_number."','".$Transaction_particulars."','".$Transaction_type."','".$Credit."','".$Debit."','".$Balance."')
			";
	if(($conn->query($sql))== true)
	{				   		
	  		echo "Upload Transaction successful<br>$msg<br><br>";
	  		$sqlset ="UPDATE transactions SET ";
		if(!empty($Transaction_date)){
			$sqlset.="Transaction_date = '".$Transaction_date."',";
		}
		if(!empty($Transaction_particulars))
			$sqlset.="Transaction_particulars = '".$Transaction_particulars."',";
		if(!empty($Transaction_type))
			$sqlset.="Transaction_type = '".$Transaction_type."' ,";
		if(!empty($GHRN_number))
			$sqlset.="GHRN_number = '".$GHRN_number."',";

		
			$sqlset.=" Transaction_number = ".$Transaction_number."
  				   WHERE Transaction_number = ".$Transaction_number." ";

			if(($conn->query($sqlset))== true)
			{
				echo "Updated successfully<br>";
			}





	}
	else
	{
	echo "Upload Transaction Failed<br>";
	}



	  		header('Location:dashboard.php#/fintran');

	echo "
			
			<br>
			<b> TRANSACTION NUMBER </b> : ".$Transaction_number."<br><br>
			<b> DATE OF TRANSACTION </b> : ".$Transaction_date."<br><br>
			<b> GHRN NUMBER </b> : ".$GHRN_number."<br><br>
			<b> TRANSACTION PARTICULARS </b> : ".$Transaction_particulars."<br><br>
			<b> TRANSACTION TYPE </b> : ".$Transaction_type."<br><br>
			<b> AMOUNT ( ".$typetran."ed ) </b> : ".$tamt." /-<br><br>
			<b> BALANCE </b> : ".ceil($Balance)." Rupees only<br><br>
			<br><br><br>
			<a href='dashboard.php#/newtran'>Click here to go Back</a>



			</div>
			";


	}
	else{
		echo "Date validation proved wrong $msg";		
		//header('Location:dashboard.php#/fintran');
	}

}
elseif (isset($_POST["editsubmit"]))
{
	$msgfor ="";
if($_POST["tran_date"]!='a' && $_POST["tran_mon"]!='a' && $_POST["tran_year"]!='a')	
	$Transaction_date = $_POST["tran_year"]."-".$_POST["tran_mon"]."-".$_POST["tran_date"];
else
	$Transaction_date = date("Y-m-d");

$Transaction_number = $_POST["transnum"];
$Transaction_particulars = $_POST["trans_part"];
$Transaction_type = $_POST["transtype"];
$GHRN_number = $_POST["ghrnnumber"];




		$sqlset ="UPDATE transactions SET ";
		if(!empty($Transaction_date)){
								$sqlset.="Transaction_date = '".$Transaction_date."',";
		}
		if(!empty($Transaction_particulars))
			$sqlset.="Transaction_particulars = '".$Transaction_particulars."',";
		if(!empty($Transaction_type))
			$sqlset.="Transaction_type = '".$Transaction_type."' ,";
		if(!empty($GHRN_number))
			$sqlset.="GHRN_number = '".$GHRN_number."',";

		
			$sqlset.=" Transaction_number = ".$Transaction_number."
  				   WHERE Transaction_number = ".$Transaction_number." ";

			if(($conn->query($sqlset))== true)
			{
				 
				echo "Updated successfully<br>";
				echo "<br><b>$msgfor</b>";


			}
			else{
				echo "Not Updated";
				echo "<br><b>$msgfor</b>";
			}
		
}
else
{
	echo "Nothing ";
	echo "<br><b>$msgfor</b>";
}




?>