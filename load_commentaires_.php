<?php session_start(); 
$_SESSION['id_post']= $_POST['id'];
header('Location: commentaires_.php');