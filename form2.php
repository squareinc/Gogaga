<!DOCTYPE html>
<html lang="en">
<head>
  <title>GoGaga Holidays</title>

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
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/paper/bootstrap.min.css">

<script type="text/javascript" src="js/itinerary_work.js"></script>

  </head>
<body>


  <div class='col-md-10 col-md-offset-1'>
          <br><br><br>
        <div class='logo' style='text-align:center;'>
              <img src="images/logo_1.png" width='250' height='auto'><br><br>
        </div>

        <br><br>
  <form  method='POST' action="form_insert.php" class="form-inline">


      <fieldset class='partnerdetails1'>
          
          <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Partner Details</h3>
          <hr class='hr'>

           <div class='col-md-10 col-md-push-1'>
              <div class ='row'>
               <div class="form-group">
                   <label for="formfilledby">Partner type <span class='redmark'>*</span></label>

                    <select name='first_2' id='partnertype' class="form-control" onChange='getPartner(this.value)' required>
                          <option value="">Select Partner Type</option>
                          <option value="superpartner">Super Partner</option>
                          <option value="holidaypartner">Holiday Partner</option>
                          <option value="salespartner">Sales Partner</option>
                    </select>

                   
               
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class="form-group">
                   <label for="holidaypartnername">Select Partner <b class='redmark'>*</b></label>
                   <select name='first_4' id='partner' class="form-control" onChange='setPartner();' required>
                          <option value="">Select Partner</option>
                          
                    </select>
                   
              </div>
              </div>
              <br>


            <div class ='row'>
               <div class="form-group">
                   <label for="formfilledby" class="col-sm-4">Partner Name <span class='redmark'>*</span>
                   </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="text" class="form-control" size='30' style="margin-left: 35px;" id="partnername" name='first_1'  required readonly>
                   </div>  
                   
              </div>
             
              <br>


          </div>    
       </fieldset>

       <br>
      <fieldset class='customerdetails2'>
          <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Customer Details</h3>
          <hr class='hr'>
           <div class='col-md-10 col-md-push-1'>
              <div class ='row'>
               <div class="form-group">
                   <label for="customername">Customer Name  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                   <input type="text" class="form-control" size='30' id="firstname" name="second_1" placeholder="First name" required>

                   <input type="text" class="form-control" size='30' id="lastname" name="second_2" placeholder="Last name" required>
               
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class="form-group" id="contactcontainer">
                   <label for="contactno">Contact number  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type="text" class="form-control" size='40' id="contactno" name='second_3' placeholder="9897872323,7899395435,..." required>&nbsp;&nbsp;&nbsp;&nbsp;
                   
              </div>
              </div>
              <br>
             
            <div class ='row'>
               <div class="form-group">
                   <label for="holidaypartnerlocation">Preferred time to call  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type="text" class="form-control" size='40'  name='second_4' id="holidaypartnerlocation" placeholder="Ex. 11am to 6pm" required>
              </div>
              </div>
              <br>


            <div class ='row'>
               <div class="form-group">
                   <label for="customerlocation">Customer Location <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type="text" class="form-control" size='40'  name='second_5' id="customerlocation" placeholder="Enter Location" required>
              </div>
              </div>
              <br>


            <div class ='row'>
               <div class="form-group" id="emailcontainer">
                   <label for="customeremailid">Email id  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type="text" class="form-control" size='40' name='second_6' id="customeremailid" placeholder="Ex. example@gmail.com,example1@gmail.com" required>
                    
              </div>
              </div>
              <br>



          </div>    

       </fieldset>
       <br>


        <fieldset class='holidaydetails3'>
            <h3><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Holiday Details</h3>
            <hr class='hr'>
             <div class='col-md-10 col-md-push-1'>
                <div class ='row'>
                 <div class="form-group">
                     <label for="tripstartlocation">Trip Start Location <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                     
                     <input type="text" class="form-control" size='40' id="tripstartlocation" name="third_1" placeholder="" required>

                 
                </div>
                </div>
                <br>

              <div class ='row'>
                 <div class="form-group">
                     <label for="holidaydestination">Holiday Destination <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                     <input type="text" class="form-control" size='40' id="holidaydestination" name='third_2' placeholder="" required>
                </div>
                </div>
                <br>
               
              <div class ='row'>
                 <div class="form-group">
                     <label for="holidaytype">Holiday Type <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                     


                     <select name='third_3' required>
                         <option value='International'>International</option>
                         <option value='Domestic'>Domestic</option>
                      </select> 
                </div>
                </div>
                <br>


              <div class ='row'>
                 <div class="form-group">
                     <label for="dateoftravel">Tentative Date of Travel <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    

                                  <select id="day_start" name="third_4" required> 
                                           <?php 
                                                $x=1;
                                                
                                              while($x <= 31) 
                                              {
                                                echo "<option>".$x."</option>";
                                                $x++;
                                              } 
                                            ?>       
                                  </select> -
                        
                                  <select id="month_start" name="third_5" required> 
                                            <?php
                                                $y=array("Jan", "Feb", "Mar", "Apr",
                                                "May","Jun","Jul","Aug","Sept","Oct","Nov","Dec");

                                                foreach ($y as $x) {
                                                        echo "<option>$x</option>";
                                                    }
                                            ?>         
                                  </select> -  
                        
                                  <select id="year_start" name="third_6" required> 
                                            
                                              <?php 
                                                $x=date("Y");
                                                $y=$x+10;
                                              while($x <= $y) 
                                              {
                                                echo "<option>".$x."</option>";
                                                $x++;
                                              } 
                                            ?>

                                         

                                  </select>



                </div>
                </div>
                <br>

              <div class ='row'>
                 <div class="form-group">
                     <label for="returndateoftravel">Return Date of Travel <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                            
                                  <select id="day_start" name="third_7" required> 
                                           <?php 
                                                $x=1;
                                                
                                              while($x <= 31) 
                                              {
                                                echo "<option>".$x."</option>";
                                                $x++;
                                              } 
                                            ?>       
                                  </select> -
                        
                                  <select id="month_start" name="third_8" required> 
                                            <?php
                                                $y=array("Jan", "Feb", "Mar", "Apr",
                                                "May","Jun","Jul","Aug","Sept","Oct","Nov","Dec");

                                                foreach ($y as $x) {
                                                        echo "<option>$x</option>";
                                                    }
                                            ?>         
                                  </select> -  
                        
                                  <select id="year_start" name="third_9" required> 
                                            
                                              <?php 
                                                $x=date("Y");
                                                $y=$x+10;
                                              while($x <= $y) 
                                              {
                                                echo "<option>".$x."</option>";
                                                $x++;
                                              } 
                                            ?>

                                  </select>

                </div>
                </div>
                <br>

              <div class ='row'>
               <div class="form-group">
                   <label for="customerlocation">Trip Duration <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <input type="text" class="form-control" size='40'  name='trip_dur' id="trip_dur" required>
              </div>
              </div>
              <br>


                 <div class ='row'>
                 <div class="form-group" id="childcontainer">
                     <label for="customername">Number of Travellers  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                     
                     <input type="text" class="form-control" size='10' id="firstname" name="third_10"placeholder="Adults" required>

                     <input type="text" class="form-control" size='10' id="lastname" name="third_11" placeholder="Childs" required>

                     <input type="text" class="form-control" size='10' id="lastname" name="third_12" placeholder="Infants" required>
                     <br><br>

                    <label for="customername">Children Ages  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <input type="text" class="form-control" size='10' id="childage" name="childage" placeholder="Ex. 12,11,12">




                 
                </div>
                </div>
                <br>




            </div>    

         </fieldset>
                             
            <br>




      <fieldset class='modeoftravel4'>
          <h3><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Mode of Travel</h3>
          <hr class='hr'>
           <div class='col-md-10 col-md-push-1'>
              
            <div class ='row'>
               <div class="form-group">
                   <label for="holidaytype">Travel Mode <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   


                   <select name='fourth_1' required>
                       <option>Flight</option>
                       <option>Train</option>
                       <option>Bus</option>
                       <option>Own</option>
                    </select> 
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class="form-group">
                   <label for="customername">From  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                   <input type="text" class="form-control" size='40' id="firstname" name="fourth_2" placeholder="" required><br>
              </div>
              </div>
               <div class ='row'>
               <div class="form-group"> 
                    <label for="customername">To  <b class='redmark'>*</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                   <input type="text" class="form-control" size='40' id="firstname" name="fourth_3" placeholder="" required>
               
              </div>
              </div>
              <br>
      </div>
      </fieldset>
      <br>






      <fieldset class='accomodationdetails5'>
          <h3> <span class="glyphicon glyphicon-bed" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp; Accomodation Details</h3>
          <hr class='hr'>
           <div class='col-md-10 col-md-push-1'>
              
            <div class ='row'>
               <div class="form-group">
                   <label for="typeofhotel">Type of Hotel <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   


                   <select name='fifth_1' required>
                       <option>2 Star</option>
                       <option>3 Star</option>
                       <option>4 Star</option>
                       <option>5 Star</option>
                    </select> 
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class="form-group">
                   <label for="accomodationtype">Accomodation Type <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   

                                <select name='fifth_2' required>
                                <option>Single</option>
                                <option>Double</option>
                                <option>Double + 1 child</option>
                                <option>Double + 2 childs</option>
                                <option>Triple</option>
                                <option>Quadra</option>
                               </select>
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class="form-group">
                  <label for="noofrooms">Number of Rooms  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                   <input type="text" class="form-control" size='40' id="noofrooms" name="fifth_3" placeholder="Ex. 3" required>
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class="form-group">
                  <label class='textarealabel' for="noofrooms">Additional Details regarding accommodation if any.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <br>
                   <textarea  class="form-control" rows="5" cols="40" name='fifth_4'></textarea>
              </div>
              </div>
              <br>

              <div class ='row'>
               <div class="form-group">
                  <label for="foodpref">Food Preferences   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   


                   <select name='fifth_5'>
                                <option>Breakfast only</option>
                                <option>Breakfast ,Lunch and Dinner</option>
                                <option>Breakfast and Dinner</option>
                               </select>  
              </div>
              </div>
              <br>

            <div class ='row'>
               <div class="form-group">
                  <label class='textarealabel' for="noofrooms">Specific Food Preferences if any  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <br>
                   <textarea   class="form-control" rows="5" cols="40" name='fifth_6'></textarea>
              </div>
              </div>
              <br>

              <div class ='row'>
               <div class="form-group">
                  <label class='textarealabel' for="noofrooms">Sight Seeing Preferences if any  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <br>
                   <textarea  class="form-control" rows="5" cols="40" name='fifth_7'></textarea>
              </div>
              </div>
              <br>


            <div class ='row'>
               <div class="form-group">
                  <label for="budget">Budget  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                   <input type="text" class="form-control" size='40' id="budget" name="fifth_8" placeholder="Ex. 150000" required>
                   <input type='hidden' value='newform' name='pagecontrol'>
              </div>
              </div>
              <br>


        <div class ='row'>
               <div class="form-group">
                  <label for="leadstatus">Lead Status  <b class='redmark'>*</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   
                          <input type='radio' name='fifth_9' id='hot' value='hot' required> <label for="hot">  HOT (Ready)</label>
                          
                          <input type='radio' name='fifth_9' id='cold' value='cold' required> <label for="cold">  COLD(Inquiry)</label> 
              </div>
              </div>
              <br>
      </div>

      <hr class='hr'>

             <div class='row'>
                    <div class ='col-md-3 col-md-push-5'>
                      <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                    </div>
              </div>
                  
                  <br><br>





      </fieldset>

         







    </form>
 </div>

</body>

</html>
  
