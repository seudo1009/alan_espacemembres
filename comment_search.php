<?php 
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

	 $req = $bdd->query('SELECT id_comment,id_publication, auteur, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM commentaires WHERE id_publication = '.$_SESSION['id_post'].' ORDER BY id_comment DESC LIMIT '.$_SESSION['page'].' ,10');
     $rep3 = $req->fetchALL();
	  $req->closecursor();
	  
	 $req = $bdd->prepare('SELECT COUNT(*) AS nbre FROM commentaires WHERE id_publication = ?');
	 $req->execute(array($_SESSION['id_post']));
     $rep1 = $req->fetch();
	  $req->closecursor();