<?php

include "config.php";
$search_image = $_GET["img"];
         $sql = "SELECT * FROM holiday_images WHERE imgname  LIKE '%".$search_image."%' ORDER BY img_id";

        $res = $conn->query($sql) ;
        if ($res->num_rows) 
        {     
           while($row = $res->fetch_assoc()) 
           {  
           		echo '<li class=\'list-group-item\'><a class=\'imglink\' href=\'#\'  onclick="picked_opt(\''.$row["imgpath"].'\')" >'.$row["imgname"].'</a></li>';
	           		//'<li><a href=\'#\' onclick="picked_clg(\''.$val.'\')" class=\'clg_link\'>'.$val.'</a></li>';
           }
       }
       else
       {
       	echo "No results found";
       }










?>