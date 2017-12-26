<?php
require("config.php");
session_start();
    $ref_type=$_SESSION["ref_type"];
    $ref_value=$_SESSION["ref_value"];

if (isset($_POST['submit_but'])) {

        
    $a1 = $_POST["supname"];
    $a2 = $_POST["supperc"];
    $a3 = $_POST["holiname"];
    $a4 = $_POST["holiperc"];
    $a5 = $_POST["salesname"];
    $a6 = $_POST["salesperc"];
    $b = $_POST["calc_chose"];
    $c = $_POST["meal_plan"];


    $e1=$e2=$f=$g=$h=$h1=$h2=$h3=$h4=$h5=$h6=$i1=$i2=$j="";

    if(isset($_POST["transp"]))
    if($_POST["transp"]=="yes")
    {   
        $e1=$_POST["trans_amt"];
        $e2 = $_POST["transportation"];
    }


    if($ref_type == "International")
    {

        if(isset($_POST["remittance"]))
          if ($_POST["remittance"]=="yes")
                $f = $_POST["y_remittance"];

        if(isset($_POST["visa"]))
          if ($_POST["visa"]=="yes")
                $g = $_POST["y_visa"];
        

        if(isset($_POST["cruise"]))
          if ($_POST["cruise"]=="yes")
          {
                $h = $_POST["cr_am"];
                $h1 = $_POST["sup_cr"];
                $h2 = $_POST["sup_pr"];
                $h3 = $_POST["h_cr"];
                $h4 = $_POST["h_pr"];
                $h5 = $_POST["sal_cr"];
                $h6 = $_POST["sal_pr"];
          }

        if(isset($_POST["add_services"]))
          if ($_POST["add_services"]=="yes")
          {
                $i1 = $_POST["nserv"];
                $i2 = $_POST["cserv"];
          }
    }

    if(isset($_POST["travel_insurance"]))
        if($_POST["travel_insurance"] == "yes")
            $j=$_POST["y_trav"];



    if($ref_type =="Domestic")
    {
        $sql="INSERT INTO itinerary_domestic 
        (ghrnno,supname,supperc,holiname,holiperc,salname,salperc,calc,meal,transp_amt,transp,tra_ins)
        VALUES('$ref_value','$a1','$a2','$a3','$a4','$a5','$a6','$b','$c','$e1','$e2','$j')
        ";
         if(($conn->query($sql))== true)
            {                       
                  //echo "Domestic done<br>";
            }
           


    }
    elseif($ref_type =="International")
    {
        $sql="INSERT INTO itinerary_inter(ghrno, supname, supperc, holiname, holiperc, salname, salperc, calc,
              mealplan, transp, transp_amt, remit, visa, cruise_amt, crsupname, crsupperc, crholiname, crholiperc, crsalname, crsalperc, tr_ins, add_sername, add_sercost)
        VALUES('$ref_value','$a1','$a2','$a3','$a4','$a5','$a6','$b','$c','$e2','$e1',
            '$f','$g','$h','$h1','$h2','$h3','$h4','$h5','$h6','$j','$i1','$i2')
        ";
         if(($conn->query($sql))== true)
            {                       
                  //echo "International done<br>";
            }
           


    }
    else{}
    //echo "Nothing done";


    if($ref_type == "Domestic")
    {
      $schitinerary="";
      

        $sno=1;
        if(isset($_POST['location'])){
              $cntt=1;

                    foreach ( $_POST['location'] as $key=>$location) {

                        $checkindate = $_POST['checkindate'][$key];
                        $checkoutdate = $_POST['checkoutdate'][$key];
                        $vendor = $_POST['vendor'][$key];
                        $hotel = $_POST['hotel'][$key];
                        $hotelstnd = $_POST['hotelstnd'][$key];
                        $roomstnd =$_POST['roomstnd'][$key];
                        $rooms = $_POST['rooms'][$key];
                        $nights = $_POST['nights'][$key];
                        $meal =$_POST['meall'][$key];
                        $price = $_POST['price'][$key];
                           
                        $sql = "INSERT INTO hotels_domestic (ghrno,sno,location,checkindate,checkoutdate,vendor,hotel,hotelstandard,roomstandard,rooms,nights,meal,prices) 
                            VALUES ('$ref_value',$sno,'$location','$checkindate','$checkoutdate','$vendor','$hotel','$hotelstnd','$roomstnd','$rooms','$nights','$meal','$price')";
                        if(($conn->query($sql))== true)
                        {                       
                         // echo "Hotel Domestic Done<br>";
                          $checkindate = date_create("$checkindate");
                          $cin =date_format($checkindate,"d-m-Y");
                          $checkoutdate = date_create("$checkoutdate");
                          $cout =date_format($checkoutdate,"d-m-Y");
                          $days =  strtotime($cout) - strtotime($cin);
                          $days= (int)$days/86400;
                          $datecur = $cin;
                          while ($days!=-1) {
                                             $days--;
                                             $schitinerary.="
                                                <div class ='row'>
                                                    <div class='col-md-3'>  
                                                    <label for='day'><b style='font-size:19px;color:red;'>DAY ".$cntt++." </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                                    <div class='form-group'>
                                                      <label for='ittitle'>Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='ittitle[]'  id='ittitle' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='ithotel'>Hotel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='ithotel[]'  id='ithotel' value='".$hotel."' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='itmeal'>Meal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                      <input type='text' class='form-control' name='itmeal[]'  id='itmeal' value='".$meal."' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='itdate'>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='itdate[]'  id='itdate' value='".$datecur."' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     </div>
                                                    <div class='col-md-4'>
                                                    <div class='form-group'>
                                                      <label for='itdesc'>Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='itdesc[]' id='itdesc' size='80' aria-label='...'>
                                                    </div>
                                                    </div>
                                                  </div>";
                                                $datecur = date('d-m-Y', strtotime($datecur . ' +1 day'));

                                            }

                              
                         }
                         else{}
                            //echo "Hotel Domestic Not Done<br>";

                    $sno++;
                    }

            }   

    }
    else 
    {
        if($ref_type == "International")
        {
          $schitinerary="";
          

            $sno=1;
            if(isset($_POST['location'])){
                  $cntt=1;

                    foreach ( $_POST['location'] as $key=>$location) {

                        $checkindate = $_POST['checkin'][$key];
                        $checkoutdate = $_POST['checkout'][$key];
                        $vendor = $_POST['vendor'][$key];
                        $hotel = $_POST['hotel'][$key];
                        $hotelstnd = $_POST['hotelstnd'][$key];
                        $roomstnd =$_POST['roomstnd'][$key];
                        $meal =$_POST['meall'][$key];
                        $price = $_POST['price'][$key];
                       
                    $sql = "INSERT INTO hotels_inter (ghrnno,sno,location,vendor,hotelstandard,roomstandard,hotel,checkindate,checkoutdate,meal,prices) 
                            VALUES ('$ref_value',$sno,'$location','$vendor','$hotelstnd','$roomstnd','$hotel','$checkindate','$checkoutdate','$meal','$price')";
                        if(($conn->query($sql))== true)
                        {                       
                          //echo "Hotel International Done<br>";
                          $checkindate = date_create("$checkindate");
                          $cin =date_format($checkindate,"d-m-Y");
                          $checkoutdate = date_create("$checkoutdate");
                          $cout =date_format($checkoutdate,"d-m-Y");
                          $days =  strtotime($cout) - strtotime($cin);
                          $days= (int)$days/86400;
                          $datecur = $cin;
                          while ($days!=-1) {
                                             $days--;
                                             $schitinerary.="
                                                <div class ='row'>
                                                    <div class='col-md-3'>  
                                                    <label for='day'><b style='font-size:19px;color:red;'>DAY ".$cntt++." </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                                    <div class='form-group'>
                                                      <label for='ittitle'>Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='ittitle[]'  id='ittitle' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='ithotel'>Hotel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='ithotel[]'  id='ithotel' value='".$hotel."' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='itmeal'>Meal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                      <input type='text' class='form-control' name='itmeal[]'  id='itmeal' value='".$meal."' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='itdate'>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='itdate[]'  id='itdate' value='".$datecur."' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     </div>
                                                    <div class='col-md-4'>
                                                    <div class='form-group'>
                                                      <label for='itdesc'>Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='itdesc[]' id='itdesc' size='80' aria-label='...'>
                                                    </div>
                                                    </div>
                                                  </div>";
                                                $datecur = date('d-m-Y', strtotime($datecur . ' +1 day'));

                                            }
                         }
                         else{}
                            //echo "Hotel International Not Done<br>";

                    $sno++;
                    }

            }   

     }
    
    }

   
    //This is for Flight details
    $sno=1;
    if(isset($_POST["fl_rad"]))
      $fl_rad = $_POST["fl_rad"];

    if($fl_rad == "yes")
    if(isset($_POST['airline'])){
           foreach ( $_POST['airline'] as $key=>$airline) {

                        $airport = $_POST['airport'][$key];
                        $arrdep = $_POST['arrdep'][$key];
                        $airdur = $_POST['airdur'][$key];
                        $airdates = $_POST['airdates'][$key];
                        $airtrav = $_POST['airtrav'][$key];
                        $airprice = $_POST['airprice'][$key];
                        

                        //echo "Flight $key - $airline,$airport,$arrdep,$airdur,$airdates,$airtrav,$airprice<br>";
                        //echo "$ref_value<br>";
                    $sql = "INSERT INTO flights_info (ghrno,sno,airline,airport,arrdep,airdur,airdates,airtrav,airprice) 
                            VALUES ('$ref_value',$sno,'$airline','$airport','$arrdep','$airdur','$airdates','$airtrav','$airprice')";
                        if(($conn->query($sql))== true)
                        {                       
                             // echo "Flights  Done<br>";
                        }
                        else{}
                            //echo "Flights Not Done<br>";
                            
                    $sno++;
                    }
                  }
          }








    // This section is for pending commissions

      $sql= "SELECT * FROM agent_form_data WHERE ref_num = ".$ref_value." ";
                        
        $res = $conn->query($sql);
        if ($res->num_rows) 
        {   
          if($row = $res->fetch_assoc()) 
          {
                    $clientname = $row["cust_firstname"]." ".$row["cust_lastname"];
                    $holitype =  $row["holi_type"];
                    $holidest = $row["holi_dest"];

                    $landcost = (int)$_POST["landcost"];
                    $gghperc = (int)$_POST["gghperc"];
                    $landcost = $landcost + ($gghperc * $landcost)/100;

                    $perc_agent = (int)$a2 +(int)$a4 +(int)$a6;
                    $perc_agent = ($perc_agent * $landcost)/100;

                    //echo "<br> Details: $landcost , $gghperc %<br>";
                    //echo " com det : '$ref_value',$clientname,'$holitype','$holidest','vchmon','$perc_agent','$a1','$a3','$a5' ";
                    $sql = "INSERT INTO commissions (ghrno,clientname,holitype,holidest,vchmon,commamt,sup,hol,sal) 
                            VALUES ('$ref_value','$clientname','$holitype','$holidest','month','$perc_agent','$a1','$a3','$a5')";
                        if(($conn->query($sql))== true)
                        {                       
                             // echo "Done inserting into commissions<br>";
                        }
                        else{}
                            //echo "Not done commissions<br>";

          }
        }   

