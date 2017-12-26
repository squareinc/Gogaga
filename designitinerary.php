<?php
require("config.php");
session_start();
    $ref_type=$_SESSION["ref_type"];
    //$ref_value=$_SESSION["ref_value"];


$removeClass = "";


if(isset($_GET["ref"]))
{
  $ref_value = $_GET["ref"];

 if(isset($_POST["save"])) {


    $status = 0; //intital status

        $holiarea =$_POST["holiarea"];
        $pckg =$_POST["pckg"];
        //$holidesc =$_POST["holidesc"];
        $holidesc = "";
        $inclusion =$_POST["inclusion"];
        $exclusion =$_POST["exclusion"];

        $honeyincl =$_POST["honeyincl"];
        //$roomtype =$_POST["roomtype"];
        $itpages ="";
        $search_image = $_POST["search_image"]; // this is the imgname
        $imgdesc = ""; //empty description
        //use this to get the description from holiday_images
        $sqlToGetImgDesc = "SELECT imgdesc from holiday_images WHERE imgpath = '$search_image'";

        if($conn->query($sqlToGetImgDesc) == true)
      {
          //successfully executed sqlToGetImgDesc
        $res = $conn->query($sqlToGetImgDesc) ;
        if ($res->num_rows) 
        {     
           while($row = $res->fetch_assoc()) 
           {      
                  //mysql
                  $imgdesc = $row["imgdesc"];
                  $imgdesc = mysqli_real_escape_string($conn,$imgdesc);
                  $holidesc = $imgdesc;

            }
        }
      }
        

  // Code for inserting design itinerary details 
        $sql ="UPDATE designdetails SET  
               pckgtitle = '".$holiarea."', imgname = '".$search_image."' , imgdesc = '".$imgdesc."', pckghl = '".$pckg."',
               pckgincl = '".$inclusion."', pckgexcl = '".$exclusion."', honeyincl = '".$honeyincl."' WHERE ghrno = '".$ref_value."' ";


      if($conn->query($sql) == true)
      {
         //success in updating the designdetails 
        //$response_array["status"] == "success";

        /*$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
      
        fwrite($myfile, $sql);
        fclose($myfile);*/

        $status = 1;

      }
      else
      { 
        //error in updating the designdetails
        //that's why we are inserting it as a new entry

         $sql = "INSERT INTO  designdetails (ghrno ,  pckgtitle ,  imgname ,  imgdesc ,  pckghl ,  pckgincl ,  pckgexcl ,  honeyincl  ) 
                 VALUES ('$ref_value','$holiarea','$search_image','$imgdesc','$pckg','$inclusion','$exclusion','$honeyincl')";
                            if(($conn->query($sql))== true)
                            {                       
                               //successfully inserted new entry
                               //$response_array["status"] == "success";  
                               $status = 1; 
                            }
                             else{
                              //error
                              //$response_array["status"] == "error";
                              $status = 0;

                            }
  
      }




    $sno=1;
     // Include code for inserting these day wise itinerary values in db for voucher issue

     $sql = "DELETE FROM itdaywise WHERE ghrnno = '".$ref_value."' ";
                         if(($conn->query($sql))== true)
                            { }

    if(isset($_POST['ittitle'])){
           foreach ( $_POST['ittitle'] as $key=>$ittitle) {

                        $ithotel = $_POST['ithotel'][$key];
                        $itmeal = $_POST['itmeal'][$key];
                        $itdate = $_POST['itdate'][$key];
                        $itdesc = $_POST['itdesc'][$key];

                        $date = date_create($itdate);
                        $date = date_format($date,"Y-m-d");
                        

                        $sql = "INSERT INTO itdaywise (ghrnno,day,title,hotelname,mealplan,date,description) 
                                VALUES ('$ref_value',$sno,'$ittitle','$ithotel','$itmeal','$date','$itdesc')";
                            if(($conn->query($sql))== true)
                            {               
                              //success
                              $status = 1;    
                            }
                             else{
                              //error
                              $status = 0; 
                             }

                         $sno++;
                        
                   }

              }


      if(isset($_POST['servicename'])){
        //if servicename is posted

        $sql = "DELETE FROM additional_prices WHERE ghrno = '".$ref_value."'";
                 if(($conn->query($sql))== true)
                  {
                  }
                  
        foreach( $_POST['servicename'] as $key=>$servicename ){
              $servicename = $_POST['servicename'][$key];
              $serviceprice = $_POST['serviceprice'][$key];

              //echo "$servicename<br>";
              //echo "$serviceprice<br>";

              //check before inserting




              $sql = "INSERT INTO additional_prices(ghrno,servicename,serviceprice) 
                                VALUES ('$ref_value','$servicename','$serviceprice')";
                            if(($conn->query($sql))== true)
                            {               
                              //success
                              $status = 1;    
                            }
                             else{
                              //error
                              $status = 0; 
                             }

                         //$sno++;
        }
      }



              //now giving status

              if($status == 0){
          //error
          //$response_array["status"] == "error";
          //header('Content-type: application/json');
          //echo json_encode($response_array);
          echo "<script>$('status').text('error');</script>";
         }
         else if($status == 1){
          //success
          //$response_array["status"] == "success";
          //header('Content-type: application/json');
          //echo json_encode($response_array);
          echo "<script>$('status').text('success');</script>";
          $removeClass = "removed";
          header("Location:designitinerary.php?ref=$ref_value&saved=true");
         }else{
          //error
          //$response_array["status"] == "error";
          //header('Content-type: application/json');
          //echo json_encode($response_array);
          echo "<script>$('status').text('error');</script>";
         }


  }




  $rec_ref= $_GET["ref"];
  if($rec_ref == $ref_value)
  {


// For design details


$sql = "SELECT * FROM designdetails WHERE ghrno = ".$ref_value."";
                      $res = $conn->query($sql) ;
                    if ($res->num_rows) 
                    { 
                       if($row = $res->fetch_assoc()) 
                          {   
                              
                              $pckgtitle =  $row["pckgtitle"];
                              $imgname =   $row["imgname"];
                              $imgdesc =  $row["imgdesc"];
                              $pckghl =  $row["pckghl"];
                              $pckgincl =   $row["pckgincl"];
                              $pckgexcl =   $row["pckgexcl"];
                              $honeyincl =   $row["honeyincl"];
                              //$roomtype =   $row["roomtype"];
                          }
                      }
                      else
                      {

                              $pckgtitle =  "";
                              $imgname =   "";
                              $imgdesc = "";
                              $pckghl =  "";
                              $pckgincl =   "";
                              $pckgexcl =   "";
                              $honeyincl =  "";
                              //$roomtype =  "";
                      } 




// ANother

        if($ref_type == "Domestic")
        {
          $schitinerary="";
          $cntt = 1;
          $z = 1; //new holder
                $sql = "SELECT * FROM hotels_domestic WHERE ghrno = '$ref_value' ORDER BY sno";

                $res = $conn->query($sql) ;
                if ($res->num_rows) 
                {    
                //we have some data in hotels_domestic
                //now we need to do a select query in itdaywise to get day and desc
                //use ajax function call to fetch data from sch_itinerary 
                   while($row = $res->fetch_assoc()) 
                   {      
                          $hotel =$row["hotel"];
                          $meal =$row["meal"];

                          //doing day1 no breakfast logic
                          $day1meal = "";
                          if($meal!=""){
                          $day1meal = str_replace("Breakfast,","",$meal);
                          }

                          $checkindate =$row["checkindate"];
                          $checkoutdate =$row["checkoutdate"];
                          
                         
                          $j="";
                          $i = 0;
                         
                          $begin = new DateTime("$checkindate");
                          $end = new DateTime("$checkoutdate");

                          $interval = DateInterval::createFromDateString('1 day');
                          $period = new DatePeriod($begin, $interval, $end);

                          foreach ( $period as $dt )
                           {        $datecur = $dt;
                                if($z == 1 && $day1meal!=""){
                                  $meal = $day1meal;
                                }
                                                $schitinerary.="
                                                <div class ='row'>
                                                    <div class='col-md-3'>  
                                                    <label for='day'><b style='font-size:19px;color:red;'>DAY ".$cntt++." </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                                    <div class='form-group'>
                                                      <label for='ittitle'>Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='ittitle[]'  id='ittitle".$z."' aria-label='...' value=''>
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
                                                         <input type='text' class='form-control' name='itdate[]'  id='itdate' value='".$dt->format( "d-m-Y" )."' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     </div>
                                                    <div class='col-md-4'>
                                                    <div class='form-group'>
                                                      <label for='itdesc'>Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <textarea rows='3' cols='80' class='form-control' name='itdesc[]' id='itdesc".$z++."' aria-label='...'></textarea>
                                                    </div>
                                                    </div>
                                                  </div><hr>";
                                                  $meal =$row["meal"];
                                                  //$i++;
                                                
                                }//while
                         
                          }//while
                                
                                $schitinerary.="
                                                <div class ='row'>
                                                    <div class='col-md-3'>  
                                                    <label for='day'><b style='font-size:19px;color:red;'>DAY ".$cntt++." </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                                    <div class='form-group'>
                                                      <label for='ittitle'>Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='ittitle[]'  id='ittitle".$z."' aria-label='...' value=''>
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
                                                         <input type='text' class='form-control' name='itdate[]'  id='itdate' value='".$end->format( "d-m-Y" )."' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     </div>
                                                    <div class='col-md-4'>
                                                    <div class='form-group'>
                                                      <label for='itdesc'>Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <textarea rows='3' cols='80' class='form-control' name='itdesc[]' id='itdesc".$z."' aria-label='...'></textarea>
                                                    </div>
                                                    </div>
                                                  </div><hr>";
                                                  //$removeClass = "removed";
                      }
          
        

        }
        else 
        {
            if($ref_type == "International")
        {
          $schitinerary="";
          $cntt = 1;
          $z = 1; //new holder
          $k = 0;
                $sql = "SELECT * FROM hotels_inter WHERE ghrnno = '$ref_value' ORDER BY sno";

                $res = $conn->query($sql);
                if ($res->num_rows) 
                {
                $k = 0;     
                   while($row = $res->fetch_assoc()) 
                   {      
                          $hotel =$row["hotel"];
                          $meal =$row["meal"];

                          //doing day1 no breakfast logic
                          $day1meal = "";
                          if($meal!=""){
                          $day1meal = str_replace("Breakfast,","",$meal);
                          }

                          $checkindate =$row["checkindate"];
                          $checkoutdate =$row["checkoutdate"];
                      
                          $j="";
                          $i = 0; //for handling count
                         
                          $begin = new DateTime("$checkindate");
                          $end = new DateTime("$checkoutdate");

                          $interval = DateInterval::createFromDateString('1 day');
                          $period = new DatePeriod($begin, $interval, $end);

                          foreach ( $period as $dt )
                           {        $datecur = $dt;
                              if($z == 1 && $day1meal!=""){
                                  $meal = $day1meal;
                                }
                                                $schitinerary.="
                                                <div class ='row'>
                                                    <div class='col-md-3'>  
                                                    <label for='day'><b style='font-size:19px;color:red;'>DAY ".$cntt++." </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                                    <div class='form-group'>
                                                      <label for='ittitle'>Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='ittitle[]'  id='ittitle".$z."' aria-label='...' value=''>
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
                                                         <input type='text' class='form-control' name='itdate[]'  id='itdate' value='".$dt->format( "d-m-Y" )."' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     </div>
                                                    <div class='col-md-4'>
                                                    <div class='form-group'>
                                                      <label for='itdesc'>Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <textarea rows='3' cols='80' class='form-control' name='itdesc[]' id='itdesc".$z++."' aria-label='...'></textarea>
                                                    </div>
                                                    </div>
                                                  </div><hr>";
                                                  $meal = $row["meal"];
                                                  //$k++;
                                                  //$k = $i; //holds i count
                                                  //echo "<script>console.log($k);</script>";
                                                
                                }//while
                                //$i++;
                         
                          }//while
                                //echo "<script>console.log('new = ".$cntt."');</script>";
                                $schitinerary.="
                                                <div class ='row'>
                                                    <div class='col-md-3'>  
                                                    <label for='day'><b style='font-size:19px;color:red;'>DAY ".$cntt++." </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                                                    <div class='form-group'>
                                                      <label for='ittitle'>Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='ittitle[]'  id='ittitle".$z."' aria-label='...' value=''>
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
                                                         <input type='text' class='form-control' name='itdate[]'  id='itdate' value='".$end->format( "d-m-Y" )."' aria-label='...'>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     </div>
                                                    <div class='col-md-4'>
                                                    <div class='form-group'>
                                                      <label for='itdesc'>Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <textarea rows='3' cols='80' class='form-control' name='itdesc[]' id='itdesc".$z."' aria-label='...'></textarea>
                                                    </div>
                                                    </div>
                                                  </div><hr>";
                      }
          
    

        }

        }   



  }

}





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
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/paper/bootstrap.min.css">

