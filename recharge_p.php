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
	 $req = $bdd->prepare('SELECT COUNT(*) AS nbre FROM publications WHERE publications.id_membre = ?');
	 $req->execute(array($_SESSION['id_m']));
     $rep1 = $req->fetch();
	 if($rep1['nbre'] > 10 AND $rep1['nbre'] >= $_SESSION['pageb']+10 )
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
		
		 if($_SESSION['pageb'] == 0)
		 {
			  $_SESSION['page_b'] = 1;
			  $_SESSION['pageb'] = 10;
		 }else
		 {
			 if($_SESSION['page_b'] <= $rep1['nbre'])
	        {
		         $_SESSION['page_b'] = $_SESSION['page_b'] + 1;
				 $_SESSION['pageb'] = $_SESSION['pageb'] + 10 ;
	        }
		 }
    }
header('Location: page_m.php');
