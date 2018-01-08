<?php

include "../config.php";

$ghrno = "GHRN";
$cname = "";
$dest = "";
$holitype = "";
$partnername = "";
$partnersno = "";
$partnerTypeWithSpaces = "";
$baseprice = "";
$commPerc = "";
$grossVal = "";
$tds = "";
$netPayable = "";

$location = "";
$partnercode = "";
$bankac = "";

$invoiceNum = "";

if(isset($_GET["q"])){
	$ghrno .= (5000+(int)$_GET["q"]);
}

if(isset($_GET["cname"])){
	$cname = $_GET["cname"];
}

if(isset($_GET["dest"])){
	$dest = $_GET["dest"];
}

if(isset($_GET["partnername"])){
	$partnername = $_GET["partnername"];
}

if(isset($_GET["partnertype"]) && isset($_GET["partnersno"])){
	$partnerTypeWithSpaces = $_GET["partnertype"];
	$partnerTypeWithSpaces = strtoupper($partnerTypeWithSpaces);

	$partnersno = $_GET["partnersno"];



	//now we have partnersno and parterner type.. we just need to dive
	//into specific table and digg out their information
	switch ($_GET["partnertype"]) {
		case "superpartner":

			$sql = "SELECT * FROM superpartners WHERE sno = '".$partnersno."'";

			$res = $conn->query($sql);
			if($res->num_rows){
				if($row = $res->fetch_assoc()){
					//get location
					//get bank account number
					$location = $row["district"];
					$bankac = $row["bankac"];
				}
			}

			//partnercode
			$partnercode = "GHPLSUP".($partnersno-2000);

				//invoice number
			$invoiceNum = "SPCOM".date('ymdhi');

			break;

		case "holidaypartner":

			$sql = "SELECT * FROM holidaypartners WHERE sno = '".$partnersno."'";

			$res = $conn->query($sql);
			if($res->num_rows){
				if($row = $res->fetch_assoc()){
					//get location
					//get bank account number
					$location = $row["district"];
					$bankac = $row["bankac"];
				}
			}

			//partnercode
			$partnercode = "GHPLHP".($partnersno-4000);

			//invoice number
			$invoiceNum = "HPCOM".date('ymdhi');

			break;
	
		case "salespartner":

			$sql = "SELECT * FROM salespartners WHERE sno = '".$partnersno."'";

			$res = $conn->query($sql);
			if($res->num_rows){
				if($row = $res->fetch_assoc()){
					//get location
					//get bank account number
					$location = $row["district"];
					$bankac = $row["bankac"];
				}
			}

			//partnercode
			$partnercode = "GHPLSP".($partnersno-6000);

			//invoice number
			$invoiceNum = "SLCOM".date('ymdhi');

			break;
		
		default:
			# code...
			break;
	}

}

if(isset($_GET["holitype"]) && isset($_GET["partnertype"]) ){
	$holitype = $_GET["holitype"];
	$partnertype = $_GET["partnertype"];

	if($holitype == "International"){
		//search in itinerary_inter table
		$ref = $_GET["q"];
		$sql = "SELECT landcost, gghperc, supperc, holiperc, salperc FROM itinerary_inter WHERE ghrno = '".$ref."'";

		$res = $conn->query($sql);

		if($res->num_rows){
			if($row = $res->fetch_assoc()){
				$landcost = $row["landcost"];
				//echo $landcost;
				$gghperc = $row["gghperc"];
				//echo $gghperc;

				$percAmnt = ($landcost * $gghperc) / 100;
				$baseprice = $landcost + $percAmnt;
				//echo "baseprice :".$baseprice;

				$supperc = $row["supperc"];
				$holiperc = $row["holiperc"];
				$salperc = $row["salperc"];

				//get partnertype
				switch ($partnertype) {
					case "superpartner":
						$commPerc = $supperc;
						$grossVal = ($baseprice * $commPerc) / 100;
						$tds = $baseprice * 0.002;
						$netPayable = $grossVal - $tds;
						break;
					case "holidaypartner":
						$commPerc = $holiperc;
						$grossVal = ($baseprice * $commPerc) / 100;
						$tds = $baseprice * 0.002;
						$netPayable = $grossVal - $tds;
						break;
					case "salespartner":
						$commPerc = $salperc;
						$grossVal = ($baseprice * $commPerc) / 100;
						$tds = $baseprice * 0.002;
						$netPayable = $grossVal - $tds;
						break;
					
					default:
						# code...
						break;
				}


			}
		}




	}else if($holitype == "Domestic"){
		//search in itinerary_domestic table

		$ref = $_GET["q"];
		$sql = "SELECT landcost, gghperc, supperc, holiperc, salperc FROM itinerary_domestic WHERE ghrnno = '".$ref."'";

		$res = $conn->query($sql);

		if($res->num_rows){
			if($row = $res->fetch_assoc()){
				$landcost = $row["landcost"];
				//echo $landcost;
				$gghperc = $row["gghperc"];
				//echo $gghperc;

				$percAmnt = ($landcost * $gghperc) / 100;
				$baseprice = $landcost + $percAmnt;
				//echo "baseprice :".$baseprice;

				$supperc = $row["supperc"];
				$holiperc = $row["holiperc"];
				$salperc = $row["salperc"];

				//get partnertype
				switch ($partnertype) {
					case "superpartner":
						$commPerc = $supperc;
						$grossVal = ($baseprice * $commPerc) / 100;
						$tds = $baseprice * 0.002;
						$netPayable = $grossVal - $tds;
						break;
					case "holidaypartner":
						$commPerc = $holiperc;
						$grossVal = ($baseprice * $commPerc) / 100;
						$tds = $baseprice * 0.002;
						$netPayable = $grossVal - $tds;
						break;
					case "salespartner":
						$commPerc = $salperc;
						$grossVal = ($baseprice * $commPerc) / 100;
						$tds = $baseprice * 0.002;
						$netPayable = $grossVal - $tds;
						break;
					
					default:
						# code...
						break;
				}


			}
		}

	}
}



