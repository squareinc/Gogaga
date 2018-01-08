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
        Recent Packages  
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
            <form method='GET' action=''>
            <div class="col-md-8">
              <input type="text" placeholder='Enter Destination' size='300' name ='search_param_client' class="form-control" aria-label="...">
            </div>
            <div class="col-md-4">
               <span class="input-group-btn">
               <button class="btn btn-primary" type="submit">Search</button>
               </span>
            </div>   

          </form>

          <br><br><br><br>

    

        <div class="col-xs-12">
          <div class="box">
            

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>GHRNO</th>
                  <th>Destination</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Duration</th>
                  <th></th>
                  
                </tr>
                <?php
                     if(isset($_GET["search_param_client"]))
                        {   
                          $search_param_client = $_GET["search_param_client"];
                          $sql = "SELECT * FROM agent_form_data
                          WHERE holi_dest LIKE '%".$search_param_client."%'  
                          AND (formstatus = 'submitted' OR formstatus = 'confirmed') AND ref_num > 250
                          ORDER BY datesent DESC";

                          $res = $conn->query($sql);
                    if ($res->num_rows)
                    {           
                      while($row = $res->fetch_assoc()) 
                          {
                             /* $holi_type = $row["holi_type"];
                              if($holi_type == $handle_type){*/
                             
                                //$datesent =date_create($row["senttocustomerdate"]);
                                //$datesent =date_format($datesent,"d-M-Y");

                              echo " <tr>
                                  <td>GHRN".(5000+(int)$row["ref_num"])."</td>
                                  
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$row["return_date_of_travel"]."</td>
                                  <td>".$row["duration"]."</td>
                                  <td><a class='btn btn-info' href='view.php?q=".$row["ref_num"]."&r=".$row["holi_type"]."'>View</a></td>
                                  
                                

                                </tr>";

                              //}

                          }
                          //echo "</table></div>";
                    }
                    else
                      echo "<tr> <td>No results found</td></tr>";

                        }

                
                              
                       
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