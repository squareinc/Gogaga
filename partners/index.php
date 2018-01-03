<?php
session_start();

if(!isset($_SESSION["userid"]))
{
  header('Location:../index.php');
}else{
   header('Location:dashboard.php');
}



?>