?>



<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">

<link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>

<body>

<div id="UI HOLIDAY PARTNER STATEMENT2_22597" align=center
x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=1120 class=xl6422597
 style='border-collapse:collapse;table-layout:fixed;width:843pt'>
 <col class=xl6422597 width=50 style='mso-width-source:userset;mso-width-alt:
 1828;width:38pt'>
 <col class=xl6422597 width=97 style='mso-width-source:userset;mso-width-alt:
 3547;width:73pt'>
 <col class=xl6422597 width=170 style='mso-width-source:userset;mso-width-alt:
 6217;width:128pt'>
 <col class=xl6422597 width=108 style='mso-width-source:userset;mso-width-alt:
 3949;width:81pt'>
 <col class=xl6422597 width=102 style='mso-width-source:userset;mso-width-alt:
 3730;width:77pt'>
 <col class=xl6422597 width=109 style='mso-width-source:userset;mso-width-alt:
 3986;width:82pt'>
 <col class=xl6422597 width=96 style='mso-width-source:userset;mso-width-alt:
 3510;width:72pt'>
 <col class=xl6422597 width=109 style='mso-width-source:userset;mso-width-alt:
 3986;width:82pt'>
 <col class=xl6422597 width=16 style='mso-width-source:userset;mso-width-alt:
 585;width:12pt'>
 <col class=xl6422597 width=114 style='mso-width-source:userset;mso-width-alt:
 4169;width:86pt'>
 <col class=xl6422597 width=149 style='mso-width-source:userset;mso-width-alt:
 5449;width:112pt'>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=11 rowspan=2 height=78 width=1120 style='border-right:.5pt solid #D9D9D9;
  border-bottom:.5pt solid #D9D9D9;height:58.5pt;width:843pt' align=left
  valign=top>
  <span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:12px;margin-top:20px;width:116px;
  height:37px'><img width=116 height=37
  src="image002.png"
  alt="logo short.png" v:shapes="Picture_x0020_1"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td colspan=11 rowspan=2 height=78 class=xl8122597 width=1120
    style='border-right:.5pt solid #D9D9D9;border-bottom:.5pt solid #D9D9D9;
    height:58.5pt;width:843pt'><?php echo $partnerTypeWithSpaces; ?> COMMISSION INVOICE</td>
   </tr>
  </table>
  </span></td>
 </tr>
 <tr height=62 style='mso-height-source:userset;height:46.5pt'>
 </tr>
 <tr height=46 style='mso-height-source:userset;height:35.1pt'>
  <td colspan=3 height=46 class=xl8822597 style='height:35.1pt'>INVOICE TO<span
  style='mso-spacerun:yes'> </span></td>
  <td colspan=8 class=xl8922597 style='border-left:none'><?php echo $partnername; ?></td>
 </tr>
 <tr height=46 style='mso-height-source:userset;height:35.1pt'>
  <td colspan=3 height=46 class=xl8922597 style='height:35.1pt'>DESIGNATION</td>
  <td colspan=8 class=xl7622597 style='border-left:none'><?php echo $partnerTypeWithSpaces; ?></td>
 </tr>
 <tr height=46 style='mso-height-source:userset;height:35.1pt'>
  <td colspan=3 height=46 class=xl7622597 style='height:35.1pt'>LOCATION</td>
  <td colspan=8 class=xl7622597 style='border-left:none'><?php echo $location; ?></td>
 </tr>
 <tr height=46 style='mso-height-source:userset;height:35.1pt'>
  <td colspan=3 height=46 class=xl7622597 style='height:35.1pt'>PARTNER CODE</td>
  <td colspan=8 class=xl7622597 style='border-left:none'><?php echo $partnercode; ?></td>
 </tr>
 <tr height=46 style='mso-height-source:userset;height:35.1pt'>
  <td colspan=3 height=46 class=xl7622597 style='height:35.1pt'>BANK ACCOUNT
  NUMBER</td>
  <td colspan=8 class=xl8722597 style='border-left:none'><?php echo $bankac; ?></td>
 </tr>
 <tr height=46 style='mso-height-source:userset;height:35.1pt'>
  <td colspan=2 rowspan=2 height=92 class=xl7622597 style='height:70.2pt'>AMOUNT
  PAYABLE</td>
  <td rowspan=2 class=xl9422597 style='border-top:none'><span
  style='mso-spacerun:yes'> </span>INR <?php echo $netPayable; ?> </td>
  <td colspan=3 class=xl7622597 style='border-left:none'>INVOICE NUMBER</td>
  <td colspan=3 class=xl7622597 style='border-left:none'>INVOICE DATE</td>
  <td colspan=2 class=xl7622597 style='border-left:none'>VOUCHERED MONTH</td>
 </tr>
 <tr height=46 style='mso-height-source:userset;height:35.1pt'>
  <td colspan=3 height=46 class=xl7622597 style='height:35.1pt;border-left:
  none'><?php echo $invoiceNum; ?></td>
  <td colspan=3 class=xl9122597 style='border-left:none'><?php echo date('D, M d, Y'); ?></td>
  <td colspan=2 class=xl9022597 style='border-left:none'>January-18</td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td colspan=11 height=19 class=xl9222597 style='height:14.25pt'>&nbsp;</td>
 </tr>
 <tr height=58 style='mso-height-source:userset;height:43.5pt'>
  <td colspan=11 height=58 class=xl7922597 style='height:43.5pt'>PARTICULARS</td>
 </tr>
 <tr class=xl6722597 height=53 style='mso-height-source:userset;height:39.95pt'>
  <td height=53 class=xl7622597 style='height:39.95pt'>SNO</td>
  <td class=xl7522597 style='border-left:none'>GHRN NUMBER</td>
  <td class=xl7722597 width=170 style='border-left:none;width:128pt'>VOUCHERED
  MONTH</td>
  <td class=xl7722597 width=108 style='border-left:none;width:81pt'>CLIENT NAME</td>
  <td class=xl7722597 width=102 style='border-left:none;width:77pt'>DESTINATION</td>
  <td class=xl7722597 width=109 style='border-left:none;width:82pt'>BASE PRICE</td>
  <td class=xl7722597 width=96 style='border-left:none;width:72pt'>COMMISSION %</td>
  <td colspan=2 class=xl7622597 style='border-left:none'>GROSS VALUE<span
  style='mso-spacerun:yes'> </span></td>
  <td class=xl7622597 style='border-left:none'>TDS</td>
  <td class=xl7622597 style='border-left:none'>NET PAYABLE</td>
 </tr>
 <tr class=xl6522597 height=53 style='mso-height-source:userset;height:39.95pt'>
  <td height=53 class=xl6622597 style='height:39.95pt;border-top:none'>1</td>
  <td class=xl6922597 style='border-top:none;border-left:none'><?php echo $ghrno; ?></td>

  <td class=xl7022597 style='border-top:none;border-left:none'>January-18</td>

  <td class=xl7122597 width=108 style='border-top:none;border-left:none;
  width:81pt'><?php echo $cname; ?></td>

  <td class=xl6622597 style='border-top:none;border-left:none'><?php echo $dest; ?></td>

  <td class=xl7222597 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'> </span>INR<span style='mso-spacerun:yes'>      
  </span><?php echo $baseprice; ?> </td>

  <td class=xl7322597 style='border-top:none;border-left:none'><?php echo $commPerc; ?></td>

  <td colspan=2 class=xl7222597 style='border-left:none'><span
  style='mso-spacerun:yes'> </span>INR<span
  style='mso-spacerun:yes'>               </span><?php echo $grossVal; ?> </td>

  <td class=xl7222597 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'> </span>INR<span
  style='mso-spacerun:yes'>                 </span><?php echo $tds; ?> </td>

  <td class=xl7822597 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'> </span>INR<span
  style='mso-spacerun:yes'>                       </span><?php echo $netPayable; ?> </td>

 </tr>



 <tr class=xl6522597 height=0 style='display:none;mso-height-source:userset;
  mso-height-alt:799'>
  <td class=xl6622597 style='border-top:none'>5</td>
  <td class=xl6922597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7022597 style='border-top:none;border-left:none'>January-18</td>
  <td class=xl7122597 width=108 style='border-top:none;border-left:none;
  width:81pt'>0</td>
  <td class=xl6622597 style='border-top:none;border-left:none'>0</td>
  <td class=xl7222597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7322597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td colspan=2 class=xl7222597 style='border-left:none'>#VALUE!</td>
  <td class=xl7222597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7822597 style='border-top:none;border-left:none'>#VALUE!</td>
 </tr>
 <tr class=xl6522597 height=0 style='display:none;mso-height-source:userset;
  mso-height-alt:799'>
  <td class=xl6622597 style='border-top:none'>6</td>
  <td class=xl6922597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7022597 style='border-top:none;border-left:none'>January-18</td>
  <td class=xl7122597 width=108 style='border-top:none;border-left:none;
  width:81pt'>0</td>
  <td class=xl6622597 style='border-top:none;border-left:none'>0</td>
  <td class=xl7222597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7322597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td colspan=2 class=xl7222597 style='border-left:none'>#VALUE!</td>
  <td class=xl7222597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7822597 style='border-top:none;border-left:none'>#VALUE!</td>
 </tr>
 <tr class=xl6522597 height=0 style='display:none;mso-height-source:userset;
  mso-height-alt:799'>
  <td class=xl6622597 style='border-top:none'>7</td>
  <td class=xl6922597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7022597 style='border-top:none;border-left:none'>January-18</td>
  <td class=xl7122597 width=108 style='border-top:none;border-left:none;
  width:81pt'>0</td>
  <td class=xl6622597 style='border-top:none;border-left:none'>0</td>
  <td class=xl7222597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7322597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td colspan=2 class=xl7222597 style='border-left:none'>#VALUE!</td>
  <td class=xl7222597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7822597 style='border-top:none;border-left:none'>#VALUE!</td>
 </tr>
 <tr class=xl6522597 height=0 style='display:none;mso-height-source:userset;
  mso-height-alt:799'>
  <td class=xl6622597 style='border-top:none'>8</td>
  <td class=xl6922597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7022597 style='border-top:none;border-left:none'>January-18</td>
  <td class=xl7122597 width=108 style='border-top:none;border-left:none;
  width:81pt'>0</td>
  <td class=xl6622597 style='border-top:none;border-left:none'>0</td>
  <td class=xl7222597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7322597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td colspan=2 class=xl7222597 style='border-left:none'>#VALUE!</td>
  <td class=xl7222597 style='border-top:none;border-left:none'>#VALUE!</td>
  <td class=xl7822597 style='border-top:none;border-left:none'>#VALUE!</td>
 </tr>
 <tr class=xl6522597 height=53 style='mso-height-source:userset;height:39.95pt'>
  <td height=53 class=xl6622597 style='height:39.95pt;border-top:none'>&nbsp;</td>
  <td class=xl6622597 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6622597 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6622597 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6622597 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6622597 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6622597 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl9522597 style='border-left:none'>NET VALUE PAYABLE</td>
  <td class=xl6822597 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'> </span>INR<span
  style='mso-spacerun:yes'>                       </span><?php echo $netPayable; ?> </td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=50 style='width:38pt'></td>
  <td width=97 style='width:73pt'></td>
  <td width=170 style='width:128pt'></td>
  <td width=108 style='width:81pt'></td>
  <td width=102 style='width:77pt'></td>
  <td width=109 style='width:82pt'></td>
  <td width=96 style='width:72pt'></td>
  <td width=109 style='width:82pt'></td>
  <td width=16 style='width:12pt'></td>
  <td width=114 style='width:86pt'></td>
  <td width=149 style='width:112pt'></td>
 </tr>
 <![endif]>
</table>

</div>


</body>

</html>
