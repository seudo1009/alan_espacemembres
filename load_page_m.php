<?php session_start(); 
$_SESSION['pseudo_m']= $_POST['pseudo_m'];
$_SESSION['id_m']= $_POST['id_m'];
header('Location: page_m.php');