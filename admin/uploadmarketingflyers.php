<?php
  
include "../config.php";
$target_dir = "../marketingflyers/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
 $location="";
 $imgpath="";
 $expirydate="";
 $flag=0;
if(isset($_POST["submit"])) {
  $location =$_POST["location"];
  //$imgdesc = $_POST["imgdesc"];
  $expirydate =mysqli_real_escape_string($conn,$_POST["expirydate"]);
  //echo "IMG NAME : $imgname ";
  //echo "IMG DESC : $imgdesc ";
  $flag=1;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        header('location:imageuploadstatus.php?status=error');
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    header('location:imageuploadstatus.php?status=error');
    $uploadOk = 1;
    $flag=1;
}
// Check file size
// 990000 bytes = 990KB approx
//3 mb is the approx size
if ($_FILES["fileToUpload"]["size"] > 3000000) {
    //echo "Sorry, your file is too large.";
    header('location:imageuploadstatus.php?status=error');
    $flag=0;
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    header('location:imageuploadstatus.php?status=error');
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    header('location:imageuploadstatus.php?status=error');
    $flag=0;
// if everything is ok, try to upload file
} else {


    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        	$imgpath = basename($_FILES["fileToUpload"]["name"]);

    } else {
       // echo "Sorry, there was an error uploading your file.";
        header('location:imageuploadstatus.php?status=error');
        $flag=0;
    }
}

$date = date('Y-m-d');

if($flag == 1) {
 $sql = "INSERT INTO marketing_flyers (location,imgpath,uploadeddate,expirydate) 
                            VALUES ('$location','$imgpath','$date','$expirydate')";
                            //echo $sql;
                        if(($conn->query($sql))== true)
                        {                       
                              echo "Uploaded Successfully<br>";
                              header('location:dashboard.php#/marketingflyers');
                        }
                        else{
                            echo "Not Uploaded<br>";
                           header('location:../imageuploadstatus.php?status=error');
                        }
        //header('location:dashboard.php#/gallery');                
}










?>