
<?php
include "../config.php";

if(isset($_GET["n"]))
{
    $idd= $_GET["n"];
       $sqlset = "UPDATE login SET 
             notif_count = 0
             WHERE userid = '".$idd."' ";


      if(($conn->query($sqlset))== true)
      { //echo "Hasasni";
        header('Location:dashboard.php');
       
      }
      else{ 
       echo "Wrong";
      }
}


?>
<nav class="navbar navbar-inverse" style="background-color:#2E2E2D;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     
      <a class="navbar-brand" href="dashboard1.php" id='sample'>
        <img style='position:relative;top:-10px;' src="../images/logonew.png" width='auto' height='40'>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
    
        <p class="navbar-text">Signed in as <?php echo "$userid";?>  </p>



     


      <ul class="nav navbar-nav navbar-right">


        
           <li class='dropdown'>
            <a href='' class='dropdown-toggle' data-toggle='dropdown' role='button' 
            aria-haspopup='true' id="adminButton" onclick="authPassword();" aria-expanded='false'> <?php echo $type ;?> panel  <span class='caret'></span></a>

            <ul class='dropdown-menu hidden' id="adminHidden" >
              <li><a href='dashboard.php#/create_user'>Create Account</a></li>
              <li><a href='dashboard.php#/account_settings'>Account settings</a></li>
              <li><a href='dashboard.php#/agentaccounts'>Agent Accounts</a></li>
              <li role='separator' class='divider'></li>
              <li><a href='dashboard.php#/agentreport'>Agent Commission Reports</a></li>
              <li><a href='dashboard.php#/fintran'>Financial Transactions</a></li>
            </ul>

          </li>
         
        <?php
            $sql = "SELECT notif_count,username FROM login WHERE userid = '".$userid."' ";
            $res = $conn->query($sql) ;
            if ($res->num_rows) 
            {     
               if($row = $res->fetch_assoc()) 
               {  
                $notif_count =$row['notif_count'];
                $username =$row['username'];
              }
            }
            else
              $notif_count =0;
        ?>

       
        <!--End of Admin,Accounts Panel-->
    

          <li class='dropdown'>
            <a href='' class='dropdown-toggle' data-toggle='dropdown' role='button' 
            aria-haspopup='true' aria-expanded='false'> Notifications <span class="badge"><?php if($notif_count) echo "$notif_count";?></span></a>

            <ul class='dropdown-menu' style='width:300px;padding:5px;'>
              <?php
                    $sql1= "SELECT * FROM agent_form_data
                          WHERE formstatus = 'pending'  
                          ORDER BY ref_num DESC 
                          LIMIT 6
                           ";
                  $res = $conn->query($sql1) ;
                    if ($res->num_rows)
                    {                  

                            echo "<li><div style='position:absolute;right:20px;font-size:12px;'>
                                                <strong>

                                                  <a href='navbar.php?n=".$userid."' >Mark all as read</a>
                                                </strong>
                                      </div><br></li>";
                            $i=1;                   
                      while($row = $res->fetch_assoc()) 
                          { 
                            $date = date("d-m-Y");
                            $datesent = date_create($row["datesent"]);
                            $datesent =date_format($datesent,"d-m-Y");
                            $yy=$datesent;
                            $days = strtotime($date) - strtotime($datesent);
                            $days= (int)$days/86400;

                            if($days == 0)
                              $datesent = "Today";
                            elseif($days == 1)
                              $datesent = "Yesterday";
                            elseif ($days>1) 
                            {
                                $datesent =$datesent;
                            }

                            
                            if($i<=$notif_count)
                            {
                            echo "<li>
                                      
                                      <a href='' style='border-top:1px solid rgba(167,167, 167, .2);'>
                                            <div style='position:absolute;right:10px;font-size:12px;'><i>$datesent</i></div><br>";

                                              echo "<strong style='color:black;'>".$row["form_filled_by"]." has sent new form</strong>";
                                              $i++;

                                      echo "</a>
                                  </li>";
                             }
                             else
                             {
                                 echo "<li>
                                      
                                      <a href='' style='border-top:1px solid rgba(167,167, 167, .2);'>
                                            <div style='position:absolute;right:10px;font-size:12px;'><i>$datesent</i></div><br>";

                                              echo $row["form_filled_by"]." has sent new form";

                                      echo "</a>
                                  </li>";

                             }     
                          }
                     }
                     else
                     {
                      echo "<li>No notifications to display</li>";
                     }         


              ?>
              <li></li>
              <li></li>


              <li role='separator' class='divider'></li>
              <li><a href='dashboard.php#/itpending'><strong>View All</strong>&nbsp;&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-triangle-right' style='padding-right:15px;' aria-hidden='true'></span></a></li>
            </ul>

          </li>



        <li class="dropdown">
          
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" 
          aria-haspopup="true" aria-expanded="false"><?php echo "$username";?><span class="caret"></span></a>

          <ul class="dropdown-menu">
            <li><a href="dashboard.php#/profile">Profile</a></li>
            <li><a href="dashboard.php#/settings">Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../logout.php" onclick="logOutAdmin();"><span class='glyphicon glyphicon-log-in' style='padding-right:15px;' aria-hidden='true'></span>Logout</a></li>
          </ul>

        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script type="text/javascript">
function authPassword(){
   val = sessionStorage.getItem("SessionAdminPass");
  if(val == "ok"){
    console.log("logged in!");
    $('#maincontrol').css("opacity", "1");
    $("#passBox").addClass("hidden");
    $("#adminHidden").removeClass("hidden");
  }else{
    console.log("not logged in!");
    $('#maincontrol').css("opacity", "0.1");
  $('#maincontrol').before('<div id="passBox" style="position: absolute; left: 50%; top: 50%;z-index: 1;"><h2 id="passwordlabel" style="color:red;"></h2><form onsubmit="authMain();" role="form"><label>Input Password</label><input type="password" id="adminPass" size="30" autofocus></form></div>');
  } 
  



  //$("#adminHidden").removeClass("hidden");
}

function authMain(){
  var pass = $("#adminPass").val();
  console.log(pass);
  if(pass == "somepassword"){
    $('#maincontrol').css("opacity", "1");
    $("#passBox").addClass("hidden");
    $("#adminHidden").removeClass("hidden");
    sessionStorage.setItem("SessionAdminPass","ok");
  }else{
    $("#passwordlabel").text("Error!");
    sessionStorage.setItem("SessionAdminPass","error");
  }
return false;
}


function logOutAdmin(){
  sessionStorage.setItem("SessionAdminPass","error");
}

</script>

