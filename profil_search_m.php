<?php 
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

	  $req = $bdd->prepare('SELECT id, pseudo, profil ,email,passion,date_naissance,propos, DAY(date_inscription) AS jour, MONTH(date_inscription) AS mois,
  YEAR(date_inscription) AS annee FROM membres WHERE id = ?');
	  $req->execute(array($_POST['id']));
  $membres = $req->fetchAll();
  $req->closecursor();
  
  