<?php 
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
if( $_SESSION['nbre_nouv'] >= 10)
{
	 $req = $bdd->query('SELECT id_publication AS id_p , id_membre_p, DATE_FORMAT(date_notif, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM notif WHERE id_membre_p = '.$_SESSION['id_'].' ORDER BY notif.id DESC LIMIT '.$_SESSION['pagen'].' ,10');
     $post = $req->fetchALL();
	 $req->closecursor();
}else
{
	$req = $bdd->query('SELECT id_publication AS id_p , id_membre_p, DATE_FORMAT(date_notif, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM notif WHERE id_membre_p = '.$_SESSION['id_'].' ORDER BY notif.id DESC LIMIT '.$_SESSION['pagen'].' ,'.$_SESSION['nbre_nouv'].'');
     $post = $req->fetchALL();
	 $req->closecursor();
}