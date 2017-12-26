<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GoGaGa</title>
  <!-- Bootstrap -->
  <link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- slimscroll -->
  <link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/jquery.slimscroll.css" rel="stylesheet">
  <!-- Fontes -->
  <link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/glyphicons.css" rel="stylesheet">
  <link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/simple-line-icons.css" rel="stylesheet">
  <!-- all buttons css -->
  <link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/buttons.css" rel="stylesheet">
  <!-- animate css -->
<link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/animate.css" rel="stylesheet">
<!-- The Wolf main css -->
  <link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/main.css" rel="stylesheet">
  <!-- theme css -->
  <link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/theme.css" rel="stylesheet">
  <!-- media css for responsive  -->
  <link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/main.media.css" rel="stylesheet">

<!-- demo  -->
<link href="http://thewolf.bittyfox.com/vertical-menu-nav-dark/LTR/assets/css/appdemo.css" rel="stylesheet">
  <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
  <!--[if lt IE 9]> <script src="dist/html5shiv.js"></script> <![endif]-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body class="login">
  <div class="middle-box text-center loginscreen ">
    <div class="widgets-container" style="box-shadow: 10px 10px 5px -8px rgba(148,138,148,1);">
      <div>
        <img src="images/logo_1.png" width='auto' height='55'>
      </div>
      <br>
      <b><p style="font-size: 14px;text-decoration-line:  underline;text-decoration-color: #ded6d6;">WELCOME TO GOGAGA</p></b>
     
      <p>“Great things in business are never done by a person, they are done by a team of people”</p> <p> – Steve Jobs.</p>
      <form method="post" class="top15">
        <div class="form-group">
          <input type="text" placeholder="Username" id="inputEmail" name='userid' class="form-control" required autofocus>
        </div>
        <div class="form-group">
          <input type="password" id="inputPassword" placeholder="Password" name='password' class="form-control" required>
        </div>
        <button class="btn aqua block full-width bottom15" style="margin-bottom: 10px;" type="submit">Login</button>

        <!--login-->


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




        <a href="forgot_password.html"><small>Forgot password?</small></a>
        
        <a href="http://www.gogagaholidays.com/" style="margin-top: 10px;" class="btn btn-sm btn-white btn-block">Visit Gogagaholidays.com</a>
      </form>
      <p class="top15"> <small> &copy; 2016-2017 GoGaGa</small> </p>
    </div>
  </div>

   


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