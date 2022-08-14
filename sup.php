<?php 
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
      mail('sejoawalan@gmail.com','Inscriptions', 'Un nouveau membre parti : '.$_SESSION ['pseudo'].'!');
     $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
	 $req->execute(array($_SESSION['id_']));
	  $req->closecursor();
	 