<!--custom CSS-->
<link rel="stylesheet" type="text/css" href="css/custom2.css">

  <!--Script Tags-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src='js/app.js'></script>


  <script type="text/javascript" src="js/getpreviousdata.js"></script>
  <script type="text/javascript" src="js/formactioncontentchanger.js"></script>
<style type="text/css">
#imgcontent{
  display: none;
}

</style>

<script type="text/javascript">

function picked_opt(name,desc)
        {
          $('#search_image').attr('value',name);
          $('#search_image').val(name);
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
<script>
  //add more additional prices for add_fieldprices as a button

$(document).ready(function(){
  var counter = 0;
 $('#add_fieldprices').click(function(e){
  e.preventDefault();
 counter += 1;
 $('#additional_prices').append('<tr style="font-size:11px;">'
                               +'<td><input type="text" name="servicename[]" size="30"></td>'
                               +'<td><input type="text" name="serviceprice[]" size="20"></td>' 
                             +'</tr>');

 });

});



</script>
</head>

<body>
  <div class='container'>
    <div class="row">
  <div class="col-md-2 col-md-offset-5">
    <button type="button" class="btn btn-danger btn-block" style="margin-top: 30px;">Page 3</button><br>
  </div>
</div>
     <a href="dashboard.php"><img src="images/logo_1.png" width='200' height='auto'></a>
    <h3>ITINERARY DESIGN</h3>
    <form action="#" method='POST' class="form-inline" enctype="multipart/form-data" id="myform">

      <fieldset class='first_set'>
        <p class='lineheading'>Holiday Information</p>     
        <div class='col-md-9 col-md-push-1'>
        
          <div class ='row'>      
            <div class="form-group">
              <label for="holiarea" style='width:300px;'>Enter Package Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

                          
                 <?php echo "<textarea rows='5' cols='50' class='form-control' name='holiarea' id='holiarea' aria-label='...'>".$pckgtitle."</textarea>";?>
            </div>
          </div>

          <br>
              <div class ='row'>
              <div class="form-group">
               <label for="search_image" style='width:300px;'> Select Image &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                      <?php echo "<input type='text' class='form-control' name='search_image' size='48' value='".$imgname."' id='search_image' aria-label='...'><br>";?>

                      <br>
                      <div class='col-md-8 col-md-push-4'>
                         <ul class="list-group" id='imgcontent'>
                           
                          </ul>

                      </div>
              </div>
          </div><br>
           <div class ='row'>      
            <div class="form-group hidden">
              <label for="holidescription" style='width:300px;'>Enter Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <?php echo "<textarea rows='5' cols='50' class='form-control' name='holidesc' id='holidescription' aria-label='...'>".$imgdesc."</textarea>";?>
            </div>
          </div>
         
          <br>
           <div class ='row'>      
            <div class="form-group">
              <label for="pckg" style='width:300px;'>Enter Package Highlights &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <?php echo "<textarea rows='5' cols='50' class='form-control' name='pckg' id='pckg' aria-label='...'>".$pckghl."</textarea>";?>
            </div>
          </div>

          <br>
        </div>
      </fieldset>
      <br>

      <fieldset class='second_set'>
        <p class='lineheading'>Scheduled Itinerary</p>

          <center><a onclick="getPreviousData(<?php echo $rec_ref; ?>);" class="btn btn-primary" >GET PREVIOUS ITINERARY DATA</a></center>
            
        <div class='col-md-9 col-md-push-1' id='itcontainer'>
           <br>
      
          <?php echo "$schitinerary";?>
        </div>
        
                        
          
      </fieldset>
        <br>
      <fieldset class='second_set'>
        <p class='lineheading'>Package Inclusion</p>     
        <div class='col-md-9 col-md-push-1'>
          
          <div class ='row'>
            
            <div class="form-group">
              <label for="inclusion" style='width:300px;'>Inclusion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <?php echo "<textarea rows='5' cols='50' class='form-control' name='inclusion' id='inclusion' aria-label='...'>".$pckgincl."</textarea>";?>
            </div>
          </div>

          <br>
        </div>
      </fieldset>
      <br>
      
      <fieldset class='second_set'>
        <p class='lineheading'>Package Exclusion</p>     
        <div class='col-md-9 col-md-push-1'>
          
          <div class ='row'>
            
            <div class="form-group">
              <label for="exclusion" style='width:300px;'>Exclusion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                   <?php echo "<textarea rows='5' cols='50' class='form-control' name='exclusion' id='exclusion' aria-label='...'>".$pckgexcl."</textarea>";?>
            </div>
          </div>

          <br>
        </div>
      </fieldset>
      <br>
      
      <fieldset class='second_set'>
        <p class='lineheading'>Honeymoon Inclusions</p>     
        <div class='col-md-9 col-md-push-1'>
          
          <div class ='row'>
            
            <div class="form-group">
              <label for="honeyincl" style='width:300px;'>Honeymoon Inclusion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <?php echo "<textarea rows='5' cols='50' class='form-control' name='honeyincl' id='honeyincl' aria-label='...'>".$honeyincl."</textarea>";?>
            </div>
          </div>

          <br>
        </div>
      </fieldset>
      <br>


      <!--Additional Prices Starts here-->

<fieldset class="fifth_set">
      <p class='lineheading'>Additonal Prices</p>
             <div class="col-md-6"> 
               
                <div class="row">                 
                <div class="table-responsive"> 
                   <table id="additional_prices" class="table table-hover table-responsive table-list" style="width:100%;background-color: white;">
                       <tbody><tr style="font-size:11px;">
                       <th>SERVICE NAME</th>
                       <th>SERVICE PRICE</th>
                      </tr>

                        
                      
                              


                          <?php


$service_content = "";
 $sql = "SELECT * FROM additional_prices WHERE ghrno = '$ref_value' ORDER BY sno";

                $res = $conn->query($sql) ;
                if ($res->num_rows) 
                {    
                  //there's data.. so print it in rows
                   while($row = $res->fetch_assoc()) 
                   {  
                          
                    $servicename = $row["servicename"];
                    $serviceprice = $row["serviceprice"];

                    $service_content.=" <tr style='font-size:11px;'>
                               <td><input type='text' name='servicename[]' value='".$servicename."' placeholder='Enter Type of Service Required' size='30'></td>
                               <td><input type='text' name='serviceprice[]' value='".$serviceprice."' placeholder='Enter Price of the Service' size='20'></td>            
                            </tr>";
                   }

                }else{
                  //no data.. just print one empty row
                  /*echo '<tr style="font-size:11px;">
                               <td><input type="text" name="servicename[]" value="" placeholder="Enter Type of Service Required" size="45"></td>
                               <td><input type="text" name="serviceprice[]" value="" placeholder="Enter Price of the Service" size="20"></td>            
                            </tr>';*/
                }
                    


                            
                    if($service_content){
                    echo $service_content;
                  }else{
                    echo '<tr style="font-size:11px;">
                               <td><input type="text" name="servicename[]" value="" placeholder="Enter Type of Service Required" size="30"></td>
                               <td><input type="text" name="serviceprice[]" value="" placeholder="Enter Price of the Service" size="20"></td>            
                            </tr>';
                  }
                                             
                  ?>
                   </tbody></table>
                   <a id="add_fieldprices" href="#"><span>Add more</span></a>
                 </div>
                 
                 </div> 
                      
              </div>  
      </fieldset>

      
    
            <!-- Button trigger modal -->


            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="documnent">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
              </div>
              <div class="modal-body">
                <p >Dear User, You are about to Confirm the package,</p><br> <p>please recheck the services availability, before confirming.</p>
                <b><p id="pagetitleinmodal"></p></b>
                <p id="pagetitledeleteError"></p>
              </div>
              <div class="modal-footer">
                <button type="button" id="modalCloseButton" class="btn btn-danger pull-left" data-dismiss="modal">Cancel & Recheck</button>
                <a href='confirmpackage.php?qr=<?php echo $ref_value; ?>' type="button" id="pagedeleteYes" class="btn btn-success">Checked, Confirm Package</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

      <br>
      <br>

       <div class='row'>
              <div class ='col-md-6 col-md-offset-5'>
                <button type="submit" name='save' id='save' ref='<?php echo $rec_ref; ?>' class="btn btn-success">Save</button>
                <button type="submit" name='submitf' id='view' class="btn btn-warning" target="_blank" disabled="disabled">View</button>
                <button type="submit" name='pdf' id='pdf' target="_blank" class="btn btn-danger" disabled="disabled">Save to PDF</button>
                <button type="button" name='confirm' id='confirm' target="_blank" data-toggle="modal" data-target="#myModal" class="btn btn-primary" disabled="disabled">Confirm</button>
                
              </div>
              <center><p id='status'></p></center>
        </div>
            
            <br><br>

  </div>


<?php

if($removeClass == "removed"){
  echo "<script>//enable other buttons
  $('#view').removeClass('disabled');
  $('#pdf').removeClass('disabled');
  $('#confirm').removeClass('disabled');
</script>";
}
if (isset($_GET["saved"])) {
  if($_GET["saved"] == "true"){
    //saved i.e, clicked
    echo "<script>
    $('#view').attr('disabled',false);
    $('#pdf').attr('disabled',false);
    $('#confirm').attr('disabled',false);
    </script>";
  }

}

?>

<script>
  
$(document).ready(function(){
  //call previos data getter
  getPreviousData(<?php echo $rec_ref; ?>);
});

</script>

</body>

</html>