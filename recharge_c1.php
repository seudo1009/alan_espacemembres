<?php session_start(); 

 $_SESSION['page'] = $_SESSION['page'] - 10;  
 if(  $_SESSION['red'] ==1)
 {
	   $_SESSION['red'] =0;
	 header('Location:commentaires_m.php');
 }else
 {
 header('Location:commentaires_.php');
 }

