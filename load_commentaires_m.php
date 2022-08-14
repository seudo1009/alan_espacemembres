<?php session_start(); 
$_SESSION['id_post']= $_POST['id'];
header('Location: commentaires_m.php');