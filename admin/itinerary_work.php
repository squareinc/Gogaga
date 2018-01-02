<?php

include "../config.php";
session_start();

if(!isset($_SESSION["userid"]))
{
  header('Location:index.php');
}
else
{
    $userid= $_SESSION["userid"];
    $type = $_SESSION["type"];
    $handle_type = $_SESSION["handle_type"];
}
if(isset($_SESSION["ref_value"]))
 {
      $ref_value=$_SESSION["ref_value"];
      $ref_type=$_SESSION["ref_type"];
      $schitinerary = "";
  } 

  $pricing_set =""; 
if(isset($_POST["submit_but"]))
{
    $pricing_set ="yes";    
    $a1 = $_POST["supname"];
    $a2 = $_POST["supperc"];
    $a3 = $_POST["holiname"];
    $a4 = $_POST["holiperc"];
    $a5 = $_POST["salesname"];
    $a6 = $_POST["salesperc"];
    $b = $_POST["calc_chose"];
    $c = $_POST["meal_plan"];

    //$landcostcalc=$gghperccalc=$flightprice=$flight_loadperc=$ser_tax_perc=$no_of_pax=9;
    $transpstatus = $remitstatus =$visastatus = $travinsstatus = $cruisestatus = $addserstatus = "";
   
    
    if(isset($_POST["landcost"]))
      $landcostcalc = $_POST["landcost"];
    if(isset($_POST["gghperc"]))
      $gghperccalc = $_POST["gghperc"];
    if(isset($_POST["flightam"]))
      $flightprice = $_POST["flightam"];
    if(isset($_POST["flight_loadperc"]))
      $flight_loadperc = $_POST["flight_loadperc"];
    if(isset($_POST["ser_tax_perc"]))
      $ser_tax_perc = $_POST["ser_tax_perc"];
    if(isset($_POST["no_of_pax"]))
      $no_of_pax = $_POST["no_of_pax"];

    
    $e1=$e2=$e3=$e4=$e5=$f=$g=$h=$h1=$h2=$h3=$h4=$h5=$h6=$i1=$i2=$j="";
    $baggagecost ="";
    if(isset($_POST["transp"]))
    if($_POST["transp"]=="yes")
    {   
        $e1=$_POST["trans_amt"];
        $e2 = $_POST["transportation"];
        $e3 = $_POST["transp_vehicle"];
        $e4 = $_POST["transp_vehicle_type"];
         $transpstatus = $_POST["transpstatus"];
         $e5 = $_POST["transp_vendor_details"];
    }
    else
    {
        $e1=0;
        $e2=$e3=$e4=$e5="";
    }
    if(isset($_POST["baggagecost"]))
            {
              $baggagecost = $_POST["baggagecost"];
            }

    if($ref_type == "International")
    {
          if(isset($_POST["currency_amount"]))
          {

          $cur_amt =$_POST["currency_amount"];
          $cur_val =$_POST["currency_value"];
          }
          else
          {
            $cur_val =$cur_amt=0;
          }

        if(isset($_POST["remittance"]))
          if ($_POST["remittance"]=="yes"){
                $f = $_POST["y_remittance"];
                $remitstatus = $_POST["remitstatus"];
               
              }

        if(isset($_POST["visa"]))
          if ($_POST["visa"]=="yes")
              {
                  $g = $_POST["y_visa"];
                   $visastatus = $_POST["visastatus"];
                  
              }
           else
                $g= 0 ;   
        

        if(isset($_POST["cruise"]))
          if ($_POST["cruise"]=="yes")
          {
                $h = $_POST["cr_am"];
                $cruisestatus = $_POST["cruisestatus"];
                $h1 = $_POST["sup_cr"];
                $h2 = $_POST["sup_pr"];
                $h3 = $_POST["h_cr"];
                $h4 = $_POST["h_pr"];
                $h5 = $_POST["sal_cr"];
                $h6 = $_POST["sal_pr"];
          }
          else
          {
              $h=$h1=$h2=$h3=$h4=$h5=$h6=0;
          }

        if(isset($_POST["add_services"]))
          if ($_POST["add_services"]=="yes")
          {
                $i1 = $_POST["nserv"];
                $i2 = $_POST["cserv"];
                $addserstatus = $_POST["addserstatus"];
              
          }
          else
          {
            $i1="";
            $i2=0;
          }
    }

    if(isset($_POST["travel_insurance"]))
        if($_POST["travel_insurance"] == "yes")
            {$j=$_POST["y_trav"];
           $travinsstatus = $_POST["travinsstatus"]; 
            
          }
         else
            $j=0; 



           $x = $landcostcalc + (($gghperccalc)/100)  * $landcostcalc;

              $y = (($a2+$a4+$a6)/100 ) * $x + $x;

              $flp =$flightprice + ($flight_loadperc/100) *$flightprice;


          //Code for calculation or price values
          if($ref_type =="International"){

              $z = (float)$y + (float)$f + (float)$g + (float)$j + ((float)$ser_tax_perc/100) * $y;

              $crk = $h +$h * (($h2+$h4+$h6)/100);
              $z= $crk +$z;
              $zflp = $z+$flp;
              //echo "<h1>TOtal cost = $z , With FLight : $zflp</h1>";
            }

            elseif($ref_type =="Domestic"){ 

              $z = (float)$y + (float)$j + ((float)$ser_tax_perc/100) * $y;

              $zflp = $z+$flp;
             // echo "<h1>TOtal cost = $z , With FLight : $zflp</h1>";
            }



 if($ref_type == "Domestic")
    {
           $sql = "DELETE FROM hotels_domestic WHERE ghrno = '".$ref_value."'";
                 if(($conn->query($sql))== true)
                  {
                  }



        $sno=1;
        if(isset($_POST['location'])){
              $cntt=1;
              $paidentry = "paid";
                    foreach ( $_POST['location'] as $key=>$location) {

                        $checkindate = $_POST['checkindate'][$key];
                        $checkoutdate = $_POST['checkoutdate'][$key];
                        $hotelstd = $_POST['hotelstd'][$key];
                        $roomstd = $_POST['roomstd'][$key];
                        $vendor = $_POST['vendor'][$key];
                        $hotel = $_POST['hotel'][$key];
                        $rooms = $_POST['rooms'][$key];
                        $nights = $_POST['nights'][$key];
                        $meal =$_POST['meall'][$key];
                        $price = $_POST['price'][$key];
                        $paidstatus = $_POST['paidstatus'][$key];
                        
                        if($paidstatus != "paid")
                        {
                          $paidentry = "unpaid";
                        }

                        if(!empty($location) || !empty($checkindate) || !empty($checkoutdate) || !empty($hotel) 
                           || !empty($meal) )

                        {  

                            $sql = "INSERT INTO hotels_domestic (ghrno,sno,location,checkindate,checkoutdate,hotelstandard,roomstandard,vendor,hotel,rooms,nights,meal,prices,status) 
                                VALUES ('$ref_value',$sno,'$location','$checkindate','$checkoutdate','$hotelstd','$roomstd','$vendor','$hotel','$rooms','$nights','$meal','$price','$paidstatus')";
                            if(($conn->query($sql))== true)
                            {                       
                             

                                  
                             }
                             else{}
                                //echo "Hotel Domestic Not Done<br>";

                        $sno++;

                        }



                    }

            }   

    }
    else 
    {
        if($ref_type == "International")
        {
            $sql = "DELETE FROM hotels_inter WHERE ghrnno = '".$ref_value."'";
                 if(($conn->query($sql))== true)
                  {
                  }

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
                        $paidstatus = $_POST['paidstatus'][$key];

                   

                        if(!empty($location) || !empty($checkindate) || !empty($checkoutdate) || !empty($hotel) || !empty($hotelstnd) || !empty($roomstnd) ||
                          !empty($meal) )

                        {  
                       
                          $sql = "INSERT INTO hotels_inter (ghrnno,sno,location,vendor,hotelstandard,roomstandard,hotel,checkindate,checkoutdate,meal,prices,status) 
                                  VALUES ('$ref_value',$sno,'$location','$vendor','$hotelstnd','$roomstnd','$hotel','$checkindate','$checkoutdate','$meal','$price','$paidstatus')";
                              if(($conn->query($sql))== true)
                              {                       
                              

                              }
                               else{}
                                  //echo "Hotel International Not Done<br>";

                          $sno++;

                      }




                    }

            }   

          }
    
    }


   
    //This is for Flight details
    $sno=1;
   
    if(isset($_POST['airline'])){

       $sql = "DELETE FROM flights_info WHERE ghrno = '".$ref_value."'";
                 if(($conn->query($sql))== true)
                  {
                  }



           foreach ( $_POST['airline'] as $key=>$airline) {

                        $airport = $_POST['airport'][$key];
                        $arrdep = $_POST['arrdep'][$key];
                        $airdur = $_POST['airdur'][$key];
                        $airdates = $_POST['airdates'][$key];
                        $airtrav = $_POST['airtrav'][$key];
                        $airprice = $_POST['airprice'][$key];
                        $flighttype = $_POST['flighttype'][$key];
                        $baggageweight = $_POST['baggageweight'][$key];
                        $baggageprice = $_POST['baggageprice'][$key];
                        $flightstatus = $_POST['flightstatus'][$key];
                   

                        if(!empty($airline) || !empty($airport) || !empty($arrdep) || !empty($airdur) || !empty($airdates) || !empty($airtrav) || !empty($airprice))

                        {  
                               
                               
                            $sql = "INSERT INTO flights_info (ghrno,sno,airline,airport,arrdep,airdur,airdates,airtrav,airprice,flightstatus,flighttype,baggageweight,baggageprice) 
                                    VALUES ('$ref_value',$sno,'$airline','$airport','$arrdep','$airdur','$airdates','$airtrav','$airprice','$flightstatus','$flighttype','$baggageweight','$baggageprice')";
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




    if($ref_type =="Domestic")
    {

          $sql="UPDATE  itinerary_domestic  SET  supname = '".$a1."', supperc = '".$a2."',
               holiname = '".$a3."', holiperc = '".$a4."', salname = '".$a5."', salperc = '".$a6."', calc = '".$b."', meal = '".$c."',
               transp = '".$e2."', transp_vehicle = '".$e3."', transp_vehicle_type = '".$e4."',transp_vendor_details =  '".$e5."', transp_amt = '".$e1."', tra_ins = '".$j."',
               landcost = '".$landcostcalc."' , gghperc ='".$gghperccalc."',
               flightprice ='".$flightprice."',flight_loadperc='".$flight_loadperc."',baggagecost='".$baggagecost."',ser_tax_perc='".$ser_tax_perc."',
               no_of_pax='',totcost = '".$z."',totcostfl ='".$zflp."',travinsstatus ='".$travinsstatus."',
               transpstatus ='".$transpstatus."'         
               WHERE ghrnno = '".$ref_value."'

        ";
        //370 line error
         if(($conn->query($sql))== true)
            {                       

            }






    }
    elseif($ref_type =="International")
    {

        
            $sql="UPDATE  itinerary_inter  SET  currency_amount =  '".$cur_amt."',
                 currency_value =  '".$cur_val."', supname =  '".$a1."', supperc =  '".$a2."', holiname =  '".$a3."', holiperc =  '".$a4."',
                 salname =  '".$a5."', salperc =  '".$a6."', calc =  '".$b."', mealplan =  '".$c."', transp =  '".$e2."',
                 transp_vehicle_type =  '".$e4."', transp_vehicle =  '".$e3."', transp_vendor_details =  '".$e5."', transp_amt =  '".$e1."', remit =  '".$f."',
                 visa =  '".$g."', cruise_amt =  '".$h."', crsupname =  '".$h1."', crsupperc =  '".$h2."', crholiname =  '".$h3."', crholiperc =  '".$h4."',
                 crsalname =  '".$h5."', crsalperc =  '".$h6."', tr_ins =  '".$j."', add_sername =  '".$i1."', add_sercost =  '".$i2."' ,
                 landcost = '".$landcostcalc."' , gghperc ='".$gghperccalc."',
                 flightprice ='".$flightprice."',
                 flight_loadperc='".$flight_loadperc."',baggagecost='".$baggagecost."',ser_tax_perc='".$ser_tax_perc."',
                 no_of_pax='' ,totcost = '".$z."',totcostfl ='".$zflp."' ,
                 travinsstatus ='".$travinsstatus."',transpstatus ='".$transpstatus."',visastatus ='".$visastatus."',remitstatus ='".$remitstatus."',
                 cruisestatus ='".$cruisestatus."',addserstatus ='".$addserstatus."'      
                 WHERE ghrno = '".$ref_value."'


        ";
         if(($conn->query($sql))== true)
            {                       

            }
            
    

    }
    else{}
    //echo "Nothing done";

   

          }





/*


    // This section is for pending commissions

      $sql= "SELECT * FROM agent_form_data WHERE ref_num = '".$ref_value."' ";
                        
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
*/







?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Itinerary Work</title>

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

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/paper/bootstrap.min.css">

<!--custom CSS-->
<link rel="stylesheet" type="text/css" href="../css/custom2.css">

<script type="text/javascript" src='js/itinerary_work.js'></script>

<script type="text/javascript" src='js/app.js'></script>
<script type="text/javascript" src='js/itinerary_ang.js'></script>

<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>

<script type="text/javascript">
  var counter = 0;

$(function(){


 $('#add_field').click(function(e){

  e.preventDefault();
 counter += 1;
 $('#container').append('<tr style="font-size:11px;">'
                               +'<td><input type="text" name="location[]" size="10"></td>'
                               +'<td><input type="text" class="pull-right" style="background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;" name="checkindate[]" placeholder="2017-09-17" size="10" ></td>'
                               +'<td><input type="text" class="pull-right" style="background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;"  name="checkoutdate[]" placeholder="2017-10-27" size="10"></td>'
                               +'<td><input type="text" name="vendor[]"size="10"></td>'
                               +'<td><input type="text" name="hotel[]" size="10"></td>'
                               +'<td><input type="text" name="hotelstd[]" size="10"></td>'
                               +'<td><input type="text" name="roomstd[]" size="10"></td>'
                               +'<td><input type="text" name="rooms[]" size="2"></td>'
                               +'<td><input type="text" name="nights[]" size="2"></td>'
                          +'<td><input type="text" name="price[]" size="8"></td>'
                                +'<td>'
                                   +' <select name="paidstatus[]" style="color:white;background-color:blue;">'
                                     +' <option>unpaid</option>'
                                     +' <option>paid</option>'
                                   +' </select>  '
                              +'</td>'
                                     + '<td>'
                                    + ' <select name="meall[]" class="hidden">'
                                     + '<option>Breakfast,Lunch, Dinner</option>'
                                      + '<option>No Breakfast, Lunch, Dinner</option>'
                                      + '<option>Breakfast, No Lunch, Dinner</option>'
                                      + '<option>Breakfast, Lunch, No Dinner</option>'
                                      + '<option>No Breakfast, No Lunch, Dinner</option>'
                                      + '<option>Breakfast, No Lunch, No Dinner</option>'
                                      + '<option>No Breakfast, Lunch, No Dinner</option>'
                                      + '<option>No Breakfast, No Lunch, No Dinner</option>'
                                    + ' </select>  '
                               +'</td>'
                                  +'</tr>'
 );


 });


 $('#add_fieldair').click(function(e){
  e.preventDefault();
 counter += 1;
 $('#contair').append('<tr style="font-size:11px;">'
                               +'<td><select name="flighttype[]" class="flighttype"><option value="" selected>Please select</option><option value="oneway">One Way</option><option value="return">Return</option></select></td>'
                               +'<td><input type="text" name="airline[]" size="10"></td>'
                               +'<td><input type="text" name="airport[]" size="10"></td>'
                               +'<td><input type="text" name="arrdep[]"size="30"></td>'
                               +'<td><input type="text" name="airdur[]" size="5"></td>'
                               +'<td><input type="text" class="pull-right" style="background: #fff; cursor: pointer; width: 100%; margin-bottom: 10px;" name="airdates[]" size="15"></td>'
                               +'<td><input type="text" name="airtrav[]" size="7"></td>'
                               +'<td><input type="text" placeholder="Enter Price in INR" name="airprice[]" size="15"></td>'
                               +'<td><input type="text" placeholder="Baggage Weight" name="baggageweight[]" size="5"></td>'
                               +'<td><input type="text" placeholder="Baggage Price" name="baggageprice[]" size="6"></td>'
                               +' <td>'
                                  +' <select name="flightstatus[]" style="color:white;background-color:blue;">'
                                   +' <option>unpaid</option>'
                                    +'<option>paid</option>'
                                   +'</select>'
                              +'</td>'
                             +'</tr>'
 );

 });


 $('#add_fieldi').click(function(e){
  e.preventDefault();
 counter += 1;
 $('#containeri').append(
                              '<tr style="font-size:11px;">'
                               +'<td><input type="text" name="location[]" size="10"></td>'
                               +'<td><input type="text" name="vendor[]" size="10"></td>'
                               +'<td><input type="text" name="hotel[]" size="16"></td>'
                               +'<td><input type="text" name="hotelstnd[]"size="7"></td>'
                               +'<td><input type="text" name="roomstnd[]" size="7"></td>'
                               +'<td><input type="text" class="pull-right" style="background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;"  name="checkin[]" placeholder="2017-09-01" size="7"></td>'
                               +'<td><input type="text" class="pull-right" style="background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;"  name="checkout[]" placeholder="2017-09-21" size="7"></td>'
                               +'<td><input type="text" name="price[]" size="8"></td>'
                                +'<td>'
                                   +' <select name="paidstatus[]" style="color:white;background-color:blue;">'
                                     +' <option>unpaid</option>'
                                     +' <option>paid</option>'
                                   +' </select>  '
                              +'</td>'
                                     + '<td>'
                                    + ' <select name="meall[]" class="hidden">'
                                     + '<option>Breakfast,Lunch, Dinner</option>'
                                      + '<option>No Breakfast, Lunch, Dinner</option>'
                                      + '<option>Breakfast, No Lunch, Dinner</option>'
                                      + '<option>Breakfast, Lunch, No Dinner</option>'
                                      + '<option>No Breakfast, No Lunch, Dinner</option>'
                                      + '<option>Breakfast, No Lunch, No Dinner</option>'
                                      + '<option>No Breakfast, Lunch, No Dinner</option>'
                                      + '<option>No Breakfast, No Lunch, No Dinner</option>'
                                    + ' </select>  '
                               +'</td>'
                                  +'</tr>'

 );

 });

});
</script>



  </head>
<body >

  <?php
      include "navbar.php";
    ?>


      
              
 <?php 
 if(isset($_SESSION["ref_value"]))
 {
      $ref_value=$_SESSION["ref_value"];
      $ref_type=$_SESSION["ref_type"];
      echo "
           <div class='panel panel-primary'>
           <div class='panel-heading'>
            Reference number :  GHRN".(5000+$ref_value)."
           </div>
           <div class='panel-body'>
                Type :  ".$ref_type."
           </div>
           </div>
          " ;

          //Code for selecting the data of ref_num from itinerary tables

          $hotel_content = "";
      if($ref_type == "International")
      {
             $sql= "SELECT * FROM itinerary_inter WHERE ghrno = '$ref_value' ";
             $res = $conn->query($sql);
            if ($res->num_rows) 
             {
              if($row = $res->fetch_assoc()) 
                {
                  $ghrno =$row["ghrno"];
                  $currency_amount = $row["currency_amount"];
                  $currency_value = $row["currency_value"];
                  $supname =  $row["supname"];
                  $supperc =  $row["supperc"];
                  $holiname =   $row["holiname"];
                  $holiperc =  $row["holiperc"];
                  $salname =  $row["salname"];
                  $salperc =   $row["salperc"];

                  $calc =   $row["calc"];
                  $meal =  $row["mealplan"];
                  $transp =  $row["transp"];
                  $tvtype =  $row["transp_vehicle_type"];
                  $transp_vehicle =  $row["transp_vehicle"];
                  $transp_vendor_details = $row["transp_vendor_details"];
                  $transp_amt =  $row["transp_amt"];
                  
                  $baggagecost = $row["baggagecost"];

                  $remit =   $row["remit"];
                  $visa =   $row["visa"];
                  $cruise_amt =   $row["cruise_amt"];
                  if(!empty($cruise_amt)){
                        $crsupname =   $row["crsupname"];
                        $crsupperc =   $row["crsupperc"];
                        $crholiname =   $row["crholiname"];
                        $crholiperc =   $row["crholiperc"];
                        $crsalname =   $row["crsalname"];
                        $crsalperc =   $row["crsalperc"];  
                  }
                  else
                  {
                        $crsupname = "";
                        $crsupperc = "0";
                        $crholiname = "";
                        $crholiperc ="0";
                        $crsalname = "";
                        $crsalperc = "0"; 

                  }
                  
                  $add_sername =   $row["add_sername"];
                  $add_sercost =   $row["add_sercost"];
                  $tra_ins =   $row["tr_ins"];
                  $transpstatus =  $row["transpstatus"];
                  $travinsstatus =  $row["travinsstatus"];

                  $landcostcalc =  $row["landcost"];
                  $gghperccalc =   $row["gghperc"];
                  $flightprice =   $row["flightprice"];
                  $flight_loadperc =  $row["flight_loadperc"];
                  $ser_tax_perc =  $row["ser_tax_perc"];
                  $no_of_pax =  $row["no_of_pax"];
                  /*echo "<h1>LANDCOST : $landcostcalc , GGHPERC :$gghperccalc , FLIGHTPRICE :$flightprice<br>

                    FLIGHT LOAD PRICE :$flight_loadperc , SERVICE TAX : $ser_tax_perc , NO OF PAX : $no_of_pax<br></h1>
                  ";*/



                }

             } 
             
             $sql = "SELECT * FROM hotels_inter WHERE ghrnno = '$ref_value' ORDER BY sno";

              $res = $conn->query($sql) ;
              if ($res->num_rows) 
              {   $hotel_price = 0;  
                 while($row = $res->fetch_assoc()) 
                 {         $mealplanhotel = $row["meal"];
                          $m_0=$m_1=$m_2=$m_3=$m_4=$m_5=$m_6=$m_7="";
                          if($mealplanhotel == "Breakfast,Lunch, Dinner")
                              $m_0 ="selected";
                          elseif($mealplanhotel == "No Breakfast, Lunch, Dinner")
                              $m_1 ="selected";
                          elseif($mealplanhotel == "Breakfast, No Lunch, Dinner")
                              $m_2 ="selected";
                          elseif($mealplanhotel == "Breakfast, Lunch, No Dinner")
                              $m_3 ="selected";
                            elseif($mealplanhotel == "No Breakfast, No Lunch, Dinner")
                              $m_4 ="selected";
                            elseif($mealplanhotel == "Breakfast, No Lunch, No Dinner")
                              $m_5 ="selected";
                            elseif($mealplanhotel == "No Breakfast, Lunch, No Dinner")
                              $m_6 ="selected";
                            elseif($mealplanhotel == "No Breakfast, No Lunch, No Dinner")
                              $m_7 ="selected";
                            else{}

                        $st_0 =$st_1 ="";
                          $paystat = $row["status"]; 
                          $colorHotel = "";
                          if($paystat == "paid"){
                            $st_0 = "selected";
                            $colorHotel = "background-color: #4CAF50;color: white;padding: 3px;";
                          }
                          else{
                            $st_1 = "selected";
                            $colorHotel = "background-color: #F44336;color: white;padding: 3px;";
                          }



                            $hotel_price  = $hotel_price + (int)$row["prices"];
                        $hotel_content.="
                                 <tr style='font-size:11px;'>
                               <td><input type='text' name='location[]' size='10' value='".$row["location"]."' ></td>
                               <td><input type='text' name='vendor[]' size='10' value='".$row["vendor"]."' ></td>
                               <td><input type='text' name='hotel[]' size='16' value='".$row["hotel"]."' ></td>
                               <td><input type='text' name='hotelstnd[]' value='".$row["hotelstandard"]."' size='7'></td>
                               <td><input type='text' name='roomstnd[]'  value='".$row["roomstandard"]."'size='7'></td>
                               <td><input type='text' class='pull-right' style='background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;'  name='checkin[]'  value='".$row["checkindate"]."'value='".$row["location"]."' size='7' ></td>
                               <td><input type='text' class='pull-right' style='background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;'  name='checkout[]' size='7'value='".$row["checkoutdate"]."' ></td>
                                
                               <td><input type='text' name='price[]' value='".$row["prices"]."' size='8'></td>
                              <td>
                                           <select name='paidstatus[]' style='$colorHotel'>
                                                <option ".$st_0.">paid</option>
                                                <option ".$st_1.">unpaid</option>
                                           </select>  
                              </td>
                              <td>
                                <select name='meall[]' class='hidden'>
                                               <option ".$m_0.">Breakfast,Lunch, Dinner</option>
                                                <option ".$m_1.">No Breakfast, Lunch, Dinner</option>
                                                <option ".$m_2.">Breakfast, No Lunch, Dinner</option>
                                                <option ".$m_3.">Breakfast, Lunch, No Dinner</option>
                                                <option ".$m_4.">No Breakfast, No Lunch, Dinner</option>
                                                <option ".$m_5.">Breakfast, No Lunch, No Dinner</option>
                                                <option ".$m_6.">No Breakfast, Lunch, No Dinner</option>
                                                <option ".$m_7.">No Breakfast, No Lunch, No Dinner</option>>
                                 </select>   
                                </td>
                             </tr>

                        ";


                  }
                  $hotel_price  = $hotel_price + (int)$transp_amt;
              }

      }
      elseif($ref_type == "Domestic")
      {
             $sql= "SELECT * FROM itinerary_domestic WHERE ghrnno = '$ref_value' ";
             $res = $conn->query($sql);
            if ($res->num_rows) 
             { $hotel_price = 0;
              if($row = $res->fetch_assoc()) 
                {
                  $ghrno =$row["ghrnno"];
                  $supname =  $row["supname"];
                  $supperc =  $row["supperc"];
                  $holiname =   $row["holiname"];
                  $holiperc =  $row["holiperc"];
                  $salname =  $row["salname"];
                  $salperc =   $row["salperc"];
                  $calc =   $row["calc"];
                  $meal =  $row["meal"];
                  $transp =  $row["transp"];
                  $tvtype =  $row["transp_vehicle_type"];
                  $transp_vehicle =  $row["transp_vehicle"];
                  $transp_vendor_details = $row["transp_vendor_details"];
                  $transp_amt =  $row["transp_amt"];
                  $tra_ins =   $row["tra_ins"];
                  $transpstatus =  $row["transpstatus"];
                  $travinsstatus =  $row["travinsstatus"];

                  $baggagecost = $row["baggagecost"];

                  $landcostcalc =  $row["landcost"];
                  $gghperccalc =   $row["gghperc"];
                  $flightprice =   $row["flightprice"];
                  $flight_loadperc =  $row["flight_loadperc"];
                  $ser_tax_perc =  $row["ser_tax_perc"];
                  $no_of_pax =  $row["no_of_pax"];

                  /*echo "<h1>LANDCOST : $landcostcalc , GGHPERC :$gghperccalc , FLIGHTPRICE :$flightprice<br>

                    FLIGHT LOAD PRICE :$flight_loadperc , SERVICE TAX : $ser_tax_perc , NO OF PAX : $no_of_pax<br></h1>
                  ";
                  */
                }

             } 
               $sql = "SELECT * FROM hotels_domestic WHERE ghrno = '$ref_value' ORDER BY sno";

                $res = $conn->query($sql) ;
                if ($res->num_rows) 
                {    
                   while($row = $res->fetch_assoc()) 
                   {      $mealplanhotel = $row["meal"];
                          $m_0=$m_1=$m_2=$m_3=$m_4=$m_5=$m_6=$m_7="";
                          if($mealplanhotel == "Breakfast,Lunch, Dinner")
                              $m_0 ="selected";
                          elseif($mealplanhotel == "No Breakfast, Lunch, Dinner")
                              $m_1 ="selected";
                          elseif($mealplanhotel == "Breakfast, No Lunch, Dinner")
                              $m_2 ="selected";
                          elseif($mealplanhotel == "Breakfast, Lunch, No Dinner")
                              $m_3 ="selected";
                            elseif($mealplanhotel == "No Breakfast, No Lunch, Dinner")
                              $m_4 ="selected";
                            elseif($mealplanhotel == "Breakfast, No Lunch, No Dinner")
                              $m_5 ="selected";
                            elseif($mealplanhotel == "No Breakfast, Lunch, No Dinner")
                              $m_6 ="selected";
                            elseif($mealplanhotel == "No Breakfast, No Lunch, No Dinner")
                              $m_7 ="selected";
                            else
                            {}
                          $st_0 =$st_1 ="";
                          $colorHotel = "";
                          $paystat = $row["status"]; 
                          if($paystat == "paid"){
                            $st_0 = "selected";
                            $colorHotel = "background-color: #4CAF50;color: white;padding: 3px;";
                          }
                          else{
                            $st_1 = "selected";
                            $colorHotel = "background-color: #F44336;color: white;padding: 3px;";
                          }





                            $hotel_price  = $hotel_price + (int)$row["prices"];

                          $hotel_content.="
                                    <tr style='font-size:11px;'>
                                         <td><input type='text' name='location[]' size='10' value='".$row["location"]."'></td>
                                         <td><input type='text' class='pull-right' style='background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;'  name='checkindate[]' value='".$row["checkindate"]."' size='10' ></td>
                                         <td><input type='text' class='pull-right' style='background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;'  name='checkoutdate[]' value='".$row["checkoutdate"]."' size='10' ></td>
                                         <td><input type='text' name='vendor[]' value='".$row["vendor"]."' size='10' ></td>
                                         <td><input type='text' name='hotel[]' value='".$row["hotel"]."' size='10' ></td>
                                         <td><input type='text' name='hotelstd[]' value='".$row["hotelstandard"]."' size='10' ></td>
                                         <td><input type='text' name='roomstd[]' value='".$row["roomstandard"]."' size='10' ></td>
                                         <td><input type='text' name='rooms[]' value='".$row["rooms"]."' size='2' ></td>
                                         <td><input type='text' name='nights[]' value='".$row["nights"]."' size='2' ></td>
                                          
                                         <td><input type='text'  name='price[]' value='".$row["prices"]."' size='3'></td>
                                         <td>
                                           <select name='paidstatus[]' style='$colorHotel'>
                                                <option ".$st_0.">paid</option>
                                                <option ".$st_1.">unpaid</option>
                                           </select>  
                                          </td>
                                          <td>
                                           <select name='meall[]' class='hidden'>
                                                <option ".$m_0.">Breakfast,Lunch, Dinner</option>
                                                <option ".$m_1.">No Breakfast, Lunch, Dinner</option>
                                                <option ".$m_2.">Breakfast, No Lunch, Dinner</option>
                                                <option ".$m_3.">Breakfast, Lunch, No Dinner</option>
                                                <option ".$m_4.">No Breakfast, No Lunch, Dinner</option>
                                                <option ".$m_5.">Breakfast, No Lunch, No Dinner</option>
                                                <option ".$m_6.">No Breakfast, Lunch, No Dinner</option>
                                                <option ".$m_7.">No Breakfast, No Lunch, No Dinner</option>
                                           </select>  
                                          </td>
                                         
                                </tr>

                          ";





                    }
                    $hotel_price  = $hotel_price + (int)$transp_amt;
                }














      }
      else
      {

      }





$flight_content="";

$flight_price=0;

 $sql = "SELECT * FROM flights_info WHERE ghrno = '$ref_value' ORDER BY sno";

                $res = $conn->query($sql) ;
                if ($res->num_rows) 
                {     
                   while($row = $res->fetch_assoc()) 
                   {      

                        $flight_price = $flight_price + $row["airprice"];
                        $baggagecost = $baggagecost + $row["baggageprice"];
                        $onewaySelected = "";
                        $returnSelected = "";
                        $flighttype = $row["flighttype"];
                        if($flighttype == "oneway"){
                          //oneway should be selected
                          $onewaySelected = "selected";

                        }else if($flighttype == "return"){
                          //return should be selected
                          $returnSelected = "selected";
                        }else{

                        }
                        $sft_0 =$sft_1 ="";
                          $paystat = $row["flightstatus"]; 
                          $colorFlights = "";
                          if($paystat == "paid"){
                            $sft_0 = "selected";
                            $colorFlights = "background-color: #4CAF50;color: white;padding: 3px;";
                          }
                          else{
                            $sft_1 = "selected";
                            $colorFlights = "background-color: #F44336;color: white;padding: 3px;";
                          }



                          $flight_content.="
                                    <tr style='font-size:11px;'>
                                    <td><select name='flighttype[]' class='flighttype'><option value='' disabled>Please select</option><option value='oneway' ".$onewaySelected.">One Way</option><option value='return' ".$returnSelected.">Return</option></select></td>
                                             <td><input type='text' name='airline[]' value='".$row["airline"]."' size='10'></td>
                                             <td><input type='text' name='airport[]' value='".$row["airport"]."' size='10'></td>
                                             <td><input type='text' name='arrdep[]' value='".$row["arrdep"]."' size='30'></td>
                                             <td><input type='text' name='airdur[]' value='".$row["airdur"]."' size='5'></td>
                                             <td><input type='text' class='pull-right' style='background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;' name='airdates[]' value='".$row["airdates"]."' size='15'></td>
                                             <td><input type='text' name='airtrav[]' value='".$row["airtrav"]."' size='7'></td>
                                             <td><input type='text' name='airprice[]' value='".$row["airprice"]."' size='15'></td>
                                             <td><input type='text' name='baggageweight[]' value='".$row["baggageweight"]."' size='5'></td>
                                             <td><input type='text' name='baggageprice[]' value='".$row["baggageprice"]."' size='6'></td>

                                             <td><select name='flightstatus[]' style='$colorFlights'>
                                                 <option ".$sft_0.">paid</option>
                                                <option ".$sft_1.">unpaid</option>
                                                </select></td>
                                   </tr>

                          ";


                    }
                }







  }
  ?>   

                 

  <div class='col-md-12'>
        
        

 <?php 
 if($ref_type=="International")
 {
 

 echo '<fieldset class="first_set">
  <p class="lineheading">Currency Calculator</p>
  <div class="col-md-9 col-md-push-1">
  <form method="post" id="currency-form">     
    <div class="form-group">
    <label><b>From&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
      <select name="from_currency">
        <option value="INR">Indian Rupee</option>
        <option value="USD" selected="1">US Dollar</option>
        <option value="AUD">Australian Dollar</option>
        <option value="EUR">Euro</option>
        <option value="EGP">Egyptian Pound</option>
        <option value="CNY">Chinese Yuan</option>
          <option value="INR">Indian Rupee</option><option value="USD" selected="1">US Dollar</option><option value="AFA">Afghan Afghani</option><option value="ALL">Albanian Lek</option><option value="DZD">Algerian Dinar</option><option value="AOA">Angolan Kwanza</option><option value="ARS">Argentine Peso</option><option value="AMD">Armenian Dram</option><option value="AWG">Aruban Florin</option><option value="AUD">Australian Dollar</option><option value="AZN">Azerbaijani Manat</option><option value="BSD">Bahamian Dollar</option><option value="BHD">Bahraini Dinar</option><option value="BDT">Bangladeshi Taka</option><option value="BBD">Barbadian Dollar</option><option value="BYR">Belarusian Ruble</option><option value="BEF">Belgian Franc</option><option value="BZD">Belize Dollar</option><option value="BMD">Bermudan Dollar</option><option value="BTN">Bhutanese Ngultrum</option><option value="BTC">Bitcoin</option><option value="BOB">Bolivian Boliviano</option><option value="BAM">Bosnia-Herzegovina Convertible Mark</option><option value="BWP">Botswanan Pula</option><option value="BRL">Brazilian Real</option><option value="GBP">British Pound</option><option value="BND">Brunei Dollar</option><option value="BGN">Bulgarian Lev</option><option value="BIF">Burundian Franc</option><option value="KHR">Cambodian Riel</option><option value="CAD">Canadian Dollar</option><option value="CVE">Cape Verdean Escudo</option><option value="KYD">Cayman Islands Dollar</option><option value="XAF">Central African CFA Franc</option><option value="XPF">CFP Franc</option><option value="CLP">Chilean Peso</option><option value="CNY">Chinese Yuan</option><option value="COP">Colombian Peso</option><option value="KMF">Comorian Franc</option><option value="CDF">Congolese Franc</option><option value="CRC">Costa Rican Col�n</option><option value="HRK">Croatian Kuna</option><option value="CUC">Cuban Convertible Peso</option><option value="CZK">Czech Republic Koruna</option><option value="DKK">Danish Krone</option><option value="DJF">Djiboutian Franc</option><option value="DOP">Dominican Peso</option><option value="XCD">East Caribbean Dollar</option><option value="EGP">Egyptian Pound</option><option value="ERN">Eritrean Nakfa</option><option value="EEK">Estonian Kroon</option><option value="ETB">Ethiopian Birr</option><option value="EUR">Euro</option><option value="FKP">Falkland Islands Pound</option><option value="FJD">Fijian Dollar</option><option value="GMD">Gambian Dalasi</option><option value="GEL">Georgian Lari</option><option value="DEM">German Mark</option><option value="GHS">Ghanaian Cedi</option><option value="GIP">Gibraltar Pound</option><option value="GRD">Greek Drachma</option><option value="GTQ">Guatemalan Quetzal</option><option value="GNF">Guinean Franc</option><option value="GYD">Guyanaese Dollar</option><option value="HTG">Haitian Gourde</option><option value="HNL">Honduran Lempira</option><option value="HKD">Hong Kong Dollar</option><option value="HUF">Hungarian Forint</option><option value="ISK">Icelandic Kr�na</option><option value="IDR">Indonesian Rupiah</option><option value="IRR">Iranian Rial</option><option value="IQD">Iraqi Dinar</option><option value="ILS">Israeli New Sheqel</option><option value="ITL">Italian Lira</option><option value="JMD">Jamaican Dollar</option><option value="JPY">Japanese Yen</option><option value="JOD">Jordanian Dinar</option><option value="KZT">Kazakhstani Tenge</option><option value="KES">Kenyan Shilling</option><option value="KWD">Kuwaiti Dinar</option><option value="KGS">Kyrgystani Som</option><option value="LAK">Laotian Kip</option><option value="LVL">Latvian Lats</option><option value="LBP">Lebanese Pound</option><option value="LSL">Lesotho Loti</option><option value="LRD">Liberian Dollar</option><option value="LYD">Libyan Dinar</option><option value="LTL">Lithuanian Litas</option><option value="MOP">Macanese Pataca</option><option value="MKD">Macedonian Denar</option><option value="MGA">Malagasy Ariary</option><option value="MWK">Malawian Kwacha</option><option value="MYR">Malaysian Ringgit</option><option value="MVR">Maldivian Rufiyaa</option><option value="MRO">Mauritanian Ouguiya</option><option value="MUR">Mauritian Rupee</option><option value="MXN">Mexican Peso</option><option value="MDL">Moldovan Leu</option><option value="MNT">Mongolian Tugrik</option><option value="MAD">Moroccan Dirham</option><option value="MZM">Mozambican Metical</option><option value="MMK">Myanmar Kyat</option><option value="NAD">Namibian Dollar</option><option value="NPR">Nepalese Rupee</option><option value="ANG">Netherlands Antillean Guilder</option><option value="TWD">New Taiwan Dollar</option><option value="NZD">New Zealand Dollar</option><option value="NIO">Nicaraguan C�rdoba</option><option value="NGN">Nigerian Naira</option><option value="KPW">North Korean Won</option><option value="NOK">Norwegian Krone</option><option value="OMR">Omani Rial</option><option value="PKR">Pakistani Rupee</option><option value="PAB">Panamanian Balboa</option><option value="PGK">Papua New Guinean Kina</option><option value="PYG">Paraguayan Guarani</option><option value="PEN">Peruvian Nuevo Sol</option><option value="PHP">Philippine Peso</option><option value="PLN">Polish Zloty</option><option value="QAR">Qatari Rial</option><option value="RON">Romanian Leu</option><option value="RUB">Russian Ruble</option><option value="RWF">Rwandan Franc</option><option value="SVC">Salvadoran Col�n</option><option value="WST">Samoan Tala</option><option value="SAR">Saudi Riyal</option><option value="RSD">Serbian Dinar</option><option value="SCR">Seychellois Rupee</option><option value="SLL">Sierra Leonean Leone</option><option value="SGD">Singapore Dollar</option><option value="SKK">Slovak Koruna</option><option value="SBD">Solomon Islands Dollar</option><option value="SOS">Somali Shilling</option><option value="ZAR">South African Rand</option><option value="KRW">South Korean Won</option><option value="XDR">Special Drawing Rights</option><option value="LKR">Sri Lankan Rupee</option><option value="SHP">St. Helena Pound</option><option value="SDG">Sudanese Pound</option><option value="SRD">Surinamese Dollar</option><option value="SZL">Swazi Lilangeni</option><option value="SEK">Swedish Krona</option><option value="CHF">Swiss Franc</option><option value="SYP">Syrian Pound</option><option value="STD">S�o Tome Pr�ncipe Dobra</option><option value="TJS">Tajikistani Somoni</option><option value="TZS">Tanzanian Shilling</option><option value="THB">Thai Baht</option><option value="TOP">Tongan Pa?anga</option><option value="TTD">Trinidad Tobago Dollar</option><option value="TND">Tunisian Dinar</option><option value="TRY">Turkish Lira</option><option value="TMT">Turkmenistani Manat</option><option value="UGX">Ugandan Shilling</option><option value="UAH">Ukrainian Hryvnia</option><option value="AED">United Arab Emirates Dirham</option><option value="UYU">Uruguayan Peso</option><option value="UZS">Uzbekistani Som</option><option value="VUV">Vanuatu Vatu</option><option value="VEF">Venezuelan Bol�var</option><option value="VND">Vietnamese Dong</option><option value="XOF">West African CFA Franc</option><option value="YER">Yemeni Rial</option><option value="ZMK">Zambian Kwacha</option>
      </select> <br>
      <label><b>Amount</b></label> 
      <input type="text" placeholder="Currency" name="amount" id="amount" required />  <br>    
      <label><b>To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
      <select name="to_currency">
        <option value="INR" selected="1">Indian Rupee</option>
        <option value="USD">US Dollar</option>
        <option value="AUD">Australian Dollar</option>
        <option value="EUR">Euro</option>
        <option value="EGP">Egyptian Pound</option>
        <option value="CNY">Chinese Yuan</option>
        <option value="INR" selected="1">Indian Rupee</option><option value="USD">US Dollar</option><option value="AFA">Afghan Afghani</option><option value="ALL">Albanian Lek</option><option value="DZD">Algerian Dinar</option><option value="AOA">Angolan Kwanza</option><option value="ARS">Argentine Peso</option><option value="AMD">Armenian Dram</option><option value="AWG">Aruban Florin</option><option value="AUD">Australian Dollar</option><option value="AZN">Azerbaijani Manat</option><option value="BSD">Bahamian Dollar</option><option value="BHD">Bahraini Dinar</option><option value="BDT">Bangladeshi Taka</option><option value="BBD">Barbadian Dollar</option><option value="BYR">Belarusian Ruble</option><option value="BEF">Belgian Franc</option><option value="BZD">Belize Dollar</option><option value="BMD">Bermudan Dollar</option><option value="BTN">Bhutanese Ngultrum</option><option value="BTC">Bitcoin</option><option value="BOB">Bolivian Boliviano</option><option value="BAM">Bosnia Herzegovina Convertible Mark</option><option value="BWP">Botswanan Pula</option><option value="BRL">Brazilian Real</option><option value="GBP">British Pound</option><option value="BND">Brunei Dollar</option><option value="BGN">Bulgarian Lev</option><option value="BIF">Burundian Franc</option><option value="KHR">Cambodian Riel</option><option value="CAD">Canadian Dollar</option><option value="CVE">Cape Verdean Escudo</option><option value="KYD">Cayman Islands Dollar</option><option value="XAF">Central African CFA Franc</option><option value="XPF">CFP Franc</option><option value="CLP">Chilean Peso</option><option value="CNY">Chinese Yuan</option><option value="COP">Colombian Peso</option><option value="KMF">Comorian Franc</option><option value="CDF">Congolese Franc</option><option value="CRC">Costa Rican Col�n</option><option value="HRK">Croatian Kuna</option><option value="CUC">Cuban Convertible Peso</option><option value="CZK">Czech Republic Koruna</option><option value="DKK">Danish Krone</option><option value="DJF">Djiboutian Franc</option><option value="DOP">Dominican Peso</option><option value="XCD">East Caribbean Dollar</option><option value="EGP">Egyptian Pound</option><option value="ERN">Eritrean Nakfa</option><option value="EEK">Estonian Kroon</option><option value="ETB">Ethiopian Birr</option><option value="EUR">Euro</option><option value="FKP">Falkland Islands Pound</option><option value="FJD">Fijian Dollar</option><option value="GMD">Gambian Dalasi</option><option value="GEL">Georgian Lari</option><option value="DEM">German Mark</option><option value="GHS">Ghanaian Cedi</option><option value="GIP">Gibraltar Pound</option><option value="GRD">Greek Drachma</option><option value="GTQ">Guatemalan Quetzal</option><option value="GNF">Guinean Franc</option><option value="GYD">Guyanaese Dollar</option><option value="HTG">Haitian Gourde</option><option value="HNL">Honduran Lempira</option><option value="HKD">Hong Kong Dollar</option><option value="HUF">Hungarian Forint</option><option value="ISK">Icelandic Kr�na</option><option value="IDR">Indonesian Rupiah</option><option value="IRR">Iranian Rial</option><option value="IQD">Iraqi Dinar</option><option value="ILS">Israeli New Sheqel</option><option value="ITL">Italian Lira</option><option value="JMD">Jamaican Dollar</option><option value="JPY">Japanese Yen</option><option value="JOD">Jordanian Dinar</option><option value="KZT">Kazakhstani Tenge</option><option value="KES">Kenyan Shilling</option><option value="KWD">Kuwaiti Dinar</option><option value="KGS">Kyrgystani Som</option><option value="LAK">Laotian Kip</option><option value="LVL">Latvian Lats</option><option value="LBP">Lebanese Pound</option><option value="LSL">Lesotho Loti</option><option value="LRD">Liberian Dollar</option><option value="LYD">Libyan Dinar</option><option value="LTL">Lithuanian Litas</option><option value="MOP">Macanese Pataca</option><option value="MKD">Macedonian Denar</option><option value="MGA">Malagasy Ariary</option><option value="MWK">Malawian Kwacha</option><option value="MYR">Malaysian Ringgit</option><option value="MVR">Maldivian Rufiyaa</option><option value="MRO">Mauritanian Ouguiya</option><option value="MUR">Mauritian Rupee</option><option value="MXN">Mexican Peso</option><option value="MDL">Moldovan Leu</option><option value="MNT">Mongolian Tugrik</option><option value="MAD">Moroccan Dirham</option><option value="MZM">Mozambican Metical</option><option value="MMK">Myanmar Kyat</option><option value="NAD">Namibian Dollar</option><option value="NPR">Nepalese Rupee</option><option value="ANG">Netherlands Antillean Guilder</option><option value="TWD">New Taiwan Dollar</option><option value="NZD">New Zealand Dollar</option><option value="NIO">Nicaraguan C�rdoba</option><option value="NGN">Nigerian Naira</option><option value="KPW">North Korean Won</option><option value="NOK">Norwegian Krone</option><option value="OMR">Omani Rial</option><option value="PKR">Pakistani Rupee</option><option value="PAB">Panamanian Balboa</option><option value="PGK">Papua New Guinean Kina</option><option value="PYG">Paraguayan Guarani</option><option value="PEN">Peruvian Nuevo Sol</option><option value="PHP">Philippine Peso</option><option value="PLN">Polish Zloty</option><option value="QAR">Qatari Rial</option><option value="RON">Romanian Leu</option><option value="RUB">Russian Ruble</option><option value="RWF">Rwandan Franc</option><option value="SVC">Salvadoran Col�n</option><option value="WST">Samoan Tala</option><option value="SAR">Saudi Riyal</option><option value="RSD">Serbian Dinar</option><option value="SCR">Seychellois Rupee</option><option value="SLL">Sierra Leonean Leone</option><option value="SGD">Singapore Dollar</option><option value="SKK">Slovak Koruna</option><option value="SBD">Solomon Islands Dollar</option><option value="SOS">Somali Shilling</option><option value="ZAR">South African Rand</option><option value="KRW">South Korean Won</option><option value="XDR">Special Drawing Rights</option><option value="LKR">Sri Lankan Rupee</option><option value="SHP">St. Helena Pound</option><option value="SDG">Sudanese Pound</option><option value="SRD">Surinamese Dollar</option><option value="SZL">Swazi Lilangeni</option><option value="SEK">Swedish Krona</option><option value="CHF">Swiss Franc</option><option value="SYP">Syrian Pound</option><option value="STD">S�o Tome Pr�ncipe Dobra</option><option value="TJS">Tajikistani Somoni</option><option value="TZS">Tanzanian Shilling</option><option value="THB">Thai Baht</option><option value="TOP">Tongan Pa?anga</option><option value="TTD">Trinidad Tobago Dollar</option><option value="TND">Tunisian Dinar</option><option value="TRY">Turkish Lira</option><option value="TMT">Turkmenistani Manat</option><option value="UGX">Ugandan Shilling</option><option value="UAH">Ukrainian Hryvnia</option><option value="AED">United Arab Emirates Dirham</option><option value="UYU">Uruguayan Peso</option><option value="UZS">Uzbekistani Som</option><option value="VUV">Vanuatu Vatu</option><option value="VEF">Venezuelan Bol�var</option><option value="VND">Vietnamese Dong</option><option value="XOF">West African CFA Franc</option><option value="YER">Yemeni Rial</option><option value="ZMK">Zambian Kwacha</option>
      </select> <br><br> 
      <button type="submit" name="convert" id="convert" class="btn btn-primary">Convert</button>  
        
    </div>      
  </form> 
  
  <div class="form-group" id="converted_rate"></div>  
  <div id="converted_amount"></div>
</div>
</fieldset>';
              

}
 
echo " 
<form ng-app='mynapp' ng-controller='myctrl' action='' method='POST' class='form-inline'>

<br>
 <fieldset class='first_set'>
            <p class='lineheading' id='daser'> Partners</p>
             <div class='col-md-9 col-md-push-1'>
                    <div class ='row'>
                      <div class='form-group'>
                        <label for='superpartner'>Super Partner &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</label>
                        <input type='text' class='form-control' id='superpartner' name='supname' value='".$supname."' required >
                      </div>
                      <div class='input-group mb-2 mr-sm-2 mb-sm-0'>
                        
                        <input type='number' onkeypress='return event.charCode >= 48' min='0' class='form-control' id='inlineFormInputGroup' name='supperc' ng-model='y2' size='13'  ng-init='y2=".$supperc."' value='".$supperc."' required>
                        <div class='input-group-addon'>%</div>
                      </div>
                      </div>
                  <br>

                     <div class ='row'>
                      <div class='form-group'>
                        <label for='holidaypartner'>Holiday Partner :&nbsp;&nbsp;&nbsp;</label>
                        <input type='text' class='form-control' id='holidaypartner' name='holiname' value='".$holiname."' required>
                      </div>
                      <div class='input-group mb-2 mr-sm-2 mb-sm-0'>
                        <input type='number' onkeypress='return event.charCode >= 48' min='0' class='form-control' size='13' ng-model='y3' name='holiperc'  ng-init='y3=".$holiperc."'  value='".$holiperc."' required>
                        <div class='input-group-addon'>%</div>
                      </div>
                      </div>
                       <br>
                     <div class ='row'>
                      <div class='form-group'>
                        <label for='salespartner'>Sales Partner &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</label>
                        <input type='text' class='form-control' id='salespartner' name='salesname'  value='".$salname."' required>
                      </div>
                      <div class='input-group mb-2 mr-sm-2 mb-sm-0'>
                        
                        <input type='number' onkeypress='return event.charCode >= 48' min='0' class='form-control' size='13' ng-model='y4' ng-init='y4=".$salperc."' name='salesperc' value='".$salperc."' required>
                        <div class='input-group-addon'>%</div>
                      </div>
                      </div>
                  </div>    
            </fieldset>
            <br><br>

            
            <fieldset class='second_set'>
              <p class='lineheading'>Choose Calculation</p>
                <div class='col-md-9 col-md-push-1'>
                  <div class='form-check'>
                    <label class='form-check-label'>";?>

                      <input class="form-check-input" type='radio' name='calc_chose' value='By Person' <?php if($calc=="By Person") echo 'checked="true"';?> >

                      <?php
                      echo "By Person
                    </label>
                  </div>
                  <br>
                  <div class='form-check'>
                    <label class='form-check-label'>";?>
                      <input class='form-check-input' type='radio' name='calc_chose' value='All Pax' <?php if($calc=="All Pax") echo 'checked="true"';?>>
                 
                 <?php echo "All Pax
                    </label>
                  </div>
                </div>    
            </fieldset>          
            
            <br><br>
            
         
            
            <br><br>
      
";
?>

<!--International hotel fieldset-->
<?php 
          if($ref_type=='Domestic')
           {
              ?>            
            <fieldset class='fourth_set'>
            <p class='lineheading'>Hotels</p>
             <div class='col-md-12 '>                  
                <div class='table-responsive'> 
                   <table id= 'container' class='table table-hover table-responsive table-list' style='background-color: white;'>
                      <tr style='font-size:11px;'>  
                         <th >LOCATION</th>
                         <th>CHECKINDATE</th>
                         <th>CHECKOUTDATE</th>
                         <th>VENDOR</th>
                         <th> HOTEL NAME</th>
                         <th> HOTEL STD</th>
                         <th> ROOM STD</th>
                         <th>NO.ROOMS</th>
                         <th> NO.NIGHTS</th>
                         <th> MEAL PLAN</th>
                         <th> PRICES</th>
                         <th>STATUS</th>
                         
                      </tr>



                      <?php
                            if($hotel_content)
                            {
                                 echo "$hotel_content";

                            }
                            else
                            {
                                 echo "<tr style='font-size:11px;'>
                                         <td><input type='text' name='location[]' size='10' required></td>
                                         <td><input type='text' class='pull-right' style='background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;'  name='checkindate[]' placeholder='Ex .2017-09-17' size='10' required></td>
                                         <td><input type='text' class='pull-right' style='background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;'  name='checkoutdate[]' placeholder='Ex. 2017-10-27' size='10' required></td>
                                         <td><input type='text' name='vendor[]'size='10' required></td>
                                         <td><input type='text' name='hotel[]' size='10' required></td>
                                         <td><input type='text' name='rooms[]' size='2' required></td>
                                         <td><input type='text' name='nights[]' size='2' required></td>
                                     
                                         <td><input type='text' name='price[]' size='3'></td>
                                          <td>
                                           <select name='paidstatus[]' style='color:white;background-color:blue;'>
                                                <option>unpaid</option>
                                                <option>paid</option>
                                           </select>  
                                     </td>
                                          <td>
                                           <select name='meall[]' class='hidden'>
                                              <option>Breakfast,Lunch, Dinner</option>
                                                <option>No Breakfast, Lunch, Dinner</option>
                                                <option>Breakfast, No Lunch, Dinner</option>
                                                <option>Breakfast, Lunch, No Dinner</option>
                                                <option>No Breakfast, No Lunch, Dinner</option>
                                                <option>Breakfast, No Lunch, No Dinner</option>
                                                <option>No Breakfast, Lunch, No Dinner</option>
                                                <option>No Breakfast, No Lunch, No Dinner</option>
                                           </select>  
                                          </td>
                                         
                                </tr>
                                ";

                            }

                      ?>
                
                   </table>
                   <a id='add_field' href='#'><span>Add more</span></a>
                </div>
              </div>  
            </fieldset>
    
            <br><br>
<?php 
 }
?>


<!--Domestic hotel fieldset-->
<?php 
if($ref_type=='International')
{
?>     
      <fieldset class='fifth_set' >
      <p class='lineheading'>International Hotels & Vendors Details</p>
             <div class='col-md-12'>                  
                <div class='table-responsive'> 
                   <table  id= 'containeri' class='table table-hover table-responsive table-list' style='width:100%;background-color: white;'>
                       <tr style='font-size:11px;'>
                       <th>LOCATION</th>
                       <th>VENDOR</th>
                        <th>HOTEL NAME</th>
                        <th>HOTEL STD</th>
                        <th>ROOM STD</th>
                        <th>CHECK-IN DATE</th>
                        <th>CHECK-OUT DATE</th>
                       <th>MEAL PLAN</th>
                       <th>PRICES</th>
                       <th>STATUS</th>
                      </tr>

                     <?php
                            if($hotel_content)
                            {
                                 echo "$hotel_content";

                            }
                            else
                            {
                                 echo " <tr style='font-size:11px;'>
                               <td><input type='text' name='location[]' size='10' required></td>
                               <td><input type='text' name='vendor[]' size='10' required></td>
                               <td><input type='text' name='hotel[]' size='16' required></td>
                               <td><input type='text' name='hotelstnd[]' size='7'></td>
                               <td><input type='text' name='roomstnd[]' size='7'></td>
                               <td><input type='text' class='pull-right' style='background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;'  name='checkin[]' placeholder='2017-09-01' size='7' required></td>
                               <td><input type='text' class='pull-right' style='background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;'  name='checkout[]' size='7' placeholder='2017-09-21' required></td>
                               
                               <td><input type='text' name='price[]' size='8'></td>
                               <td>
                                           <select name='paidstatus[]' style='color:white;background-color:blue;'>
                                                <option>unpaid</option>
                                                <option>paid</option>
                                           </select>  
                              </td>
                               <td>
                                <select name='meall[]' class='hidden'>
                                      <option>Breakfast,Lunch, Dinner</option>
                                      <option>No Breakfast, Lunch, Dinner</option>
                                      <option>Breakfast, No Lunch, Dinner</option>
                                      <option>Breakfast, Lunch, No Dinner</option>
                                      <option>No Breakfast, No Lunch, Dinner</option>
                                      <option>Breakfast, No Lunch, No Dinner</option>
                                      <option>No Breakfast, Lunch, No Dinner</option>
                                      <option>No Breakfast, No Lunch, No Dinner</option>
                                 </select>   
                                </td>
                             </tr>";


                            }
                            ?> 
                   

                   </table>
                   <a id='add_fieldi' href='#'><span>Add more</span></a>
                 </div>
                 
                 
                      
              </div>  
      </fieldset>
    
       <br><br>

<?php 
}
?> 

   <fieldset class='third_set'>
              <p class='lineheading'>Meal plan</p>
                <div class='col-md-9 col-md-push-1'>
                    <div class='form-check'>
                    <label class='form-check-label'>
                    
                      <input class='form-check-input' type='radio' name='meal_plan' value='Breakfast' <?php if($meal=="Breakfast") echo 'checked="true"';?>>
                      <?php echo"Breakfast
                    </label>
                  </div>
                  <br>
                  <div class='form-check'>
                    <label class='form-check-label'>";?>
                      <input class='form-check-input' type='radio' name='meal_plan' value='Breakfast,Lunch or Dinner' <?php if($meal=="Breakfast,Lunch or Dinner") echo 'checked="true"';?>>
                      <?php echo"Breakfast,Lunch or Dinner
                    </label>
                  </div>
                  <br>
                  <div class='form-check'>
                    <label class='form-check-label'>";?>
                      <input class='form-check-input' type='radio' name='meal_plan' value='Breakfast,Lunch and Dinner' <?php if($meal=="Breakfast,Lunch and Dinner") echo 'checked="true"';?>>
                      <?php echo"Breakfast,Lunch and Dinner" ?>
                    </label>
                  </div>
                </div>    
            

    <?php

    $query = "SELECT * FROM itdaywise WHERE ghrnno = '".$ref_value."' ORDER BY rowno ";
    $result = mysqli_query($conn,$query);
          $cntt = 1;
          $z = 1; //new holder
       if(mysqli_num_rows($result) > 0){
     
      while($row=mysqli_fetch_assoc($result)){
        $title = $row["title"];
        $hotel = $row["hotelname"];
        $meal = $row["mealplan"];
        $date = $row["date"];

        $schitinerary.="
                      <div class ='row'>
                          <div class='col-md-3'>  
                          <label for='day'>
                          <b style='font-size:19px;color:red;'>DAY ".$cntt++." </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                          
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
                            <input type='text' class='form-control' name='itmeal[]'  id='itmeal".$z."' value='".$meal."' aria-label='...'>
                          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </div>
                          <div class='col-md-3'>
                          <div class='form-group'>
                            <label for='itdate'>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                               <input type='text' class='form-control' name='itdate[]'  id='itdate' value='".$date."' aria-label='...'>
                          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           </div>
                        
                        </div><hr>";


      }
  }else{
    $schitinerary = "";
  }


                                

    ?>

      
    
        <div class='col-md-9 col-md-push-1' id='itcontainer'>
           <br>
      
          <?php echo "$schitinerary";?>
        </div>
        
                        
          
      </fieldset>

<br><br>

<fieldset class='fifth_set' >
      <p class='lineheading'>Flight Details</p>
             <div class='col-md-12'> 
               
                <div class='row'>                 
                <div class='table-responsive'> 
                   <table  id= 'contair' class='table table-hover table-responsive table-list' style='width:100%;background-color: white;'>
                       <tr style="font-size:11px;">
                       <th>TYPE</th>
                       <th>AIRLINES</th>
                       <th>AIRPORTS</th>
                       <th>ARRIVAL & DEPARTURE</th>
                       <th>DURATION</th>
                        <th>DATES</th>
                        <th>TRAVELLERS</th>
                        <th>FLIGHT PRICE</th>
                        <th>BAGGAGE WEIGHT</th>
                        <th>BAGGAGE PRICE</th>
                        <th>STATUS</th>
                      </tr>
                        <?php
                            if($flight_content)
                            {
                                 echo "$flight_content";

                            }
                            else
                            {
                                 echo "
                                    <tr style='font-size:11px;'>
                                    <td><select name='flighttype[]' class='flighttype'><option value='' selected>Please select</option><option value='oneway'>One Way</option><option value='return'>Return</option></select></td>
                                             <td><input type='text' name='airline[]' size='10'></td>
                                             <td><input type='text' name='airport[]' size='10'></td>
                                             <td><input type='text' name='arrdep[]'size='30'></td>
                                             <td><input type='text' name='airdur[]' size='5'></td>
                                             <td><input type='text' class='pull-right' style='background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;' name='airdates[]' size='15'></td>
                                             <td><input type='text' name='airtrav[]' size='7'></td>
                                             <td><input type='text' name='airprice[]' size='15'></td>
                                             <td><input type='text' placeholder='Baggage Weight' name='baggageweight[]' size='5'></td>
                                             <td><input type='text' placeholder='Baggage Price' name='baggageprice[]' size='6'></td>
                                             <td>
                                           <select name='flightstatus[]' style='color:white;background-color:blue;'>
                                                <option>unpaid</option>
                                                <option>paid</option>
                                           </select>  
                              </td>
                                   </tr>
                                   ";

                               }    
                     ?>
                   

                   </table>
                   <a id='add_fieldair' href='#'><span>Add more</span></a>
                 </div>
                 
                 </div> 
                      
              </div>  
      </fieldset>
    
       <br><br>


<?php
echo "
   <fieldset class='fourth_set'>
        <p class='lineheading'>Transportation</p>

        <div class='col-md-12 col-md-push-1'>
            <div class='col-md-1'>
                  <div class='form-check'>
                    <label class='form-check-label'>";?>

                      <input class='form-check-input' id='trans_y' type='radio' name='transp' value='yes' <?php if(!empty($transp)) echo 'checked="true"';?> required>
                      
                      <?php echo "Yes
                    </label> 
                  </div>   
                <br>
              <div class='form-check'>
                 <label class='form-check-label'>";?>
                 <input class='form-check-input' id='trans_n' type='radio' name='transp' value='no' <?php if(empty($transp)) echo 'checked="true"';?> required>
                    <?php echo "No
                  </label>
               </div>
          </div>
        
         <div class='col-md-3' id='transportAmount'>
          <div class='form-group'>
           <input type='number' onkeypress='return event.charCode >= 0' min='0' class='form-control' ng-model='trans_amt' id='trans_amt' placeholder='Enter Amount' ng-init='trans_amt=".$transp_amt."' name='trans_amt' value='".$transp_amt."'";
            
            if(empty($transp))
              echo " disabled "; 
           echo "required>


          </div>  
        </div>
                    

        <div class='col-md-3' id='transportTransfers'>
              

                <div class='form-check'>
                  <label class='form-check-label'>";?>
                    <input class='form-check-input' type='radio' id='trrad' name='transportation' value='Transfers' <?php if($transp=="Transfers") echo 'checked="true"';?> 

                    <?php
                      if(empty($transp))
                          echo " disabled "; 
                       echo "required";

                    ?>>


                    <?php echo "Transfers
                    </label>
                </div>
                <br>
                <div class='form-check'>
                  <label class='form-check-label'>";?>
                      <input class='form-check-input' type='radio' id='trrad1' name='transportation' value='Sightseeting' <?php if($transp=="Sightseeting") echo 'checked="true"';?> 
                      <?php
                      if(empty($transp))
                          echo " disabled "; 
                       echo "required";

                    ?>>
                      <?php echo "Sightseeting
                  </label>
                </div>
                <br>
                <div class='form-check'>
                   <label class='form-check-label'>";?>
                      <input class='form-check-input' type='radio' id='trrad2'  name='transportation' value='Transfers +Sightseeting' 
                      <?php if($transp=="Transfers +Sightseeting") echo 'checked="true"';

                      if(empty($transp))
                          echo " disabled "; 
                       echo "required";

                    ?>>
                        <?php echo "Transfers +Sightseeting
                   </label>
                </div>

          
      
            </div>
              <div class='col-md-1' id='transportsicprivate'>
                <br>
                <div class='form-check'>
                  <label class='form-check-label'>";?>
                    <input class='form-check-input' type='radio' id='trantype' name='transp_vehicle_type' value='sic' 
                    <?php if($tvtype == "sic") echo 'checked="true"';

                      if(empty($transp))
                          echo " disabled "; 
                       echo "required";

                    ?>>
                      <?php echo "SIC
                    </label>
                </div>
            
                <div class='form-check'>
                  <label class='form-check-label'>";?>
                      <input class='form-check-input' type='radio' id='trantype1' name='transp_vehicle_type' value='private' 
                       <?php if($tvtype == "private") echo 'checked="true"';

                      if(empty($transp))
                          echo " disabled "; 
                       echo "required";

                    ?>>
                       <?php echo "Private
                  </label>
                </div>
                <br>
            </div>
                <div class='col-md-2' id='transportvendornvehicle' >
                    <div class='form-group'>
                         <label for='currencyamount'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vehicle Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                         <input type='text' class='form-control' placeholder='Enter Vehicle Description' id='trandesc' name='transp_vehicle' value='".$transp_vehicle."' aria-label='...'";?>

                         <?php 
                          if(empty($transp))
                           echo " disabled ";


                         echo "></div>
                

                     
                    <div class='form-group'>
                         <label for='transp_vendor_details'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vendor Details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
                         <input type='text' class='form-control' placeholder='Enter Vendor Details' id='transp_vendor_details' name='transp_vendor_details' value='".$transp_vendor_details."' aria-label='...'";?>

                         <?php 
                          if(empty($transp))
                            echo " disabled ";

                         echo ">";

                         if(!empty($transp))
                         {  $st1 =$st2= "";
                              if(!empty($transpstatus)){
                              if($transpstatus == "paid"){
                                  $st2 ="selected";
                                  $colorTransp = "background-color: #4CAF50;color: white;padding: 3px;";
                                  }
                                else{
                                  $st1 ="selected";
                                  $colorTransp = "background-color: #F44336;color: white;padding: 3px;";
                                }
                              }
                           echo "<br><br>
                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;
                                  <select id='transportpay' name='transpstatus' style='$colorTransp'>
                                      <option ".$st1.">unpaid</option>
                                      <option ".$st2.">paid</option>
                                   </select> ";

                        }

                      echo "</div>

                </div>

        </div>
    </fieldset>
    <br><br>";
?>

<?php 
if($ref_type=='International')
 {
?>   
       <fieldset class='sixth_set'>
       <p class='lineheading'>Remittance</p>
              <div class='col-md-9 col-md-push-1'>
                  <div class='form-check'>
                    <label class='form-check-label'>
                      <input class='form-check-input' id='remit_y' type='radio' name='remittance' value='yes' <?php if(!empty($remit)) echo 'checked="true"';?>> 
                      Yes
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                

              <div class='form-group'>
                <input type='number' class='form-control' ng-model='remit' id='y_remittance' name='y_remittance' placeholder='Enter Amount' 
                    <?php if(!empty($remit)) echo " ng-init = 'remit =".$remit."' value='".$remit."' "; 
                          else
                            echo " disabled ";
                    ?>required>

                    <?php
                    if(!empty($remit))
                    { $st1 =$st2= "";
                      if(!empty($remitstatus)){
                      if($remitstatus == "paid")
                          $st2 ="selected";
                        else
                          $st1 ="selected";
                      }

                      echo " &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;
                                  <select id='remitpay' name='remitstatus' style='color:white;background-color:blue;'>
                                      <option ".$st1.">unpaid</option>
                                      <option ".$st2.">paid</option>
                                   </select> ";

                    }

                  ?>
              </div>     
              </div>
              <br>
              <div class='form-check'>
                 <label class='form-check-label'>
                 <input class='form-check-input' id='remit_n' type='radio' name='remittance' value='no' <?php if(empty($remit)) echo 'checked="true"';?>>
                    No
                  </label>

               </div>
               </div>  
        </fieldset>
        <br>


      <fieldset class='seventh_set'>
       <p class='lineheading'>Visa</p>
              <div class='col-md-9 col-md-push-1'>
                  <div class='form-check'>
                    <label class='form-check-label'>
                      <input class='form-check-input' id='visa_y' type='radio' name='visa' value='yes' <?php if(!empty($visa)) echo 'checked="true"';?>required>
                      Yes
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                     <div class='form-group'>
                        <input type='number' class='form-control' ng-model='visa' placeholder='Enter Amount'  id='y_visa' name='y_visa' 
                         <?php if(!empty($visa)) echo " ng-init='visa = ".$visa."' value='".$visa."' "; 
                          else
                            echo " disabled ";
                    ?>required>
                    <?php
                    if(!empty($visa)){

                      $st1 =$st2= "";
                          if(!empty($visastatus))
                           {   if($visastatus == "paid")
                                  $st2 ="selected";
                                else
                                  $st1 ="selected";
                            }
                      echo "&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;
                                  <select id='visapay' name='visastatus' style='color:white;background-color:blue;'>
                                      <option ".$st1.">unpaid</option>
                                      <option ".$st2.">paid</option>
                                   </select> ";

                                 }

                  ?>
                      </div>
              </div>
              <br>
              <div class='form-check'>
                 <label class='form-check-label'>
                 <input class='form-check-input' id='visa_n' type='radio' name='visa' value='no' <?php if(empty($visa)) echo 'checked="true"';?>required>
                    No
                  </label>
               </div>
               </div>  
        </fieldset>
 <?php
 }
 ?>       
       
     
<?php
if($ref_type=='International')
{
?>

        <fieldset class='eigth_set'>
        <p class='lineheading'>Cruise</p>

        <div class='col-md-12 col-md-push-1'>
            <div class='col-md-1'>
                  <div class='form-check'>
                    <label class='form-check-label'>
                      <input class='form-check-input' id='cruise_yes' type='radio' name='cruise' value='yes'<?php if(!empty($cruise_amt)) echo 'checked="true"';?> required >
                      Yes
                    </label> 
              </div>   
                <br>
              <div class='form-check'>
                 <label class='form-check-label'>
                 <input class='form-check-input' id='cruise_no' type='radio' name='cruise' value='no' <?php if(empty($cruise_amt)) echo 'checked="true"';?> required>
                    No
                  </label>
               </div>
          </div>
        
         <div class='col-md-3'>
          <div class='form-group'>
           <input type='number' class='form-control' ng-model='cramount' id='cr_am' name='cr_am' placeholder='Enter Amount' 

            <?php if(!empty($cruise_amt)) echo " ng-init='cramount = ".$cruise_amt."' value='".$cruise_amt."' "; 
                          else
                            echo " disabled ";
                    ?>required>
                    <?php
                    if(!empty($cruise_amt))
                    { $st1 =$st2= "";
                          if(!empty($cruisestatus))
                          {
                              if($cruisestatus == "paid")
                                  $st2 ="selected";
                                else
                                  $st1 ="selected";
                          }

                      echo " <br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;
                                  <select id='cruisepay' name='cruisestatus' style='color:white;background-color:blue;'>
                                      <option ".$st1.">unpaid</option>
                                      <option ".$st2.">paid</option>
                                   </select> ";

                    }
                    else
                      echo "<input type='hidden' value='' name='cruisestatus'>";

                  ?>
          </div>  
        </div>


  <div class='col-md-6'>
                <div class ='row'>
                      <div class='form-group'>
                        <label for='superpar'>Super Partner &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</label>
                        <input type='text' class='form-control' id='sup_cr' name='sup_cr'  
                        <?php if(!empty($cruise_amt)) echo "  value='".$crsupname."' "; 
                          else
                            echo " disabled ";
                        ?>required>

                      </div>
                      <div class='input-group mb-2 mr-sm-2 mb-sm-0'>
                        
                        <input type='number' class='form-control' ng-model='crsup' id='sup_pr' name='sup_pr' ng-init = 'crsup = ".$crsupperc."' size='13' 
                        
                         <?php if(!empty($cruise_amt)) echo " ng-init='crsup = ".$crsupperc."' value='".$crsupperc."' "; 
                          else
                            echo " disabled ";
                        ?>required>

                        <div class='input-group-addon'>%</div>
                      </div>
                      </div>
                  <br>
                     <div class ='row'>
                      <div class='form-group'>
                        <label for='h_cr'>Holiday Partner :&nbsp;&nbsp;&nbsp;</label>
                        <input type='text' class='form-control' id='h_cr' name='h_cr' 
                        <?php if(!empty($cruise_amt)) echo "  value='".$crholiname."' "; 
                          else
                            echo " disabled ";
                        ?>required>
                      </div>
                      <div class='input-group mb-2 mr-sm-2 mb-sm-0'>
                        <input type='number' class='form-control' size='13' ng-model='crhol' ng-init = 'crhol = ".$crholiperc."' id='h_pr' name='h_pr' value= '".$crholiperc."'  
                        <?php if(!empty($cruise_amt)) echo " ng-init='crhol = ".$crholiperc."' value='".$crholiperc."' "; 
                          else
                            echo " disabled ";
                        ?>required>
                        <div class='input-group-addon'>%</div>
                      </div>
                      </div>
                       <br>
                     <div class ='row'>
                      <div class='form-group'>
                        <label for='sal_cr'>Sales Partner &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</label>
                        <input type='text' class='form-control' id='sal_cr' name='sal_cr'
                        <?php if(!empty($cruise_amt)) echo "  value='".$crsalname."' "; 
                          else
                            echo " disabled ";
                        ?>required>
                      </div>
                      <div class='input-group mb-2 mr-sm-2 mb-sm-0'>
                        
                        <input type='number' class='form-control'  ng-model='crsal' id='sal_pr' name='sal_pr' ng-init = 'crsal = ".$crsalperc."'  size='13' value= '".$crsalperc."'  
                          <?php if(!empty($cruise_amt)) echo " ng-init='crsal = ".$crsalperc."' value='".$crsalperc."' "; 
                          else
                            echo " disabled ";
                        ?>required>

                        <div class='input-group-addon'>%</div>
                      </div>
                      </div>
                  </div>    
           </div>
         </fieldset>


     <br>
<?php 
 }
?>        
            <fieldset class='ninth_set'>
        <p class='lineheading'>Travel Insurance</p>
              <div class='col-md-9 col-md-push-1'>
                  <div class='form-check'>
                    <label class='form-check-label'>
                      <input class='form-check-input' id='travel_insurance_y' type='radio' name='travel_insurance' value='yes' <?php if(!empty($tra_ins)) echo 'checked="true"';?> required>
                      Yes
                    </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
            <div class='form-group'>
                <input type='number' onkeypress='return event.charCode >= 0' min='0' class='form-control' id='y_trav' placeholder='Enter Amount' ng-model='trins' name='y_trav' 
                <?php if(!empty($tra_ins)) echo " ng-init='trins = ".$tra_ins."' value='".$tra_ins."' "; 
                          else
                            echo " disabled ";
                    ?>required>
                    <?php
                    if(!empty($tra_ins)){

                       $st1 =$st2= "";
                            if(!empty($travinsstatus)){
                              if($travinsstatus == "paid")
                                  $st2 ="selected";
                                else
                                  $st1 ="selected";
                                }
                      echo " &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;
                                  <select id='trinspay' name='travinsstatus' style='color:white;background-color:blue;'>
                                      <option ".$st1.">unpaid</option>
                                      <option ".$st2.">paid</option>
                                   </select> ";


                                 }

                  ?>
            </div>      

              </div>
              <br>
              <div class='form-check'>
                 <label class='form-check-label'>
                 <input class='form-check-input' id='travel_insurance_n' type='radio' name='travel_insurance' value='no' <?php if(empty($tra_ins)) echo 'checked="true"';?> required>
                    No
                  </label>
               </div>
               </div>  
         </fieldset>             
            <br><br>
<?php 
  if($ref_type=='International')
    {
       ?>
    <fieldset class='tenth_set'>
         <p class='lineheading'>Additional Services</p>
              <div class='col-md-9 col-md-push-1'>
                  <div class='form-check'>
                    <label class='form-check-label'>
                      <input class='form-check-input'  id='addit_yes' type='radio' name='add_services' value='yes' <?php if(!empty($add_sername)) echo 'checked="true"';?> required>
                      Yes
                    </label>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   

              <div class='form-group'>
                <input type='text' class='form-control' id='nserv' name='nserv' placeholder='Enter name of service' 
                <?php if(!empty($add_sername)) echo " value='".$add_sername."' "; 
                          else
                            echo " disabled ";
                    ?>required>

                <input type='number' class='form-control' id='cserv' name='cserv' placeholder='Enter cost for service' 
                <?php if(!empty($add_sercost)) echo " value='".$add_sercost."' "; 
                          else
                            echo " disabled ";
                    ?>required>
                     <?php
                    if(!empty($add_sercost)){

                        $st1 =$st2= "";
                        if(!empty($addserstatus)){
                              if($addserstatus == "paid")
                                  $st2 ="selected";
                                else
                                  $st1 ="selected";
                              }
                      echo " &nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;
                                  <select id='addserpay' name='addserstatus' style='color:white;background-color:blue;'>
                                      <option ".$st1.">unpaid</option>
                                      <option ".$st2.">paid</option>
                                   </select> ";

                                 }

                  ?>

            </div> 
                      
              </div>
              <br>
              <div class='form-check'>
                 <label class='form-check-label'>
                    <input class='form-check-input' id='addit_no' type='radio' name='add_services' value='no' <?php if(empty($add_sername)) echo 'checked="true"';?> required>
                    No
                  </label>
               </div>
               </div>  
         </fieldset>    
<?php 
 }
?>        


  <br>

   <fieldset class='last_set'>
    <p class='lineheading'>Pricing Calculator</p>


 <div class='col-md-8 col-md-push-1'>  
 <div class='alert alert-info' role='alert'>
              <strong>Note</strong>: Click the Save button , then work on pricing calculator
            </div>                
                <div class='table-responsive'> 
                   <table class='table table-hover table-responsive table-striped table-bordered' style='background-color: white;'>
                      <tr>  
                         <th></th>
                         <th>Percentage</th>
                         <th>Value</th>
                      </tr>
<?php 

  if($ref_type=="Domestic")
    {
       

        $x=array("LAND COST", 
                "GOGAGA LOADING ON LAND COST", 
                "COST TO COMPANY", 
                "PARTNER COMMISSIONS",
                "SUPER PARTNER COMMISSION",
                "HOLIDAY PARTNER COMMISSION",
                "SALES PARTNER COMMISSION",
                "COST TO BE SOLD",
                "ACTUAL FLIGHT PRICE",
                "LOADING ON FLIGHT PRICE",
                "BAGGAGE CHARGES",
                "LAND COST EXCLUDING SERVICE TAX",
                "GST",
                "LAND COST INCLUDING SERVICE TAX",
                "FLIGHT COST TO BE SHARED IN THE ITINERARY",
                "TRAVEL INSURANCE",""
            );
        $y=array("<p ng-model='mix'></p>",
                  "<input type='number' name='gghperc' size='20' ng-model='val2' value='".$gghperccalc."' ng-init='val2=".$gghperccalc."'>",
                "<p ng-model='mix'></p>",
                  "<p ng-model='y1'>{{y1=y2+y3+y4}} %</p>",
                  "<p ng-model='y2'>{{y2}} %</p>",
                "<p ng-model='y3'>{{y3}} %</p>",
                 "<p ng-model='y4'>{{y4}} %</p>",
                 "<p ng-model='mix'></p>",    
                  "<p ng-model='mix'></p>",
                 "<input type='number' size='20' ng-model='val4' name='flight_loadperc' value='".$flight_loadperc."' ng-init='val4=".$flight_loadperc."'>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                  "<input type='number' size='20' ng-model='val5' name='ser_tax_perc' value='".$ser_tax_perc."' ng-init='val5=".$ser_tax_perc."'>",
                  "<p ng-model='mix'></p>",
                  "<p ng-model='mix'></p>",
                  "<p ng-model='mix'></p>",
                  "TOTAL PRICE"
          );
      $z=array("<input type='number' name='landcost' size='20' ng-model='val1'  value='".$hotel_price."'  ng-init='val1=".$hotel_price."'>",
                  "<p ng-model='z1'>{{z1=val1 * (val2)/100}}</p>",
                  "<p ng-model='z2'>{{z2=z1 + val1}}</p>",
                 "<p ng-model='z3'>{{z3=(y1/100) * z2}}</p>",
                 "<p ng-model='z4'>{{z4=(y2/100) * z2}}</p>",
                 "<p ng-model='z5'>{{z5=(y3/100) * z2}}</p>",
                 "<p ng-model='z6'>{{z6=(y4/100) * z2}}</p>",
                 "<p ng-model='z7'>{{z7 = z2 +z3}}</p>",
                 "<input type='number' name='flightam' size='20' value='".$flight_price."' ng-init='zs=".$flight_price."'>",
                 "<p ng-model='z8'>{{z8 = zs*(val4)/100 }}</p>",
                 "<input type='number' name='baggagecost' size='20' value='".(int)$baggagecost."' ng-init='bcost=".(int)$baggagecost."'>",
                 "<p ng-model='z9'>{{z9 = z7}}</p>",
                 "<p ng-model='z10'>{{z10 = (val5)/100 *z9}}</p>",
                  "<p ng-model='z11'>{{z11=z9+z10}}</p>",
                  "<p ng-model='z12'>{{z12 = zs + z8 + bcost}}</p>",
                  "<p ng-model='z13'>{{z13 = trins}}</p>",
                  "<p ng-model='z14' style='color:red;'>{{z14 = z13+ z12+z11}}</p>"
                 
          );
                                          
                     for($i=0;$i<count($x);$i++) 
                     {
                      echo "<tr>  
                         <td>".$x[$i]."</td>
                         <td>".$y[$i]."</td>
                         <td>".$z[$i]."</td>

                      </tr>
                          ";
                        
                    }
        }
 else if($ref_type=="International")
    {


        $crtotal  =(int)$crsupperc+(int)$crholiperc+(int)$crsalperc; 
        $x=array("LAND COST", 
                "GOGAGA LOADING ON LAND COST", 
                "COST TO COMPANY", 
                "PARTNER COMMISSIONS",
                "SUPER PARTNER COMMISSION",
                "HOLIDAY PARTNER COMMISSION",
                "SALES PARTNER COMMISSION",
                "COST TO BE SOLD",
                "ACTUAL FLIGHT PRICE",
                "LOADING ON FLIGHT PRICE",
                "BAGGAGE CHARGES",
                "LAND COST EXCLUDING SERVICE TAX",
                "SERVICE TAX",
                "REMITTANCE",
                "LAND COST INCLUDING SERVICE TAX AND REMITTANCE",
                "FLIGHT COST TO BE SHARED IN THE ITINERARY",
                "VISA COST",
                "TRAVEL INSURANCE",
                "CRUISE COST",
                "PARTNERS COMMISSIONS ON CRUISE",
                "SUPER PARTNER COMMISSION ON CRUISE",
                "HOLIDAY PARTNER COMMISSION ON CRUISE",
                "SALES PARTNER COMMISSION ON CRUISE",
                "CRUISE COST WITH PARTNER COMMISIONS",
                ""


            );


        $y=array("<p ng-model='mix'></p>",
                 "<input type='number' size='20' name='gghperc' ng-model='val2' value='".$gghperccalc."' ng-init='val2=".$gghperccalc."'>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='y1'>{{y1=y2+y3+y4}} %</p>",
                 "<p ng-model='y2'>{{y2}} %</p>",
                 "<p ng-model='y3'>{{y3}} %</p>",
                 "<p ng-model='y4'>{{y4}} %</p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<input type='number' size='20' ng-model='val4' name='flight_loadperc' value='".$flight_loadperc."' ng-init='val4=".$flight_loadperc."'>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<input type='number' size='20' ng-model='val5' name='ser_tax_perc' value='".$ser_tax_perc."' ng-init='val5=".$ser_tax_perc."'>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='crtot' ng-init='crtot=".$crtotal."'>{{crtot=crsup+crhol+crsal}} %</p>",
                 "<p ng-model='crsup' ng-init='crsup=".$crsupperc."'>{{crsup}} %</p>",
                 "<p ng-model='crhol' ng-init='crhol=".$crholiperc."'>{{crhol}} %</p>",
                 "<p ng-model='crsal' ng-init='crsal=".$crsalperc."'>{{crsal}} %</p>",
                 "<p ng-model='mix'></p>",
                 "TOTAL PRICE"
                
          );
      $z=array(" <input type='number' name='landcost' size='20' ng-model='val1' value='".$hotel_price."'  ng-init='val1=".$hotel_price."'>",
                 "<p ng-model='z1'>{{z1=val1 * (val2)/100}}</p>",
                 "<p ng-model='z2'>{{z2=z1 + val1}}</p>",
                 "<p ng-model='z3'>{{z3=(y1/100) * z2}}</p>",
                 "<p ng-model='z4'>{{z4=(y2/100) * z2}}</p>",
                 "<p ng-model='z5'>{{z5=(y3/100) * z2}}</p>",
                 "<p ng-model='z6'>{{z6=(y4/100) * z2}}</p>",
                 "<p ng-model='z7'>{{z7 = z2 +z3}}</p>",
                 "<input type='number' name='flightam' size='20' ng-model='zs' value='".$flight_price."' ng-init='zs=".$flight_price."'>",
                 "<p ng-model='z8'>{{z8 = zs*(val4)/100 }}</p>",
                 "<input type='number' name='baggagecost' size='20' ng-model='bcost' value='".(int)$baggagecost."' ng-init='bcost=".(int)$baggagecost."'>",
                 "<p ng-model='z9'>{{z9 = z7}}</p>",
                 "<p ng-model='z10'>{{z10 = (val5)/100 *z9}}</p>",
                 "<p ng-model='z11'>{{z11=remit}}</p>",
                 "<p ng-model='z12' >{{z12 = remit+z10+z9}}</p>",
                 "<p ng-model='z13'>{{z13 = z8 + zs+bcost}}</p>",
                 "<p ng-model='z14'>{{z14 = visa}}</p>",
                 "<p ng-model='z141'>{{z141 = trins}}</p>",
                 "<p ng-model='z143' ng-init='cramount=".$cruise_amt."'>{{cramount}}</p>",
                 "<p ng-model='z15'>{{z15 = cramount*(crtot/100)}}</p>",
                 "<p ng-model='z16'>{{z16 = cramount*(crsup/100)}}</p>",
                 "<p ng-model='z17'>{{z17 = cramount*(crhol/100)}}</p>", 
                 "<p ng-model='z18'>{{z18 = cramount*(crsal/100)}}</p>", 
                 "<p ng-model='z19'>{{z19 = cramount + z15}}</p>", 
                 "<p ng-model='z20'>{{z20 = z19 + trins + visa +z13 +z12}}</p>"
                 
          );
                                          
                     for($i=0;$i<count($z);$i++) 
                     {
                      echo "<tr>  
                         <td>".$x[$i]."</td>
                         <td>".$y[$i]."</td>
                         <td>".$z[$i]."</td>

                      </tr>
                          ";
                        
                    }

    }   
    else
    {
      echo "<tr>
      <td>s</td>
      <td>s</td>
      <td>s</td></tr>";
    }


               
?>                  

                  </table>
                </div>
  </div>
</fieldset>    
            

 



       <div class='row'>
              <div class ='col-md-4 col-md-push-8'>
                <button type="submit" name='submit_but' class="btn btn-primary">Save</button>
                <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;

                 ";?>

                 <?php echo "

                  <a class='btn btn-success btn-md' id='proceedDesign' role='button' target='_blank' href='../designitinerary.php?ref=".$ref_value."'>Proceed to Design Itinerary</a>";?>
              </div>
        </div>
            
            <br><br>

    </form>



 </div>

 

</body>

</html>
  
