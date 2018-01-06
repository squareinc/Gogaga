<?php
include "../config.php";
				
			if(isset($_POST["submit"])){
				//echo "submit button";
              if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["partnertype"]))
                  {
                  	//echo "conditions passed";
                      $name = $_POST["name"];
                      $email = $_POST["email"];
                      $phone = $_POST["phone"];
                      $partnertype = $_POST["partnertype"];

                      $password = md5($email);

                      $date = date('Y-m-d');
                        
                      $sql = "INSERT INTO login (userid, username, mailid, password, type, contact, joindate, handle_type) VALUES('$email','$name','$email','$password','$partnertype','$phone','$date','none')";

                     // echo $sql;

                    if($conn->query($sql) == true)
                    {
                      //successfully inserted.. alert the user about it..
                    	echo '<div class="middle-box text-center alert alert-success alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success! </strong> , Please contact Admin to Activate your account.
                        </div>';
                    }else{
                    	//problem with query
                    	echo '<div class="middle-box text-center alert alert-danger alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error</strong> , Please try again.
                        </div>';
                    }

                }else{
                	//invalid data
                }
            }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GoGaGa Register</title>
  <!-- Bootstrap -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- slimscroll -->
  <link href="../css/jquery.slimscroll.css" rel="stylesheet">
  <!-- Fontes -->
  <link href="../css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/glyphicons.css" rel="stylesheet">
  <link href="../css/simple-line-icons.css" rel="stylesheet">
  <!-- all buttons css -->
  <link href="../css/buttons.css" rel="stylesheet">
  <!-- animate css -->
<link href="../css/animate.css" rel="stylesheet">
<!-- The Wolf main css -->
  <link href="../css/main.css" rel="stylesheet">
  <!-- theme css -->
  <link href="../css/theme.css" rel="stylesheet">
  <!-- media css for responsive  -->
  <link href="../css/main.media.css" rel="stylesheet">

<!-- demo  -->
<link href="../css/appdemo.css" rel="stylesheet">
  <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
  <!--[if lt IE 9]> <script src="dist/html5shiv.js"></script> <![endif]-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body class="login">
  <div class="middle-box text-center loginscreen ">
    <div class="widgets-container" style="box-shadow: 10px 10px 5px -8px rgba(148,138,148,1);">
      <div>
        <img src="../images/logo_1.png" width='auto' height='55'>
      </div>
      <br>
      <b><p style="font-size: 14px;text-decoration-line:  underline;text-decoration-color: #ded6d6;">WELCOME TO GOGAGA</p></b>
     
      <h3>Partner Registration</h3>
      <form method="post" class="top15" action="">
        <div class="form-group">
          <input type="text" placeholder="Name" id="name" name='name' class="form-control" required autofocus>
        </div>
        <div class="form-group">
          <input type="email" id="email" placeholder="Email" name='email' class="form-control" required>
        </div>
        <div class="form-group">
          <input type="tel" pattern="[789][0-9]{9}" title="10 digit mobile number" id="phone" placeholder="Phone Number" name='phone' class="form-control" required>
        </div>
        <div class="form-group">
        	<select class="form-control" name="partnertype" required>
        		<option value="">Select Partner Type</option>
        		<option value="salespartner">Sales Partner</option>
        		<option value="holidaypartner">Holiday Partner</option>
        		<option value="superpartner">Super Partner</option>
        	</select>
        </div>
        <button class="btn aqua block full-width bottom15" style="margin-bottom: 10px;" name="submit" type="submit">Register</button>

        <!--login-->


                    	<!-- <div class="alert alert-success alert-dismissible" role="alert" id="myAlert">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success! </strong> , Please contact Admin to Activate your account.
                        </div>

                 
                         <br>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="myAlert">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error</strong> , Please try again.
                        </div> -->
  
					
                 
                        <!--     <br>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="myAlert">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error!! </strong>, Please Provide Correct Details.
                        </div>
                    -->

                         



        
        
        <a href="http://www.gogagaholidays.com/" style="margin-top: 10px;" class="btn btn-sm btn-white btn-block">Visit Gogagaholidays.com</a>
      </form>
      <p class="top15"> <small> &copy; 2016-2018 GoGaGa</small> </p>
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