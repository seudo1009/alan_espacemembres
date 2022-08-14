<?php session_start(); 

 $_SESSION['pagem'] = $_SESSION['pagem'] - 10;  
 header('Location:accueil.php');

