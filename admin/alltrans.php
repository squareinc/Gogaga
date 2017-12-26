<?php

include "../config.php";
session_start();

if(!isset($_SESSION["userid"]))
{
  header('Location:../index.php');
}
else
{
    $userid = $_SESSION["userid"];
    $username = $_SESSION['username'];
    $handle_type =$_SESSION["handle_type"];

    if($handle_type!="Both")
    {
    	header('Location:../index.php');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Transactions</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--CSS Tags-->
  <link rel="icon" href="images/logo_icon.png"/>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--Script Tags-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body ng-app='myApp' ng-controller="DashboardController">
<div class='container'>
<div class='col-md-12'>


 <h1>Financial Transactions</h1>

   

                     <?php
                     
                           $from_date = "";
                        if(isset($_GET["search_tran"]))
                        { 
                            if(isset($_GET["from_date"])){
                                if($_GET["from_date"]!='D' && $_GET["from_mon"]!='M' && $_GET["from_year"]!='Y') 
                                $from_date = $_GET["from_year"]."-".$_GET["from_mon"]."-".$_GET["from_date"];
                              else
                                $from_date = "2000-1-1";
                   

                              if($_GET["to_date"]!='D' && $_GET["to_mon"]!='M' && $_GET["to_year"]!='Y') 
                                $to_date = $_GET["to_year"]."-".$_GET["to_mon"]."-".$_GET["to_date"];
                              else
                                $to_date = date("Y-m-d");


                                $from_date = date_create($from_date);
                                $from_date=  date_format($from_date,"Y-m-d");
                                $to_date = date_create($to_date);
                                $to_date=  date_format($to_date,"Y-m-d");
                            }


                          $search_tran = $_GET["search_tran"];
                          $sql = "SELECT * FROM transactions
                          WHERE ";
                          if(!empty($from_date))
                          $sql.="(Transaction_date >= '$from_date' and Transaction_date <= '$to_date') and ";

                          $sql.="(GHRN_number LIKE '%".$search_tran."%')
                          ORDER BY Transaction_number DESC
                         
                          ";
                            
                          $_SESSION['search_tran_val']=$_GET["search_tran"];
                        }
                      else
                      {
                       $sql= "SELECT * FROM transactions 
                       ORDER BY Transaction_number DESC
                       
                       ";
                        unset($_GET["search_tran"]);
                      }


      
      $res = $conn->query($sql) ;
      if ($res->num_rows) 
      {    


        $table_records =$res->num_rows;
        $sdtb = "danger";

        if($table_records >100 && $table_records <280)
              $sdtb = "warning";
        elseif($table_records< 100)
              $sdtb = "success";  
                

          $table_head = "<div class='table-responsive'> <table id='trantable' class='table table-hover table-bordered table-stripped table-list' style='background-color: white;'>";
          
          $table_tran = " 
                   <tr style='font-size:12px;'>
                      <th>Transaction number</th>
                      <th>Transaction Date </th>
                      <th>GHRN Number</th>
                      <th>Transaction Particulars</th>
                      <th>Transaction type</th>
                      <th>Credit</th>
                      <th>Debit</th>
                      <th>Balance</th>

                  </tr>";
                     $credit_tot=$debit_tot =0;
       while($row = $res->fetch_assoc()) 
      {    $date=date_create($row["Transaction_date"]);
            $dfor=  date_format($date,"d-M-Y");
          $table_tran.="<tr style='font-size:12px;'>
              <td>".$row["Transaction_number"]."</td>
              <td>".$dfor."</td>
              <td>".$row["GHRN_number"]."</td>
              <td>".$row["Transaction_particulars"]."</td>
              <td>".$row["Transaction_type"]."</td>
              <td>".$row["Credit"]."</td>
              <td>".$row["Debit"]."</td>
              <td>".(int)$row["Balance"]."/-</td>
            </tr>
            ";
            $credit_tot = $credit_tot + (int)$row["Credit"];
            $debit_tot = $debit_tot +(int)$row["Debit"];
      }
           $table_tran.="<tr style='font-size:12px;'>
              <td style='border:none;background-color:#FAF7F6;'></td>
              <td style='border:none;background-color:#FAF7F6;'></td>
              <td style='border:none;background-color:#FAF7F6;'></td>
              <td style='border:none;background-color:#FAF7F6;'></td>
              <td style='border:none;background-color:#FAF7F6;'></td>
              <td><b style='color:green;'>".(int)$credit_tot."</b></td>
              <td><b style='color:red;'>".(int)$debit_tot."</b></td>
              <td style='border:none;background-color:#FAF7F6;'></td>
            </tr>
            ";
      $_SESSION['table_data'] =$table_tran;

      $table_tran.= "</table></div>";

      }
      else
      { 
        $sdtb="danger";
        $table_records ="0";
        $table_head="";
        $table_tran="";
        
      }
   $form_page ="
                   <div class ='row'>               
                        <div class='col-md-12'>
                              
                                <form method='GET' action=''>
                                  <div class='row'>
                                    <div class='col-md-6'>
                                      <div class='input-group'>
                                          <input type='text' placeholder='Search Transactions by GHRN number' size='300' name ='search_tran' class='form-control' aria-label='...'>
                                      </div>
                                    </div>
                                    
                                    <div class='col-md-1'>
                                        <span class='input-group-btn'>
                                          <button class='btn btn-primary' type='submit'>Search</button>
                                        </span>
                                    </div>
                                  </div>  
                                

                                <div class='row'>
                                     <div  class='col-md-3' style='padding-left:30px;'><br>
                                       <label for='trandate'>From</label>
                                        <select name='from_date' style='height:40px;' > 
                                          <option value='D'>D</option> <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>       
                                        </select> 
                                    
                                        <select name='from_mon' style='height:40px;' > 
                                          <option value='M'>M</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option>         
                                           <option value='12'>Dec</option>
                                           </select>  
                                  
                                        <select name='from_year' style='height:40px;' > 
                                          <option value='Y'>Y</option>
                                          ";

                                          
                                                $y=date("Y");
                                                $x=2010;
                                              while($x <= $y) 
                                              {
                                               $form_page .= "<option>".$x."</option>";
                                                $x++;
                                              } 
                                         

                                  $form_page.="</select>
                                     </div>
                                      
                                    <div class='col-md-5'><br>
                                      <label for='trandate'>To</label>
                                        <select name='to_date' style='height:40px;' > 
                                          <option value='D'>D</option> <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>       
                                        </select> 
                                    
                                        <select name='to_mon' style='height:40px;' > 
                                          <option value='M'>M</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option>         
                                           <option value='12'>Dec</option>
                                            </select>  
                                  <select name='to_year' style='height:40px;' > 
                                          <option value='Y'>Y</option>
                                          ";

                                          
                                                $y=date("Y");
                                                $x=2010;
                                              while($x <= $y) 
                                              {
                                               $form_page .= "<option>".$x."</option>";
                                                $x++;
                                              } 
                                         

                                  $form_page.="</select>
                                     </div>

                                    

                                  </form>
                                                         
                            </div><!-- /col-md-12 -->
                          </div><!-- row -->
                        ";




      echo "$form_page";

      echo "<div class='row'>
            <div class='col-md-6'><b style='color:red;'>$table_records</b> rows found</div>

      </div><br>";
      echo "$table_head $table_tran";
?>
</div>
</div>


</body>
</html>