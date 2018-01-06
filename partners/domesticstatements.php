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
      </strong>(Domestic)</h1>
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
                
                     switch ($type) {
             case "salespartner":
             //echo "salespartner selected";

             echo "<tr>
                  <th>Sno</th>
                  <th>GHRNO</th>
                  <th>Customer Name</th>
                  <th>Holiday Type</th>
                  <th>Destination</th>
                  <th>Sales Partner</th>
                  <th>View</th>
                  
                </tr>";  

                //domestic

                    $sql2 = "
              SELECT a.ref_num, a.holi_partner_name, c.clientname, c.holitype, c.holidest, c.sal
              FROM agent_form_data a 
              INNER JOIN itinerary_domestic id ON(a.ref_num = id.ghrnno)
              INNER JOIN commissions c ON(id.ghrnno = c.ghrno)
              WHERE id.salname = '".$sno."' AND c.status = 'confirmed'";


              $res = $conn->query($sql2);
              //print_r($res);
                    if ($res->num_rows)
                    {     
                        //echo "success domestic";

                        $sno = 1; 
                        
                      while($row2 = $res->fetch_assoc()) 
                          {
                                 
                              echo " <tr>
                                  <td>".$sno++."</td>
                                  <td>GHRN".(5000+(int)$row2["ref_num"])."</td>
                                  <td>".$row2["clientname"]."</td>
                                  <td>".$row2["holitype"]."</td>
                                  <td>".$row2["holidest"]."</td>
                                 
                                  <td>".$row2["sal"]."</td>
                                  <td><a class='btn btn-info' href='viewstatement.php?q='>VIEW</a></td>

                                 </tr>";

                          }
                       
                    }
                    else{
                     // echo " <tr><td>No results found</td></tr>";
                      echo "error";
                      }

                      $res->close();
               break;

            case "holidaypartner":

            echo "<tr>
                  <th>Sno</th>
                  <th>GHRNO</th>
                  <th>Customer Name</th>
                  <th>Holiday Type</th>
                  <th>Destination</th>
                  <th>Holiday Partner</th>
                  <th>Sales Partner</th>
                  
                </tr>";
             
        
                    //domestic

                    $sql2 = "
              SELECT a.ref_num, a.holi_partner_name, c.clientname, c.holitype, c.holidest,c.hol, c.sal
              FROM agent_form_data a 
              INNER JOIN itinerary_domestic it ON(a.ref_num = it.ghrnno)
              INNER JOIN commissions c ON(it.ghrnno = c.ghrno)
              WHERE it.holiname = '".$sno."' AND c.status = 'confirmed'";


              $res2 = $conn->query($sql2);
                    if ($res2->num_rows)
                    {     
                        $sno = 1; 
                        
                      while($row = $res2->fetch_assoc()) 
                          {
                                 
                              echo " <tr>
                                  <td>".$sno++."</td>
                                  <td>GHRN".(5000+(int)$row["ref_num"])."</td>
                                  <td>".$row["clientname"]."</td>
                                  <td>".$row["holitype"]."</td>
                                  <td>".$row["holidest"]."</td>
                                  <td>".$row["hol"]."</td>
                                  <td>".$row["sal"]."</td>

                                 </tr>";

                          }
                       
                    }
                    else
                     // echo " <tr><td>No results found</td></tr>";
                      echo "";
              
               break;

            case "superpartner":

            echo "<tr>
                  <th>Sno</th>
                  <th>GHRNO</th>
                  <th>Customer Name</th>
                  <th>Holiday Type</th>
                  <th>Destination</th>
                                    
                  <th>Super Partner</th>
                  <th>Holiday Partner</th>
                  <th>Sales Partner</th>
                  
                </tr>";

             
               $sql2 = "
              SELECT a.ref_num, a.holi_partner_name, c.clientname, c.holitype, c.holidest,c.sup,c.hol, c.sal
              FROM agent_form_data a 
              INNER JOIN itinerary_domestic it ON(a.ref_num = it.ghrnno)
              INNER JOIN commissions c ON(it.ghrnno = c.ghrno)
              WHERE it.supname = '".$sno."' AND c.status = 'confirmed'";


              $res2 = $conn->query($sql2);
                    if ($res2->num_rows)
                    {     
                        $sno = 1; 
                        
                      while($row = $res2->fetch_assoc()) 
                          {
                                 
                              echo " <tr>
                                  <td>".$sno++."</td>
                                  <td>GHRN".(5000+(int)$row["ref_num"])."</td>
                                  <td>".$row["clientname"]."</td>
                                  <td>".$row["holitype"]."</td>
                                  <td>".$row["holidest"]."</td>
                                  <td>".$row["sup"]."</td>
                                  <td>".$row["hol"]."</td>
                                  <td>".$row["sal"]."</td>

                                 </tr>";

                          }
                       
                    }
                    else
                     // echo " <tr><td>No results found</td></tr>";
                      echo "";
              
               break;
             
             
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