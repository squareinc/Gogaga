<?php
include "config.php";
session_start();


$target_dir = "profile/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
 $imgpath="";
 $flag=0;


if(isset($_POST["settingssubmit"]))
{
	 $flag=1;
	 $imgflag= 0;
	 if(!empty($_FILES["fileToUpload"]["tmp_name"]))
	 {
	 	 $imgflag= 1;
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
	 }

 	$userid = $_SESSION["userid"];


if($_POST["dateset"]!='a' && $_POST["monset"]!='a' && $_POST["yearset"]!='a')	
	$dob = $_POST["yearset"]."-".$_POST["monset"]."-".$_POST["dateset"];
else
	$dob = date("Y-m-d");
$pwd = "";
$newusername = $_POST["newusername"];
$newpwd = $_POST["newpwd"];
$newpwd1 = $_POST["newpwd1"];
if($newpwd1 == $newpwd)
{
	$pwd = $newpwd;
}
$contactno = $_POST["contactno"];
$refnums = $_POST["refnums"];
$emailnew = $_POST["emailnew"];

if($_POST["datews"]!='a' && $_POST["monws"]!='a' && $_POST["yearws"]!='a')	
	$wsince = $_POST["yearws"]."-".$_POST["monws"]."-".$_POST["datews"];
else
	$wsince = date("Y-m-d");

}
if($imgflag == 1)
{
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 1;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 990000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		        	$imgpath = basename($_FILES["fileToUpload"]["name"]);

		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
}



if($flag == 1) {


$sqlset ="UPDATE login SET ";
		if(!empty($newusername)){
			$sqlset.="username = '".$newusername."',";
		}
		if(!empty($pwd)){
			$sqlset.="password = '".md5($pwd)."',";
		}
		if(!empty($imgpath)){
			$sqlset.="profilepath = '".$imgpath."',";
		}
		if(!empty($contactno))
			$sqlset.="contact = '".$contactno."',";
		if(!empty($refnums))
			$sqlset.="refnums = '".$refnums."' ,";
		if(!empty($emailnew))
			$sqlset.="mailid = '".$emailnew."',";
		if(!empty($wsince))
			$sqlset.="joindate = '".$wsince."',";
		if(!empty($dob))
			$sqlset.="DOB = '".$dob."',";

		
			$sqlset.=" userid = '".$userid."'
  				   WHERE userid = '".$userid."' ";

			if(($conn->query($sqlset))== true)
			{
				 
				echo "Updated successfully<br>";
				


			}
			else{
				echo "Not Updated";
				
			}
 


}





?>