<?php 
include "../config.php";
session_start();

if(!isset($_SESSION["userid"]))
{
  header('Location:../index.php');
}else{
    $userid = $_SESSION["userid"];
    $username = $_SESSION['username'];
    $password = $_SESSION["password"];
    $type = $_SESSION["type"];

    $sno = "";
    $district = "";
    $state = "";

    //get the sno of the partner
    switch ($type) {
      case "salespartner":
        $sql = "SELECT sno, district, state FROM salespartners WHERE email = '$userid'";
        $res = $conn->query($sql);
         if ($res->num_rows) 
         {  
           if($row = $res->fetch_assoc()){
            $sno = $row["sno"];
            $district = $row["district"];
            $state = $row["state"];
           }
        } 
        break;

       case "holidaypartner":
        $sql = "SELECT sno, district, state FROM holidaypartners WHERE email = '$userid'";
        $res = $conn->query($sql);
         if ($res->num_rows) 
         {  
           if($row = $res->fetch_assoc()){
            $sno = $row["sno"];
            $district = $row["district"];
            $state = $row["state"];
           }
        } 
        break;

      case "superpartner":
        $sql = "SELECT sno, district, state FROM superpartners WHERE email = '$userid'";
        $res = $conn->query($sql);
         if ($res->num_rows) 
         {  
           if($row = $res->fetch_assoc()){
            $sno = $row["sno"];
            $district = $row["district"];
            $state = $row["state"];
           }
        } 
        break;
          
      default:
        # code...
        break;
    }
}

include "admin-header.php";
include "admin-sidebar.php";

?>
<!-- fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css">
 <link rel="stylesheet" type="text/css" href="../css/gallery.css">

 <style type="text/css">

   .gallery img {
    width: 20%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
}

.gallery a, .gallery a:focus, .gallery a:active{ outline:none; width: 60%;
    margin-right: -540px;}



.progress{
    width: 150px;
    height: 150px;
    line-height: 150px;
    background: none;
    margin: 0 auto;
    box-shadow: none;
    position: relative;
}
.progress:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 12px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
}
.progress > span{
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}
.progress .progress-left{
    left: 0;
}
.progress .progress-bar{
    width: 100%;
    height: 100%;
    background: none;
    border-width: 12px;
    border-style: solid;
    position: absolute;
    top: 0;
}
.progress .progress-left .progress-bar{
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}
.progress .progress-right{
    right: 0;
}
.progress .progress-right .progress-bar{
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-8 1.8s linear forwards;
}
.progress .progress-value{
    width: 90%;
    height: 90%;
    border-radius: 50%;
    background: #44484b;
    font-size: 24px;
    color: #fff;
    line-height: 135px;
    text-align: center;
    position: absolute;
    top: 5%;
    left: 5%;
}

.fancybox-button--share{
  display: none;
}

@media only screen and (max-width: 990px){
    .progress{ margin-bottom: 20px; }
}

#container1 {
  margin: 20px;
  width: 200px;
  height: 200px;
}
</style>


   <script>
    $("#sidebar-gallery").addClass("active");
  </script>


<!-- fancybox JS library -->
<script src="../js/jquery.fancybox.js"></script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <center>
      <h1><strong>
        Marketing Flyers  
      </strong></h1>
      </center>
 
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--
        | Your Page Content Here |
       -->

      <div class="row">

      	
      		<div class="col-md-12">
      <?php
               $gallerycontent="";
              if(isset($_GET["search_image"]))
                        {   
                          $search_image = $_GET["search_image"];
                          $sql = "SELECT * FROM marketing_flyers 
                          WHERE location  LIKE '%".$search_image."%'  
                          ORDER BY img_id";   
                        }
                      else
                      {
                      $sql= "SELECT * FROM marketing_flyers ORDER BY img_id";
                      unset($_GET["search_image"]);
                      }
                    
                    $res = $conn->query($sql);
                    if ($res->num_rows) 
                    //if(5<4)
                    {    
                                  
                      while($row = $res->fetch_assoc()) 
                          {
                               

                              $gallerycontent.= "
                                      <a href='../marketingflyers/".$row["imgpath"]."'  data-fancybox='group' data-caption='".$row["location"]."'>
                                       <img src='../marketingflyers/".$row["imgpath"]."'>
                                       
                                      </a>
                                      
                                    ";

                          }
                    }
                    else
                      $gallerycontent = "No results found";
                       ?>


                       <div class='gallery'>
               <?php echo "$gallerycontent";?>
             </div> <!--gallery end-->
        
      
           </div><!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  
  $(document).ready(function(){
    $('.fancybox-button--share').hide();
  });

</script>

<?php

include "admin-footer.php";

?>