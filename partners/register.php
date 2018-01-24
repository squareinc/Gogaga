<?php
include "../config.php";

function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
      } 
				
			if(isset($_POST["submit"])){
				//echo "submit button";
        //print_r($_POST);
              if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["partnertype"]))
                  {
                  	//echo "conditions passed";
                      $name = test_input($_POST["name"]);
                      $email = test_input($_POST["email"]);
                      $phone = test_input($_POST["phone"]);
                      $partnertype = test_input($_POST["partnertype"]);

                      $district = test_input($_POST["district"]);
                      $state = test_input($_POST["state"]);
                      $fathername = test_input($_POST["fathername"]);
                      $pancard = test_input($_POST["pancard"]);
                      $dob = test_input($_POST["dob"]);
                      $maritial_status = test_input($_POST["maritial_status"]);
                      $res_address = test_input($_POST["res_address"]);


                      $password = md5($email);

                      $date = date('Y-m-d');
                        
                      $sql = "INSERT INTO login (userid, username, mailid, password, type, contact, joindate, handle_type) VALUES('$email','$name','$email','$password','$partnertype','$phone','$date','none')";

                     //echo $sql;

                    if($conn->query($sql) == true)
                    {
                      //successfully inserted.. alert the user about it..


                      //now insert in the temporary table..

                      $sql2 = "INSERT INTO temp_partner (email, name, partnertype, district, state, fathername, pancard, dob, maritial_status, res_address) VALUES('$email','$name','$partnertype','$district','$state','$fathername','$pancard','$dob','$maritial_status','$res_address')";

                      if($conn->query($sql2) == true)
                    {

                      echo '<div class="middle-box text-center alert alert-success alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success! </strong> , Please contact Admin to Activate your account.
                        </div>';

                        header("Location:register.php?step=2&email=$email");
                    }

                    	
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


            if(isset($_POST["step2"])){

              //take all values and update in temp_partner

              $tradename = test_input($_POST["tradename"]);
              $organization = test_input($_POST["organization"]);
              $business = test_input($_POST["business"]);
              $trade_address = test_input($_POST["trade_address"]);
              $trade_years = test_input($_POST["trade_years"]);
              $office_phone = test_input($_POST["office_phone"]);
              $office_email = test_input($_POST["office_email"]);
              $present_office_location = test_input($_POST["present_office_location"]);
              $office_size = test_input($_POST["office_size"]);
              $email = test_input($_POST["email"]);


              $sql = "UPDATE temp_partner SET tradename = '$tradename', organization = '$organization', business = '$business', trade_address = '$trade_address', trade_years = '$trade_years', office_phone = '$office_phone', office_email = '$office_email', present_office_location  = '$present_office_location', office_size = '$office_size' WHERE email = '$email'";

              if($conn->query($sql) == true)
                    {

                       echo '<div class="middle-box text-center alert alert-success alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success! </strong> , Please contact Admin to Activate your account.
                        </div>';


                        header("Location:register.php?step=3&email=$email");

                    }else{
                      //problem with query
                      echo '<div class="middle-box text-center alert alert-danger alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error</strong> , Please try again.
                        </div>';
                    }

            }


            if(isset($_POST["step3"])){

              $account_holder_name = test_input($_POST["account_holder_name"]);
              $bank_name = test_input($_POST["bank_name"]);
              $account_type = test_input($_POST["account_type"]);
              $ifsc = test_input($_POST["ifsc"]);
              $bank_address = test_input($_POST["bank_address"]);
              $email = test_input($_POST["email"]);

              $sql = "UPDATE temp_partner SET account_holder_name = '$account_holder_name', bank_name = '$bank_name', account_type = '$account_type', ifsc = '$ifsc', bank_address = '$bank_address' WHERE email = '$email'";

              if($conn->query($sql) == true)
                    {

                       echo '<div class="middle-box text-center alert alert-success alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success! </strong> , Please contact Admin to Activate your account.
                        </div>';


                        header("Location:register.php?step=4&email=$email");

                    }else{
                      //problem with query
                      echo '<div class="middle-box text-center alert alert-danger alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error</strong> , Please try again.
                        </div>';
                    }

            }


            if(isset($_POST["step4"])){

              $fee_amount = test_input($_POST["fee_amount"]);
              $mode_payment = test_input($_POST["mode_payment"]);
              $deposit_date = test_input($_POST["deposit_date"]);
              $online_deposit = test_input($_POST["online_deposit"]);
              $online_transaction_id = test_input($_POST["online_transaction_id"]);
              $transaction_date = test_input($_POST["transaction_date"]);
              $credit_card = test_input($_POST["credit_card"]);
              $issuing_bank = test_input($_POST["issuing_bank"]);
              $email = test_input($_POST["email"]);

              $sql = "UPDATE temp_partner SET fee_amount = '$fee_amount', mode_payment = '$mode_payment', deposit_date = '$deposit_date', online_deposit = '$online_deposit', online_transaction_id = '$online_transaction_id', transaction_date = '$transaction_date', credit_card = '$credit_card', issuing_bank = '$issuing_bank' WHERE email = '$email'";

              if($conn->query($sql) == true)
                    {

                       echo '<div class="middle-box text-center alert alert-success alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success! </strong> , Please contact Admin to Activate your account.
                        </div>';


                        header("Location:register.php?step=5&email=$email");

                    }else{
                      //problem with query
                      echo '<div class="middle-box text-center alert alert-danger alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error</strong> , Please try again.
                        </div>';
                    }

            }


            if(isset($_POST["step5"])){


              $professional_ref_name = test_input($_POST["professional_ref_name"]);
              $personal_ref_name = test_input($_POST["personal_ref_name"]);

              $email = test_input($_POST["email"]);


                 $sql = "UPDATE temp_partner SET personal_ref_name = '$personal_ref_name',  professional_ref_name = '$professional_ref_name' WHERE email = '$email'";

              if($conn->query($sql) == true)
                    {
                      //success
                       echo '<div class="middle-box text-center alert alert-success alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success! </strong> , Please contact Admin to Activate your account.
                        </div>';


                        //header("Location:register.php?step=6&email=$email");

                    }else{
                      //problem with query
                      echo '<div class="middle-box text-center alert alert-danger alert-dismissible" role="alert" id="myAlert" style="max-width: 400px;padding-top: 10px;margin-top: 10px;margin-bottom: -20px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error</strong> , Please try again.
                        </div>';
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

      <!--Step 1-->

      <?php

        if(isset($_GET["step"])){
          $step = $_GET["step"];
          if($step == "1"){

      ?>

      <h3>Personal Details</h3>
      <form method="post" class="top15" action="">

        <!--Basic Details-->
        <div class="form-group">
          <input type="text" placeholder="Name" id="name" name='name' class="form-control" required autofocus>
        </div>

         <div class="form-group">
          <select class="form-control" name="partnertype" required>
            <option value="">Select Partner Type</option>
            <option value="salespartner">Sales Partner</option>
            <option value="holidaypartner">Holiday Partner</option>
            <option value="superpartner">Super Partner</option>
          </select>
        </div>

        <div class="form-group">
          <input type="text" placeholder="District of Operation" id="district" name='district' class="form-control" required>
        </div>

        <div class="form-group">
          <input type="text" placeholder="State of Operation" id="state" name='state' class="form-control" required>
        </div>

        <!--Personal Details-->

        <div class="form-group">
          <input type="text" placeholder="Father Name" id="fathername" name='fathername' class="form-control" required>
        </div>

        <div class="form-group">
          <input type="text" placeholder="Pan card Number" id="pancard" name='pancard' class="form-control" required>
        </div>

        <div class="form-group">
          <input type="text" placeholder="Date of Birth" id="dob" name='dob' class="form-control" required>
        </div>

        <div class="form-group">
          <input type="text" placeholder="Maritial Status" id="maritial_status" name='maritial_status' class="form-control">
        </div>

        <div class="form-group">
          <textarea type="text" placeholder="Residential Address" id="res_address" name='res_address' class="form-control" required></textarea>
        </div>

        <div class="form-group">
          <input type="tel" pattern="[789][0-9]{9}" title="10 digit mobile number" id="phone" placeholder="Phone Number" name='phone' class="form-control" required>
        </div>

        <div class="form-group">
          <input type="email" id="email" placeholder="Email" name='email' class="form-control" required>
        </div>

        <button class="btn aqua block full-width bottom15" style="margin-bottom: 10px;" name="submit" type="submit">Save</button>
        
        <a href="http://www.gogagaholidays.com/" style="margin-top: 10px;" class="btn btn-sm btn-white btn-block">Visit Gogagaholidays.com</a>
      </form>

        <?php
          }
        }
      ?>



      <!--step2-->

      <?php

        if(isset($_GET["step"])){
          $step = $_GET["step"];
          if($step == "2"){

      ?>

      <h3>TRADE DETAILS</h3>

      <form method="post" class="top15" action="">

         <div class="form-group" style="display: none;">
          <input type="email" id="email" placeholder="Email" name='email' class="form-control" value="<?php if(isset($_GET["email"])){ echo $_GET["email"]; } ?>">
        </div>

        <!--Trade Details-->
        <div class="form-group">
          <input type="text" placeholder="Trade Name" id="tradename" name='tradename' class="form-control" required autofocus>
        </div>

        <div class="form-group">
          <input type="text" placeholder="Type of Organization" id="organization" name='organization' class="form-control">
        </div>

        <div class="form-group">
          <input type="text" placeholder="Type of Business" id="business" name='business' class="form-control">
        </div>

        <div class="form-group">
          <textarea type="text" placeholder="Trade Address" id="trade_address" name='trade_address' class="form-control"></textarea>
        </div>

        <div class="form-group">
          <input type="text" placeholder="Number of Years in Trade" id="trade_years" name='trade_years' class="form-control">
        </div>

        <div class="form-group">
          <input type="tel" pattern="[789][0-9]{9}" title="10 digit mobile number" id="office_phone" placeholder="Office Contact Number" name='office_phone' class="form-control">
        </div>

        <div class="form-group">
          <input type="email" id="office_email" placeholder="Office Email" name='office_email' class="form-control">
        </div>

        <div class="form-group">
          <textarea type="text" placeholder="Present Office Location" id="present_office_location" name='present_office_location' class="form-control"></textarea>
        </div>


        <div class="form-group">
          <input type="number" min="0" placeholder="Office size(area) in SFT" id="office_size" name='office_size' class="form-control">
        </div>
         
    
        <button class="btn aqua block full-width bottom15" style="margin-bottom: 10px;" name="step2" type="submit">Next</button>

        <a href="http://www.gogagaholidays.com/" style="margin-top: 10px;" class="btn btn-sm btn-white btn-block">Visit Gogagaholidays.com</a>
      </form>

      <?php
          }
        }
      ?>




       <!--step3-->

      <?php

        if(isset($_GET["step"])){
          $step = $_GET["step"];
          if($step == "3"){

      ?>

      <h3>TRADE DETAILS</h3>

      <form method="post" class="top15" action="">

         <div class="form-group" style="display: none;">
          <input type="email" id="email" placeholder="Email" name='email' class="form-control" value="<?php if(isset($_GET["email"])){ echo $_GET["email"]; } ?>">
        </div>

        <!--Trade Details-->
        <div class="form-group">
          <input type="text" placeholder="Account Holder Name" id="account_holder_name" name='account_holder_name' class="form-control" required autofocus>
        </div>

        <div class="form-group">
          <input type="text" placeholder="Bank Name" id="bank_name" name='bank_name' class="form-control">
        </div>


        <div class="form-group">
          <input type="text" placeholder="Account Type" id="account_type" name='account_type' class="form-control">
        </div>

        <div class="form-group">
          <input type="text" placeholder="IFSC Code" id="ifsc" name='ifsc' class="form-control">
        </div>

        <div class="form-group">
          <textarea type="text" placeholder="Bank Address" id="bank_address" name='bank_address' class="form-control"></textarea>
        </div>
    
        <button class="btn aqua block full-width bottom15" style="margin-bottom: 10px;" name="step3" type="submit">Next</button>

        <a href="http://www.gogagaholidays.com/" style="margin-top: 10px;" class="btn btn-sm btn-white btn-block">Visit Gogagaholidays.com</a>
      </form>

      <?php
          }
        }
      ?>


       <!--step4-->

      <?php

        if(isset($_GET["step"])){
          $step = $_GET["step"];
          if($step == "4"){

      ?>

      <h3>FEE DETAILS</h3>

      <form method="post" class="top15" action="">

         <div class="form-group" style="display: none;">
          <input type="email" id="email" placeholder="Email" name='email' class="form-control" value="<?php if(isset($_GET["email"])){ echo $_GET["email"]; } ?>">
        </div>

        <!--FEE Details-->
        <div class="form-group">
          <input type="text" placeholder="Fee Amount" id="fee_amount" name='fee_amount' class="form-control" autofocus>
        </div>

        <div class="form-group">
          <input type="text" placeholder="Mode of Payment" id="mode_payment" name='mode_payment' class="form-control">
        </div>


        <div class="form-group">
          <input type="text" placeholder="Cheque/DD/Deposit Date" id="deposit_date" name='deposit_date' class="form-control">
        </div>

        <div class="form-group">
          <input type="text" placeholder="Online Deposit Transfers" id="online_deposit" name='online_deposit' class="form-control">
        </div>

        <div class="form-group">
          <input type="text" placeholder="Online Transaction ID" id="online_transaction_id" name='online_transaction_id' class="form-control">
        </div>

         <div class="form-group">
          <input type="text" placeholder="Transaction Date" id="transaction_date" name='transaction_date' class="form-control">
        </div>


        <div class="form-group">
          <input type="text" placeholder="Credit card number" id="credit_card" name='credit_card' class="form-control">
        </div>

         <div class="form-group">
          <input type="text" placeholder="Issuing Bank" id="issuing_bank" name='issuing_bank' class="form-control">
        </div>

    
        <button class="btn aqua block full-width bottom15" style="margin-bottom: 10px;" name="step4" type="submit">Next</button>

        <a href="http://www.gogagaholidays.com/" style="margin-top: 10px;" class="btn btn-sm btn-white btn-block">Visit Gogagaholidays.com</a>
      </form>

      <?php
          }
        }
      ?>


        <!--step4-->

      <?php

        if(isset($_GET["step"])){
          $step = $_GET["step"];
          if($step == "5"){

      ?>

      <h3>Some More Details</h3>

      <form method="post" class="top15" action="">

         <div class="form-group" style="display: none;">
          <input type="email" id="email" placeholder="Email" name='email' class="form-control" value="<?php if(isset($_GET["email"])){ echo $_GET["email"]; } ?>">
        </div>

        <!--Other Details-->
    

        <div class="form-group">
          <input type="text" placeholder="Personal Reference Name" id="personal_ref_name" name='personal_ref_name' class="form-control" autofocus>
        </div>

        <div class="form-group">
          <input type="text" placeholder="Professional Reference Name" id="professional_ref_name" name='professional_ref_name' class="form-control">
        </div>
    
        <button class="btn aqua block full-width bottom15" style="margin-bottom: 10px;" name="step5" type="submit">Next</button>

        <a href="http://www.gogagaholidays.com/" style="margin-top: 10px;" class="btn btn-sm btn-white btn-block">Visit Gogagaholidays.com</a>
      </form>

      <?php
          }
        }
      ?>




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