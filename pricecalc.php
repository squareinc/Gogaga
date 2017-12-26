 <?php

include "config.php";


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
   

 <div class='col-md-10 col-md-push-1'>                  
                <div class='table-responsive'> 
                   <table class='table table-hover table-responsive table-striped table-bordered' style='background-color: white;'>
                      <tr>  
                         <th></th>
                         <th>Percentage</th>
                         <th>Value</th>
                      </tr>
<?php 


echo "<h3 style='text-align:center;'>$ref_type Calculator</h3><br>";

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
                "LAND COST EXCLUDING SERVICE TAX",
                "GST",
                "LAND COST INCLUDING SERVICE TAX",
                "FLIGHT COST TO BE SHARED IN THE ITINERARY",
                "TRAVEL INSURANCE","","","" 
            );
        $y=array("<p ng-model='mix'></p>",
                  "<input type='number' size='20' ng-model='val2' ng-init='val2=0'>",
                "<p ng-model='mix'></p>",
                  "<p ng-model='y1'>{{y1=y2+y3+y4}} %</p>",
                  "<input type='number' size='20' ng-model='y2' ng-init='y2=0'>",
                  "<input type='number' size='20' ng-model='y3' ng-init='y3=0'>",
                 "<input type='number' size='20' ng-model='y4' ng-init='y4=0'>",
                 "<p ng-model='mix'></p>",
                  "<p ng-model='mix'></p>",
                 "<input type='number' size='20' ng-model='val4' ng-init='val4=0'>",
                 "<p ng-model='mix'></p>",
                  "<input type='number' size='20' ng-model='val5' ng-init='val5=0'>",
                  "<p ng-model='mix'></p>",
                  "<p ng-model='mix'></p>",
                  "<p ng-model='mix'></p>",
                  "TOTAL PRICE PER PERSON",
                  "NUMBER OF PASSENGERS",
                  "TOTAL PRICE FOR ALL PAX"
          );
      $z=array("<input type='number'  size='20' ng-model='val1' ng-init='val1=0' >",
                  "<p ng-model='z1'>{{z1=val1 * (val2)/100}}</p>",
                  "<p ng-model='z2'>{{z2=z1 + val1}}</p>",
                 "<p ng-model='z3'>{{z3=(y1/100) * z2}}</p>",
                 "<p ng-model='z4'>{{z4=(y2/100) * z2}}</p>",
                 "<p ng-model='z5'>{{z5=(y3/100) * z2}}</p>",
                 "<p ng-model='z6'>{{z6=(y4/100) * z2}}</p>",
                 "<p ng-model='z7'>{{z7 = z2 +z3}}</p>",
                 "<input type='number'  size='20' ng-model='zs' ng-init='zs=0' >",
                 "<p ng-model='z8'>{{z8 = zs*(val4)/100 }}</p>",
                 "<p ng-model='z9'>{{z9 = z7}}</p>",
                 "<p ng-model='z10'>{{z10 = (val5)/100 *z9}}</p>",
                  "<p ng-model='z11'>{{z11=z9+z10}}</p>",
                  "<p ng-model='z12'>{{z12 = zs +z8}}</p>",
                  "<input type='number' size='20' ng-model='z13' ng-init='z13=0'>",
                  "<p ng-model='z14'>{{z14 = z13+ z12+z11}}</p>",
                 "<input type='number' size='20' ng-model='val7' ng-init='val7=0'>",
                  "<p ng-model='z15'>{{z15 = z14*val7}}</p>",  
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
                "",
                "",
                ""


            );
        $y=array("<p ng-model='mix'></p>",
                 "<input type='number' size='20' ng-model='val2' ng-init='val2=0'>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='y1'>{{y1=y2+y3+y4}} %</p>",
                 "<input type='number' size='20' ng-model='y2' ng-init='y2=0'>",
                 "<input type='number' size='20' ng-model='y3' ng-init='y3=0'>",
                 "<input type='number' size='20' ng-model='y4' ng-init='y4=0'>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<input type='number' size='20' ng-model='val4' ng-init='val4=0'>",
                 "<p ng-model='mix'></p>",
                 "<input type='number' size='20' ng-model='val5' ng-init='val5=0'>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='mix'></p>",
                 "<p ng-model='crtot'>{{crtot=crsup+crhol+crsal}} %</p>",
                 "<input type='number' size='20' ng-model='crsup' ng-init='crsup=0'>",
                 "<input type='number' size='20' ng-model='crhol' ng-init='crhol=0'>",
                 "<input type='number' size='20' ng-model='crsal' ng-init='crsal=0'>",
                 "<p ng-model='mix'></p>",
                 "TOTAL PRICE PER PERSON",
                 "NUMBER OF PASSENGERS",
                 "TOTAL PRICE FOR ALL PAX"
          );
      $z=array(" <input type='number'  size='20' ng-model='val1' ng-init='val1=0' >",
                 "<p ng-model='z1'>{{z1=val1 * (val2)/100}}</p>",
                 "<p ng-model='z2'>{{z2=z1 + val1}}</p>",
                 "<p ng-model='z3'>{{z3=(y1/100) * z2}}</p>",
                 "<p ng-model='z4'>{{z4=(y2/100) * z2}}</p>",
                 "<p ng-model='z5'>{{z5=(y3/100) * z2}}</p>",
                 "<p ng-model='z6'>{{z6=(y4/100) * z2}}</p>",
                 "<p ng-model='z7'>{{z7 = z2 +z3}}</p>",
                 "<input type='number' size='20' ng-model='zs' ng-init='zs=0'>",
                 "<p ng-model='z8'>{{z8 = zs*(val4)/100 }}</p>",
                 "<p ng-model='z9'>{{z9 = z7}}</p>",
                 "<p ng-model='z10'>{{z10 = (val5)/100 *z9}}</p>",
                 "<input type='number' size='20' ng-model='z11' ng-init='z11=0'>",
                 "<p ng-model='z12'>{{z12 = z11+z10+z9}}</p>",
                 "<p ng-model='z13'>{{z13 = z8 + zs}}</p>",
                 "<input type='number' size='20' ng-model='z14' ng-init='z14=0'>",
                 "<input type='number' size='20' ng-model='ztrins' ng-init='ztrins=0'>",
                 "<input type='number' size='20' ng-model='cramount' ng-init='cramount=0'>",
                 "<p ng-model='z15'>{{z15 = cramount*(crtot/100)}}</p>",
                 "<p ng-model='z16'>{{z16 = cramount*(crsup/100)}}</p>",
                 "<p ng-model='z17'>{{z17 = cramount*(crhol/100)}}</p>", 
                 "<p ng-model='z18'>{{z18 = cramount*(crsal/100)}}</p>", 
                 "<p ng-model='z19'>{{z19 = cramount + z15}}</p>", 
                 "<p ng-model='z20'>{{z20 = z19 + ztrins + z14 +z13 +z12}}</p>",
                 "<input type='number' size='20' ng-model='val7' ng-init='val7=0'>", 
                 "<p ng-model='z21'>{{z21 = z20*val7}}</p>",
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
                  <br><br><br><br>
                </div>
  </div>