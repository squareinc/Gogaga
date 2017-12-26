<?php

include "config.php";

session_start();

if(!isset($_SESSION["userid"]))
{
  header('Location:index.php');
}
else
{
    $userid = $_SESSION["userid"];
    $password = $_SESSION["password"];
    $type = $_SESSION["type"];
    $handle_type = $_SESSION["handle_type"];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Financial Transactions</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--CSS Tags-->
  <link rel="icon" href="images/logo_icon.png"/>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="css/dashboard1.css">
  <!--Script Tags-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  </head>
<body>
  

	<?php
    include "navbar.php";
  ?>


<form method='POST' id='export_excel'>
  <input type='file' name='excel_file' id='excel_file' />  
</form>

<div id='result'>

</div>







</body>

</html>

<script>
$(document).ready(function(){
      $('#excel_file').change(function(){
            $('#export_excel').submit();

      });
      $('#export_excel').on('submit',function(event){
                
            event.preventDefault();
            $.ajax({
              url:'export.php',
              method:"POST",
              data : new FormData(this),
              contentType:false,
              processData:false,
              success:function(data)
              {
                $('#result').html(data);
                $('#excel_file').val('');
              }

            });



      });


});


</script>