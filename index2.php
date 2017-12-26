<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gogaga Holidays</title>
    <link rel="icon" href="images/logo_icon.png"/>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

  <body>
    <br><br><br><br><br>

 <div class='container'>
    <div class="col-sm-6 col-md-4 col-md-offset-4">
   
      <form class="form-signin" method='post'>
        <h2 class="form-signin-heading" style='text-align:center'>
           <br>
             <a href=""><img src="images/logo_1.png" width='auto' height='65'></a>
        </h2>
        <br>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Enter username" name='userid' required autofocus><br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name='password' required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      
      <?php
              if(isset($_POST["userid"]) && isset($_POST["password"]) )
                  {
                      $userid = $_POST["userid"];
                      $password = md5($_POST["password"]);

                      
                     

                      $sql = "SELECT * FROM login WHERE userid = '$userid' AND password = '$password'";
                      $res = $conn->query($sql) ;
                      if ($res->num_rows) 
                      {     
                          if($row = $res->fetch_assoc()) 
                          {  
                            $stat = $row["acc_status"];
                            if($stat=="Active")
                            {
                              session_start();
                              $_SESSION['userid']=$userid;
                              $_SESSION['username']=$row["username"];
                              $_SESSION['password']=$password;
                              $_SESSION['type']= $row["type"];  
                              $_SESSION['handle_type']= $row["handle_type"];
                              if($row["type"] == "Member")                     
                                 header("location:dashboard.php");
                              elseif ($row["type"]=="Admin") {
                                 header("location:admin/dashboard.php");
                               }
                               elseif ($row["type"]=="Accounts") {
                                 header("location:admin/dashboard.php");
                               }
                            }
                            else
                            {
?>
                         <br>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="myAlert">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Disabled Account </strong> , Please contact Admin.
                        </div>
  


<?php


                            }




                          }
                      }
                      else{
                          ?>
                            <br>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="myAlert">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Invalid Credentials </strong>, Please Try again !!
                        </div>
                   

                          <?php
                              //$conn->close();
                          }



                  }


        
      ?>
        
   </form>
              </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
$(document).ready(function(){

    $(".close").click(function(){
      $("#myAlert").hide();
    // $("#myAlert").alert("close");
      });
});
</script>
    
  </body>
</html>

