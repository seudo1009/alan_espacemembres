<?php session_start();
 $_SESSION['page'] = 0;
try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('INSERT INTO commentaires (id_publication,auteur,date,contenu) VALUES (:id,:pseudo,NOW(),:contenu)');
	$req->execute(array(
	'id' => $_POST['id'],
	'pseudo' => htmlspecialchars($_POST['pseudo']),
	'contenu' => htmlspecialchars($_POST['contenu']),
	 ));
	 $req->closecursor();
header('Location: commentaires_.php');