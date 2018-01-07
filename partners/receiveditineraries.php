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
    $("#sidebar-itineraries").addClass("active");
  </script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <center>
      <h1><strong>
        Received Itinararies  
      </strong></h1>
      </center>
 
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--
        | Your Page Content Here |
       -->

      <div class="row">

      	<form  method='POST' action="../form_insert.php" class="form-horizontal">
      		<div class="col-md-12">


     
       
           <?php

           $sql1= "SELECT * FROM agent_form_data
                   WHERE sales_partner_name ='".$sno."' and formstatus = 'submitted'  
                  ORDER BY ref_num DESC ";

           ?>

        <div class="col-xs-12">
          <div class="box">
            

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>GHRNO</th>
                  <th>Customer Name</th>
                  <th>Destination</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Duration</th>
                  <th>Form Received on</th>
                </tr>
                <?php
                $res = $conn->query($sql1) ;
                    if ($res->num_rows)
                    {     
                          
                      while($row = $res->fetch_assoc()) 
                          {
                             /* $holi_type = $row["holi_type"];
                              if($holi_type == $handle_type){*/
                             
                                $datesent =date_create($row["senttocustomerdate"]);
                                $datesent =date_format($datesent,"d-M-Y");

                              echo " <tr>
                                  <td>GHRN".(5000+(int)$row["ref_num"])."</td>
                                  <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$row["return_date_of_travel"]."</td>
                                  <td>".$row["duration"]."</td>
                                  <td>".$datesent."</td>
                                

                                </tr>";

                              //}

                          }
                          //echo "</table></div>";
                    }
                    else
                      echo "<tr> <td>No results found</td></tr>";
                              
                       
                    ?>

                
                                 
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
   
      </div><!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include "admin-footer.php";

?>