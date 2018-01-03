<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["quotation"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
    echo "Sorry, only PDF, Word, JPG, PNG  files are allowed.";
    $uploadOk = 0;
}
// Check if file already exists
if (file_exists($target_file)) {
    $randomizer = rand(1,100000);
	$target_file = $target_dir . $randomizer . $_FILES["quotation"]["name"];
}

// Check file size approx 10 mb
if ($_FILES["quotation"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["quotation"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["quotation"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

}
}
?>