<?php session_start(); 
$d=1;
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
$rep1['nbre'] = $_SESSION['nbre_nouv'];
	 if($rep1['nbre'] > 10 AND $rep1['nbre'] >= $_SESSION['pagen']+10 )
	 {
		 $entre = 1;
		 if( (($rep1['nbre'] * 1.0) / 10)  > ($rep1['nbre']  / 10) )
		 {
			  $rep1['nbre'] = ($rep1['nbre'] / 10) + 1 ;
		 }else
		 {
			 $rep1['nbre'] = $rep1['nbre'] / 10 ;
		 }
		 $rep1['nbre'] = (int) $rep1['nbre'] +1 ;
		
		 if($_SESSION['pagen'] == 0)
		 {
			  $_SESSION['page_n'] = 1;
			  $_SESSION['pagen'] = 10;
		 }else
		 {
			 if($_SESSION['page_n'] <= $rep1['nbre'])
	        {
		         $_SESSION['page_n'] = $_SESSION['page_n'] + 1;
				 $_SESSION['pagen'] = $_SESSION['pagen'] + 10 ;
	        }
		 }
    }
header('Location: not.php');
