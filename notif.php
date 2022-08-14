<?php 
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
	 $req = $bdd->prepare('SELECT COUNT(*) AS nbre FROM notif WHERE id_membre_p = ?');
	 $req->execute(array($_SESSION['id_']));
     $rep1 = $req->fetch();
	  $req->closecursor();
	  if($rep1['nbre']!=0)
	  {
		  if($_COOKIE['nbre_notif'] < $rep1['nbre'])
		  {
              $c=1;
			  $_SESSION['notif']=1;
			  $_SESSION['nbre_nouv']= $rep1['nbre'] - $_COOKIE['nbre_notif'] ;
		  setcookie('nbre_notif',$rep1['nbre'], time() + 365*24*3600, null,null, false, true);
		  $req = $bdd->prepare('SELECT* FROM notif WHERE id_membre_p = ?');
	      $req->execute(array($_SESSION['id_']));
	      $req->closecursor();
		  }
		  
	  }else
	  {
		  setcookie('nbre_notif',0, time() + 365*24*3600, null,null, false, true);
	  }