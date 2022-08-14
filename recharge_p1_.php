<?php session_start(); 

 $_SESSION['pageb'] = $_SESSION['pageb'] - 10;  
 header('Location:page_.php');

