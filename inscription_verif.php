<?php session_start();
if($_POST['pseudo'] != '' AND $_POST['pass']!= '' AND $_POST['pass_confirm'] != '')
{

try
{
  $bdd = new PDO ('mysql:host=localhost;dbname=espace_membres','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
 $req->execute(array(htmlspecialchars($_POST['pseudo'])));
  $pseudos = $req->fetchAll();
  if(empty($pseudos))
{
	$d=1 ;
}else
{
	$d=0;
}
$req->closecursor();
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

	
	if(($_POST['pass'] != $_POST['pass_confirm']) OR $d == 0 )
	{
	 if($_POST['pass'] != $_POST['pass_confirm'])
	 {
		$_SESSION['pass_verif'] = 1;
	 }else
	 {
		$_SESSION['pseudo_verif'] = 1;
	 }

}else
{
	if(strlen($_POST['pass']) < 8 )
	{
		$_SESSION['pass_verif_'] = 1;
	}else
	{
	$req = $bdd->prepare('INSERT INTO membres (pseudo,pass,date_inscription) VALUES (:pseudo,:pass,NOW())');
	$req->execute(array(
	'pseudo' => htmlspecialchars($_POST['pseudo']),
	'pass' => sha1($_POST['pass'])
	 ));
	$_SESSION['verif']=1;
	$_SESSION ['pseudo']= $_POST['pseudo'];
	}
}
}else
{
	echo 'Vous devez remplir tous les champs.';
}
header('Location: inscription.php');