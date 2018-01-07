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
    $("#sidebar-forms").addClass("active");
  </script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <center>
      <h1><strong>
        Request Form  
      </strong></h1>
      </center>
 
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--
        | Your Page Content Here |
       -->

      <div class="row">

      	<form  method='POST' action="form_insert.php" class="form-horizontal">
      		<div class="col-md-8 col-md-push-2">


      <div class='partnerdetails1 box box-default box-solid collapsed-box'>
          <div class="box-header with-border">
              <h3 class="box-title">Partner Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div><!-- /.box-tools -->
              
           </div><!-- /.box-header -->


   		<div class="box-body">

        <div class="form-group">
                   <label for="formfilledby" class="col-sm-4">Partner Name <span class='redmark'>*</span>
                   </label>
                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40' name='first_1' value="<?php if(isset($username)) echo $username; ?>" required readonly>
                   </div>  
              </div>      
              <br>

         <div class="form-group">
                    <label class="col-sm-4">Partner Sno <span class='redmark'>*</span>
                   </label>

                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40' name='first_4' value="<?php if(isset($sno)) echo $sno; ?>" required readonly>
                   </div>  
              </div>      
              <br>

            <div class="form-group hidden">
                    <label class="col-sm-4">Partner type <span class='redmark'>*</span>
                   </label>

                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40' name='first_2' value="<?php if(isset($type)) echo $type; ?>" required readonly>
                   </div>  
              </div>      
              <br>


             
            
               <div class="form-group">
                   <label for="partnerlocation" class="col-sm-4">Partner Location <b class='redmark'>*</b>  
                   </label>
                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40' name='first_5' value="<?php if(isset($district)) echo $district; ?>" readonly>
               	   </div>
              </div>
              <br>




              
    	</div>
       </div>

       <br>

      <div class='customerdetails2 box box-primary box-solid'>

      	     <div class="box-header with-border">
              	<h3 class="box-title">Customer Details</h3>              
             </div><!-- /.box-header -->

   
   			<div class="box-body">         
               <div class="form-group">
                   <label for="customername" class="col-sm-4">Customer Name  <b class='redmark'>*</b>  </label>
                   <div class="col-sm-8">
                   	<div class="row">
                   	<div class="col-sm-6">	
                   <input type="text" class="form-control" size='30' id="firstname" name="second_1" placeholder="First name" required>
                   	</div>
                   	<div class="col-sm-6">
                   <input type="text" class="form-control" size='30' id="lastname" name="second_2" placeholder="Last name" required>
             	  </div>
             	</div>
             	  </div>
  
              </div>
              <br>


               <div class="form-group" id="contactcontainer">
                   <label for="contactno" class="col-sm-4">Contact number  <b class='redmark'>*</b>  </label>
                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40' id="contactno" name='second_3' placeholder="9897872323,7899395435,..." required>
              	 </div>
                   
              </div>
             
              <br>

               <div class="form-group">
                   <label for="holidaypartnerlocation" class="col-sm-4">Preferred time to call  <b class='redmark'>*</b>  </label>
                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40'  name='second_4' id="holidaypartnerlocation" placeholder="Ex. 11am to 6pm" required>
               		</div>
              </div>
        
              <br>

               <div class="form-group">
                   <label for="customerlocation" class="col-sm-4">Customer Location <b class='redmark'>*</b>  </label>
                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40'  name='second_5' id="customerlocation" placeholder="Enter Location" required>
               		</div>
              </div>
         
              <br>


               <div class="form-group" id="emailcontainer">
                   <label for="customeremailid" class="col-sm-4">Email id  <b class='redmark'>*</b>  </label>
                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40' name='second_6' id="customeremailid" placeholder="Ex. example@gmail.com,example1@gmail.com" required>
               </div>
                    
              </div>
              <br>

          </div><!--/.box-body-->
  

       </div>
       <br>


        <div class='holidaydetails3 box box-warning box-solid'>
        	     <div class="box-header with-border">
              <h3 class="box-title">Holiday Details</h3>

                       
           </div><!-- /.box-header -->

     
          <div class="box-body">    
                 <div class="form-group">
                     <label for="tripstartlocation" class="col-sm-4">Trip Start Location <b class='redmark'>*</b>  </label>
                     <div class="col-sm-8">
                     <input type="text" class="form-control" size='40' id="tripstartlocation" name="third_1" placeholder="" required>
                </div>
                </div>
                <br>

                 <div class="form-group">
                     <label for="holidaydestination" class="col-sm-4">Holiday Destination <b class='redmark'>*</b>  </label>
                     <div class="col-sm-8">
                     <input type="text" class="form-control" size='40' id="holidaydestination" name='third_2' placeholder="" required>
                </div>
                </div>
                <br>
               
    
                 <div class="form-group">
                     <label for="holidaytype" class="col-sm-4">Holiday Type <b class='redmark'>*</b>  </label>
                     <div class="col-sm-8">
                     <select name='third_3' required>
                         <option value='International'>International</option>
                         <option value='Domestic'>Domestic</option>
                      </select> 
                </div>
                </div>
                <br>


                 <div class="form-group">
                     <label for="dateoftravel" class="col-sm-4">Tentative Date of Travel <b class='redmark'>*</b>  </label>
                    
					<div class="col-sm-8">
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

    
                 <div class="form-group">
                     <label for="returndateoftravel" class="col-sm-4">Return Date of Travel <b class='redmark'>*</b>  </label>
                    
                <div class="col-sm-8">            
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


               <div class="form-group">
                   <label for="customerlocation" class="col-sm-4">Trip Duration <b class='redmark'>*</b>  </label>
                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40'  name='trip_dur' id="trip_dur" required>
              </div>
              </div>
              <br>


                 <div class="form-group" id="childcontainer">
                     <label for="customername" class="col-sm-4">Number of Travellers  <b class='redmark'>*</b>  </label>
                     <div class="col-sm-8">	
                     	<div class="row">
                     		<div class="col-sm-4">	
                     <input type="text" class="form-control" size='10' id="firstname" name="third_10"placeholder="Adults" required>
                 			</div>
                 			<div class="col-sm-4">
                     <input type="text" class="form-control" size='10' id="lastname" name="third_11" placeholder="Childs" required>
                     		</div>
                     		<div class="col-sm-4">	
                     <input type="text" class="form-control" size='10' id="lastname" name="third_12" placeholder="Infants" required>
                     		</div>
                	 </div>
                	</div>
                </div>

                     <br>

                    <label for="customername" class="col-sm-4">Children Ages <b class='redmark'>*</b> </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" size='10' id="childage" name="childage" placeholder="Ex. 12,11,12">
                    </div>
   
                
                <br>
    </div>
                             
            <br>

        </div>

      <div class='modeoftravel4 box box-success box-solid'>
      	<div class="box-header with-border">
              	<h3 class="box-title">Mode of Travel</h3>              
             </div><!-- /.box-header -->

  			<div class="box-body">
  
               <div class="form-group">
                   <label for="holidaytype" class="col-sm-4">Travel Mode <b class='redmark'>*</b>  </label>
        			<div class="col-sm-8">
                   <select name='fourth_1' required>
                       <option>Flight</option>
                       <option>Train</option>
                       <option>Bus</option>
                       <option>Own</option>
                    </select> 
              </div>
              </div>
              <br>

               <div class="form-group">
                   <label for="customername" class="col-sm-4">From  <b class='redmark'>*</b>  </label>
                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40' id="firstname" name="fourth_2" placeholder="" required><br>
              </div>
              </div>
          
               <div class="form-group"> 
                    <label for="customername" class="col-sm-4">To  <b class='redmark'>*</b> </label>
                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40' id="firstname" name="fourth_3" placeholder="" required>
               
              </div>
              </div>
              <br>
   </div>
      </div>
      <br>

      <div class='accomodationdetails5 box box-danger box-solid'>
      		<div class="box-header with-border">
              	<h3 class="box-title">Accomodation Details</h3>              
             </div><!-- /.box-header -->

  			<div class="box-body">
 
               <div class="form-group">
                   <label for="typeofhotel" class="col-sm-4">Type of Hotel <b class='redmark'>*</b>  </label>
       				<div class="col-sm-8">
                   <select name='fifth_1' required>
                       <option>2 Star</option>
                       <option>3 Star</option>
                       <option>4 Star</option>
                       <option>5 Star</option>
                    </select> 
              </div>
              </div>
              <br>

               <div class="form-group">
                   <label for="accomodationtype" class="col-sm-4">Accomodation Type <b class='redmark'>*</b>  </label>
                   
                   <div class="col-sm-8">
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

               <div class="form-group">
                  <label for="noofrooms" class="col-sm-4">Number of Rooms  <b class='redmark'>*</b> </label>
                   <div class="col-sm-8">
                   <input type="text" class="form-control" size='40' id="noofrooms" name="fifth_3" placeholder="Ex. 3" required>
              </div>
              </div>
              <br>

               <div class="form-group">
                  <label class='textarealabel col-sm-4' for="noofrooms">Additional Details regarding accommodation if any.  </label>
                    <br>
                    <div class="col-sm-8">
                   <textarea  class="form-control" rows="5" cols="40" name='fifth_4'></textarea>
              </div>
              </div>
              <br>


               <div class="form-group">
                  <label for="foodpref" class="col-sm-4">Food Preferences   </label>
      				<div class="col-sm-8">
                   <select name='fifth_5'>
                    <option>Breakfast only</option>
                    <option>Breakfast ,Lunch and Dinner</option>
                    <option>Breakfast and Dinner</option>
                   </select>  
              </div>
              </div>
              <br>

               <div class="form-group">
                  <label class='textarealabel col-sm-4' for="noofrooms">Specific Food Preferences if any  </label>
                    <br>
                    <div class="col-sm-8">
                   <textarea   class="form-control" rows="5" cols="40" name='fifth_6'></textarea>
              </div>
              </div>
              <br>


               <div class="form-group">
                  <label class='textarealabel col-sm-4' for="noofrooms">Sight Seeing Preferences if any  </label>
                    <br>
                   <div class="col-sm-8">
                   <textarea  class="form-control" rows="5" cols="40" name='fifth_7'></textarea>
              </div>
              </div>
              <br>


               <div class="form-group">
                  <label for="budget" class="col-sm-4">Budget  <b class='redmark'>*</b>  </label>
                    <div class="col-sm-8">
                   <input type="number" min="0" class="form-control" size='40' id="budget" name="fifth_8" placeholder="Ex. 150000" required>
                   <input type='hidden' value='newform' name='pagecontrol'>
              </div>
              </div>
              <br>
	</div> 
</div>
	<!--/Box body-->

               <div class="form-group">
                  <label for="leadstatus" class="col-sm-4">Lead Status  <b class='redmark'>*</b>  
                  </label>
           		 <div class="col-sm-8">
                  <input type='radio' name='fifth_9' id='hot' value='hot' required> <label for="hot">  HOT (Ready)</label>
                  
                  <input type='radio' name='fifth_9' id='cold' value='cold' required> <label for="cold">  COLD(Inquiry)</label> 
      			</div>
              </div>
              <br>

              <div class="footer">
		<center><button type="submit" name='submit' class="btn btn-primary">Submit</button></center>
        
    </div>

      </div>



</div>

    </form>
        
      </div><!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include "admin-footer.php";

?>