<?php 
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

	  $req = $bdd->prepare('SELECT  publications.id_post AS id ,publications.id_membre AS id_m,publications.contenu AS contenu,DATE_FORMAT(publications.date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date ,post_support.ext AS ext ,post_support.nom AS nom,post_support.id_poster FROM
	  publications LEFT JOIN post_support 
	  ON publications.id_post = post_support.id_poster WHERE publications.id_post = ?');
	  $req->execute(array($_SESSION['id_post']));
      $post = $req->fetchAll();
      $req->closecursor();
   
	 