// Remove itinerary from 


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Itinerary Format Design</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--CSS Tags-->
  <link rel="icon" href="images/logo_icon.png"/>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!--Script Tags-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src='js/app.js'></script>
<script src="jquery-2.2.1.js"></script>
  <script type="text/javascript">
  history.pushState({ page: 1 }, "title 1", "#nbb");
    window.onhashchange = function (event) {
        window.location.hash = "nbb";

    };
  </script>
<style type="text/css">
#imgcontent{
  display: none;
}

</style>

<script type="text/javascript">

function picked_opt(name,desc)
        {
          $('#search_image').val(name);
          $('#holidescription').val(desc);
           $('#imgcontent').hide();
        }

    $(document).ready(function(){
        //alert("sainath");
        $("#search_image").keyup(function(event){
          //alert("sainath");
            $('#imgcontent').show();

            var imgval =  $("#search_image").val();
            
          if(imgval !='')
          {
                  $.ajax({
                          type:'GET',
                          url:'itimage.php',
                          data:{img:imgval},
                          success:function(data)
                          {
                                $("#imgcontent").html(data);
                          }
                        });
           }
           else
              $('#imgcontent').hide();     


        });
       


    }); 



</script>
</head>

<body>
  <div class='container'>
    <h1>Itinerary Format Design</h1>
    <form action='ff.php' method='POST' class="form-inline" enctype="multipart/form-data">

      <fieldset class='first_set'>
        <legend>Holiday Information</legend>     
        <div class='col-md-9 col-md-push-1'>
        
          <div class ='row'>      
            <div class="form-group">
              <label for="holiarea">Enter Package Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <textarea rows='5' cols='50' class="form-control" name='holiarea' id="holiarea" aria-label="..."></textarea>
            </div>
          </div>

          <br>
         
          <div class ='row'>
              <div class="form-group">
               <label for="search_image"> Select Image &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <input type="text" class="form-control" name="search_image" size="40" id="search_image" aria-label="..."><br>

                      <br>
                      <div class='col-md-8 col-md-push-4'>
                         <ul class="list-group" id='imgcontent'>
                           
                          </ul>

                      </div>
              </div>
          </div><br>
           <div class ='row'>      
            <div class="form-group">
              <label for="holidescription">Enter Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <textarea rows='5' cols='50' class="form-control" name='holidesc' id="holidescription" aria-label="..."></textarea>
            </div>
          </div>
         
          <br>
           <div class ='row'>      
            <div class="form-group">
              <label for="pckg">Enter Package Highlights &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <textarea rows='5' cols='50' class="form-control" name='pckg' id="pckg" aria-label="..."></textarea>
            </div>
          </div>

          <br>
        </div>
      </fieldset>
      <br>

      <fieldset class='second_set'>
        <legend>Scheduled Itinerary</legend>     
        <div class='col-md-9 col-md-push-1' id='itcontainer'>
           <br>
      
          <?php echo "$schitinerary";?>
        </div>
        
        
      </fieldset>
        <br>
      <fieldset class='second_set'>
        <legend>Package Inclusion</legend>     
        <div class='col-md-9 col-md-push-1'>
          
          <div class ='row'>
            
            <div class="form-group">
              <label for="inclusion">Inclusion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <input type='text' class="form-control" name='inclusion' id="inclusion" aria-label="...">
                 <?php echo "<input type='hidden' class='form-control' name='fls' value='".$fl_rad."'  id='fls' aria-label='...'>";?>
            </div>
          </div>

          <br>
        </div>
      </fieldset>
      <br>
      
      <fieldset class='second_set'>
        <legend>Package Exclusion</legend>     
        <div class='col-md-9 col-md-push-1'>
          
          <div class ='row'>
            
            <div class="form-group">
              <label for="inclusion">Exclusion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <input type='text' class="form-control" name='exclusion' id="inclusion" aria-label="...">
            </div>
          </div>

          <br>
        </div>
      </fieldset>

       <div class='row'>
              <div class ='col-md-3 col-md-push-5'>
                <button type="submit" name='submitf' class="btn btn-primary">Submit</button>
              </div>
        </div>
            
            <br><br>

  </div>

</body>
</html>