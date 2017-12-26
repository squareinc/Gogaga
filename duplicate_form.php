<?php 


include "config.php";

// Code to retrieve date from existing form to this form
if(isset($_GET["q"]))
{ 
  $ghrnno = $_GET["q"];
  $sql = "SELECT * FROM agent_form_data WHERE ref_num = ".$ghrnno."";
  $res = $conn->query($sql) ;
  if ($res->num_rows) 
  { 
   if($row = $res->fetch_assoc()) 
   {   
      $ref_num =  $row["ref_num"];
      $form_filled_by =  $row["form_filled_by"];
      $holi_partner_name =   $row["holi_partner_name"];
      $holi_partner_loc =  $row["holi_partner_loc"];
      $sales_partner_name =  $row["sales_partner_name"];
      $sales_partner_loc =   $row["sales_partner_loc"];
      //Customer Details
      $cust_firstname =   $row["cust_firstname"];
      $cust_lastname =  $row["cust_lastname"];
      $contact_phone =  $row["contact_phone"];
      $preferred_time =  $row["preferred_time"];
      $cust_addr =   $row["cust_addr"];
      $cust_email =   $row["cust_email"];
      //Holiday Details
      $trip_start_loc =  $row["trip_start_loc"];
      $holi_dest =  $row["holi_dest"];
      $holi_type =  $row["holi_type"];
      

      $date_of_travel =  $row["date_of_travel"];
      
      $return_date_of_travel =  $row["return_date_of_travel"];

      // The below two lines will convert string to array divided by '-' 
      $from_date = explode("-",$date_of_travel);
     
      $to_date = explode("-",$return_date_of_travel);

      $duration = $row["duration"];
      $no_of_adults =  $row["no_of_adults"];
      $no_of_childs = $row["no_of_childs"];
      $no_of_infants =  $row["no_of_infants"];
      $childage =  $row["child_ages"];
      //Mode of Travel
       $travel_mode =   $row["travel_mode"];
       $travel_from =  $row["travel_from"];
       $travel_to =   $row["travel_to"];
       //Accomodation Details
       $type_hotel =   $row["type_hotel"];
       $acc_type =   $row["acc_type"];
       $no_rooms =   $row["no_rooms"];
       $additional_details = $row["additional_details"];
       $food_pref =  $row["food_pref"];
       $specific_food_pref = $row["specific_food_pref"];
       $sight_pref =   $row["sight_pref"];
       $budget =   $row["budget"];
       $lead_status =   $row["lead_status"];
    }
  } 
  else
  {
    echo "No Form Data";
  }      

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Form</title>

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
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
<link rel="stylesheet" type="text/css" href="css/form.css" />

  </head>
<body>


  <div class='col-md-10 col-md-offset-1'>
          <br><br><br>
        <div class='logo' style='text-align:center;'>
              <img src="images/logo_1.png" width='250' height='auto'><br><br>
        </div>

        <br><br>

 <?php 
 

 echo "<form  method='POST' action='form_insert.php' class='form-inline'>


      <fieldset class='partnerdetails1'>
          
          <h1><span class='glyphicon glyphicon-user' aria-hidden='true'></span> &nbsp;&nbsp;&nbsp;Partner Details</h1>
          <hr class='hr'>

           <div class='col-md-10 col-md-push-1'>
              <div class ='row'>
               <div class='form-group'>
                   <label for='formfilledby'>Form filled by <span class='redmark'>*</span></label>
                   
                   <input type='text' class='form-control' size='40' name='first_1' placeholder='Enter name' value= '".$form_filled_by."' required>
               
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class='form-group'>
                   <label for='holidaypartnername'>Holiday Partner Name  <b class='redmark'>*</b></label>
                   <input type='text' class='form-control' name='first_2' size='40' placeholder='Enter name' value= '".$holi_partner_name."' required>
              </div>
              </div>
              <br>
             
            <div class ='row'>
               <div class='form-group'>
                   <label for='holidaypartnerlocation'>Holiday Partner Location <b class='redmark'>*</b>  </label>
                   <input type='text' class='form-control' size='40' name='first_3' placeholder='Enter Location' value= '".$holi_partner_loc."' required>
              </div>
              </div>
              <br>


            <div class ='row'>
               <div class='form-group'>
                   <label for='salespartnername'>Sales Partner Name  <b class='redmark'>*</b> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type='text' class='form-control' size='40' name='first_4' placeholder='Enter name' value= '".$sales_partner_name."' required>
              </div>
              </div>
              <br>


            <div class ='row'>
               <div class='form-group'>
                   <label for='salespartnerlocation'>Sales Partner Location  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type='text' class='form-control' size='40' name='first_5' placeholder='Enter Location' value= '".$sales_partner_loc."' required>
              </div>
              </div>
              <br>



          </div>    
       </fieldset>

       <br>
      <fieldset class='customerdetails2'>
          <h1><span class='glyphicon glyphicon-user' aria-hidden='true'></span> &nbsp;&nbsp;&nbsp;Customer Details</h1>
          <hr class='hr'>
           <div class='col-md-10 col-md-push-1'>
              <div class ='row'>
               <div class='form-group'>
                   <label for='customername'>Customer Name  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                   <input type='text' class='form-control' size='30' id='firstname' name='second_1' placeholder='First name' value= '".$cust_firstname."' required>

                   <input type='text' class='form-control' size='30' id='lastname' name='second_2' placeholder='Last name' value= '".$cust_lastname."' required>
               
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class='form-group' id='contactcontainer'>
                   <label for='contactno'>Contact number  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type='text' class='form-control' size='40' id='contactno' name='second_3' placeholder='9897872323,7899395435,...' value= '".$contact_phone."' required>
              </div>
              </div>
              <br>
             
            <div class ='row'>
               <div class='form-group'>
                   <label for='holidaypartnerlocation'>Preferred time to call  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type='text' class='form-control' size='40'  name='second_4' id='holidaypartnerlocation' placeholder='Ex. 11am to 6pm' value= '".$preferred_time."' required>
              </div>
              </div>
              <br>


            <div class ='row'>
               <div class='form-group'>
                   <label for='customerlocation'>Customer Location <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type='text' class='form-control' size='40'  name='second_5' id='customerlocation' placeholder='Enter Location' value= '".$cust_addr."' required>
              </div>
              </div>
              <br>


            <div class ='row'>
               <div class='form-group' id='emailcontainer'>
                   <label for='customeremailid'>Email id  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type='text' class='form-control' size='40' name='second_6' id='customeremailid' placeholder='Ex. example@gmail.com,example1@gmail.com' value= '".$cust_email."' required>
                   
              </div>
              </div>
              <br>



          </div>    

       </fieldset>
       <br>


        <fieldset class='holidaydetails3'>
            <h1><span class='glyphicon glyphicon-briefcase' aria-hidden='true'></span> &nbsp;&nbsp;&nbsp;Holiday Details</h1>
            <hr class='hr'>
             <div class='col-md-10 col-md-push-1'>
                <div class ='row'>
                 <div class='form-group'>
                     <label for='tripstartlocation'>Trip Start Location <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                     
                     <input type='text' class='form-control' size='40' id='tripstartlocation' name='third_1' placeholder='' value= '".$trip_start_loc."' required>

                 
                </div>
                </div>
                <br>

              <div class ='row'>
                 <div class='form-group'>
                     <label for='holidaydestination'>Holiday Destination <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                     <input type='text' class='form-control' size='40' id='holidaydestination' name='third_2' placeholder='' value= '".$holi_dest."' required>
                </div>
                </div>
                <br>
               
              <div class ='row'>
                 <div class='form-group'>
                     <label for='holidaytype'>Holiday Type <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                     
";
?>



                     <select name='third_3' required>
                         <option value='International'<?php if($holi_type=="International") { echo "selected"; } ?>>International</option>
                         <option value='Domestic' <?php if($holi_type=="Domestic") { echo "selected"; } ?>>Domestic</option>
                      </select> 


<?php
    echo "    </div>
                </div>
                <br>


              <div class ='row'>
                 <div class='form-group'>
                     <label for='dateoftravel'>Tentative Date of Travel <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                     ";


          ?>
                                  <select id='day_start' name='third_4' required> 
                                        <?php

                                              $x=1;
                                                
                                              while($x <= 31) 
                                              {
                                                if($x == $from_date[0])
                                                  echo '<option selected>'.$x.'</option>';
                                                else
                                                  echo '<option>'.$x.'</option>';
                                                $x++;
                                              } 
                                            ?>       
                                  </select> -
                        
                                  <select id='month_start' name='third_5' required> 
                                            <?php
                                                $y=array('Jan', 'Feb', 'Mar', 'Apr',
                                                'May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');

                                                foreach ($y as $x) {
                                                        if($x == $from_date[1])
                                                          echo '<option selected>'.$x.'</option>';
                                                        else
                                                          echo '<option>'.$x.'</option>';
                                                    }
                                            ?>         
                                  </select> -  
                        
                                  <select id='year_start' name='third_6' required> 
                                            
                                              <?php 
                                                $x=date('Y');
                                                $y=$x+10;
                                              while($x <= $y) 
                                              {
                                                if($x == $from_date[2])
                                                  echo '<option selected>'.$x.'</option>';
                                                else
                                                  echo '<option>'.$x.'</option>';
                                                $x++;
                                              } 
                                            ?>
                                  </select>
<?php
echo "

                </div>
                </div>
                <br>

              <div class ='row'>
                 <div class='form-group'>
                     <label for='returndateoftravel'>Return Date of Travel <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
         ";
?>           
                            
                                  <select id='day_start' name='third_7' required> 
                                           <?php 
                                                $x=1;
                                                
                                              while($x <= 31) 
                                              {
                                                if($x == $to_date[0])
                                                  echo '<option selected>'.$x.'</option>';
                                                else
                                                  echo '<option>'.$x.'</option>';
                                                $x++;
                                              } 
                                            ?>       
                                  </select> -
                        
                                  <select id='month_start' name='third_8' required> 
                                            <?php
                                                $y=array('Jan', 'Feb', 'Mar', 'Apr',
                                                'May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');

                                                foreach ($y as $x) {
                                                        if($x == $to_date[1])
                                                          echo '<option selected>'.$x.'</option>';
                                                        else
                                                          echo '<option>'.$x.'</option>';
                                                    }
                                            ?>         
                                  </select> -  
                        
                                  <select id='year_start' name='third_9' required> 
                                            
                                              <?php 
                                                $x=date('Y');
                                                $y=$x+10;
                                              while($x <= $y) 
                                              {
                                                if($x == $to_date[2])
                                                  echo '<option selected>'.$x.'</option>';
                                                else
                                                  echo '<option>'.$x.'</option>';
                                                $x++;
                                              } 
                                            ?>

                                  </select>
<?php

echo "
                </div>
                </div>
                <br>
                 <div class ='row'>
               <div class='form-group'>
                   <label for='customerlocation'>Trip Duration <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type='text' class='form-control' size='40'  name='trip_dur' id='trip_dur' value= '".$duration."' required>
              </div>
              </div>
              <br>

                 <div class ='row'>
                 <div class='form-group' id='childcontainer'>
                     <label for='customername'>Number of Travellers  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                     
                     <input type='text' class='form-control' size='10' id='firstname' name='third_10'placeholder='Adults' value= '".$no_of_adults."' required>

                     <input type='text' class='form-control' size='10' id='lastname' name='third_11' placeholder='Childs' value= '".$no_of_childs."' required>

                     <input type='text' class='form-control' size='10' id='lastname' name='third_12' placeholder='Infants' value= '".$no_of_infants."' required>
                     <br><br>
                   

                    <label for='customername'>Children Ages  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <input type='text' class='form-control' size='10' id='childage' name='childage' placeholder='14,12,14...' value = '".$childage."'>




                 
                </div>
                </div>
                <br>




            </div>    

         </fieldset>
                             
            <br>




      <fieldset class='modeoftravel4'>
          <h1><span class='glyphicon glyphicon-plane' aria-hidden='true'></span> &nbsp;&nbsp;&nbsp;Mode of Travel</h1>
          <hr class='hr'>
           <div class='col-md-10 col-md-push-1'>
              
            <div class ='row'>
               <div class='form-group'>
                   <label for='holidaytype'>Travel Mode <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
";
?>

                   <select name='fourth_1' required>
                       <option <?php if($travel_mode=="Flight") { echo "selected"; } ?>>Flight</option>
                       <option <?php if($travel_mode=="Train") { echo "selected"; } ?>>Train</option>
                       <option <?php if($travel_mode=="Bus") { echo "selected"; } ?>>Bus</option>
                       <option <?php if($travel_mode=="Own") { echo "selected"; } ?>>Own</option>
                    </select>

   <?php
   echo "                  
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class='form-group'>
                   <label for='customername'>From  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                   <input type='text' class='form-control' size='40' id='firstname' name='fourth_2' placeholder='' value= '".$travel_from."' required><br>
              </div>
              </div>
               <div class ='row'>
               <div class='form-group'> 
                    <label for='customername'>To  <b class='redmark'>*</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                   <input type='text' class='form-control' size='40' id='firstname' name='fourth_3' placeholder='' value= '".$travel_to."' required>
               
              </div>
              </div>
              <br>
      </div>
      </fieldset>
      <br>






      <fieldset class='accomodationdetails5'>
          <h1> <span class='glyphicon glyphicon-bed' aria-hidden='true'></span> &nbsp;&nbsp;&nbsp; Accomodation Details</h1>
          <hr class='hr'>
           <div class='col-md-10 col-md-push-1'>
              
            <div class ='row'>
               <div class='form-group'>
                   <label for='typeofhotel'>Type of Hotel <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
";
?>

                   <select name='fifth_1' required>
                       <option <?php if($type_hotel=="2 Star") { echo "selected"; } ?>>2 Star</option>
                       <option <?php if($type_hotel=="3 Star") { echo "selected"; } ?>>3 Star</option>
                       <option <?php if($type_hotel=="4 Star") { echo "selected"; } ?>>4 Star</option>
                       <option <?php if($type_hotel=="5 Star") { echo "selected"; } ?>>5 Star</option>
                    </select>

 <?php
 echo "                    
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class='form-group'>
                   <label for='accomodationtype'>Accomodation Type <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
             ";      
?>


                                <select name='fifth_2' required>
                                <option <?php if($acc_type=="Single") { echo "selected"; } ?>>Single</option>
                                <option <?php if($acc_type=="Double") { echo "selected"; } ?>>Double</option>
                                <option <?php if($acc_type=="Double + 1 child") { echo "selected"; } ?>>Double + 1 child</option>
                                <option <?php if($acc_type=="Double + 2 childs") { echo "selected"; } ?>>Double + 2 childs</option>
                                <option <?php if($acc_type=="Triple") { echo "selected"; } ?>>Triple</option>
                                <option <?php if($acc_type=="Quadra") { echo "selected"; } ?>>Quadra</option>
                               </select>


  <?php
  echo "                             
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class='form-group'>
                  <label for='noofrooms'>Number of Rooms  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                   <input type='text' class='form-control' size='40' id='noofrooms' name='fifth_3' placeholder='Ex. 3' value= '".$no_rooms."' required>
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class='form-group'>
                  <label class='textarealabel' for='noofrooms'>Additional Details regarding accommodation if any. <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <br>
                   <textarea  class='form-control' rows='5' cols='40'  name='fifth_4'>".$additional_details."</textarea>
              </div>
              </div>
              <br>

              <div class ='row'>
               <div class='form-group'>
                  <label for='foodpref'>Food Preferences <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
   ";
   ?>



                   <select name='fifth_5' required>
                                <option <?php if($food_pref=="Breakfast only") { echo "selected"; } ?>>Breakfast only</option>
                                <option <?php if($food_pref=="Breakfast ,Lunch and Dinner") { echo "selected"; } ?>>Breakfast ,Lunch and Dinner</option>
                                <option <?php if($food_pref=="Breakfast and Dinner") { echo "selected"; } ?>>Breakfast and Dinner</option>
                               </select>  
             
<?php
echo "
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class='form-group'>
                  <label class='textarealabel' for='noofrooms'>Specific Food Preferences if any <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <br>
                   <textarea   class='form-control' rows='5' cols='40' name='fifth_6'>".$specific_food_pref."</textarea>
              </div>
              </div>
              <br>

              <div class ='row'>
               <div class='form-group'>
                  <label class='textarealabel' for='noofrooms'>Sight Seeing Preferences if any <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <br>
                   <textarea  class='form-control' rows='5' cols='40' name='fifth_7'>".$sight_pref."</textarea>
              </div>
              </div>
              <br>


            <div class ='row'>
               <div class='form-group'>
                  <label for='budget'>Budget  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                   <input type='text' class='form-control' size='40' id='budget' value= '".$budget."' name='fifth_8' placeholder='Ex. 150000' required>
                   <input type='hidden' value='newform' name='pagecontrol'>
              </div>
              </div>
              <br>


        <div class ='row'>
               <div class='form-group'>
                  <label for='leadstatus'>Lead Status  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        ";
        ?>

                          <input type='radio' name='fifth_9' id='hot' value='hot' <?php if($lead_status=="hot") echo 'checked="true"';?>required> <label for='hot'>  HOT (Ready)</label>
                          
                          <input type='radio' name='fifth_9' id='cold' value='cold' <?php if($lead_status=="cold") echo 'checked="true"';?> required> <label for='cold'>  COLD(Inquiry)</label> 
       
 <?php

        echo "    </div>
              </div>
              <br>
      </div>

      <hr class='hr'>

             <div class='row'>
                    <div class ='col-md-3 col-md-push-5'>
                      <button type='submit' name='submit' class='btn btn-primary'>Submit</button>
                    </div>
              </div>
                  
                  <br><br>





      </fieldset>

    </form>";

?>
 


 </div>

</body>

</html>
  
