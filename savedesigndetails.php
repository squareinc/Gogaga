<?php
//gets data from designitinerary.php page
//and updates the same data in designdetails table
//it's function is to save i.e., update data

//echo "in the save designdetails page";


if(isset($_POST["submitf"])) {


		$status = 0; //intital status

        $holiarea =$_POST["holiarea"];
        $pckg =$_POST["pckg"];
        //$holidesc =$_POST["holidesc"];
        $holidesc = "";
        $inclusion =$_POST["inclusion"];
        $exclusion =$_POST["exclusion"];

        $honeyincl =$_POST["honeyincl"];
        $roomtype =$_POST["roomtype"];
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
                  $imgdesc = $row["imgdesc"];
                  $holidesc = $imgdesc;

            }
        }
      }
        


      // Code for inserting design itinerary details 
        $sql ="UPDATE  designdetails  SET  
               pckgtitle = '".$holiarea."', imgname = '".$search_image."' , imgdesc = '".$imgdesc."', pckghl = '".$pckg."',
               pckgincl = '".$inclusion."', pckgexcl = '".$exclusion."', honeyincl = '".$honeyincl."', roomtype ='".$roomtype."'  
              WHERE ghrno = '".$ref_value."'  ";
      if($conn->query($sql) == true)
      {
         //success in updating the designdetails 
      	//$response_array["status"] == "success";
      	$status = 1;
      }
      else
      { 
      	//error in updating the designdetails
      	//that's why we are inserting it as a new entry

         $sql = "INSERT INTO  designdetails (ghrno ,  pckgtitle ,  imgname ,  imgdesc ,  pckghl ,  pckgincl ,  pckgexcl ,  honeyincl ,  roomtype ) 
                 VALUES ('$ref_value','$holiarea','$search_image','$imgdesc','$pckg','$inclusion','$exclusion','$honeyincl','$roomtype')";
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

                        $sql = "INSERT INTO itdaywise (ghrnno,day,title,hotelname,mealplan,date,description) 
                                VALUES ('$ref_value',$sno,'$ittitle','$ithotel','$itmeal','$itdate','$itdesc')";
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

         }


         if($status == 0){
         	//error
         	$response_array["status"] == "error";
         	header('Content-type: application/json');
        	echo json_encode($response_array);
         }
         else if($status == 1){
         	//success
         	$response_array["status"] == "success";
         	header('Content-type: application/json');
        	echo json_encode($response_array);
         }else{
         	//error
         	$response_array["status"] == "error";
         	header('Content-type: application/json');
        	echo json_encode($response_array);
         }


?>

