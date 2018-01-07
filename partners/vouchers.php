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
    $("#sidebar-vouchers").addClass("active");
  </script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <center>
      <h1><strong>
         Vouchers  
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
                  <th>Sno</th>
                  <th>GHRNO</th>
                  <th>Customer Name</th>
                 
                  <th>Destination</th>
                  <th>Travel Start Date</th>
                  <th>Date of Issue</th>
                  <th></th>
                  
                </tr>";


               $sql1= "SELECT * FROM vouchertable v INNER JOIN agent_form_data a ON v.ref_num=a.ref_num WHERE a.sales_partner_name = '$sno' ORDER BY v.ref_num DESC

                          ";

              $res = $conn->query($sql1);
              //print_r($res);
                    if ($res->num_rows)
                    {     
                        $snoK = 1; 
                        
                      while($row = $res->fetch_assoc()) 
                          {
                                 
                              $dateissued = date_create($row["issuedon"]);
                              $dateissued = date_format($dateissued,"d-M-Y");
                              $todaydate = date("d-M-Y");

                              $holitype = $row["holi_type"];
                              
                              if($dateissued == $todaydate)
                              {
                                $dateissued = "<b style='color:green;'>TODAY</b>";
                              }
                              

                          echo " <tr>
                              <td>".$snoK."</td>
                              <td>GHRN".(5000+$row["ref_num"])."</td>
                              <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                              <td>".$row["holi_dest"]."</td>
                              <td>".$row["date_of_travel"]."</td>
                              
                              <td>".$dateissued ."</td>
                              
                              <td><a class='btn btn-info' role='button' target='_blank' href='voucherfinal.php?ref=".$row["ref_num"]."&type=".$holitype."'>View Voucher</a></td>
                            </tr>";

                          }



                       
                    }
                    else{
                      echo " <tr><td>No results found</td></tr>";
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