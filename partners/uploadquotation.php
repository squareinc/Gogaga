<?php 
session_start();

if(!isset($_SESSION["userid"]))
{
  header('Location:../index.php');
}else{
    $userid = $_SESSION["userid"];
    $username = $_SESSION['username'];
    $password = $_SESSION["password"];
    $type = $_SESSION["type"];
}

include "admin-header.php";
include "admin-sidebar.php";

$msg = "";
$class = "";

if(isset($_POST["submit"])) {

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["quotation"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
      //echo "Sorry, only PDF, Word, JPG, PNG  files are allowed.";
    $msg = "Sorry, only PDF, Word, JPG, PNG  files are allowed.<br>";
      $uploadOk = 0;
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      $randomizer = rand(1,100000);
    $target_file = $target_dir . $randomizer . $_FILES["quotation"]["name"];
  }

  // Check file size approx 10 mb
  if ($_FILES["quotation"]["size"] > 10000000) {
      //echo "Sorry, your file is too large.";
    $msg .= "Sorry, your file is too large.<br>";
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      //echo "Sorry, your file was not uploaded.";
        $msg .= "Sorry, your file was not uploaded.<br>";

  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["quotation"]["tmp_name"], $target_file)) {
          //echo "The file ". basename( $_FILES["quotation"]["name"]). " has been uploaded.";
        $msg .= "The File has been uploaded successfully!<br>";
      } else {
          //echo "Sorry, there was an error uploading your file.";
        $msg .= "Sorry, there was an error uploading your file.<br>";
      }

  }

}
?>

   <script>
    $("#sidebar-forms").addClass("active");
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
 
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--
        | Your Page Content Here |
       -->

        <div class="row">
        <div class="col-md-6 col-md-push-1">
          <?php
          if(isset($uploadOk)){
             if($uploadOk == 1){
              $class = "alert-success";
            }else if($uploadOk == 0){
              $class = "alert-danger";
            }
          }else{
            $class = "alert-info";
            $msg = "Please upload only PDF, Word, JPG and PNG files!";
          }
         
          ?>
          <div class="alert <?php echo $class; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                
               <?php echo $msg ?>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3>Upload Competitive Quote</h3>
            </div>
            <div class="box-body">
          <form action="" method="post" enctype="multipart/form-data" role="form">
            <div class="form-group">
              <label for="quotation">Word/PDF/JPG/PNG File:</label>
              <input type="file" name="quotation" id="quotation" class="form-control"><br>
            </div>
            <div class="box-footer">
              <input type="submit" value="Upload" name="submit" class="btn btn-success">
           </div>
            </div>
          </form>
         </div>
        </div>
        <!-- /.col -->
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include "admin-footer.php";

?>