<?php try
{
	
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	  $req = $bdd->prepare('SELECT  publications.id_post,publications.id_membre,publications.contenu AS contenu,DATE_FORMAT(publications.date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date ,post_support.ext AS ext ,post_support.nom AS nom,post_support.id_poster FROM
	  publications LEFT JOIN post_support 
	  ON publications.id_post = post_support.id_poster WHERE publications.id_membre = ? ORDER BY publications.id_post DESC LIMIT 0,1');
	  $req->execute(array($rep['id']));
      $membres_post = $req->fetchAll();
  $req->closecursor();
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}