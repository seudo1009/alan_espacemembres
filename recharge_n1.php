<?php session_start(); 

 $_SESSION['pagen'] = $_SESSION['pagen'] - 10;  
 header('Location:not.php');

