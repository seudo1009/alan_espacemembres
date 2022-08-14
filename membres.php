<?php 
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo != ? ORDER BY id DESC LIMIT  '.$_SESSION['pagem'].' ,10');
  $req->execute(array(htmlspecialchars($_SESSION['pseudo'])));
  $membres = $req->fetchAll();
  $req->closecursor();
  
     $req = $bdd->query('SELECT COUNT(*) AS nbre FROM membres ');
     $rep1 = $req->fetch();
	  $req->closecursor();
}

catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}