<?php
$_SESSION['pseudo_recherche_'] = 0;	
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
  $req->execute(array(htmlspecialchars($_SESSION['pseudo_recherche'])));
  $pseudos_ = $req->fetchAll();
  if(empty($pseudos_) AND $_SESSION['pseudo_recherche2'] == 1)
{
$_SESSION['pseudo_recherche_'] = 1;	
}
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
  $req->closecursor();