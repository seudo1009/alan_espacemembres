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
	 $req = $bdd->prepare('SELECT COUNT(*) AS nbre FROM commentaires WHERE id_publication = ?');
	 $req->execute(array($_SESSION['id_post']));
     $rep1 = $req->fetch();
	 if($rep1['nbre'] > 10 AND $rep1['nbre'] >= $_SESSION['page']+10 )
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
		
		 if($_SESSION['page'] == 0)
		 {
			  $_SESSION['page_t'] = 1;
			  $_SESSION['page'] = 10;
		 }else
		 {
			 if($_SESSION['page_t'] <= $rep1['nbre'])
	        {
		         $_SESSION['page_t'] = $_SESSION['page_t'] + 1;
				 $_SESSION['page'] = $_SESSION['page'] + 10 ;
	        }
		 }
    }
	
if(  $_SESSION['red'] ==1)
 {
	   $_SESSION['red'] = 0;
	 header('Location:commentaires_m.php');
 }else
 {
 header('Location:commentaires_.php');
 }
