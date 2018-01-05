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
    $("#sidebar-statements").addClass("active");
  </script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <center>
      <h1><strong>
         Issued Statements  
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
           switch ($type) {
             case "salespartner":
             //echo "salespartner selected";
               $sql1= "
              SELECT a.ref_num, a.holi_partner_name, c.clientname, c.holitype, c.holidest,c.sal AS commission 
              FROM agent_form_data a 
              INNER JOIN commissions c ON(a.ref_num = c.ghrno)
              WHERE a.sales_partner_name = '".$sno."' AND c.status = 'pending'";

               break;

            case "holidaypartner":
               $sql1= "
              SELECT a.ref_num, a.holi_partner_name, c.clientname, c.holitype, c.holidest,c.hol AS commission 
              FROM agent_form_data a 
              INNER JOIN commissions c ON(a.ref_num = c.ghrno)
              WHERE a.sales_partner_name = '".$sno."' AND c.status = 'confirmed'";
              
               break;

            case "superpartner":
               $sql1= "
              SELECT a.ref_num, a.holi_partner_name, c.clientname, c.holitype, c.holidest,c.sup AS commission
              FROM agent_form_data a 
              INNER JOIN commissions c ON(a.ref_num = c.ghrno)
              WHERE a.sales_partner_name = '".$sno."' AND c.status = 'pending'";
              
               break;
             
             default:
               # code...
               break;
           }

           ?>

   		
        <div class="col-xs-12">
          <div class="box">
            

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Sno</th>
                  <th>GHRNO</th>
                  <th>Customer Name</th>
                  <th>Holiday Type</th>
                  <th>Destination</th>
                  <th>Commission</th>
                  
                </tr>
                <?php
                $res = $conn->query($sql1) ;
                    if ($res->num_rows)
                    {     
                        $sno = 1; 
                        
                      while($row = $res->fetch_assoc()) 
                          {
                                 
                              echo " <tr>
                                  <td>".$sno++."</td>
                                  <td>GHRN".(5000+(int)$row["ref_num"])."</td>
                                  <td>".$row["clientname"]."</td>
                                  <td>".$row["holitype"]."</td>
                                  <td>".$row["holidest"]."</td>
                                  <td>".$row["commission"]."</td>
                                  
                              
                                </tr>";

                          }
                       
                    }
                    else
                      echo " <tr><td>No results found</td></tr>";
                              
                       
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