<?php
require("config.php");
$ref_value ="ghrn123";
if (isset($_POST['submit_val'])) {
echo "submitted<br>";
$sno=1;
if(isset($_POST['location'])){
       foreach ( $_POST['location'] as $key=>$location) {

                    $vendor = $_POST['vendor'][$key];
                    $cntmngr = $_POST['cntmngr'][$key];
                    $contact = $_POST['contact'][$key];
                    $hotel = $_POST['hotel'][$key];
                    $checkin = $_POST['checkin'][$key];
                    $checkout = $_POST['checkout'][$key];
                    $meal = $_POST['meal'][$key];
                    $price = $_POST['price'][$key];
                    echo "$ref_value<br>";
                $sql = "INSERT INTO hotels_inter 
                (ghrnno,sno,location,vendor,cntmngr,contact,hotel,checkindate,checkoutdate,meal,prices) 
                        VALUES ('$ref_value',$sno,'$location','$vendor','$cntmngr','$contact','$hotel','$checkin','$checkout','$meal','$price')";
                    if(($conn->query($sql))== true)
                    {                       
                          echo "Hotel International Done<br>";
                    }
                    else
                        echo "Hotel International Not Done<br>";
                $sno++;
                }
              }
}
else
echo "Not submitted";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--CSS Tags-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--Script Tags-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script type="text/javascript">
var counter = 0;
$(function(){
 $('#add_fieldi').click(function(e){
  e.preventDefault();
 counter += 1;

 $('#containeri').append(
                              '<tr>'
                               +'<td><input id="field1_' + counter + '" type="text" name="location[]" size="10"></td>'
                               +'<td><input id="field2_' + counter + '" type="text" name="vendor[]" size="10"></td>'
                               +'<td><input id="field3_' + counter + '" type="text" name="cntmngr[]"size="10"></td>'
                               +'<td><input id="field4_' + counter + '" type="text" name="contact[]" size="10"></td>'
                               +'<td><input id="field5_' + counter + '" type="text" name="hotel[]" size="6"></td>'
                               +'<td><input id="field6_' + counter + '" type="text" name="checkin[]" size="6"></td>'
                               +'<td><input id="field7_' + counter + '" type="text" name="checkout[]" size="6"></td>'
                               +   '<td><select name="meal[]">'
                                     +'<option>Breakfast only</option><option>Breakfast and Lunch</option><option>Breakfast and Dinner</option><option>Breakfast,Lunch and Dinner</option>'
                               +'</select></td><td><input type="text" name="price[]" size="8"></td>'
                             +'</tr>'

 );


 });
});

</script>


</head>


<body>

 <h1>Add your ta</h1>
  <form method="post" action="">
  <div class='table-responsive'> 
     <table id= 'containeri' class='table table-hover table-responsive table-list' style='background-color: white;'>
                          <tr>
                       <th>LOCATION</th>
                       <th>VENDOR</th>
                       <th>CONTACT MANAGER</th>
                       <th>CONTACT NO</th>
                        <th>HOTEL NAME</th>
                        <th>CHECK-IN DATE</th>
                        <th>CHECK-OUT DATE</th>
                       <th>MEAL PLAN</th>
                       <th>PRICES</th>
                      </tr>
</table>
</div>
<br>
<a id="add_fieldi" href="#"><span>Add more</span></a>
 <br> <br> <br>
 <input type="submit" name="submit_val" value="Submit" />


 </form>

</body>
</html>


