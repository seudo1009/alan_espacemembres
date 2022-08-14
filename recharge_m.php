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
	 $req = $bdd->query('SELECT COUNT(*) AS nbre FROM membres');
     $rep1 = $req->fetch();
	 if($rep1['nbre'] > 10 AND $rep1['nbre'] >= $_SESSION['pagem']+10 )
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
		
		 if($_SESSION['pagem'] == 0)
		 {
			  $_SESSION['page_m'] = 1;
			  $_SESSION['pagem'] = 10;
		 }else
		 {
			 if($_SESSION['page_m'] <= $rep1['nbre'])
	        {
		         $_SESSION['page_m'] = $_SESSION['page_m'] + 1;
				 $_SESSION['pagem'] = $_SESSION['pagem'] + 10 ;
	        }
		 }
    }
header('Location: accueil.php');
