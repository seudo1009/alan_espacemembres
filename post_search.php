<?php 
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

	  $req = $bdd->query('SELECT  publications.id_post AS id ,publications.id_membre,publications.contenu AS contenu,DATE_FORMAT(publications.date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date ,post_support.ext AS ext ,post_support.nom AS nom,post_support.id_poster FROM
	  publications LEFT JOIN post_support 
	  ON publications.id_post = post_support.id_poster WHERE publications.id_membre = '.$_SESSION['id_'].' ORDER BY publications.id_post DESC LIMIT '.$_SESSION['pageb'].' ,10');
      $membres = $req->fetchAll();
      $req->closecursor();
   
	 $req = $bdd->prepare('SELECT COUNT(*) AS nbre FROM publications WHERE publications.id_membre = ?');
	 $req->execute(array($_SESSION['id_']));
     $rep1 = $req->fetch();
	  $req->closecursor();
	  
	   $req = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
  $req->execute(array(htmlspecialchars($_SESSION['id_'])));
  $membres1 = $req->fetchAll();
  $req->closecursor();