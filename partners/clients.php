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

   <script>
    $("#sidebar-clients").addClass("active");
  </script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <center>
      <h1><strong>
         Clients  
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
      

           ?>

      
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <?php

             echo "<tr>
                   <th>Client Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Holiday Type</th>
                    <th>Destination</th>
                    <th>Status</th>
                  
                </tr>";


               $sql1= "SELECT * FROM agent_form_data WHERE sales_partner_name = '$sno'";

                $color = "";
                $res = $conn->query($sql1);
                    if ($res->num_rows){ 
                      while($row = $res->fetch_assoc()) 
                          {
                              
                            if($row["formstatus"] == "confirmed"){
                                $color = "#2ecc71";
                              }else if($row["formstatus"] == "pending"){
                                $color = "#e74c3c";
                              }else if($row["formstatus"] == "submitted"){
                                $color = "#3498db";
                              }else if($row["formstatus"] == "smashed"){
                                $color = "#f1c40f";
                                $row["formstatus"] = "deleted";
                              }


                              echo " <tr style='background-color: $color; color: #fff;'>
                                 
                                  <td>".$row["cust_firstname"] ." ". $row["cust_lastname"]."</td>
                                  <td>".$row["contact_phone"]." </td>
                                  <td>".$row["cust_email"]."</td>
                                  <td>".$row["cust_addr"]."</td>
                                  <td>".$row["holi_type"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["formstatus"]."</td>
                                  

                                </tr>";

                          }
                        }else{
                          echo "No results found";
                        }  
                    
                       
                    ?>

                
                                 
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
       
              
      </div>
       </div>

      
        
      </div><!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include "admin-footer.php";

?>